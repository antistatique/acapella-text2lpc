<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    /**
     * Define which fields can be fillable by the user
     */
    protected $fillable = [
        'form_id',
        'position_id',
        'image'
    ];

    /**
     * Define which fields are hidden to the user
     */
    protected $hidden = [
        'id',
    ];

    /**
     * Define the relationship with the Form model
     */
    public function form() {
        return $this->hasOne('App\Form');
    }

    /**
     * Define the relationship with the Position model
     */
    public function position() {
        return $this->hasOne('App\Position');
    }

    /**
     * Define the many-to-many relationship with the Library model
     */
    public function libraries() {
        return $this->belongsToMany('App\Library');
    }
}
