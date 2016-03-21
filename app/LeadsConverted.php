<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadsConverted extends Model
{//
    
    protected $table = 'conemail';

    public $timestamps = false;

    protected $connection = 'raw-data';
}
