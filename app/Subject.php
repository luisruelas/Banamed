<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use PhpParser\Node\Expr\Array_;

class Subject extends Model
{
    var $topicslimit=1;
    public function setUpdatedAtVersionAttribute(){
        $this->attributes['updated_at_version']=DBinfo::getVersion();
    }

    public static function getAvailableSubjects(){
        $col=new Collection();
        foreach (Subject::all() as $subject){
            if($subject->isAvailable()){
                $col->push($subject->makeHidden('topics'));
            }
        }
        return $col;
    }

    public function isAvailable(){
        $topics=$this->topics;
        $array= array();
        foreach ($topics as $topic){
            if($topic->isAvailable()){
                $array[]=$topic;
            }
        }
        if(sizeof($array)>=$this->topicslimit){
            return true;
        }
        else return false;

    }

    public function topics (){
        return $this->hasMany(Topic::class);
    }
    public function school (){
        return $this->belongsTo(School::class);
    }
}
