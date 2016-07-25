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
        <a href="/admin/doctors/list">بطاقات الاعضاء</a>
    </li>
    <li class="active">استعراض بطاقات الاعضاء</li>
</ol>
@endsection
				@section('content')
				{!! Form::open(array('method' => 'post', 'files'=>true, 'class' => 'form-inline')) !!}
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    استعراض بطاقات الاعضاء
                                </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($doctors->count())
	                                    <thead>
	                                        <tr>
	                                        	<th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="float:right;">
                                                </th>
                                                <th>الكود</th>
	                                            <th>الصورة الرئيسية</th>
	                                            <th>الاسم</th>
	                                            <th>التخصص</th>
	                                            <th>
	                                                العمليات
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                    	@foreach ($doctors as $doctor)
	                                        <tr>
	                                        	<td>
                                                    <input type="checkbox" name="check_list[{{$doctor->id}}]" class="check_list" value="{{$doctor->id}}">
                                                </td>
                                                <td>{{ $doctor->id }}</td>
	                                            <td><img src="/img/uploaded/doctor/{{ $doctor->basic_photo }}" style="width:70px; height:50px; "></td>
	                                            <td>{{ $doctor->name }}</td>
	                                            <td>{{ $doctor->specialization }}</td>
	                                            <td>
	                                                <a href="/admin/doctors/list/{{$doctor->id}}/edit">تعديل</a> - 
	                                                <a href="/admin/doctors/list/{{$doctor->id}}/delete">حذف</a>
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                @endif
	                                @if (!($doctors->count()))
	                                	<div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                @if (count($doctors))
		                            <div class="form-group">
		                                <input type="submit" name="delete" value="مسح" class="btn btn-primary">
		                            </div>
		                        @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $doctors->count() }} عضو </div>
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
	                                {!! $doctors->render() !!}
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