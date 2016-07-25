@extends('frontend.master')
@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">معرض الفيديو</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                        <a href="/home" class="link-format">الرئيسية/</a> 
                        <a href="/vgallery" class="link-format">معرض الفيديو</a>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-left">    
                        @if ($albums->count())
                            @foreach($albums as $album)
                                <div class="row" style="border: medium solid gray; margin: 5px;border-width: 1px;">
                                    <h1 class="video-dir title">{{$album->name}}</h1>
                                    @foreach($videos as $video)
                                    @if ($album->id == $video->vgallery_id)
                                    <div class="row" style="background: #f0EEEE;margin: 10px;">
                                    <div class="col-md-12">
                                    <div class="col-sm-4">
                                        <div class="product-images">
                                            <div class="product-main-img">
                                                <div class="video-dir">{!!$video->link!!}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="product-inner">
                                            <h2 class="product-name">{!!$video->name!!}</h2>
                                            <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="home"> 
                                                        <h5 style="direction:rtl;">{!!$video->summary!!}</h5>
                                                    </div>
                                            </div>
                                            <div class="product-inner-category">
                                                <p>تاريخ الفيديو: <a href="#">{{$video->created_at}}</a>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="row">
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav>
                                <ul class="pagination">
                                    {!! $albums->render() !!}
                                </ul>
                            </nav>                        
                        </div>
                    </div>
                </div>
@endsection
@section('custom-css')
<style type="text/css">
iframe{
    width: 300px;
    height: 150px;
    direction: rtl;
    padding: 5px;
}
.video-dir{
    direction: rtl !important;
}
.title{
    background-color: #053A6E;
    color: #FFF;
    padding: 6px;
}
</style>
@endsection
@stop
