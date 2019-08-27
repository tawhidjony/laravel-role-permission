@extends('layouts.app')
@section('title','setting - ')
@push('css')
@endpush
@section('content')
<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Genaral Settings</h3>

            </div>
            <div class="box-body">
                <form action="{{route('settings.update', $setting->id )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="input-25">Change App Name</label>
                            <input type="text" class="form-control form-control-square-o" value="{{$setting->name}}" name="name">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-25">Copyright Name</label>
                            <input type="text" class="form-control form-control-square-o" value="{{$setting->copyright}}" name="copyright">

                        </div>
                    <!--
                       <div class="form-group col-md-6">
                            <div class="col-md-2 " style="padding-left:0;margin-top: 12px;">
                                <img id="app_logo" src="{{URL::to('images/'.$setting->photo)}}"
                                     style="width:50px; height:50px;border: 1px solid #000000">
                            </div>
                            <div class="col-md-10" style=" padding-right: 0px; padding-left: 0px; ">

                                <label for="input-25">Change App Logo</label>
                                <input type="file" class="form-control form-control-square-o" value="" name="photo" accept="image/*"
                                       onchange="document.getElementById('app_logo').src = window.URL.createObjectURL(this.files[0])"
                                >
                            </div>
                        </div>
                        -->
                        <div class="form-group col-md-6">
                            <div class="col-md-2" style="padding-left:0;margin-top: 12px;">
                                <img id="favicon" src="{{URL::to('images/'.$setting->favicon)}}"
                                     style="width:50px; height:50px;border: 1px solid #000000">
                            </div>
                            <div class="col-md-10" style=" padding-right: 0px; padding-left: 0px; ">

                                <label for="input-25">Change Favicon Icon</label>
                                <input type="file" class="form-control form-control-square-o" value="" name="favicon" accept="image/*"
                                       onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])"
                                >
                            </div>
                        </div>

                    </div>


                    <div class="form-footer">
                        <button type="submit" class="btn btn-success shadow-success m-1 pull-right"><i class="fa fa-check-square-o"></i>Update</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <script>
    function readURL(input){
    if (input.files && input.files[0]){
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#images')
    .attr('src', e.target.result)
    .width(140)
    .height(120);
    };
    reader.readAsDataURL(input.files[0]);
    }
    }

    </script>
@endsection
