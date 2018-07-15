<?php

namespace App\Http\Controllers;

use App\School;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($schoolid)
    {
        $school=School::where("id",$schoolid)->first();
        $subjects=Subject::where("school_id",$schoolid)->get();
        return View("subject.subjectindex")->with(compact(["subjects","school"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($schoolid)
    {
        $school=School::where("id",$schoolid)->first();
        return View("subject.subjectcreate")->with(compact("school"));
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $schoolid)
    {
        $school=School::where("id",$schoolid)->first();

        $subject=new Subject();
        $subject->name=$request->name;
        $subject->updated_at_version=$school->updated_at_version;
        $subject->added_at_version=$school->added_at_version;
        $subject->school_id=$school->id;
        $subject->save();
        dd($subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
