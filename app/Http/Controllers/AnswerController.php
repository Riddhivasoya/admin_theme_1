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
    $answers=Answer::create($input);
    // dd($input);
    
    return redirect()->route('questions.show',$input['question_id'])
    ->with('success','Answer updated successfully.');
   }

   
}
