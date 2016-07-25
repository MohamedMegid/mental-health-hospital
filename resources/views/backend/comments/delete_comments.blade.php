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
        <a href="/admin/comments">التعليقات</a>
    </li>
    <li class="active">حذف التعليق</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        تأكيد الحذف  
                    </h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('method' => 'post')) !!}
                    {!! Form::label('التعليق') !!}: <p style="color: rgb(239, 111, 108);">{{$comments->comment}}</p><br>
                    <div class="form-group" style="float: right;">
                        {!! Form::submit('حذف', 
                          array('class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        <a href="/admin/comments" style="margin-right: 10px;font-size: 24px;">الغاء</a>
                    </div>
                </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
@stop

