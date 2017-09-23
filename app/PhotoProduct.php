<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoProduct extends Model
{
   protected $table = 'photo_product';
   protected $fillable = ['id_photo','photo_url','id_product'];

   public $timestamps = false;
}
