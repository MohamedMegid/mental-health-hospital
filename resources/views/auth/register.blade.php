@extends('frontend.master')
@section('content')
<div class="row">
        @foreach($errors->all() as $error)
            <p class="alert alert-danger" style="width:100%;">{!!$error!!}</p>
        @endforeach
</div>
<div class="row">
    <div class="form-content">
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">التسجيل في الموقع</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
        {!!Form::open(['url'=>'/auth/register','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
        <div class="form-group">
            {!! Form::label('name','الاسم:',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('name',Input::old('name'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email','البريد الالكتروني:',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('email',Input::old('email'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password','كلمة السر:',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation','تأكيد كلمة السر:',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="text-center">
            {!!Form::submit('تسجيل',['class'=>'btn btn-default'])!!}
        </div>
        {!!Form::close()!!}
        <br>
    </div>
</div>
@endsection
@section('scripts')
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style type="text/css">
    p.alert.alert-danger{
        direction: rtl;
    }
    .heading{
        float: right;
    }
    form.form.form-horizontal{
        clear: both;
        margin-right: 25px;
        margin-bottom: 10px;
    }
    .form-content{
        margin-right: 10px;
    }
    .footer-top-area, .footer-bottom-area{
        display: none;
    }
</style>
@endsection
@stop