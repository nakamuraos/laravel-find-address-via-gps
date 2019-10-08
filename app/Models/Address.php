<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'addresses';
    protected $fillable = [
        'name', 'photos', 'detail', 'location',
    ];
    protected $casts = [
        'photos' => 'array',
    ];

    public function typeAddress() {
        return $this->belongsTo(Typeaddress::class);
    }
}