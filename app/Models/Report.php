<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    //Explicitly associate with table name
    protected $table = 'report';
    //Force primary key
    protected $primaryKey = ['userid','commentid'];

    /**
     * The comment that the photo belongs to.
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Comment', 'commentid');
    }
}