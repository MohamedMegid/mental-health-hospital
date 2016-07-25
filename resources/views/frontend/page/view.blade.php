@extends('frontend.master')
@section('content')
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">{{$page->title}}</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                        <a href="/home" class="link-format">الرئيسية/</a>
                        <a href="#" class="link-format">{{$page->title}}</a>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($page))
    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="product-content-right"></div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-9">
                    <div class="product">
                        <h2 class="news_title">{{$page->title}}</h2>
                    </div>
            
                    <div class="product">
                        <p class="news_subject">{!! $page->body !!}</p>
                    </div>
                </div>
                @if ($pages->count())
                <div class="col-md-3">
                    <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>الصفحات ذات الصلة</h3>
                                    </div>
                                    <div class="info_format">
                                    @foreach($pages as $page)
                                    @if ($page->publish == 1)
                                        <div class="row" id="sidebar-des">
                                        
                                            <a href="/page/{{$page->path}}/{{$page->id}}" class="link_class" style="color:#eee;">{{$page->title}}</a>
                                        
                                        </div>
                                    @endif
                                    @endforeach
                                    </div><br>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif
@endsection
@section('custom-css')
    <style type="text/css">
        #sidebar-des{
            background-color: #2F4C85;
            margin-right: 5px;
            padding: 5px;
            margin-bottom: 5px;
        }
    </style>
@endsection
@stop