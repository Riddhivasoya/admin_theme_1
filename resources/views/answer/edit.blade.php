@extends('layouts.layout')
@section('pagecontent')


<div class="container-fluid px-4">
    
                        <h1 class="mt-4">Edit answer</h1>
                        <ol class="breadcrumb mb-4">
                        <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>                     
                        </ol>
                        <div class="card mb-4">
                        <form  action="{{ $ans->id ? url('answersupdate/'.$ans->id) : url('answersupdate') }} " method="POST" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        <div class="row">
       
             <div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
                 {{--dd($ans)--}}
             <label for="body"><strong>Answer <span class="text-danger">*</span></strong></label>
             <textarea class="ckeditor form-control" id="answer" name="answer"  value="  ">{{$ans->answer}} </textarea>
            
             @if ($errors->has('answer'))
                         <span class="text-danger">{{ $errors->first('answer') }}</span>
                     @endif
                 </div>
             </div> 
         
        </div>
            </div>
            
             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Review Your Question</button>
            
        </div>
    </form>


</div>
</div>



@endsection