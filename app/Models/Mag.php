<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mag extends Model
{
    //,
    public $imageFileName='mags';
    protected $table = 'mags';
    protected $fillable = ['title_tr', 'title_en', 'url',  'position', 'publish','image_path', 'url_tr', 'url_en'];
    public static $rules = array(
        'title_tr' => 'required|unique:mags'
    );
    public static $updaterules = array(
        'title_tr' => 'required'
    );

    public static $fields = array('title_tr', 'title_en','url');
    public static $imageFields = array(
        ["name" => "image_path", "width" => 1200, "height" => 750, 'crop' => true, 'naming' => 'title_tr', 'diff' => 'main'], //1.6
        
    );
    public static $imageFieldNames = array(
        "image_path",
        
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
            if($model->url_en == null){
                $model->url_en = $model->url_tr;
            }

            
           
        });
    }
}
