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
        <a href="/admin/contact-us/contacts">تواصل معنا</a>
    </li>
    <li class="active">تعديل معلومات التواصل</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    تعديل معلومات التواصل
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            @if (empty($contact))
                                <h3 class="panel-body">يجب اضافة معلومات التواصل اولا للقيام بعملية التعديل, للاضافة <a href="/admin/contact-us/cont-info">صفحة الاضافة</a></h3>
                            @else
                                <div class="panel-body">
                                    {!! Form::model($contact, [$contact->id, 'method' => 'POST']) !!}
                                        <div class="form-group">
                                          <label>العنوان</label><br>
                                          {!! Form::text('title', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>

                                        <div class="form-group">
                                          <label>البريد الالكتروني</label><br>
                                          {!! Form::email('mail', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('ارقام الهواتف') !!}
                                            <div id="main">
                                                @if ($phones->count())
                                                    @foreach ($phones as $phone)
                                                        <input type='text' value="{{$phone->phone}}" name="phone{{ $phone->counter }}" class="form-control"/><br>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <input type="button" id="abc" value="Add more" />
                                            <input type='text' name='counter' id="counter" value="{{$phones->count()}}" />
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('تعديل ', 
                                              array('class'=>'btn btn-primary')) !!}
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    var count = $('#counter').val();
    var i = ++count;
    $("#abc").click(function() {
        var input = "<input type='text' name='phone"+i+"' class='form-control'/><br>";
        $("#main").append(input);
        i++;
    });
    $("#abc").click(function() {
        var counter = document.getElementById('main').getElementsByTagName('input').length;
        $('#counter').val(counter);
    });
    $('#counter').hide();
</script>
@endsection
@stop