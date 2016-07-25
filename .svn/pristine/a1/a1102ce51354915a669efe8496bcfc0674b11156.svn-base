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
    <li class="active">استعراض التعليقات</li>
</ol>
@endsection
				@section('content')
				{!! Form::open(array('method' => 'post')) !!}
				<div class="row">
				    <div class="col-md-12">
				        <div class="panel panel-primary" id="hidepanel1">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
				                        بحث التعليقات
				                    </h3>
				                    <span class="pull-right">
				                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
				                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
				                    </span>
				                </div>
				                <div class="panel-body">
				                	@if (!empty($_GET['activation']))
						                <div class="form-group">
											{!! Form::label('حالة التعليقات') !!}<br>
											<select id="side_contactus" name="activation" class="form-control">
												<option value="">--اختر--</option>
												<option value="1" <?php if ($_GET['activation'] == 1) echo "selected='selected'";?>>الاخبار المفعلة</option>
												<option value="2" <?php if ($_GET['activation'] == 2) echo "selected='selected'";?>>الاخبار غير المفعلة</option>
											</select>
										</div>
									@else
										<div class="form-group">
											{!! Form::label('حالة التعليقات') !!}<br>
											<select id="side_contactus" name="activation" class="form-control">
												<option value="">--اختر--</option>
												<option value="1">التعليقات المفعلة</option>
												<option value="2">التعليقات غير المفعلة</option>
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
                                    استعراض التعليقات
                                </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($news->count())
	                                    <thead>
	                                        <tr>
	                                            <th>عنوان الخبر</th>
	                                            <th>عدد التعليقات</th>
	                                            <th>التعليقات على الخبر</th>
	                                            <th>حالة التعليق</th>
				                                <th>
			                                        <input type="checkbox" name="check_all" id="checkall" style="float:right;">
			                                    </th>
	                                            <th>العمليات</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                    	@foreach ($news as $single_news)
	                                        <tr>
	                                            <td><a href="/admin/comments/1">{{ $single_news->title }}</a></td>
	                                            <td>{{$single_news->comments->count()}}</td>
	                                            @if ($single_news->comments->count())
		                                            @foreach ($single_news->comments as $comments)
		                                            	@if (!empty($_GET['activation']))
		                                            		@if ($comments->status == $_GET['activation'])
					                                            <tr>
						                                        	<td></td><td></td>
						                                            <td>{{ $comments->comment }}</td>
						                                            @if ($comments->status == 1)
						                                            	<td style="color:#e9573f;">تعليق مفعل</td>
						                                            	<td>لا يوجد</td>
						                                            @else
						                                            	<td>تعليق غير مفعل</td>
							                                        	<td>
						                                                    <input type="checkbox" name="check_list[{{$comments->id}}]" class="check_list" value="{{$comments->id}}">
						                                                </td>
						                                            @endif
					                                            </tr>
			                                           		@endif 
			                                           @endif
			                                           @if (empty($_GET['activation']))
				                                            <tr>
					                                        	<td></td><td></td>
					                                            <td>{{ $comments->comment }}</td>
					                                            @if ($comments->status == 1)
					                                            	<td style="color:#e9573f;">تعليق مفعل</td>
					                                            	<td>لا يوجد</td>
					                                            @else
					                                            	<td>تعليق غير مفعل</td>
						                                        	<td>
					                                                    <input type="checkbox" name="check_list[{{$comments->id}}]" class="check_list" value="{{$comments->id}}">
					                                                </td>
					                                            @endif
					                                            <td>
	                                                				<a href="/admin/comments/{{$comments->id}}/delete">حذف</a>
	                                            				</td>
				                                            </tr>
			                                           @endif

						                                            <?php
						                                            $url = $_SERVER['REQUEST_URI'];
															        $tokens = explode('/', $url);
															        
															        ?>
															        @if (empty($tokens[3]))
															        	<?php
															        		break;
															        	?>
															        @endif
		                                            @endforeach
	                                            @endif
	                                            @if (!$single_news->comments->count())
		                                            <td>لا يوجد</td>
		                                            <td>لا يوجد</td>
		                                            <td>لا يوجد</td>
		                                            <td>لا يوجد</td>
	                                            @endif
	                                        </tr>
	                                    @endforeach
	                                @endif
	                                @if (empty($news))
	                                	<div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                @if (!empty($deactive))
	                                	@if ($deactive->status == 2)
				                            <div class="form-group">
				                                <input type="submit" name="active" value="تفعيل" class="btn btn-primary">
				                            </div>
		                        		@endif
		                        @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $news->count() }} خبر </div>
                                @if (!empty($comments))
                                	<div> <i class="fa fa-folder-o"></i> إجمالي : {{ $comments->count() }} تعليق </div>    	
                                @endif
                            </div>
                            {!! form::close() !!}
                        </div>
                    </div>
                </div>  
                <div class="row">
	                <div class="col-md-12">
	                    <div class="product-pagination text-center">
	                        <nav>
	                            <ul class="pagination">
	                                {!! $news->render() !!}
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
				@stop