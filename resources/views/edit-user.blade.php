@extends('layouts.app')
@section('title','User - ')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Change Password</h3>

            </div>
            <div class="box-body">
                    <div class="col-sm-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form action="{{url('update-password')}}" method="post">
                                @csrf
                                @method('PUT')


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Old Password</label>
                            <div class="col-lg-9">
                                <input id="old_password" type="password"
                                       class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                       name="old_password" >

                                @if ($errors->has('old_password'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('old_password') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                                <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" @if(!$user->password) required @endif>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                    <div class="col-lg-9">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" @if(!$user->password) required @endif>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="submit" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </div>
                            </form>
            </div>
        </div>
    </section>

@endsection