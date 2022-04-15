@extends('layouts.layout')
@section('pagecontent')
<style>
        label.error {
            color: #dc3545;
            font-size: 20px;
        }
    </style>
<div class="container-fluid px-4">
@if(isset($tag))
<h1 class="mt-4">Edit Tags</h1>
@else
<h1 class="mt-4">Add Tags</h1>
@endif
<ol class="breadcrumb mb-4">
                        <a class="btn btn-primary" href="{{ route('tags.index') }}"> Back</a>
                        </ol>
          
         <form id="@if(isset($tag)){!! 'edittagForm' !!}@else{!! 'regtagForm' !!}@endif" action="@if(isset($tag)){{ route('tags.update',$tag->id) }} @else {{ route('tags.store') }} @endif" method="POST" enctype="multipart/form-data"> 
             @csrf
                @if(isset($tag))
                     @method('PUT')
                @endif
          <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
                     <label for="tag"><strong>Tags <span class="text-danger">*</span></strong></label>
                     <input type="text" id="tags" name="tag_name" class="form-control" placeholder="Enter Tag" value="@if(isset($tag)){{$tag->tag_name}}@else{{ old('tag_name') }}@endif">
                     @if ($errors->has('tag_name'))
                         <span class="text-danger">{{ $errors->first('tag_name') }}</span>
                     @endif
                 </div>
             </div> 
             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
            
         </form>
    </div>
   
         
         <!-- <script src="{{ asset('Jquery/crud_validation.js') }}?t={{time()}}"></script> -->
@endsection