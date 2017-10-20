<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public function portfolio(){
        return $this->belongsTo(Portfolio::class);
    }
}
