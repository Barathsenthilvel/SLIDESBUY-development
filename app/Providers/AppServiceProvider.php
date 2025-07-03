<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Banner;
use App\Models\AdminMenu;
use App\Models\Module;
use App\Models\Menu;
use Auth;
use App\Models\Storeconfiguration;
use App\Http\Controllers\Admin\MenuController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer('*', function ($view) {
        $MenuController = new MenuController();
        $headMenu = $MenuController->getHomeMenu();
        
            $view->with(compact('headMenu'))->with('Category', Category::with('subs')->where('status',1)->where('parent_category_id',0)->get())->with('screen',\Request::route()->getName())->with('frontBanner',Banner::where('status',1)->orderBy('sorting_order','ASC')->get())->with('fronCategory',Category::where('status',1)->where('parent_category_id',0)->get())->with('frontMenu',AdminMenu::with('menuModule')->where('status','1')->orderBy('sort_order','ASC')->get())->with('menuMod',Module::with('getMenu')->where('status','1')->orderBy('sort_order','ASC')->get())->with('StoreConfig',Storeconfiguration::where('status','1')->orderBy('id','ASC')->first());
     
        });
    }
}
