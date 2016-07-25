@extends('frontend.master')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">تواصل معنا</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                        <a href="/home" class="link-format">الرئيسية/</a>
                        <a href="/contact-us" class="link-format">تواصل معنا</a>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    موقع المؤسسة على الخريطة
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                                <div class="panel-body">
                                            <div class="form-group">
                                                الموقع: <input id="us2-address" style="width: 700px;" name="address" />
                                            </div>
                                        <div class="form-group">
                                            <div id="us2" style="width: 100%; height: 400px;"></div>
                                        </div>
                                        <div class="hidden-form">
                                            <div class="form-group">
                                                خط العرض: <input type="text" id="us2-lat" name="latitude" />
                                            </div>
                                            <div class="form-group">
                                                خط الطول: <input type="text" id="us2-lon" name="longitude" />
                                            </div>
                                        
                                            <div class="form-group">
                                                <p style="color:#e9573f; font-size:30px;">ملاحظة: ضع العلامة في المكان الذي تريد تحديده</p>
                                            </div>
                                        </div>
                                        @foreach ($gmap as $map)
                                        <div  class="transfer">
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    العنوان: <input type="text" id="address" value="{{$map->address}}" />
                                                </div>
                                                <div class="form-group">
                                                    خط العرض: <input type="text" id="latitude" value="{{$map->latitude}}" />
                                                </div>
                                                <div class="form-group">
                                                    خط الطول: <input type="text" id="longitude" value="{{$map->longitude}}" />
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                            <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>تواصل معنا </h3>
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

                                    {!! Form::open(array('method' => 'post')) !!}

                                    <div class="form-group">
                                        {!! Form::label('الاسم') !!}<br>
                                        {!! Form::text('name', null, 
                                            array('class'=>'form-control')) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('البريد الالكتروني') !!}<br>
                                        {!! Form::email('mail', null, 
                                            array('class'=>'form-control')) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('رقم الجوال') !!}<br>
                                        {!! Form::text('mobile', null, 
                                            array('class'=>'form-control')) !!}
                                    </div>

                                    <div class="form-group"><br>
                                        {!! Form::label('العنوان') !!}<br>
                                        {!! Form::text('address', null, 
                                            array('class'=>'form-control')) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('نص الرسالة') !!}<br>
                                        {!! Form::textarea('message', null, 
                                            array('class'=>'form-control')) !!}
                                    </div>                                    

                                    <div class="form-group rep-status"><br>
                                        {!! Form::label('حالة الرد') !!}<br>
                                        {!! Form::text('reply_status', null, 
                                            array('class'=>'form-control reply_stat')) !!}
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="ارسل" name="send"/>
                                    </div>

                                    {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                            <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>معلومات التواصل</h3>
                                </div>
                                <div class="info_format">
                                    @foreach($contact_info as $view)
                                        العنوان: <div>{{$view->title}}</div>
                                        البريد: <div>{{$view->mail}}</div>
                                        ارقام الهواتف: <div>
                                            @foreach ($phones as $phone)
                                                {{ $phone->phone }}<br>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
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
        $('input.form-control.reply_stat').val(2);
        $('div.form-group.rep-status').hide();
    </script>
@endsection
@stop