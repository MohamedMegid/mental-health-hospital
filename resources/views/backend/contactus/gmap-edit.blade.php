@extends('backend.master')
@section('content-header')
<!-- Main content -->
<ol class="breadcrumb">
    <li>
        <a href="/admin/dashboard">
            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
            الرئيسية
        </a>
    </li>
    <li>
        <a href="/admin/contact-us/contacts">تواصل معنا</a>
    </li>
    <li class="active">تعديل موقعك على الخريطة</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    تعديل موقعك على الخريطة
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            @if (empty($gmap))
                            	<h3 class="panel-body">يجب اضافة الموقع اولا للقيام بعملية التعديل, للاضافة <a href="/admin/contact-us/gmap">صفحة الاضافة</a></h3>
                            @else
				                <div class="panel-body">
				                    {!! Form::open(array('method' => 'post')) !!}
				                    	<div class="form-inline">
					                        <div class="form-group">
					                       		الموقع: <input type="text" id="us2-address" style="width: 500px;" name="address" />
					                       	</div>
					                       	<div class="form-group">
												البعد: <input type="text" id="us2-radius"/>
											</div>
										</div>
										<div class="form-group">
											<div id="us2" style="width: 100%; height: 400px;"></div>
										</div>
										<div class="form-inline">
											<div class="form-group">
												خط العرض: <input type="text" id="us2-lat" name="latitude" />
											</div>
											<div class="form-group">
												خط الطول: <input type="text" id="us2-lon" name="longitude" />
											</div>
										</div>
										<div class="form-group">
					                       	<p style="color:#e9573f; font-size:30px;">ملاحظة: ضع العلامة في المكان الذي تريد تحديده</p>
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
				                        <div class="form-group">
				                            {!! Form::submit('تعديل', 
				                              array('class'=>'btn btn-primary')) !!}
				                        </div>
				                    {!! Form::close() !!}
				                </div>			                
							@endif
        </div>
    </div>
</div>

@endsection
@section('footer')
    <!-- global js -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
	<script src="{{ asset('assets/backend/js/locationpicker.jquery.js') }}"></script>
	<script type="text/javascript">
		$('.transfer').hide();
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




