@extends('frontend.master')
@section('content')
       <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">الحساب الشخصي</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                        <a href="/home" class="link-format">الرئيسية</a> / 
                        <a href="/auth/profile" class="link-format">الحساب الشخصي</a>
                </div>
            </div>
        </div>
    </div> 
    <div class="single-product-area">
        <div class="container">
                    <div class="row">
                         <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                            <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>تعديل بيانات الحساب الشخصي </h3>
                                </div>
                                @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                @endif
                                {!! Form::model($user, [$user->id, 'method' => 'POST']) !!}
                                        <div class="form-group">
                                          <label>الاسم</label><br>
                                          {!! Form::text('name', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                          <label>البريد الالكتروني</label><br>
                                          {!! Form::text('email', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                          <label>كلمة السر</label><br>
                                          <input type="password" name="password" class="form-control" style="width:100%"/>
                                        </div>
                                        <div class="form-group">
                                          <label>تأكيد كلمة السر</label><br>
                                          <input type="password" name="password_confirmation" class="form-control" style="width:100%"/>
                                        </div>
                                        <div class="form-group">
                                            {!!Form::submit('تعديل',['class'=>'btn btn-default'])!!}
                                        </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>      
    </div>
</div>
@endsection
@section('scripts')
    <!-- global js -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="{{ asset('assets/backend/js/locationpicker.jquery.js') }}"></script>
    <script type="text/javascript">
        $('.transfer').hide();
        $('.hidden-form').hide();
        $("#us2-address").prop('disabled', true);
        $('#us2').locationpicker({
            location: {latitude: $('#latitude').val(), longitude: $('#longitude').val()},   
            radius: 3000,
            inputBinding: {
                latitudeInput: $('#us2-lat'),
                longitudeInput: $('#us2-lon'),
                radiusInput: $('#us2-radius'),
                locationNameInput: $('#us2-address')
            }
        });
    </script>
@endsection
@stop