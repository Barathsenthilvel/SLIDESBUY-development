<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class CheckProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all products in the database and their status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Checking products in database...');

        $products = Product::orderBy('id', 'desc')->get();

        if ($products->count() == 0) {
            $this->warn('No products found in database!');
            return 0;
        }

        $this->info("Found {$products->count()} products:");
        $this->info('');

        $headers = ['ID', 'Title', 'SKU', 'Status', 'Vendor', 'Created At', 'Image1'];
        $rows = [];

        foreach ($products as $product) {
            $rows[] = [
                $product->id,
                $product->product_title ?? 'N/A',
                $product->product_sku ?? 'N/A',
                $product->status ?? 'N/A',
                $product->vendor ?? 'N/A',
                $product->created_at ? $product->created_at->format('Y-m-d H:i:s') : 'N/A',
                $product->image1 ?? 'N/A'
            ];
        }

        $this->table($headers, $rows);

        // Check recent products
        $recentProducts = Product::orderBy('id', 'desc')->limit(5)->get();
        $this->info('');
        $this->info('Most recent 5 products:');

        foreach ($recentProducts as $product) {
            $this->info("ID: {$product->id} | Title: {$product->product_title} | Status: {$product->status} | Created: {$product->created_at}");
        }

        return 0;
    }
}
