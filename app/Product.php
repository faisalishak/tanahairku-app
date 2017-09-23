<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = 'product';
   protected $fillable = ['id_product','product_name','description','price','weight','tumbnail', 'specification'];

   public $timestamps = false;
}
