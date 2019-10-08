<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'location'
    ];

    public function typeAddress() {
        return $this->belongsTo(Typeaddress::class);
    }
}