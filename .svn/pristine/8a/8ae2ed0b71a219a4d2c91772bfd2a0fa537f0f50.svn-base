@extends('frontend.master')
@section('content')
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">الاخبار</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                        <a href="/home" class="link-format">الرئيسية/</a>  
                        <a href="/news" class="link-format">قائمة الاخبار</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="background-color:#f0EEEE;">
                    <div class="product-content-left">    
                        @if ($news->count())
                            @foreach($news as $view)
                                <div class="row" style="border: medium solid gray; margin: 5px;border-width: 1px;">
                                    <div class="col-sm-4">
                                        <div class="product-images">
                                            <div class="product-main-img">
                                                <img src="/img/uploaded/{{$view->basic_photo}}" style="margin-top: 15px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="product-inner">
                                            <h2 class="product-name">{{$view->title}}</h2>
                                            <div class="product-inner-category">
                                                <p><a href="#">{{$view->created_at}}</a>.</p>
                                            </div>
                                            <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                        <h5 style="direction:rtl;">{{$view->summary}}</h5>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="product-inner">
                                            <div class="product-inner-price">
                                                <ins></ins> <del></del>
                                            </div>
                                            <div class="product-inner-price" style="margin-top: 150px;">
                                                <a href="/news/{{$view->id}}" style="padding:5px;background-color:#053A6E;color:#eee;">تفاصيل الخبر</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    @include('frontend.blocks.leftsidebar')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                            <ul class="pagination">
                                {!! $news->render() !!}
                            </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<!-- it works the same with all jquery version from 1.x to 2.x -->
<script src="jssor.slider.mini.js"></script>
<script>
    jQuery(document).ready(function ($) {
        var options = { $AutoPlay: true };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
</script>
<style type="text/css">
    .align-format{
        text-align: center !important;
    }
</style>
@endsection
@stop