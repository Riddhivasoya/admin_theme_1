@extends('layouts.layout')
@section('pagecontent')
<div class="container-fluid px-4">
<h1 class="mt-4">Review Question</h1>
                <ol class="breadcrumb mb-4">
                <a class="btn btn-primary" href="{{route('questions.create')}}"> Ask Question</a>
                </ol>
                



<div class="container-fluid px-4">
<div class="s-page-title">
    <h1 class="s-page-title--header">{{$question->title}}</h1>
</div>


<div class="s-post-summary">
   
    
    <div class="s-post-summary--content">
        <div class="s-post-summary--content-type">
           
    </div>
        
         <p class="s-post-summary--content-excerpt">{{$question->body}}</p>
            <div class="s-post-summary--meta">
                    <div class="s-post-summary--meta-tags">
                    @foreach($question->tag as $tag)
                    <a class="s-tag" href="#">{{$tag->tag_name}}</a>
                    @endforeach
            </div>

        </div>
        
        </div>
    </div>
</div>
<form  action=" {{ route('questions.store') }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
<div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
             <label for="body"><strong> Your Answer <span class="text-danger">*</span></strong></label>
             <textarea class="ckeditor form-control" name="body"></textarea>
                     @if ($errors->has('body'))
                         <span class="text-danger">{{ $errors->first('body') }}</span>
                     @endif
                 </div>
             </div> 
             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Post Your Answer</button>
        </div>

</form>

</div>














@endsection