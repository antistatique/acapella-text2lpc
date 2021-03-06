<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    /**
     * Define which fields can be fillable by the user.
     */
    protected $fillable = [
        'public',
        'name',
        'user_id',
    ];

    /**
     * Define which fields are hidden to the user.
     */
    protected $hidden = [
        'user_id',
        'default',
    ];

    /**
     * Define relationship with User model.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Define the many-to-many relationship with Key model.
     */
    public function keys()
    {
        return $this->hasMany('App\Key');
    }
}
