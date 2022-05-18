@extends('layouts.layout')
@section('pagecontent')

<h2>Welcome User {{Auth::user()->name}}</h2>


@endsection

