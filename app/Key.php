<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    /**
     * Define which fields can be fillable by the user.
     */
    protected $fillable = [
        'key',
        'position',
        'image',
        'library_id',
    ];

    /**
     * Define which fields are hidden to the user.
     */
    protected $hidden = [
        'id',
        'library_id',
    ];

    /**
     * Define the many-to-many relationship with the Library model.
     */
    public function library()
    {
        return $this->belongsTo('App\Library');
    }
}
