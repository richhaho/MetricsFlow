<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newContents extends Model
{
    protected $table = 'newcontents';

    public $timestamps = false;

    protected $connection = 'raw-data';


}
