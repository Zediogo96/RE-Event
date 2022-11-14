<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $table = 'photo';

    /**
     * The event that the photo belongs to.
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event', 'eventID');
    }
}
