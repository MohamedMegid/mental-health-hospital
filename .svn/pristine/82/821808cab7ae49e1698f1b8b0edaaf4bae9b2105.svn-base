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
        <a href="/admin/register/users">الاعضاء</a>
    </li>
    <li class="active">عرض قائمة الاعضاء</li>
</ol>
@endsection
				@section('content')
				
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    جدول قائمة الاعضاء العاملة
                                </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($users->count())
	                                    <thead>
	                                        <tr>
	                                            <th>الاسم</th>
	                                            <th>البريد الالكتروني</th>
	                                            <th>التصنيف</th>
	                                            <th>
	                                                العمليات
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    <?php $count=0; ?>
                                    	@foreach ($users as $user)
                                    		@if ($user->role_id == 2)
	                                        <tr>
	                                            <td>{{ $user->name }}</td>
	                                            <td>{{ $user->email }}</td>
	                                            <td style="color:#418BCA;">عضو عامل</td>
	                                            <td>
	                                                <a href="/admin/register/users/{{$user->id}}/edit">تعديل</a> - 
	                                                <a href="/admin/register/users/{{$user->id}}/delete">حذف</a>
	                                            </td>
	                                        </tr>
	                                        <?php $count++; ?>
	                                        @endif
	                                    @endforeach
	                                @endif
	                                @if (empty($users))
	                                	<div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $count }} عضو عامل</div>
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
                                    جدول قائمة المستخدمين
                                </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($users->count())
	                                    <thead>
	                                        <tr>
	                                            <th>الاسم</th>
	                                            <th>البريد الالكتروني</th>
	                                            <th>التصنيف</th>
	                                            <th>
	                                                العمليات
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    <?php $count=0; ?>
                                    	@foreach ($users as $user)
                                    		@if ($user->role_id != 2)
	                                        <tr>
	                                            <td>{{ $user->name }}</td>
	                                            <td>{{ $user->email }}</td>
	                                            <td style="color:#89302C;">مستخدم</td>
	                                            <td>
	                                                <a href="/admin/register/users/{{$user->id}}/edit">تعديل</a> - 
	                                                <a href="/admin/register/users/{{$user->id}}/delete">حذف</a>
	                                            </td>
	                                        </tr>
	                                        <?php $count++; ?>
	                                        @endif
	                                    @endforeach
	                                @endif
	                                @if (empty($users))
	                                	<div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $count }} مستخدم </div>
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
	                                {!! $users->render() !!}
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