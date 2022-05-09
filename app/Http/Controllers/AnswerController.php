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
            'answer' => 'required',                
        ]);
        $input = $request->all();// dd($input);
        $input['created_by'] = auth()->id();
        $answers=Answer::create($input);// dd($input);
        return redirect()->route('questions.show',$input['question_id'])
        ->with('success','Answer updated successfully.');
   }

   public function editanswer($id)
   {
                // $input=$request->all();
                // dd($request->toArray);
        $ans = Answer::where('id', $id)->firstOrFail();
        if($ans->created_by !== auth()->id())  //this condition restrict user to maniplate URL
        {    
               abort('403');
        }
        return view('answer.edit',compact('ans'));
   }

   public function acceptAnswer(Request $request,$id)
   {
     
     $input['answer_id'] = $request['answer_id'];

     $input = Answer::find($input['answer_id']);
     $input['type']=$request['type'];
     $input->save();
     return redirect()->route('questions.show',$input['question_id'])
          ->with('success','Answer updated successfully.');
    

   }

   public function updateanswer(Request $request,$id)
   {
        $request->validate([
        'answer'=>'required',          
        ]);
        $ans = Answer::where('id', $id)->firstOrFail();
        if($ans->created_by !==auth()->id())
        {     //this condition restrict user to maniplate URL
               abort('403');
          }
        $input = $request->all();   
        $ans->update($input);
        return redirect()->route('questions.index',$id)
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
