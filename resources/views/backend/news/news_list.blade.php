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
    <li class="active">استعراض الاخبار</li>
</ol>
@endsection
				@section('content')
				<div class="row">
				    <div class="col-md-12">
				        <div class="panel panel-primary" id="hidepanel1">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
				                        بحث الاخبار
				                    </h3>
				                    <span class="pull-right">
				                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
				                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
				                    </span>
				                </div>
				                <div class="panel-body">
				                {!! Form::open(array('method' => 'post', 'files'=>true, 'class' => 'form-inline')) !!}
					                    
					                    	@if (!empty($_GET['title']))
						                        <div class="form-group" id="">
						                          <label for="الاسم" style="">العنوان</label><br>
						                          {!! Form::text('title', $_GET['title'], null, 
						                              array('class'=>'form-control')) !!}
						                        </div>
					                        @else
					                        	<div class="form-group" id="">
						                          <label for="الاسم" style="">العنوان</label><br>
						                          {!! Form::text('title', null, 
						                              array('class'=>'form-control')) !!}
						                        </div>
						                    @endif
						                    @if (!empty($_GET['importance']))
						                        <div class="form-group">
												    {!! Form::label('اهمية الخبر') !!}<br>
												    <select id="side_contactus" name="importance" class="form-control">
												        <option value="">--اختر--</option>
												        <option value="1" <?php if ($_GET['importance'] == 1) echo "selected='selected'";?>>الاخبار المهمة</option>
												        <option value="2" <?php if ($_GET['importance'] == 2) echo "selected='selected'";?>>الاخبار غير المهمة</option>
												    </select>
												</div>
											@else
												<div class="form-group">
												    {!! Form::label('اهمية الخبر') !!}<br>
												    <select id="side_contactus" name="importance" class="form-control">
												        <option value="">--اختر--</option>
												        <option value="1">الاخبار المهمة</option>
												        <option value="2">الاخبار غير المهمة</option>
												    </select>
												</div>
											@endif
											@if (!empty($_GET['category']))
						                        <div class="form-group">
												    {!! Form::label('تصنيف الخبر') !!}<br>
												    <select id="side_contactus" name="category" class="form-control">
												        <option value="">--اختر--</option>
												        <option value="1" <?php if ($_GET['category'] == 1) echo "selected='selected'";?>>اخبار عامة</option>
												        <option value="2" <?php if ($_GET['category'] == 2) echo "selected='selected'";?>>اخبار تثقيفية</option>
												        <option value="3" <?php if ($_GET['category'] == 3) echo "selected='selected'";?>>الانجازات</option>
												    </select>
												</div>
											@else
												<div class="form-group">
												    {!! Form::label('تصنيف الخبر') !!}<br>
												    <select id="side_contactus" name="category" class="form-control">
												        <option value="">--اختر--</option>
												        <option value="1">الاخبار العامة</option>
												        <option value="2">الاخبار التثقيفية</option>
												        <option value="3">الانجازات</option>
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
                                    استعراض الاخبار
                                </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($news->count())
	                                    <thead>
	                                        <tr>
	                                        	<th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="float:right;">
                                                </th>
                                                <th>الكود</th>
	                                            <th>الصورة الرئيسية</th>
	                                            <th>العنوان</th>
	                                            <th>ملخص الخبر</th>
	                                            <th>اهمية الخبر</th>
	                                            <th>تصنيف الخبر</th>
	                                            <th>
	                                                العمليات
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                    	@foreach ($news as $single_news)
	                                        <tr>
	                                        	<td>
                                                    <input type="checkbox" name="check_list[{{$single_news->id}}]" class="check_list" value="{{$single_news->id}}">
                                                </td>
                                                <td>{{$single_news->id}}</td>
                                                <td><img src="/img/uploaded/{{ $single_news->basic_photo }}" style="width:70px; height:50px; "></td>
	                                            <td>{{ $single_news->title }}</td>
	                                            <td>{{ $single_news->summary }}</td>
	                                            @if ($single_news->importance == 1)
	                                            	<td style="color:#e9573f;">خبر مهم</td>
	                                            @else
	                                            	<td>خبر غير مهم</td>
	                                            @endif
	                                            @if ($single_news->category_id == 1)
	                                            	<td style="color:#e9573f;">خبر عام</td>
	                                            @elseif($single_news->category_id == 2)
	                                            	<td style="color:#418BCA;">خبر تثقيفي</td>
	                                            @elseif($single_news->category_id == 3)
	                                            	<td style="color:rgb(55, 188, 155);">انجازات</td>
	                                            @endif
	                                            <td>
	                                                <a href="/admin/news/{{$single_news->id}}/edit">تعديل</a> - 
	                                                <a href="/admin/news/{{$single_news->id}}/delete">حذف</a>
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                @endif
	                                @if (!($news->count()))
	                                	<div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                @if (count($news))
		                            <div class="form-group">
		                                <input type="submit" name="delete" value="مسح" class="btn btn-primary">
		                            </div>
		                        @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $news->count() }} خبر </div>
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
                @section('footer')
                <style type="text/css">
                	#form-hidden-imd{
                		display: none;
                	}
                </style>
                @endsection
				@stop