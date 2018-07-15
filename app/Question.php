<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $guarded=['id'];
    public function topic(){
        this.$this->belongsTo(Topic::class);
    }

}
