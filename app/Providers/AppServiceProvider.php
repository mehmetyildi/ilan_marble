<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use App\Models\About;
use App\Models\Marble;

use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $l = config('app.locale');
        $aboutIlbak = About::find(1);
        $aboutIlan = About::find(2);
        $aboutVision = About::find(3);
        $aboutQuarries = About::find(4);
        $layoutMarbles = Marble::where('publish', 1)->orderBy('position', 'ASC')->get();
        View::share(array(
            'l' => $l, 
            'aboutIlbak' => $aboutIlbak, 
            'aboutIlan' => $aboutIlan, 
            'aboutVision' => $aboutVision, 
            'aboutQuarries' => $aboutQuarries, 
            'layoutMarbles' => $layoutMarbles, 
        ));
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*', function ($view) {
            if(\Request::route()){
                $currentRouteName = \Request::route()->getName();
                $currentRoutePath = \Request::url();
            }else{
                $currentRouteName = "";
                $currentRoutePath = "";
            }
            $view->with(['currentRouteName' => $currentRouteName, 'currentRoutePath' => $currentRoutePath]);
        });
    }
}
