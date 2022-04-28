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
    if($ans->created_by !==auth()->id()){     //this condition restrict user to maniplate URL
        abort('403');
    }
    return view('answer.edit',compact('ans'));

   }


   public function updateanswer(Request $request,$id)
   {
    $request->validate([
        'answer'=>'required',
                
    ]);
    // $input['created_by']=auth()->id();

    $ans = Answer::where('id', $id)->firstOrFail();
    $input = $request->all();   
    $ans->update($input);
    // return redirect()->route('questions.index')
    // ->with('success','Answer Updated successfully.');

    return redirect()->route('questions.show',$id)
    ->with('success','Answer updated successfully.');

   }

   public function answerdelete($id)
   {
    
       $ans = Answer::where('id', $id)->firstOrFail();
  
       if($ans->created_by !==auth()->id()){     //this condition restrict user to maniplate URL
        abort('403');
    }
       $ans->delete();
     
       return redirect()->route('questions.index')
                        ->with('success','Answers Deleted successfully.');
  }
   
}
