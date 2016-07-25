<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href=" {{asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="{{asset('assets/backend/css/pages/login2.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/backend/vendors/iCheck/skins/minimal/blue.css') }}" rel="stylesheet" />
    <!-- styles of the page ends-->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">الدخول</h3>
                    </div>
                    <div class="panel-body">
                        {!!Form::open(['url'=>'admin/auth/login','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
                                    <div class="form-group" style="margin-top: -63px;">
                                        {!! Form::label('البريد الالكتروني','البريد الالكتروني') !!}
                                            {!! Form::text('email',Input::old('email'),['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                    {!! Form::label('كلمة السر','كلمة السر') !!}
                                            {!! Form::password('password',['class'=>'form-control']) !!}
                                    </div>
                                    <div class="text-center">
                                        {!!Form::submit('دخول',['class'=>'btn btn-default'])!!}
                                        @if (!($user->count()))
                                            <a href="/auth/register">تسجيل</a>
                                        @endif
                                    </div>
                                    {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{asset('assets/backend/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/backend/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{asset('assets/backend/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/backend/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js-->
    <script src="{{asset('assets/backend/js/TweenLite.min.js') }}"></script>
    <script src="{{asset('assets/backend/vendors/iCheck/icheck.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).mousemove(function(event) {
            TweenLite.to($('body'), .5, {css:{'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"}});
        });

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].minimal-blue').iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });
    });
    </script>
    <style type="text/css">
        label{
            padding: 10px;
            float: right;
        }
        .form-control{
            margin-left: 46px;
            width: 85%;
        }
        .btn{
            float: right;
        }
    </style>
    <!-- end of page level js-->
</body>
</html>
