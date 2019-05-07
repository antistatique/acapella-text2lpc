<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    /**
     * Define relationship with User model
     */
    public function user() {
        return $this->hasOne('App\User');
    }

    /**
     * Define the many-to-many relationship with Key model
     */
    public function keys() {
        return $this->belongsToMany('App\Key');
    }
}
