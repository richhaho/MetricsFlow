<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetPrePage extends Model
{
    protected $table = 'clickdata';

    public $timestamps = false;

    protected $connection = 'raw-data';
 }