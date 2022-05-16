<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Question;
use App\Models\Answer;
use Exception;
use DB;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
   public function storeanswer(Request $request) 
   {
     try {
        $request->validate([
            'answer' => 'required',                
        ]);
        $input  = $request->all();// dd($input);
        $input['created_by'] = auth()->id();
        $answers=Answer::create($input);// dd($input);
        return redirect()->route('questions.show',$input['question_id'])
        ->with('success','Answer updated successfully.');
     }
     catch (\Exception $e) {

          dd("something wrong");
      }
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
// dd($input);
     $answer = Answer::find($input['answer_id']);
     $st = "Un-Accept";
    if($answer['type'] === "Un-Accept"){
         $st = "Accept";
    }
    $answer->update(array(
         'type' => $st
    ));
     return response()->json(['success'=>'Status change successfully.','type' => ucfirst($answer->type)]);
     }

     // return redirect()->route('questions.show',$input['question_id'])
     //      ->with('success','Answer updated successfully.');
// dd($request);
     // $input = Answer::find($request->answer_id);
   
     //    $input->type = $request->type;
     //    $input->save();
     
     //      return response()->json(['success'=>'Status change successfully.']);

  

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
