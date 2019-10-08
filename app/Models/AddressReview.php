<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressReview extends Model
{
  protected $fillable = [
    'photos', 'comment', 'rate',
  ];
}
