<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $table = 'tag';
    
    /**
     * The events that belong to the tag.
     */
    public function events()
    {
        return $this->belongsToMany('App\Models\Event');
    }
}
