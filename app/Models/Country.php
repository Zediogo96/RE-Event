<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $table = 'country';

    /**
     * The cities that belong to the country.
     */
    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    /**
    * The events that belong to the country.
    * !! DON'T KNOW IF THIS IS CORRECT !!
    */
    public function events()
    {
        return $this->hasManyThrough('App\Models\Event', 'App\Models\City', 'countryID', 'cityID');
    }
    
}