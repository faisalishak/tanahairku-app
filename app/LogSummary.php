<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogSummary extends Model
{
   protected $table = 'log_summary';
   protected $fillable = ['id_device','avg_open_apps','avg_object_scanned','avg_minutes','avg_correct_trivia','avg_wrong_trivia'];
   
   public $timestamps = false;
}
