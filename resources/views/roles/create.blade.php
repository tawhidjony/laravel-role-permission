@extends('layouts.app')
@section('title','Roles - ')
@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Role</h3>
                <a href="{{route('roles.index')}}" class="btn btn-info pull-right">Back</a>
            </div>
            <div class="box-body">
                <form id="rolesForm" action="{{route('roles.store')}}" method="post">
                    @csrf
                    @include('roles.form')
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.box -->

    </section>
@endsection


