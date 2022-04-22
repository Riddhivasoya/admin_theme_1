@extends('layouts.layout')
@section('pagecontent')

<div class="container-fluid px-4">
    
                        <h1 class="mt-4">Edit Questions</h1>
                        <ol class="breadcrumb mb-4">
                        <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>                     
                        </ol>
                        <div class="card mb-4">
                        <form  action=" {{ route('questions.update',$question->id) }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
                     <label for="title"><strong>Title <span class="text-danger">*</span></strong></label>
                     <input type="text" id="title" name="title" class="form-control" value="{{ $question->title }}" >
                     @if ($errors->has('title'))
                         <span class="text-danger">{{ $errors->first('title') }}</span>
                     @endif
                 </div>
             </div> 
             <div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
             <label for="body"><strong>Body <span class="text-danger">*</span></strong></label>
             <textarea class="ckeditor form-control" id="body" name="body"  value=" {{($question->body)}} ">&lt;p&gt;&lt;/p&gt;</textarea>
            
             @if ($errors->has('body'))
                         <span class="text-danger">{{ $errors->first('body') }}</span>
                     @endif
                 </div>
             </div> 
             <div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
            
             <label for="tag_name"><strong>Select Tags <span class="text-danger">*</span></strong></label> 
             <select  class="js-example-basic-multiple form-control" name="tag_id[]" multiple="multiple" required>
             <option value="" disabled>Select tag</option>
             
           
            
          <option value="" ></option>

           
            </select>
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

<script src="{{ asset('Jquery/select2.js') }}?t={{time()}}"></script>

@endsection