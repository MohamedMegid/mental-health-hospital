@extends('frontend.master')
@section('content')
    

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">الاستشارات</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                        <a href="/home" class="link-format">الرئيسية/</a>  
                        <a href="/med-consulting" class="link-format">الاستشارات</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="single-product-area">
        <div class="container">
                    <div class="row">
                         <div class="col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                            <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>الاستشارات الطبية </h3>
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
                                    	الجنس<br>
                                        <select class="form-control" name="sex">
											<option value="1">ذكر</option>
											<option value="2">انثى</option>
										</select>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('نص الاستشارة') !!}<br>
                                        {!! Form::textarea('message', null, 
                                            array('class'=>'form-control')) !!}
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
                                    <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>النص التعريفي</h3>
                                </div>
                                <div class="info_format">
                                    @if($med->count())
                                        العنوان: <div>{{$med->title}}</div>
                                        الموضوع: <div>{{$med->subject}}</div>
                                    @endif
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
    </script>
@endsection
@stop