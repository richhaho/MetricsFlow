<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class UserInfo extends Model
{
     protected $table = 'user_info';
     public $timestamps = false;

     protected $connection = 'mysql';

     public static function logo(){
        return static::select(DB::raw("logo"))->where('user_id', Auth::user()->id)->first();
    }
}
