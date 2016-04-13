<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->makeNavigationComposer();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function makeNavigationComposer(){
//        view()->composer('layouts.nav', function ($view){
//            $view->with('latest', Article::latest()->first());
//        });
        view()->composer('layouts.nav','\App\Http\Composers\NavComposer@compose');
    }
}
