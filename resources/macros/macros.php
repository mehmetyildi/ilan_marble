<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
HTML::macro('clever_link', function($route) {	
	if( strpos(Request::path(), $route) !== false ) {
		$active = "class = 'active'";
	}
	else {
		$active = "";
	}
  return '<li '. $active . '>';
});

HTML::macro('clever_link_dd', function($route) { 
  if( strpos(Request::path(), $route) !== false ) {
    $active = "active";
  }
  else {
    $active = "";
  }
  return '<li class="dropdown  '. $active . '">';
});


HTML::macro('clever_link_cms', function($route) {    
    if( strpos(Request::path(), $route) !== false ) {
        $active = "active";
    }
    else {
        $active = "";
    }
 
  return '<li class="'.$active.'">';
});
