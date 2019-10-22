<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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

    public function types() {
        return $this->belongsToMany(Type::class);
    }

    public function getTypeStrAttribute() {
        $arr = [];
        $types = $this->types;
        foreach($types as $key => $type) {
            $arr[] = $type->name;
        }
        return join(", ", $arr);
    }

    public function business_hours() {
        return $this->hasMany(BusinessHour::class);
    }

    public function getPhotosAttribute($value) {
        $value = $this->castAttribute('photos', $value);
        foreach($value as $key => $val) {
            $value[$key] = Crypt::encryptString($val);
        }
        return $value;
    }
}