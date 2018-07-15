<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DBinfo extends Model
{
    protected $table='dbinfo';

    public static function getVersion(){
        $version=DBinfo::where('name','version')->first();
        $version= $version['value'];
        return $version;
    }
}
