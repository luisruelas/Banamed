<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Topic extends Model
{
    var $questionlimit = 20;

    public static function getAvailableTopics($withquestions){
        $col=new Collection();
        if($withquestions){
            foreach(Topic::all() as $topic){
                if($topic->isAvailable()){
                    $topic->toArray();
                    $col->push($topic);
                }
            }
        }else{
            foreach(Topic::all() as $topic){
                if($topic->isAvailable()){
                    $topic->toArray();
                    $col->push($topic->makeHidden('questions'));
                }
            }
        }

        return $col;
    }

    public function isAvailable(){
        if($this->questions->count()>=$this->questionlimit){
            return true;
        }
        return false;
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function setUpdatedAtVersionAttribute(){
        $this->attributes['updated_at_version']=DBinfo::getVersion();
    }
}
