@extends('layouts.layout')
@section('pagecontent')

<div>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</div>

<div class="container-fluid px-4">
                <h1 class="mt-4">All Question</h1>
                <ol class="breadcrumb mb-4">
                <a class="btn btn-primary" href="{{route('questions.create')}}"> Ask Question</a>
                </ol>
</div>
              

     
@foreach($questions as $question)

<div class="s-post-summary">
    <div class="s-post-summary--stats">
        <div class="s-post-summary--stats-item s-post-summary--stats-item__emphasized">
            <span class="s-post-summary--stats-item-number">
                98
            </span>
            <span class="s-post-summary--stats-item-unit">
                votes
            </span>
        </div>
        <div class="s-post-summary--stats-item has-answers has-accepted-answer">
            
            <span class="s-post-summary--stats-item-number">
                1656
            </span>
            <span class="s-post-summary--stats-item-unit">
                answers
            </span>
        </div>
        <div class="s-post-summary--stats-item is-supernova">
            <span class="s-post-summary--stats-item-number">
            532k
            </span>
            <span class="s-post-summary--stats-item-unit">
                views
            </span>
        </div>
    </div>
    
    <div class="s-post-summary--content">
        <div class="s-post-summary--content-type">
            <a href="…" class="s-link s-link__grayscale">
                
            </a>
        </div>
        <h3 class="s-post-summary--content-title">
            <a href="{{ route('questions.show',$question->id) }}" class="s-link">{{$question->title}}</a>
        </h3>
        <p class="s-post-summary--content-excerpt">{{$question->body}}</p>
        <div class="s-post-summary--meta">
            <div class="s-post-summary--meta-tags">
                @foreach($question->tag as $tag)
                <a class="s-tag" href="#">{{$tag->tag_name}}</a>
               @endforeach
            </div>
    
        

            <div class="s-user-card s-user-card__minimal">
                <a href="" class="s-avatar s-user-card--avatar">
                    <img class="s-avatar--image" src="" />
                </a>
                <a href="" class="s-user-card--link"> {{ Auth::user()->name }}</a>
                <ul class="s-user-card--awards">
                    <li class="s-user-card--rep">130k</li>
                </ul>
                <time class="s-user-card--time">{{$question->created_at}}</time>
            </div>
        </div>
        <a class="s-link s-link__grayscale" href="#">Edit</a>
        
        <a href="…" class="s-btn s-btn__muted s-post-summary--content-menu-button">
            
        </a>
    </div>
</div>

@endforeach   


   


@endsection