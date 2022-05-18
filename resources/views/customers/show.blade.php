@extends('layouts.layout')
@section('pagecontent')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Customer Details</h1>
                        <ol class="breadcrumb mb-4">
                        <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
                        </ol>
    <div class="card mb-4">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                {{ $customer->first_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                {{ $customer->last_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birhdate:</strong>
                {{ date('d/m/Y',strtotime($customer->birthdate)) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email :</strong>
                {{ $customer->email }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $customer->address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Gender:</strong>
                {{ $customer->gender }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hobby :</strong>
                {{ $customer->hobby }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile No:</strong>
                {{ $customer->mobile['mobile'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/customer_image/{{ $customer->image }}" width="200px">
            </div>
        </div>
    </div>
</div>
@endsection
                    