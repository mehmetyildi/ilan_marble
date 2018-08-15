<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class MacroServiceProvider extends ServiceProvider
{
	public function boot()
    {
        require base_path() . '/resources/macros/macro1.php';
        require base_path() . '/resources/macros/macro2.php';
        // etc...
    }
}