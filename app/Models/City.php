<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    //Explicitly associate with table name
    protected $table = 'city';
    //Force primary key
    protected $primaryKey = 'cityid';

    /**
     * The country that the city belongs to.
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'countryid');
    }

    /**
     * The events that belong to the city.
     */
    public function events() {
        return $this->belongsToMany('App\Models\Event');
    }
}
