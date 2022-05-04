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
    <div class="ps-relative">
        <input class="s-input s-input__search" type="text" placeholder="Search…" />
</div>
<ol class="breadcrumb mb-4">
                </ol>
    <div class="container-fluid px-4">
        <a class="btn  btn-primary" href="{{route('questions.create')}}"> Ask Question</a>
      
                <ol class="breadcrumb mb-4">
                </ol>
<header class="s-topbar">
    <form id="search" class="s-topbar--searchbar" autocomplete="off">
                <div class="s-select">
                    <select>
                        <option value="asc">A-Z</option>
                        <option value="hobby">Z-A</option>
                    </select>
                </div>
                <div class="s-topbar--searchbar--input-group">
                    <input type="text" placeholder="Search…" value="" autocomplete="off" class="s-input s-input__search" />
                </div>
    </form>

    <ol class="s-topbar--content"></ol>
</header>
            <div class="card mb-4">
                <!-- <div class="card"> -->
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
                <!-- <hr> -->
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
                
            <!-- </div> -->
    
            <style type="text/css">
        <!--
        .hidden {
            display: none;
        }

        .examples {
            overflow: auto;
        }

        .examples div.upvotejs {
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




    
    <div class="row">
        <div class="span6">
            <div class="examples" id="examples"></div>
        </div>


        <div id="templates" class="hidden">
            <div class="upvotejs">
                <a class="upvote" title="This is good stuff. Vote it up! (Click again to undo)"></a>
                <span class="count" title="Total number of votes"></span>
                <a class="downvote" title="This is not useful. Vote it down. (Click again to undo)"></a>
            </div>
        </div>
@endsection

