@extends('layouts.app')
@section('title','Roles - ')
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Role</h3>
                <a href="{{route('roles.index')}}" class="btn btn-info pull-right">Back</a>
            </div>
            <div class="box-body">
                    <form id="rolesForm" action="{{route('roles.update',$role->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        @include('roles.form')
                        <div class="col-sm-2">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </form>
            </div>
            </div>
        </section>
    </section>
@endsection