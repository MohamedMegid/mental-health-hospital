@extends('frontend.master')
@section('content')

        <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">{{$specialpages->page_title}}</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                        <a href="/home" class="link-format">الرئيسية/</a>
                        <a href="/news" class="link-format">{{$specialpages->page_title}}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="product-content-right"></div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-8">
                    <div class="product">
                        <h2 class="news_title">{{$specialpages->title}}</h2>
                    </div>
            
                    <div class="product">
                        <p class="news_subject">{!!$specialpages->subject!!}</p>
                    </div>
                </div>

                <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>الصفحات ذات الصلة</h3>
                                </div>
                                <div class="info_format">
                                    @if ($page_id != 1)
                                    <div class="row" id="sidebar-des">
                                        <a href="/specialpages/1" class="" style="color:#eee;">كلمة المدير</a>
                                    </div>
                                    @endif
                                    @if ($page_id != 2)   
                                    <div class="row" id="sidebar-des"> 
                                        <a href="/specialpages/2" class="" style="color:#eee;">الرسالة و الرؤية</a>
                                    </div>
                                    @endif
                                    @if ($page_id != 3)
                                    <div class="row" id="sidebar-des">
                                        <a href="/specialpages/3" class="" style="color:#eee;">الهيكل التنظيمي</a>
                                    </div>
                                    @endif
                                    @if ($page_id != 4)
                                    <div class="row" id="sidebar-des">
                                        <a href="/specialpages/4" class="" style="color:#eee;">حقوق المستخدمين</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-css')
    <style type="text/css">
        #sidebar-des{
            background-color: #2F4C85;
            margin-right: 5px;
            padding: 5px;
            margin-bottom: 5px;
            text-align: center;
        }
    </style>
@endsection
@stop