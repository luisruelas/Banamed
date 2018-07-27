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
        $question=new Question();
        $caca=$question->addQuestion($request->toArray());
        dd($caca);
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
        $number=$request->number;
        if($type=="sv"){
            //return compact(["number, type"]);
            return view("question.types.auxiliary.partial_svs")->with(compact(["number","type"]));
        }
        $topic=$request->topic;
        $seriada=(isset($request->seriada))?$request->seriada:0;
        //seriada
        if($type==1){
            $types=TypeOfQuestion::where("id","!=",1)->get()->pluck("name","id")->toArray();
            return view('question.types.partial_pregunta_seriada')->with(["topic"=>$topic,"type"=>$type, "number"=>$number, "types"=>$types, "seriada"=>$seriada]);
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
