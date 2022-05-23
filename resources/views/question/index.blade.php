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
        </ol>
<!-- Serach bar and sorting-->
<header class="s-topbar">
    <form id="search" class="s-topbar--searchbar" action="{{ route('questions.index') }}" method="GET" autocomplete="off">
        <div class="s-select">
            <input type="hidden" id="orderby" name="sort">
                <select id="ordering" >
                    <option value="Slect" disabled>select sortng</option>
                    <option value="asc" @if($sort == 'Asc') ? selected : "" @endif >A-Z</option>
                    <option value="desc" @if($sort == 'desc') ? selected : "" @endif>Z-A</option>
                </select>
        </div>
        <div class="s-topbar--searchbar--input-group">    
            <input class="s-input s-input__search"  type="text" name="search" placeholder="Search....." value="{!! request('search') !!}" />
        </div>
    </form>
    <ol class="s-topbar--content"></ol>
</header>
<script>
    $(document).ready(function()
    {
        $('#ordering').on("change",function(){                                          // for id #
            $('#orderby').val($(this).val())
            $('#search').submit()
        });
    });
</script>
<!--create Question Start---->
    <ol class="breadcrumb mb-4">
                    </ol>
                    <a  class="btn btn-primary" href="{{route('questions.create')}}"> Ask Question</a>
                    </ol>
    </div>

     
@foreach($questions as $question)

    <div class="s-post-summary">
        <div class="s-post-summary--stats">
            <div class="s-post-summary--stats-item s-post-summary--stats-item__emphasized">
                <span class="s-post-summary--stats-item-number">
                {{(count($question->questionvotes))}}
                </span>
                <span class="s-post-summary--stats-item-unit">
                    votes
                </span>
            </div>
            <div class="s-post-summary--stats-item has-answers has-accepted-answer">
                
                <span class="s-post-summary--stats-item-number">
            {{ (count($question->answer)) }}
                </span>
                <span class="s-post-summary--stats-item-unit">
                    answers
                </span>
            </div>
            <div class="s-post-summary--stats-item is-supernova">
                <span class="s-post-summary--stats-item-number">
            {{ (count( $question->qview)) }}
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
                <a title="{{$question->title}}" href="{{ route('questions.show',$question->id) }}" class="s-link">{{$question->title}}</a>
            </h3>
      <!-- <details> -->
          <!-- <summary>Click here</summary> -->
            <p class="s-post-summary--content-excerpt"> {!! Str::limit($question->body,100) !!} </p>
        <!-- </details> -->
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
                    <strong> Created By:</strong>
                        <a href="" class="s-user-card--link"> {{  $question->createdby['name'] }}</a>
                    <ul class="s-user-card--awards">
                        <li class="s-user-card--rep"></li>
                    </ul>
                    <time class="s-user-card--time">{{$question->created_at}}</time>
               </div>
            </div>
          </a>
    </div>
<span>
            @if($question->created_by ==auth()->id())
                <a class="btn btn-primary" title="you can edit your question" href="{{route('questions.edit',$question->id)}}">Edit</a>
                <ol class="breadcrumb mb-4">
                </ol>
            <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
                <input name="_method" type="hidden" value="DELETE">
                <button title="your question will be deleted permenantly "type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                @csrf
                @method('DELETE')
            </form>
            @endif
    </span>    
</div>

@endforeach 
{!! $questions->appends(Request::except('page'))->render() !!}

<!-- {{$questions->links() }} -->
<p>
    Displaying {{$questions->count()}} of {{$questions->total()}} Questions(s).
</p>

@endsection
