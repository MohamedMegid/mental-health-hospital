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
        <a href="/admin/friendly-sites/list">قائمة المواقع الصديقة</a>
    </li>
    <li class="active">اضافة المواقع الصديقة</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    اضافة المواقع الصديقة
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                <div class="panel-body">
                    {!! Form::open(array('method' => 'post', 'files'=>true)) !!}
                        <div class="form-group">
                          <label for="الاسم" style="">العنوان</label><br>
                          {!! Form::text('title', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>

                        <div class="form-group">
                          <label for="الاسم" style="">الرابط</label><br>
                          {!! Form::text('link', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('حفظ', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>

@endsection
@stop
