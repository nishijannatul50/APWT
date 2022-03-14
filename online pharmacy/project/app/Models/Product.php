<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
// public $timestamps = false;
public function order()
{
    return $this->hasMany(order::class,'p_id','p_id');
}
}

   
   
    
