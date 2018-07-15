<?php

namespace App\Http\Controllers;

use App\Question;
use App\Topic;
use App\TypeOfQuestion;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topicid)
    {
        $topic=Topic::where("id",$topicid)->first();
        $questions=$topic->questions;
        $subject=$topic->subject;
        $school=$subject->school;
        return View("question.questionindex")->with(compact(["questions","topic","subject","school"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($topic)
    {   
        $types=TypeOfQuestion::all()->pluck("name","id")->toArray();
        return View("question.questioncreate")->with(["topic"=>$topic,"types"=>$types, "number"=>0]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$topic)
    {
        dd($request->toArray());
        $spacer=";&";
        $topic=Topic::where("id",$topic)->first();
        $answers=$request["answer"].$spacer.$request["option1"].$spacer.$request["option2"].$spacer.$request["option3"];
        $array=$request->toArray();
        $array["options"]=$answers;
        $array["topic_id"]=$topic->id;
        $array["updated_at_version"]=$topic->updated_at_version;
        $array["added_at_version"]=$topic->updated_at_version;
        unset($array["answer"],$array["option1"],$array["option2"],$array["option3"],$array["_token"]);
        $question=new Question($array);
        $question->save();
        dd($question);
        return $question;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($topicid,Question $question)
    {
        dd($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    public function destroy(Question $question)
    {
        //
    }
    public function load(Request $request){
        $type=$request->type;
        $topic=$request->topic;
        $number=$request->number;
        $seriada=(isset($request->seriada))?$request->seriada:0;
        //seriada
        if($type==1){
            $types=TypeOfQuestion::where("id","!=",1)->get()->pluck("name","id")->toArray();
            return view('question.types.partial_pregunta_seriada')->with(["topic"=>$topic,"type"=>$type, "number"=>$number, "types"=>$types]);
        }
        //opción múltiple
        if($type==2){
        return view("question.types.partial_pregunta_om")->with(["topic"=>$topic,"type"=>$type, "number"=>$number, "seriada"=>$seriada]);    
        }
        //verdadero y falso
        if($type==3){
        return view("question.types.partial_pregunta_vyf")->with(["topic"=>$topic,"type"=>$type, "number"=>$number,"seriada"=>$seriada]);    
        }
        //abierta
        if($type==4){
        return view("question.types.partial_pregunta_abierta")->with(["topic"=>$topic,"type"=>$type, "number"=>$number, "seriada"=>$seriada]);    
        }
        
    }
}
