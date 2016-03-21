<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cUsers extends Model
{
    protected $table = 'cusers';

    public $timestamps = false;

    protected $connection = 'raw-data';


}
