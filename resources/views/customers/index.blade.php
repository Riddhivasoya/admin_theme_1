@extends('layouts.layout')
@section('pagecontent')
    <div class="container-fluid px-4">
                    <h1 class="mt-4">Add Customer</h1>
                    <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                    </ol>
    </div>
    <div class="container-fluid px-4">
    <a class="btn btn-primary" href="{{route('customers.create')}}"> Add Customer</a>
                    <ol class="breadcrumb mb-4">
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
                                        <th>First_Name</th>
                                        <th>Last_Name</th>
                                        <th>Full_name</th>
                                        <th>Birthday</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Hobby</th>
                                        <th>Mobile</th>
                                        <th>Image</th>   
                                        <th>Action</th>
                                        </tr>
                                    </thead>                                    
                    @foreach ($customers as $customer)
                        <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{$customer->first_name}}</td>
                                        <td>{{$customer->last_name}}</td>
                                        <td>{{$customer->full_name}}</td>
                                        <td>{{ date('d/m/Y',strtotime($customer->birthdate)) }}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->gender}}</td>
                                        <td>{{$customer->hobby}}</td>
                                        <td>{{$customer->mobile['mobile']}}</td>
                                        <td><img src="/customer_image/{{ $customer->image }}" width="100px"></td>
                            <td>
                                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
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


