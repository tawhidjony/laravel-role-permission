@extends('layouts.app')
@section('title','Users - ')
@section('content')

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Edit Customer</h3>
                <a href="{{route('customers.index')}}" class="btn btn-info pull-right">Back</a>
            </div>

            <div class="box-body">
                <form id="usersForm" action="{{route('customers.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('customers.form')
                    @method('PUT')

                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success  pull-right"><i class="fa fa-pencil-square-o"></i> Update</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection