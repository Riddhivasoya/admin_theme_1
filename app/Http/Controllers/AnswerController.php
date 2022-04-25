<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Question;
use App\Models\Answer;
use DB;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
   public function storeanswer(Request $request) 
   {
    $request->validate([
        'answer'=>'required',
                
    ]);
    $input = $request->all();
    // dd($input);
    $input['created_by']=auth()->id();
    $answers=Answer::create($input);
    // dd($input);
    
    return redirect()->route('questions.show',$input['question_id'])
    ->with('success','Answer updated successfully.');
   }

   public function editanswer($id)
   {
    // $input=$request->all();
    // dd($request->toArray);
    $ans = Answer::where('id', $id)->firstOrFail();
    // dd($ans);

    // $ans=Answer::get()->pluck('answer');
    // dd($ans);
    return view('answer.edit',compact('ans'));

   }


   public function updateanswer(Request $request,Answer $ans,$id)
   {
    $request->validate([
        'answer'=>'required',
                
    ]);
    $ans = Answer::where('id', $id)->firstOrFail();
    $input = $request->all();
    $ans->update($input);
    return redirect()->route('questions.index')
    ->with('success','Questions Updated successfully.');
   }
   
}
