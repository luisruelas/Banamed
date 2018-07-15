<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $topics=Topic::all();
        $subject=Subject::where("id",$id)->first();
        $topics=$subject->topics;
        $school=$subject->school;
        return View("topic.topicindex")->with(compact(["topics","subject","school"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subject)
    {
        $subject=Subject::where("id",$subject)->first();
        return View("topic.topiccreate")->with(compact(["subject"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $subjectid)
    {
        $subject=Subject::where("id",$subjectid)->first();

        $topic=new Topic();
        $topic->name=$request->name;
        $topic->updated_at_version=$subject->updated_at_version;
        $topic->added_at_version=$subject->added_at_version;
        $topic->subject_id=$subject->id;
        $topic->save();
        dd($topic);
        return $subjectid;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
