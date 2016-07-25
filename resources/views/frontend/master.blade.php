<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="عرض الاخبار, الانجازات و الاخبار التثقيفية بالصور مع الاستشارات المطلوبة">
    <meta name="keywords" content="{{$content->org_spec}}, {{$content->org_name}}, {{$content->org_spec}} {{$content->org_name}}">
    <meta name="author" content="INNOFLAME INFORMATION TECHNOLOGY">
    <title>{{$content->org_spec}} {{$content->org_name}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="/img/uploaded/logo/{{$content->basic_photo}}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    @yield('custom-css')
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    @if(Lang::getLocale() == 'ar') 
        <link href="{{ asset('assets/frontend/css/custom-rtl.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
        <link href="{{ asset('assets/frontend/css/custom-rtl.css') }}" rel="stylesheet" />
    @endif
    <link rel="stylesheet" href="{{ asset('assets\frontend\menu\styles.css') }}">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @include('frontend.regions.header')
    @include('frontend.blocks.message')
    @yield('content')
    @include('frontend.regions.footer')
    @yield('scripts')
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.sticky.js') }}"></script>
    
    <!-- jQuery easing -->
    <script src="{{ asset('assets/frontend/js/jquery.easing.1.3.min.js') }}"></script>
    
    <!-- Main Script -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <?php $url = $_SERVER['REQUEST_URI']; ?>
    @if ($url = "pgallery")
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/frontend/pgallery/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/frontend/pgallery/css/jgallery.min.css') }}" />
        <script type="text/javascript">
        <script type="text/javascript" src="{{asset('assets/frontend/pgallery/js/jquery-2.0.3.min.js') }}"></script>
        <script type="text/javascript" src="{{asset('assets/frontend/pgallery/js/tinycolor-0.9.16.min.js') }}"></script>
        <script type="text/javascript" src="{{asset('assets/frontend/pgallery/js/jgallery.min.js') }}"></script>
        <script type="text/javascript">
        $( function() {
            $( '#gallery' ).jGallery( {
                'mode': 'standard'
            } );
        } );
        </script>
    @endif
  </body>
</html>