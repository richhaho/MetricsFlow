<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
     protected $table = 'client';

     public $timestamps = false;

     protected $connection = 'raw-data';
}
