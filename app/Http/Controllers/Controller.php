<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;
use App\Models\About;
use App\Models\Marble;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function __construct(){
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


	}
}