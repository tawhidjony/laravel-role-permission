@extends('layouts.app')
@section('title','Users - ')
@section('content')

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit User</h3>
                <a href="{{route('users.index')}}" class="btn btn-info pull-right">Back</a>
            </div>
            <div class="box-body">

                <form id="usersForm" action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('users.form')
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success  pull-right"> <i class="fa fa-pencil-square-o"></i> Update</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
