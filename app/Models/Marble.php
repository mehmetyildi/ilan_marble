<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Quary;

use Location;

class Marble extends Model
{
    //
    public $imageFileName='marbles';
     protected $table = 'marbles';
    protected $fillable = ['title_tr', 'title_en', 'position', 'publish',  'discription_tr', 'discription_en',  'image_path',  'image_path_slab',  'image_path_close', 'url_tr', 'url_en'];
    public static $rules = array(
        'title_tr' => 'required|unique:marbles',
        'description_tr' => 'required',
        'image_path'=>'required',
        'image_path_close'=>'required',
        'image_path_slab'=>'required'
    );
    public static $updaterules = array(
        'title_tr' => 'required',
        'description_tr' => 'required',
       
    );

    public static $fields = array('title_tr', 'title_en', 'description_tr', 'description_en');
    public static $imageFields = array(
        ["name" => "image_path", "width" => 1200, "height" => 750, 'crop' => true, 'naming' => 'title_tr', 'diff' => 'main'], //1.6
        ["name" => "image_path_slab", "width" => 1200, "height" => 750, 'crop' => true, 'naming' => 'title_tr', 'diff' => 'slab'], //1.6
        ["name" => "image_path_close", "width" => 1200, "height" => 750, 'crop' => true, 'naming' => 'title_tr', 'diff' => 'close'] //1.6
    );
    public static $imageFieldNames = array(
        "image_path",
        "image_path_close",
        "image_path_slab"
    );
    public static $docFields = array(
    );
    public static $booleanFields = array(
    	"publish"
    );
    public static $dateFields = array(
    );
    public static $urlFields = array(
    	["name" => "url_tr", "map" => "title_tr"],
        ["name" => "url_en", "map" => "title_en"]
    );

    public static function boot(){
        parent::boot();
        static::creating(function($model)
        {
            
            if($model->title_en == null){
                $model->title_en = $model->title_tr;
            }
            
            if($model->description_en == null){
                $model->description_en = $model->description_tr;
            }
            if($model->url_en == null){
                $model->url_en = $model->url_tr;
            }
            
        });
    }

    public function locations(){

        return $this->belongsToMany(Location::class);
    }

    public function quarries(){

        return $this->belongsToMany(Quary::class);
    }
}
