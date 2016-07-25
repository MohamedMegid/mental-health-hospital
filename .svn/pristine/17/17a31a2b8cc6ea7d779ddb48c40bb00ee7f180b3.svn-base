@extends('backend.master')
@section('content-header')
<!-- Main content -->
<ol class="breadcrumb">
    <li>
        <a href="#">
            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
            الرئيسية
        </a>
    </li>
    <li>
        <a href="#">الاستشارات المطلوبة</a>
    </li>
    <li class="active">اضافة النص التعريفي</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    اضافة النص التعريفي
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            @if ($med->count())
                                <h3 class="panel-body">تم اضافة محتوى هذه الصفحة من قبل, للتعديل <a href="/admin/med-consulting/info/edit">صفحة التعديل</a></h3>
                            @else
                                <div class="panel-body">
                                    {!! Form::open(array('method' => 'post')) !!}
                                        <div class="form-group">
                                          <label>العنوان</label><br>
                                          {!! Form::text('title', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('النص') !!}
                                            {!! Form::textarea('subject', null, 
                                                array('class'=>'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('حفظ', 
                                              array('class'=>'btn btn-primary')) !!}
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            @endif
        </div>
    </div>
</div>

@endsection
@stop