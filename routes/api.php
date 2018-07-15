<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getASchoolsByVersion/{version}',function ($version){
    $array=array();
    $array[]=['tablename'=>'schools','parentversion'=>\App\DBinfo::getVersion(),'parenttablename'=>'dbinfo','parentid'=>'1'];
    $array[]=\App\School::where("updated_at_version","<",$version)->
        where("updated_at_version","<=",\App\DBinfo::getVersion())->get();
    return $array;
});
Route::get('getASubjectsBySchoolAndVersion/{school}/{version}',function($id, $version){
    $array=array();
    $school=\App\School::where("id",$id)->first();
    $array[]=['tablename'=>'subjects', 'parentversion' =>$school->updated_at_version, 'parenttablename'=>'schools','parentid'=>$school->id];
    $array[]=\App\Subject::where("school_id",$id)->
        where("updated_at_version","<",$version)->
        where("updated_at_version","<=",\App\DBinfo::getVersion())->get();
    return $array;
});
Route::get('getATopicsBySubjectAndVersion/{subject}/{version}',function($id, $version){
    $array=array();
    $subject=\App\Topic::where("subject_id",$id)->first();
    $array[]=['tablename'=>'topics', 'parentversion'=>$subject->updated_at_version, 'parenttablename'=>'subjects','parentid'=>$subject->id];
    $array[]=\App\Topic::where("subject_id",$id)->
        where("updated_at_version","<",$version)->
        where("updated_at_version","<=",\App\DBinfo::getVersion())->get();
    return $array;
});
Route::get('getQuestionsByTopicAndVersion/{topic}/{version}/{quantity}',function($id,$version,$quantity){
    $array=array();
    $topic=\App\Question::where("topic_id",$id)->first();
    $array[]=["tablename"=>"questions", "parentversion"=>$topic->updated_at_version, "parenttablename"=>"topics","parentid"=>$topic->id];
    $questions=\App\Question::where("topic_id",$id)->
    where("updated_at_version","<",$version)->
    where("updated_at_version","<=",\App\DBinfo::getVersion())->get();
    if($quantity==0){
        $array[]=$questions;
    }else{
        $array[]=$questions->take($quantity);
    }

    return $array;
});

Route::get('getASubjects',function (){
    return \App\Subject::getAvailableSubjects();
});
Route::get('getATopics',function (){
    return \App\Topic::getAvailableTopics(false);
});
Route::get('getATopicsWithQuestions',function (){
    return \App\Topic::getAvailableTopics(true);
});
Route::post('submitQuestion','QuestionController@store');
