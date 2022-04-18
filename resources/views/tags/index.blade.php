@extends('layouts.layout')
@section('pagecontent')
<div class="container-fluid px-4">
                <h1 class="mt-4">Add Tags</h1>
                <ol class="breadcrumb mb-4">
                <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                </ol>
</div>
<div class="container-fluid px-4">
<a class="btn btn-primary" href="{{route('tags.create')}}"> Add Tags 234</a>

                <ol class="breadcrumb mb-4">
                <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                </ol>
</div>
                        
           
<div>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</div>
<div class="card mb-4">
    <div class="card-header">
                <i class="fas fa-table me-1"></i>
                     DataTable Example
    </div>
            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Tags_Name</th>
                                        <th>Action</th>
                                        </tr>
                                        </thead>
                                    
                                    @foreach ($tags as $tag)
                                    <tr>
                                    <td >{{ ++$i }}</td>
                                    <td >{{$tag->tag_name}}</td>
                                    <td>
                                    <form action="{{ route('tags.destroy',$tag->id) }}" method="POST">

                                    <a class="btn btn-primary" href="{{ route('tags.edit',$tag->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
                 </tr>
                @endforeach
            </table>
        </div>
</div>
 @endsection
