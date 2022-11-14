<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $table = 'city';

    /**
     * The country that the city belongs to.
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'countryID');
    }

    /**
     * The events that belong to the city.
     */
    public function events() {
        return $this->belongsToMany('App\Models\Event');
    }
}
