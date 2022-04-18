@extends('layouts.layout')
@section('pagecontent')
<style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }
        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Ask Public Questions</h1>
                        <ol class="breadcrumb mb-4">
                        <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
                        </ol>
                        <div class="card mb-4">
                        <form  action=" {{ route('questions.store') }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
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
                     <input class="form-control" id="search"  type="text" data-role="tagsinput" name="tag">
                     @if ($errors->has('tags'))
                         <span class="text-danger">{{ $errors->first('tags') }}</span>
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
<script type="text/javascript">
    var path = "{{ route('questions.store') }}";
  
    $('#search').typeahead({
            source: function (query, process) {
                return $.get(path, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
  
</script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection