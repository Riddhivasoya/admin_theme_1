<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Question;
use DB;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::all();
        return view('question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::get()->pluck('id','tag_name');
        return view('question.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',            
        ]);
        
        
        $input = $request->all();
        // dd($input);
        $question = Question::create($input);
        $question->tag()->attach($request->input('tag_id'));


        // dd($request->input('tag'));
        // 
    	// $question->question_tag($question_tag);
        // $data = Tag::select("tag_name")
        //             ->where('tag_name', 'LIKE', '%'. $request->get('query'). '%')
        //             ->get();


     
        return redirect()->route('questions.index')
                        ->with('success','Tags updated successfully.');


    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
