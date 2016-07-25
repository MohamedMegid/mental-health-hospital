@extends('frontend.master')
@section('content')
<div class="row">
        @foreach($errors->all() as $error)
            <p class="alert alert-danger" style="width:100%;">{!!$error!!}</p>
        @endforeach
</div>
<div class="row">
    <div class="panel panel-primary">
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">التحقق من البريد الالكتروني</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
        {!! Form::open(array('method' => 'post', 'files'=>true)) !!}
        <div class="form-group">
            {!! Form::label('code','كود التحقق:',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('code',Input::old('code'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group text-center">
            {!!Form::submit('تحقق',['class'=>'btn btn-default'])!!}
        </div>
        {!!Form::close()!!}
    </div>
</div><br>
@endsection
@section('scripts')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">

    .form-content{
        margin-right: 10px;
    }
    .heading{
        float: right;
    }
    form.form.form-horizontal{
        clear: both;
        margin-right: 25px;
        margin-bottom: 10px;
    }
    .footer-top-area, .footer-bottom-area{
        display: none;
    }
</style>
@endsection
@stop