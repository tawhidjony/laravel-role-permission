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

                <!--start box -->
                <!--start box -->
                <div class="box">
                    <!--start box Header-->
                    <div class="box-header">
                        <h3 class="box-title">All Customer</h3>
                        <a href="{{route('customers.create')}}" class="btn btn-info pull-right">Add New Customer</a>
                    </div>
                    <!--End box Header-->

                    <!--Start box body-->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer as $key=> $row)
                            <tr>
                                <td>{{$key + 1 }}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{str_limit($row->address,20)}}</td>
                                <td><img src="{{asset('public/images/'.$row->photo)}}" style="width: 60px; height: 60px"></td>
                                <td>
                                    <div class="text-center">
                                        <div class="btn-group">


                                            <a href="{{route('customers.show',$row->id)}}" class="btn btn-social-icon btn-github  button-style"><i class="fa fa-eye fa-eye"></i></a>
                                            <a href="{{route('customers.edit',$row->id)}}" class="btn btn-social-icon btn-info  button-style"><i class="fa fa-pencil-square-o fa-edit"></i></a>
                                            <form class="btn btn-social-icon btn-danger button-style" user="deleteForm" method="POST" action="{{route('customers.destroy',$row->id)}}">
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
                        {{$customer->links()}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- End box -->
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

            $('#example2').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : false,
                'autoWidth'   : false
            })
        })
    </script>
@endpush
