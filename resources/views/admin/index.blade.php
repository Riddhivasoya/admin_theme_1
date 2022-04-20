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
    <div class="container-fluid px-4">
        <a class="btn  btn-primary" href="{{route('questions.create')}}"> Ask Question</a>

                <ol class="breadcrumb mb-4">
                </ol>
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
    </div> 

</div>
@endsection