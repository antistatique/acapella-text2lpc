<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * Define which fields can be fillable by the user
     */
    protected $fillable = [
        'phonemes',
    ];

    /**
     * Define which fields are hidden to the user
     */
    protected $hidden = [
        'id',
    ];

    /**
     * Define the relationship with the Key model
     */
    public function keys() {
        return $this->hasMany('App\Key');
    }
}
