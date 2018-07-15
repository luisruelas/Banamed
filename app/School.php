<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class School extends Model
{
    var $subjectslimit=1;
    public function setUpdatedAtVersionAttribute()
    {
        $this->attributes["updated_at_version"]=DBinfo::getVersion();
    }

    public static function getAvailableSchools(){
        $col=new Collection();
        foreach (School::all() as $school){
            if($school->isAvailable()){
                $col->push($school->makeHidden(["subjects"]));
            }
        }
        return $col;
    }

    public function isAvailable(){
        $subjects=$this->subjects;
        $array= array();
        foreach ($subjects as $subject){
            if($subject->isAvailable()){
                $array[]=$subject;
            }
        }
        if(sizeof($array)>=$this->subjectslimit){
            return true;
        }
        else return false;

    }


    public function subjects(){
        return $this->hasMany(Subject::class);
    }
}
