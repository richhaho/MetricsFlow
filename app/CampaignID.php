<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignID extends Model
{
    protected $table = 'Client';
    public $timestamps = false;

    protected $connection = 'raw-data';
}
