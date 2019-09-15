<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;

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

    
    public function boot(){
        if(!defined('list_categories')){
            $category = new Category();
            $all_categories = $category -> recursiveGet();
            define('list_categories', $all_categories);
        }
    }
}
