<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;

use View;

use App\Models\About;

use App\Models\Quary;

use App\Models\Event;

use App\Models\Mag;

use App\Models\Marble;

use App\Models\Project;

use App\Models\Qimage;

use App\Models\Location;

use App\Models\Popup;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $thePopup = Popup::where('publish_until', '>=', todayWithFormat('Y-m-d'))
            ->where('publish', true)->orWhere('publish_until', null)
            ->where('publish_at', '<=', todayWithFormat('Y-m-d'))
            ->where('publish', true)
            ->orderBy('position', 'ASC')
            ->first();
        $banners = Banner::where('publish', 1)->orderBy('position', 'ASC')->get();
        return View::make('home', compact('banners','thePopup'));
    }

    public function ilbak()
    {
        $aboutIlbak = About::find(1);
        return View::make('about.ilbak',compact('aboutIlbak'));
    }

    public function ilanmarble()
    {
        $aboutIlan = About::find(2);
        
        return View::make('about.ilanmarble',compact('aboutIlan'));
    }
    public function visionmission()
    {
        $aboutVision = About::find(3);
        
        return View::make('about.visionmission',compact('visionmission'));
    }
    public function news()
    {
        $aboutQuarries = About::find(4);
        return View::make('news.index',compact('aboutQuarries'));
    }

    public function newsdetail($lang, $id)
    {
        return View::make('news.detail', compact('id'));
    }

    public function contact()
    {
        $quarries = Quary::where('publish', 1)->orderBy('position', 'ASC')->get();
        return View::make('contact', compact('quarries'));
    }

    public function events()
    {
        $events = Event::where('publish', 1)->orderBy('position', 'ASC')->get();
        return View::make('events.index', compact('events'));
    }
    public function eventDetail( $id)
    {
        $event = Event::find($id);
        return View::make('events.detail', compact('event'));
    }

    public function eventMag()
    {
        return View::make('mag');
    }

    public function mags()
    {
        $mags = Mag::where('publish', 1)->orderBy('position', 'ASC')->get();
        return View::make('mag', compact('mags'));
    }

    public function marbles()
    {
        $marbles = Marble::where('publish', 1)->orderBy('position', 'ASC')->get();
        return View::make('marbles.index', compact('marbles'));
    }
    public function marbleDetail( $id)
    {
        $marbles = Marble::where('publish', 1)->orderBy('position', 'ASC')->get();
        $marble = Marble::find($id);
        return View::make('marbles.detail', compact('marble', 'marbles'));
    }
    public function mooncream()
    {
        return View::make('marbles.mooncream');
    }

    public function papillion()
    {

        return View::make('marbles.papillion');
    }

    public function projects()
    {
        $projects = Project::where('publish', 1)->orderBy('position', 'ASC')->get();
        return View::make('projects', compact('projects'));
    }

    public function quarries()
    {
        $images = Qimage::where('publish', 1)->orderBy('position', 'ASC')->get();
        $quarries = Quary::where('publish', 1)->orderBy('position', 'ASC')->get();
        $locations = Location::where('publish', 1)->orderBy('position', 'ASC')->get();

        return View::make('quarries.index', compact('images', 'quarries', 'locations'));
    }
    public function geology()
    {
        return View::make('quarries.geology');
    }
    public function licences()
    {
        return View::make('quarries.licences');
    }
}
