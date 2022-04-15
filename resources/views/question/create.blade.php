@extends('layouts.layout')
@section('pagecontent')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Ask Public Questions</h1>
                        <ol class="breadcrumb mb-4">
                        <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
                        </ol>
                        <div class="card mb-4">

                        <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
                     <label for="title"><strong>Title <span class="text-danger">*</span></strong></label>
                     <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" >
                     @if ($errors->has('title'))
                         <span class="text-danger">{{ $errors->first('title') }}</span>
                     @endif
                 </div>
             </div> 
             <div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
             <label for="body"><strong>Body <span class="text-danger">*</span></strong></label>
             <textarea class="ckeditor form-control" name="body"></textarea>
                     @if ($errors->has('body'))
                         <span class="text-danger">{{ $errors->first('body') }}</span>
                     @endif
                 </div>
             </div> 
             <div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
                     <label for="tags"><strong>Tags <span class="text-danger">*</span></strong></label>
                     <input type="text" id="tag" name="tag_name" class="form-control" placeholder="Enter Tag" >
                     @if ($errors->has('title'))
                         <span class="text-danger">{{ $errors->first('title') }}</span>
                     @endif
                 </div>
             </div> 

             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Review Your Question</button>
        </div>



</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection