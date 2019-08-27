@extends('layouts.app')
@section('title','Users - ')
@push('css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All User

                        </h3>
                        <a href="{{route('users.create')}}" class="btn btn-info pull-right">Add New User</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><img src="{{URL::to('images/'.$user->photo)}}" style="width: 60px; height: 60px"></td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">


                                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-social-icon btn-info  button-style"><i class="fa fa-pencil-square-o fa-edit"></i></a>
                                                <form class="btn btn-social-icon btn-danger button-style" user="deleteForm" method="POST" action="{{route('users.destroy', $user->id)}}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="javascript:void(0);" onclick="deleteWithSweetAlert(event,parentNode);" >
                                                        <button class="btn btn-social-icon btn-danger button-style" ><i class="fa fa-trash-o fa-delete"></i></button>
                                                    </a>
                                                </form>

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach


                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@push('js')
    <script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endpush
