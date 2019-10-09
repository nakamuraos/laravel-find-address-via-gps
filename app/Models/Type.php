<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    public function addresses() {
        return $this->belongsToMany(Address::class);
    }
}