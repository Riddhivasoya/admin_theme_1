@extends('layouts.layout')
@section('pagecontent')

<!-- <style>
    .button-clicked {
    background:green;
} -->
</style>
<div class="container-fluid px-4">
<h1 class="mt-4">Review Question</h1>
                <ol class="breadcrumb mb-4">
                <a class="btn btn-primary" href="{{route('questions.create')}}"> Ask Question</a>
                </ol>
                



<!-- <div class="container-fluid px-4"> -->
<div class="s-page-title">
    <h1 class="s-page-title--header">{{$question->title}}</h1>
    
</div>

<div class="d-flex my48">


                      
<div class="row">
        <div class="span6">
    <div class="examples" id="questionvotes"></div>
    <div id="templates" class="hidden">
        <div class="upvotejs">
                    <a class="upvote" title="This is good stuff. Vote it up! (Click again to undo)"></a>
                    <span class="count" title="Total number of votes"></span>                    
                    <a class="downvote" title="This is not useful. Vote it down. (Click again to undo)"></a>                    
                    <!-- <a class="star" title="Mark as favorite. (Click again to undo)"></a> -->
            </div>
        </div>
        
        <script type="text/javascript">    
                $(document).ready(function(){
                    var params = [];
                    params['vote_for'] = 'question';
                    params['url'] = @if(count($questionvotes))'{{ route("questions.votes", $questionvotes[0]->id) }}'@else'{{ route("questions.votes") }}'@endif;
                    params['headers'] = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};        
                    params['type'] = 'GET';
                
                    params['count'] = {{ $question->count }};                                      
                    params['data'] = {'question_id' : '{{ $question->id }}', 'user_id' : '{{ auth()->user()->id }}'};
                    var callback = function(data) {
                        data.question_id = params.data.question_id;
                        data.user_id = params.data.user_id
                        //data._method = 'PUT';
                        $.ajax({                        
                            url: params.url,
                            headers: params.headers,
                            type: params.type,
                            data: data,
                            success: function (data, status, xhr) {
                                //$("#examples").load(location.href + " #examples > *");
                                //$("#templates").load(location.href + " #templates > *");
                                location.reload();
                            },
                        });
                    };
                    params['callback'] = callback;
                    @if(count($questionvotes))
                        @if($questionvotes[0]->vote_type=='upvote')
                            params['upvoted'] = true;
                        @elseif($questionvotes[0]->vote_type=='downvote')
                            params['downvoted'] = true;
                        @endif
                    @endif
                    $questionobj = initupvotejsobject('templates','upvotejs','{{ $question->id }}','#questionvotes','',params);
                    //console.log($questionobj);
                    //console.log($questionobj.upvote());
                });    
            </script>
    </div>             
</div>



<div class="s-post-summary">

    
    <div class="s-post-summary--content">
        <div class="s-post-summary--content-type">
           
    </div>

         <p class="s-post-summary--content-excerpt">{!! $question->body  !!}</p>
            <div class="s-post-summary--meta">
                    <div class="s-post-summary--meta-tags">
                    @foreach($question->tag as $tag)
                    <a class="s-tag" href="#">{{$tag->tag_name}}</a>
                    @endforeach

                    
            </div>

        </div>
        <ol class="breadcrumb mb-4">
            </ol>
        <strong> Created By:</strong>
                <a href="" class="s-user-card--link"> {{  $question->createdby['name'] }}</a>
       
    <!-- @if($question->created_by ==auth()->id())
         
       <a class="btn btn-link" title="you can edit your question" href="{{route('questions.edit',$question->id)}}">Edit</a>

           <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
           <input name="_method" type="hidden" value="DELETE">
           <button title="your question will be deleted permenantly "type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>

                 @csrf
                @method('DELETE')
           </form>
         @endif -->
         </span>    
        </div>
    </div>
</div>

<!---end of question part----->

<!--Answer Part-->
{{--dd($question->createdby)--}}
{{--dd($question->answer)--}}
{{--($ans)--}}
@foreach($question->answer as $ans)
<div class="s-page-title">
    <h1 class="s-page-title--header">Answer</h1>
    
</div>
<div class="d-flex my48">               
<div class="row">
        <div class="span6">
    <div class="examples" id="answervotes{{$ans->id}}"></div>
    
    
        <script type="text/javascript">    
                $(document).ready(function(){
                    var params = [];
                    params['vote_for'] = 'answer';
                    params['url'] = @if(count($answervotes->replyvote($ans->id)))'{{ route("answers.votes", $answervotes->replyvote($ans->id)[0]->id) }}'@else'{{ route("answers.votes") }}'@endif;
                    params['headers'] = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};        
                    params['type'] = 'GET';
                
                    params['count'] = {{ $ans->count }};                                      
                    params['data'] = {'question_id' : '{{ $question->id }}','answer_id' : '{{ $ans->id }}', 'user_id' : '{{ auth()->user()->id }}'};
                    var callback = function(data) {
                        data.question_id = params.data.question_id;
                        data.answer_id = params.data.answer_id;
                        data.user_id = params.data.user_id
                        //data._method = 'PUT';
                        $.ajax({                        
                            url: params.url,
                            headers: params.headers,
                            type: params.type,
                            data: data,
                            success: function (data, status, xhr) {
                                //$("#examples").load(location.href + " #examples > *");
                                //$("#templates").load(location.href + " #templates > *");
                                location.reload();
                            },
                        });
                    };
                    params['callback'] = callback;
                    @if(count($answervotes->replyvote($ans->id)))
                        @if($answervotes->replyvote($ans->id)[0]->vote_type=='upvote')
                            params['upvoted'] = true;
                        @elseif($answervotes->replyvote($ans->id)[0]->vote_type=='downvote')
                            params['downvoted'] = true;
                        @endif
                    @endif
                    $answerobj = initupvotejsobject('templates','upvotejs','{{ $ans->id }}','#answervotes{{ $ans->id }}','',params);
                    //console.log($answerobj);
                    //console.log($answerobj.upvote());
                });    
            </script>
            <div class="ta-center">
                
             <!--<button class=".s btn" id="button"> <svg  class="svg-icon iconCheckmarkLg" width="36" height="36" viewBox="0 0 36 36"><path d="m6 14 8 8L30 6v8L14 30l-8-8v-8Z"></path></svg> 
            </button> -->
                </div>
    </div>             
</div>
<div class="s-post-summary">
{{--dump($ans->id)--}}
    <div class="s-post-summary--content"> 
        {{--@if($question->created_by == auth()->id()) 
        <form action=" {{ route('accept-answer',['type' =>'Accept', 'id' => $ans->id]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="question_id" value="{{ $question->id }}" />
        <input type="hidden" name="answer_id" value="{{ $ans->id }}" />
        <input  class="s-btn s-btn__outlined" type="submit" name="type" value="Accept" /> 

        @csrf
        @method('POST')
        
    </form>
    @endif--}}
   @if($question->created_by == auth()->id()) 


   <div class="toggle-btn">
   <button  data-answer="{{ $ans->id }}" data-question="{{ $question->id }}"  class="toggle-class-data btn btn-primary">
       {{ $ans->type }}
   </button>
   </div>
   
   @endif
    <!-- <input  data-id="$ans->id" id="togglechkbox{{ $ans->id }}" class="toggle-class" type="checkbox"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Accept" data-off="UnAccept"  {{ $ans->type ? '' : 'checked' }}>  {{--onchange="onclickcheckbox();"--}} -->

    <!-- <script>
 
        function onclickcheckbox()
        {    
            alert($("#togglechkbox{{ $ans->id }}").is(':checked'));         
            var type = $("#togglechkbox{{ $ans->id }}").bootstrapToggle('on') == true ? "Accept" : "Un-Accept";
            alert(type);             
            var answer_id = $("#togglechkbox{{ $ans->id }}").data('$ans->id'); 
            var question_id=$("#togglechkbox{{ $ans->id }}").data('$question->id') ;
            var headers= {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
                                
            $.ajax({ 
                type: "POST", 
                dataType: "json", 
                url: "{{ route('accept-answer',['type' =>'Accept', 'id' => $ans->id]) }}", 
                data: {'headers':'{{ csrf_token() }}','question_id' : '{{ $question->id }}', 'type': type, 'answer_id': "$ans->id"}, 
                success: function(data){ 
                    console.log(data.success) 
                } 
            });
        }
    </script>
     -->
    <!-- <script>  -->
       
  <!-- $(document).ready(function(){alert("true")
    $(function() {
        $('.toggle-class').change(function() { alert("true")
            var type = $(this).prop('checked') == true ? Accept : Un-Accept;  
            var answer_id = $(this).data('$ans->id'); 
            var question_id=$(this).data('$question->id') ;
            var headers= {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
                                
            $.ajax({ 
                type: "POST", 
                dataType: "json", 
                url: "{{ route('accept-answer',['type' =>'Accept', 'id' => $ans->id]) }}", 
                data: {'headers':'{{ csrf_token() }}','question_id' : '{{ $question->id }}', 'type': type, 'answer_id': "$ans->id"}, 
                success: function(data){ 
                console.log(data.success) 
                } 
            }); 
        }); 
});
</script> -->
 

    <p class="s-post-summary--content-excerpt">{!! $ans->answer !!}</p>
        <div class="s-post-summary--content-type">
        <div class="s-user-card s-user-card__minimal">
    <a href="#" class="s-avatar s-user-card--avatar">
        <img class="s-avatar--image" src="#" />
    </a>
    
</div>
   
<div class="s-user-card--info">

<span>Created By:</span>  <a href="#" class="s-user-card--link">{{$ans->createdby['name']}}</a>
        <ul class="s-user-card--awards">
            <li class="s-user-card--rep"></li>
        </ul>
    </div>
    <time class="s-user-card--time">{{$ans->created_at}}</time>    
       </div>

      @if($ans->created_by ==auth()->id())      
 <a class="s-anchors s-anchors__default" href="{{ url('answers/'.$ans->id.'/edit') }}">Edit</a>
    <form action="{{ url('deleteanswer/'. $ans->id) }}" method="POST">
       <input name="_method" type="hidden" value="DELETE">
           <button title="your question will be deleted permenantly" type="submit" class="s-btn s-btn__outlined s-btn__danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
            @csrf
            @method('DELETE')
        </form>   

        @endif
       </div>
       

   </div>
</div>
@endforeach

<!--Answer Part end--->

<!---text editor part---->
<!-- <div class="container-fluid px-4"> -->
<form  action=" {{ route('submit') }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
<div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
             <label for="answer"><strong> Your Answer <span class="text-danger">*</span></strong></label>
             <textarea class="ckeditor form-control" name="answer"></textarea>
                     @if ($errors->has('answer'))
                         <span class="text-danger">{{ $errors->first('answer') }}</span>
                     @endif
                 </div>
             </div> 
             <input type="hidden" name="question_id" value="{{ $question->id }}" />
       
             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Post Your Answer</button>
        </div>

</form>
{{--dd($question->answer)--}}
{{--dd($ans)--}}
<!-- <script>
    $("#button").click(function() {
  $("#button").addClass('button-clicked');
});
</script> -->


<script>
    
$(document).on('click','.toggle-class-data', function(){ //alert('{{$ans->type}}');
var $this = $(this),

        answerId = $this.attr('data-answer'),
        questionId =  $this.attr('data-question'),
        urlMain = "{{ route('accept-answer',':id') }}",
        url = urlMain.replace(':id', answerId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({ 
                type: "POST", 
                dataType: "json", 
                //url: "{{ route('accept-answer',['type' =>'Accept', 'id' => $ans->id]) }}", 
                url:url,
                data: {'question_id' : questionId, 'answer_id': answerId}, 
                success: function(data){ 
                    // console.log(data.success);
                    $this.html(data.type);
                } 
            }); 
});

</script>

<style type="text/css">
        <!--
        .hidden {
            display: none;
        }

        .questionvotes {
            overflow: auto;
        }

        .questionvotes div.upvotejs {
            float: left;
        }

        #footer {
            height: 60px;
            background-color: #f5f5f5;
        }

        .credit {
            margin: 20px 0;
        }
        -->
    </style>
@endsection