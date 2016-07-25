<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>لوحة تحكم | {{$corp_name->org_spec}} {{$corp_name->org_name}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- font Awesome -->
    <!-- end of global css -->
    <!--page level css -->
    <!-- global css -->
    @yield('custom-css')
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('assets/backend/vendors/font-awesome-4.2.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/styles/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{ asset('assets/backend/css/panel.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/backend/css/metisMenu.css') }}" rel="stylesheet" type="text/css"/>    
    <!-- end of global css -->    
    <!--page level css -->
    <link href="{{ asset('assets/backend/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="{{ asset('assets/backend/vendors/jvectormap/jquery-jvectormap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/modification.css') }}" />
    <!--end of page level css-->
    <?php $url = $_SERVER['REQUEST_URI']; ?>
    @if(Lang::getLocale() == 'ar')
        <link href="{{ asset('assets/backend/css/custom-rtl.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    @endif
</head>

<body class="skin-josh">
    @include('backend.regions.header')
    <div class="wrapper row-offcanvas row-offcanvas-left">
        @include('backend.regions.sidebar')
        <section class="content">
                    <!-- Right side column. Contains the navbar and content of the page -->
                <aside class="right-side">
                    @yield('content-header')
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                @endif
                                @include('backend.blocks.message')
                                @yield('content')
                            </div>
                        </div>
                    </section>
                </aside>             
        </section>
    </div>
    @yield('footer')
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="{{ asset('assets/backend/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('assets/backend/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/metisMenu.js') }}" type="text/javascript"> </script>
    <script src="{{ asset('assets/backend/vendors/holder-master/holder.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!--  todolist-->
    <script src="{{ asset('assets/backend/js/todolist.js') }}"></script>
    <!-- EASY PIE CHART JS -->
    <script src="{{ asset('assets/backend/vendors/charts/easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/charts/jquery.easypiechart.min.js') }}"></script>
    <!--for calendar-->
    <script src="{{ asset('assets/backend/vendors/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/fullcalendar/calendarcustom.min.js') }}" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="{{ asset('assets/backend/vendors/charts/jquery.flot.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/charts/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="{{ asset('assets/backend/vendors/charts/jquery.sparkline.js') }}"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="{{ asset('assets/backend/vendors/countUp/countUp.js') }}"></script>
    <!--   maps -->
    <script src="{{ asset('assets/backend/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
     <script src="{{ asset('assets/backend/vendors/jscharts/Chart.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dashboard.js') }}" type="text/javascript"></script>
    @yield('script')
    <script type="text/javascript">
    $(document).ready(function() {
        var composeHeight = $('#calendar').height() +21 - $('.adds').height();
        $('.list_of_items').slimScroll({
            color: '#A9B6BC',
            height: composeHeight + 'px',
            size: '5px'
        });
    });
    </script>
    <!-- end of page level js -->
  
</body>
</html>