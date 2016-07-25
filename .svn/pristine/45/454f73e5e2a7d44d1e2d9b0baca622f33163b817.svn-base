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
        <a href="/admin/vgallery/list">معرض الفيديوهات</a>
    </li>
    <li class="active">حذف الالبوم</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        تأكيد حذف
                        <?php 
                            $url = $_SERVER['REQUEST_URI'];
                            $tokens = explode('/', $url);
                            if (!empty($tokens[5])){
                                $view_id = $tokens[5];
                                $explode = explode('-', $view_id);
                            }
                        ?>
                        @if (!empty($explode[1]))
                            الالبومات المحددة سابقا
                        @else
                           الالبوم {{$albums->name}}
                        @endif
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <p style="color:#FF6347;">تحذير: لاتمام عملية حذف الالبوم, سوف يتم حذف جميع الفيديوهات المتربطة به</p>
                    {!! Form::open(array('method' => 'post')) !!}
                    <div class="form-group" style="float: right;">
                        {!! Form::submit('حذف', 
                          array('class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        <a href="/admin/vgallery/list" style="margin-right: 10px;font-size: 24px;">الغاء</a>
                    </div>
                </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
@stop

