<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * Define the relationship with the Key model
     */
    public function keys() {
        return $this->hasMany('App\Key');
    }
}
