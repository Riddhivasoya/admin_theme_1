@extends('layouts.layout')
@section('pagecontent')




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

<div class="flex--item mr8">
                      
                       <form action="{{ url('vote-up/question/'. $question->id) }}" class="js-feedback-form" method="POST" name="quick-positive-feedback-activity-indicator"><input type="hidden" name="form-name" value="quick-positive-feedback-activity-indicator">
                       @csrf
                           <button class="d-block s-btn s-btn__muted p4" type="submit" data-controller="s-tooltip" data-s-tooltip-placement="right" aria-describedby="--stacks-s-tooltip-5674vum3"><svg aria-hidden="true" class="svg-icon iconArrowUpLg" width="36" height="36" viewBox="0 0 36 36"><path d="M2 25h32L18 9 2 25Z"></path></svg></button><div id="--stacks-s-tooltip-5674vum3" class="s-popover s-popover__tooltip pe-none" aria-hidden="true" role="tooltip" style="">Quickly let the team know that this page is workin’<div class="s-popover--arrow" style=""></div></div>
                       </form>
                    
                      
                       <div class="js-vote-count flex--item d-flex fd-column ai-center fc-black-500 fs-title" itemprop="upvoteCount" data-value="0">
           0
       </div>
    
   
                       <form action="{{ url('vote-down/question/'. $question->id) }}" class="js-feedback-form" method="POST" name="quick-negative-feedback-activity-indicator"><input type="hidden" name="form-name" value="quick-negative-feedback-activity-indicator">
                       @csrf
                           <button class="d-block s-btn s-btn__muted p4" type="submit" data-controller="s-tooltip" data-s-tooltip-placement="right" aria-describedby="--stacks-s-tooltip-04imtfgq"><svg aria-hidden="true" class="svg-icon iconArrowDownLg" width="36" height="36" viewBox="0 0 36 36"><path d="M2 11h32L18 27 2 11Z"></path></svg></button><div id="--stacks-s-tooltip-04imtfgq" class="s-popover s-popover__tooltip pe-none" aria-hidden="true" role="tooltip" style="">Quickly let us know that this page needs improvement<div class="s-popover--arrow" style=""></div></div>
                       </form>

        
                
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
     
        </div>
    </div>
</div>
<!---end of question part----->

<!--Answer Part-->

@foreach($question->answer as $ans)
<div class="s-page-title">
    <h1 class="s-page-title--header">Answer</h1>
    
</div>
<div class="d-flex my48">
                    <div class="flex--item mr8">
                        <form action="/success" class="js-feedback-form" method="POST" name="quick-positive-feedback-activity-indicator"><input type="hidden" name="form-name" value="quick-positive-feedback-activity-indicator">
                            <button class="d-block s-btn s-btn__muted p4" type="submit" data-controller="s-tooltip" data-s-tooltip-placement="right" aria-describedby="--stacks-s-tooltip-5674vum3"><svg aria-hidden="true" class="svg-icon iconArrowUpLg" width="36" height="36" viewBox="0 0 36 36"><path d="M2 25h32L18 9 2 25Z"></path></svg></button><div id="--stacks-s-tooltip-5674vum3" class="s-popover s-popover__tooltip pe-none" aria-hidden="true" role="tooltip" style="">Quickly let the team know that this page is workin’<div class="s-popover--arrow" style=""></div></div>
                        </form>

                        <form action="/nosuccess" class="js-feedback-form" method="POST" name="quick-negative-feedback-activity-indicator"><input type="hidden" name="form-name" value="quick-negative-feedback-activity-indicator">
                            <button class="d-block s-btn s-btn__muted p4" type="submit" data-controller="s-tooltip" data-s-tooltip-placement="right" aria-describedby="--stacks-s-tooltip-04imtfgq"><svg aria-hidden="true" class="svg-icon iconArrowDownLg" width="36" height="36" viewBox="0 0 36 36"><path d="M2 11h32L18 27 2 11Z"></path></svg></button><div id="--stacks-s-tooltip-04imtfgq" class="s-popover s-popover__tooltip pe-none" aria-hidden="true" role="tooltip" style="">Quickly let us know that this page needs improvement<div class="s-popover--arrow" style=""></div></div>
                        </form>
</div>
<div class="s-post-summary">

    
    <div class="s-post-summary--content">
    <p class="s-post-summary--content-excerpt">{!! $ans->answer !!}</p>
        <div class="s-post-summary--content-type">
        <div class="s-user-card s-user-card__minimal">
    <a href="…" class="s-avatar s-user-card--avatar">
        <img class="s-avatar--image" src="…" />
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
       <button title="your question will be deleted permenantly "type="submit" class="btn btn-link">Delete</button>
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
        {{--dd($question->id)--}}
             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Post Your Answer</button>
        </div>

</form>

@endsection