<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Marble;

class Quary extends Model
{
    //
    protected $table = 'quarries';
    protected $fillable = ['title_tr', 'title_en', 'position', 'publish',  'address', 'phone', 'email','pbx', 'latitude', 'longitude' ,'description_en' ,'description_tr','address_tr','address_en', 'url_tr', 'url_en'];
    public static $rules = array(
        'title_tr' => 'required|unique:quarries',
        'description_tr' => 'required',
        'address_tr' => 'required',
        
        'email' => 'required',
        'phone' => 'required'
    );
    public static $updaterules = array(
        'title_tr' => 'required',
        'description_tr' => 'required',
        'address_tr' => 'required',
        
        'email' => 'required',
        'phone' => 'required',
        
    );

    public static $fields = array('title_tr','email','longitude','latitude','address','address_tr','address_en','phone', 'pbx', 'title_en', 'description_tr', 'description_en');
    public static $imageFields = array(
       
    );
    public static $imageFieldNames = array(
        
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

            if($model->address_en == null){
                $model->address_en = $model->description_tr;
            }
            
        });
    }

    public function marbles(){

        return $this->belongsToMany(Marble::class);
    }

    /**
 * @return mixed
 */
    public function getMarbleListAttribute(){
        return $this->marbles->pluck('id')->all();
    }


}
