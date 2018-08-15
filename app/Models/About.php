<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    public $imageFileName='abouts';
    protected $table = 'abouts';
    protected $fillable = ['title_tr', 'title_en', 'discription_tr', 'discription_en',  'image_path'];
    public static $rules = array(
        'title_tr' => 'required|unique:banners',
        'description_tr' => 'required',
    );
    public static $updaterules = array(
        'title_tr' => 'required',
        'description_tr' => 'required',
    );

    public static $fields = array('title_tr', 'title_en', 'description_tr', 'description_en');
    public static $imageFields = array(
        ["name" => "image_path", "width" => 1200, "height" => 750, 'crop' => true, 'naming' => 'title_tr', 'diff' => ''] //1.6
    );
    public static $imageFieldNames = array(
        "image_path"
    );
    public static $docFields = array(
    );
    public static $booleanFields = array(
    );
    public static $dateFields = array(
    );
    public static $urlFields = array(
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
            
        });
    }

}
