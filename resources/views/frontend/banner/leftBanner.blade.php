@extends('admin/admin')
@section('content')
    	<div class="container" style="width: 1000px;">
		    <h2 align="right" style="color: white;">اضافة بنر جانبي</h2>  			
    	</div>
    	{!! Form::open(array('url' => '/admin/banner/left', 'files'=>true)) !!}
    		 <div class="form-group">
			    <label style="color:#fff;">العنوان</label>
			    <input type="text" class="form-control" name='title' >
			  </div>
			  <div class="form-group">
			    <label style="color:#fff;">الرابط</label>
			    <input type='text' class="form-control" name='url'>
			  </div>
			  <div class="form-group">
			    <label style="color:#fff;">الصورة</label>
			    <input type="file" name="banner">
			  </div>
			  <button type="submit" class="btn btn-default">حفظ</button>

			  <div class="row">
			  	@foreach($banners as $banner)
			  	<div class="col-md-12">
			  		<label style="color:#fff;">{{ $banner->title }}</label>
			  		<img class="img-responsive" src="/img/uploaded/{{ $banner->img }}">
			  		<a href="/admin/banner/left/delete/{{ $banner->id }}" class="btn btn-danger">حذف</a>
			  	</div>
			  	@endforeach
			  </div>
		{!! Form::close() !!}
@endsection