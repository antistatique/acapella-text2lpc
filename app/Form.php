<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    /*
    *  Function to define relationship with Key model
    */
    public function keys() {
        return $this->hasMany('App\Key');
    }
}
