@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
@endif
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<!-- Start -->
<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label text-md-left">{{ __(' Name :') }}</label>
    <div class="col-md-9">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               name="name" value="@if($customer->name){{$customer->name}}@else{{ old('name') }}@endif"
               autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<!-- End -->

<!-- Start -->
<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('Email :') }}</label>
    <div class="col-md-9">
        <input id="email" type="email"
               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
               name="email"
               value="@if($customer->email){{$customer->email}}@else{{ old('email') }}@endif"
               autofocus>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
<!-- End -->

<!-- Start -->
<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('Phone :') }}</label>
    <div class="col-md-9">
        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
               name="phone" value="@if($customer->phone){{$customer->phone}}@else{{ old('phone') }}@endif"
               autofocus>

        @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
        @endif
    </div>
</div>
<!-- End -->

<!-- Start -->
<div class="form-group row">
    <label for="name" class="col-md-3  col-form-label text-md-left">{{ __('Address :') }}</label>
    <div class="col-md-9">
                <textarea type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"

                          autofocus>@if($customer->address){{$customer->address}}@else{{ old('address') }}@endif</textarea>

        @if ($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
        @endif
    </div>
</div>
<!-- End -->

<!-- Start -->
<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('Photo :') }}</label>
    <div class="col-md-9">
        <input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}"
               name="photo" accept="image/*" onchange="readURL(this);" value="@if($customer->photo){{$customer->photo}}@else{{ old('photo') }}@endif"
               autofocus>

        @if ($errors->has('photo'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('photo') }}</strong>
                    </span>
        @endif
        <img id="image" src="{{URL::to('images/'.$customer->photo)}}" style="width: 100px; height: 100px; margin-top: 5px;" >
    </div>
</div>
<!-- End -->
</div>
<div class="col-md-1"></div>
</div>
@push('js')
    <!--Form Validatin Script-->
    <script src="{{asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script>

        $(document).ready(function () {

            // validate form on keyup and submit
            $("#storeForm").validate({
                rules: {
                    name: "required",
                },
                messages: {
                    name: "Please enter name",
                }
            });

        });
        function readURL(input){
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(140)
                        .height(120);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endpush