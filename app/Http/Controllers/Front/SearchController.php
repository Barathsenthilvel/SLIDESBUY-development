<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\Downloads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchProducts(Request $request)
    {
        $query = trim($request->get('q', ''));

        // Convert comma-separated strings to arrays
        $categoryFilter = $request->get('category', []);
        if (is_string($categoryFilter)) {
            $categoryFilter = $categoryFilter ? explode(',', $categoryFilter) : [];
        }

        $attributeFilter = $request->get('attribute_value', []);
        if (is_string($attributeFilter)) {
            $attributeFilter = $attributeFilter ? explode(',', $attributeFilter) : [];
        }

        $tagFilter = $request->get('tag', '');
        $priceTypeFilter = $request->get('price_type', '');
        $sortBy = $request->get('sort', 'newest');
        $page = $request->get('page', 1);

        // Get all categories for filter sidebar
        $allCategories = Category::where('status', '1')->get();

        // Get all attributes for filter sidebar with their values
        $allAttributes = Attribute::where('status', '1')
            ->whereNotNull('attribute_values')
            ->where('attribute_values', '!=', '')
            ->get()
            ->map(function($attribute) {
                // Parse the comma-separated values
                $values = array_filter(array_map('trim', explode(',', $attribute->attribute_values)));
                $attribute->parsed_values = $values;
                return $attribute;
            });

        // Also get attribute values from products for better filtering
        $attributeValues = Attribute::where('status', '1')
            ->whereNotNull('attribute_values')
            ->where('attribute_values', '!=', '')
            ->get();

        // Get all unique tags from products (stored in attribute_values)
        $allTags = collect();
        $products = Product::where('status', '1')
            ->whereNotNull('attribute_values')
            ->where('attribute_values', '!=', '')
            ->get();

        foreach($products as $product) {
            $attributes = $product->Methodattribute();
            foreach($attributes as $attribute) {
                if(strtolower($attribute[0]) === 'tags') {
                    $tagValues = explode(',', $attribute[1]);
                    foreach($tagValues as $tag) {
                        $tag = trim($tag);
                        if(!empty($tag)) {
                            $allTags->push($tag);
                        }
                    }
                }
            }
        }

        $allTags = $allTags->unique()->values();

        $products = collect();
        $categories = collect();

        if (!empty($query)) {
        // Search in categories
        $categories = Category::where('status', '1')
            ->where(function($q) use ($query) {
                $q->where('category_name', 'LIKE', "%{$query}%")
                  ->orWhere('short_description', 'LIKE', "%{$query}%")
                  ->orWhere('meta_keywords', 'LIKE', "%{$query}%");
            })
            ->get();

            // Search in products
        $productsQuery = Product::where('status', '1')
            ->where(function($q) use ($query) {
                $q->where('product_title', 'LIKE', "%{$query}%")
                  ->orWhere('product_description', 'LIKE', "%{$query}%")
                      ->orWhere('product_sku', 'LIKE', "%{$query}%")
                      ->orWhere('attribute_values', 'LIKE', "%{$query}%");
                });

            // Apply category filter
            if (!empty($categoryFilter)) {
                $productsQuery->where(function($q) use ($categoryFilter) {
                    foreach ($categoryFilter as $categoryId) {
                        $q->orWhere('category', 'LIKE', "%{$categoryId}%");
                    }
                });
            }

            // Apply attribute filter
            if (!empty($attributeFilter)) {
                $productsQuery->where(function($q) use ($attributeFilter) {
                    foreach ($attributeFilter as $attributeValue) {
                        // Format: "attributeId-value" (e.g., "18-tag1")
                        $parts = explode('-', $attributeValue, 2);
                        if (count($parts) === 2) {
                            $attributeId = $parts[0];
                            $value = $parts[1];
                            $q->orWhere('attribute_values', 'LIKE', "%{$attributeId}-{$value}%");
                        }
                    }
                });
            }

            // Apply tag filter
            if (!empty($tagFilter)) {
                $productsQuery->where('attribute_values', 'LIKE', "%{$tagFilter}%");
            }

            // Apply price type filter (Free/Paid)
            if (!empty($priceTypeFilter)) {
                if ($priceTypeFilter === 'free') {
            $productsQuery->where('sell_type', 0);
                } elseif ($priceTypeFilter === 'paid') {
            $productsQuery->where('sell_type', 1);
        }
            }

            // Apply sorting
            switch ($sortBy) {
                case 'oldest':
                    $productsQuery->orderBy('created_at', 'asc');
                    break;
                case 'popular':
                    // Sort by downloads using a subquery approach
                    $productsQuery->addSelect([
                        'total_downloads' => Downloads::selectRaw('COALESCE(SUM(download_count), 0)')
                            ->whereColumn('product_id', 'products.id')
                    ])->orderBy('total_downloads', 'desc');
                    break;
                case 'rating':
                    $productsQuery->orderBy('average_rating', 'desc');
                    break;
                case 'newest':
                default:
                    $productsQuery->orderBy('created_at', 'desc');
                    break;
            }

            $products = $productsQuery->with(['productVendors'])->paginate(12);
        } else {
            // If no search query, show all products with filters
            $productsQuery = Product::where('status', '1');

        // Apply category filter
            if (!empty($categoryFilter)) {
                $productsQuery->where(function($q) use ($categoryFilter) {
                    foreach ($categoryFilter as $categoryId) {
                    $q->orWhere('category', 'LIKE', "%{$categoryId}%");
                }
            });
        }

            // Apply attribute filter
            if (!empty($attributeFilter)) {
                $productsQuery->where(function($q) use ($attributeFilter) {
                    foreach ($attributeFilter as $attributeValue) {
                        // Format: "attributeId-value" (e.g., "18-tag1")
                        $parts = explode('-', $attributeValue, 2);
                        if (count($parts) === 2) {
                            $attributeId = $parts[0];
                            $value = $parts[1];
                            $q->orWhere('attribute_values', 'LIKE', "%{$attributeId}-{$value}%");
                        }
                    }
                });
            }

            // Apply tag filter
            if (!empty($tagFilter)) {
                $productsQuery->where('attribute_values', 'LIKE', "%{$tagFilter}%");
            }

            // Apply price type filter (Free/Paid)
            if (!empty($priceTypeFilter)) {
                if ($priceTypeFilter === 'free') {
                    $productsQuery->where('sell_type', 0);
                } elseif ($priceTypeFilter === 'paid') {
                    $productsQuery->where('sell_type', 1);
                }
        }

        // Apply sorting
        switch ($sortBy) {
            case 'oldest':
                $productsQuery->orderBy('created_at', 'asc');
                break;
            case 'popular':
                // Sort by downloads using a subquery approach
                $productsQuery->addSelect([
                    'total_downloads' => Downloads::selectRaw('COALESCE(SUM(download_count), 0)')
                        ->whereColumn('product_id', 'products.id')
                ])->orderBy('total_downloads', 'desc');
                break;
            case 'rating':
                $productsQuery->orderBy('average_rating', 'desc');
                break;
            case 'newest':
            default:
                $productsQuery->orderBy('created_at', 'desc');
                break;
        }

            $products = $productsQuery->with(['productVendors'])->paginate(12);
        }

        // Get category names for products
        $productCategoryNames = [];
        foreach($products as $product) {
            $categoryNames = '';
            if ($product->category) {
                $categoryIds = explode('|', $product->category);
                $productCategories = Category::whereIn('id', $categoryIds)->get();
                $categoryNames = $productCategories->pluck('category_name')->implode(', ');
            }
            $productCategoryNames[$product->id] = $categoryNames;
        }

        // Get download counts for products
        $downloadCounts = Product::getDownloadCounts($products);

        // Get wishlist product IDs for current user
        $wishlistProductIds = [];
        if (auth()->check()) {
            $wishlistProductIds = auth()->user()->wishlists()->pluck('product_id')->toArray();
        }

        // If AJAX request, return only the product list
        if ($request->ajax()) {
            return view('front.product-list', compact(
                'products', 'productCategoryNames', 'downloadCounts', 'wishlistProductIds'
            ));
        }

        return view('front.shop', compact(
            'query', 'products', 'categories', 'allCategories', 'allAttributes', 'attributeValues',
            'allTags', 'productCategoryNames', 'downloadCounts',
            'wishlistProductIds', 'categoryFilter', 'attributeFilter', 'tagFilter', 'priceTypeFilter', 'sortBy'
        ));
    }

    public function searchSuggestions(Request $request)
    {
        $query = trim($request->get('q', ''));

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $suggestions = [];

        // Search in categories
        $categories = Category::where('status', '1')
            ->where('category_name', 'LIKE', "%{$query}%")
            ->limit(3)
            ->get();

        foreach ($categories as $category) {
            $suggestions[] = [
                'text' => $category->category_name,
                'type' => 'Category',
                'count' => Product::where('status', '1')
                    ->where('category', 'LIKE', "%{$category->id}%")
                    ->count()
            ];
        }

        // Search in products
        $products = Product::where('status', '1')
            ->where('product_title', 'LIKE', "%{$query}%")
            ->limit(3)
            ->get();

        foreach ($products as $product) {
            $suggestions[] = [
                'text' => $product->product_title,
                'type' => 'Slides',
                'count' => 1
            ];
        }

        // Search in tags
        $allTags = collect();
        $productsForTags = Product::where('status', '1')
            ->whereNotNull('attribute_values')
            ->where('attribute_values', 'LIKE', "%{$query}%")
            ->get();

        foreach($productsForTags as $product) {
            $attributes = $product->Methodattribute();
            foreach($attributes as $attribute) {
                if(strtolower($attribute[0]) === 'tags') {
                    $tagValues = explode(',', $attribute[1]);
                    foreach($tagValues as $tag) {
                        $tag = trim($tag);
                        if(!empty($tag) && stripos($tag, $query) !== false) {
                            $allTags->push($tag);
                        }
                    }
                }
            }
        }

        $uniqueTags = $allTags->unique()->take(3);
        foreach ($uniqueTags as $tag) {
            $suggestions[] = [
                'text' => $tag,
                'type' => 'Tag',
                'count' => Product::where('status', '1')
                    ->where('attribute_values', 'LIKE', "%{$tag}%")
                    ->count()
            ];
        }

        return response()->json($suggestions);
    }
}
