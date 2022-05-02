<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Question;
use App\Models\View as ModelView;
use App\Models\Vote;
use App\Models\User;
use DB;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        
    $search = $request->input('search');
        //$user=User::get()->pluck('id','name');
        // dd($user);
      
        $questions = Question::whereHas('createdby', function ($q) use ($search) {
            $q->where('name','like','%'.$search.'%');
        })
        ->orwhereHas('tag', function ($q) use ($search){
            $q->where('tag_name','like','%'.$search.'%');
        })
        ->orwhere('title', 'LIKE', "%{$search}%")
        ->orWhere('body', 'LIKE', "%{$search}%")
        ->latest()->paginate(5);
        //dd($questions->pluck('name')); 
        // dd($search);
//  
        // Search in the title and body columns from the posts table
            // $questions = Question:: query()
            // ->where('title', 'LIKE', "%{$questions}%")
            // ->orWhere('body', 'LIKE', "%{$questions}%")
            // ->orWhere('created_by', 'LIKE', "%{$questions}%")
            // ->latest()->paginate(5);
        //    ->get();
        //    dd($questions->createdby());
          
           
        // $questions=Question::latest()->paginate(5);
            
   
        return view('question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::get()->pluck('id','tag_name'); /// we created object of tags to get data of tag table using relations
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
        $input['created_by'] = auth()->id();
        $question = Question::create($input);
        $question->tag()->attach($request->input('tag_id'));


        // dd($request->input('tag'));
       

     
        return redirect()->route('questions.index')
                        ->with('success','Questions Added successfully.');


    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $mvArr =array(
            'user_id'=>auth()->id(),
            'question_id'=>$question['id'],
        );
        
        $mv= ModelView::where($mvArr)->exists();
        if($mv !== true){
            ModelView::create(array(
            'user_id'=>auth()->id(),
            'question_id'=>$question['id'],
            ));
        }
        return view('question.questionShow',compact('question'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        if($question->created_by !==auth()->id()){     //this condition restrict user to maniplate URL
            abort('403');
        }
        $tags=Tag::get()->pluck('id','tag_name');
        return view('question.edit',compact('question', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Question $question)
    {
        $input = $request->all();
        // dd($input);
        if($question->created_by !==auth()->id()){     //this condition restrict user to maniplate URL
            abort('403');
        }
        $question->update($input);
        $question->tag()->sync($request->input('tag_id'));
        return redirect()->route('questions.index')
        ->with('success','Questions updated successfully.');
    }

    public function questionup($qtype,$qid)
    {
        if($qtype === "question"){
        
        }
    
            Vote::create(array(
                'user_id' => auth()->id(),
                'question_id'=> $qid,
                
                'type' => "up",
            ));
            
        return redirect()->back();
  
    }
    public function questiondown($qtype,$qid)
    {
        if($qtype === "question"){
        
        }
    
            Vote::create(array(
                'user_id' => auth()->id(),
                'question_id'=> $qid,
                'type' => "down",
            ));
            
        return redirect()->back();
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if($question->created_by ==auth()->id()){     //this condition restrict user to maniplate URL

        $question->delete();
        return redirect()->route('questions.index')
                    ->with('success','questions deleted successfully');
        }
    }
    
}
