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
        <a href="/admin/banners/list">البنرات</a>
    </li>
    <li class="active">استعراض قائمة البنرات</li>
</ol>
@endsection
				@section('content')
				{!! Form::open(array('method' => 'post', 'files'=>true, 'class' => 'form-inline')) !!}
				<div class="row">
                    <div class="col-lg-12">
                    		<div class="panel panel-primary" id="hidepanel1">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
				                        بحث البنرات
				                    </h3>
				                    <span class="pull-right">
				                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
				                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
				                    </span>
				                </div>
				                <div class="panel-body">
									@if (!empty($_GET['position']))
										<div class="form-group">
				                            <label for="الاسم" style="">موقع البنر</label><br>
				                            <select class="form-control" name="position">
				                              <option value="1" <?php if ($_GET['position'] == 1) echo "selected='selected'";?>>بنر تحت القائمة الرئيسية</option>
				                              <option value="2" <?php if ($_GET['position'] == 2) echo "selected='selected'";?>>بنر في البلوك الايمن</option>
				                            </select> 
				                        </div>
			                        @else
				                        <div class="form-group">
				                            <label for="الاسم" style="">موقع البنر</label><br>
				                            <select class="form-control" name="position">
				                              <option value="1">بنر تحت القائمة الرئيسية</option>
				                              <option value="2">بنر في البلوك الايمن</option>
				                            </select> 
				                        </div>
			                        @endif
			                        <div class="form-group">
					                    <input type="submit" name="search" value="بحث" class="btn btn-primary" style="margin-bottom: -22px;">
					                </div>
                    			</div>
                    		</div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    استعراض قائمة البنرات
                                </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($banners->count())
	                                    <thead>
	                                        <tr>
	                                        	<th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="float:right;">
                                                </th>
                                                <th>الكود</th>
	                                            <th>الصورة الرئيسية</th>
	                                            <th>العنوان</th>
	                                            <th>الرابط</th>
	                                            <th>الموقع</th>
	                                            <th>
	                                                العمليات
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                    	@foreach ($banners as $banner)
	                                        <tr>
	                                        	<td>
                                                    <input type="checkbox" name="check_list[{{$banner->id}}]" class="check_list" value="{{$banner->id}}">
                                                </td>
                                                <td>{{ $banner->id }}</td>
                                                <td><img src="/img/uploaded/banner/{{ $banner->basic_photo }}" style="width:70px; height:50px; "></td>
	                                            <td>{{ $banner->title }}</td>
	                                            <td>{{ $banner->link }}</td>
	                                            @if ($banner->position == 1)
	                                            	<td>بنر تحت القائمة الرئيسية</td>
	                                            @else
	                                            	<td>بنر في البلوك الايمن</td>
	                                            @endif
	                                            <td>
	                                                <a href="/admin/banners/list/{{$banner->id}}/edit">تعديل</a> - 
	                                                <a href="/admin/banners/list/{{$banner->id}}/delete">حذف</a>
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                @endif
	                                @if (!($banners->count()))
	                                	<div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                @if (count($banners))
		                            <div class="form-group">
		                                <input type="submit" name="delete" value="مسح" class="btn btn-primary">
		                            </div>
		                        @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $banners->count() }} بنر </div>
                            </div>
                        </div>
                    </div>
                </div>           
                {!! Form::close() !!}
                <div class="row">
	                <div class="col-md-12">
	                    <div class="product-pagination text-center">
	                        <nav>
	                            <ul class="pagination">
	                                {!! $banners->render() !!}
	                            </ul>
	                        </nav>                        
	                    </div>
	                </div>
	            </div>
                <!-- row-->
                @endsection
                @section('script')
                	<script>
						    $('#checkall').change(function(event) {
						        if(this.checked) {
						            $('.check_list').each(function() {
						                this.checked = true;
						            });
						        }
						        else{
						            $('.check_list').each(function() {
						                this.checked = false;
						            });        
						        }
						    });
					</script>    
                @endsection
                @section('footer')
                <style type="text/css">
                	#form-hidden-imd{
                		display: none;
                	}
                </style>
                @endsection
				@stop