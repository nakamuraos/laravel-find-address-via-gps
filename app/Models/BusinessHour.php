<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
  protected $fillable = [
    'dayofweek', 'open_time', 'close_time',
];
}
