<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Marble;

class Location extends Model
{
    //
    public $imageFileName='events';
    protected $table = 'locations';
    protected $fillable = ['position', 'publish',  'discription_tr', 'discription_en',  'image_path'];
    public static $rules = array(
        
        'description_tr' => 'required'
    public static $updaterules = array(
        
        'description_tr' => 'required'
    );

    public static $fields = array( 'description_tr', 'description_en');
    public static $imageFields = array(
        ["name" => "image_path", "width" => 1200, "height" => 750, 'crop' => true, 'naming' => 'description_tr', 'diff' => ''] //1.6
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
    	["name" => "page_link", "map" => "title_tr"],
    );

    public static function boot(){
        parent::boot();
        static::creating(function($model)
        {
            
            
            
            if($model->description_en == null){
                $model->description_en = $model->description_tr;
            }
            
        });
    }

    public function marbles(){

        return $this->belongsToMany(Marble::class);
    }

    public function getMarbleListAttribute(){
        return $this->marbles->pluck('id')->all();
    }
}