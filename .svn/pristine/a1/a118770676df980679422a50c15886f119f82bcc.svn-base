
@extends('frontend.master')
@section('content')
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">معرض الصور</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                        <a href="/home" class="link-format">الرئيسية</a> / 
                        <a href="/pgallery" class="link-format">معرض الصور</a>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="container">
            @if ($albums->count())
            <div class="row" style="color: #fff; background: #AB413F;">
                <div style="padding: 40px 0; width: 960px; margin: 0 auto; height: auto;">
                    <div id="gallery">
                            @foreach ($albums as $album)
                              <div class="album" data-jgallery-album-title={{$album->name}}>
                                 <h1>{{ $album->name }}</h1>
                                 @foreach($images as $image)
                                   @if ($image->pgallery_id == $album->id)
                                   <a href="/img/uploaded/pgallery/{{$image->images}}"><img src="/img/uploaded/pgallery/{{$image->images}}"  data-jgallery-bg-color="#3e3e3e" data-jgallery-text-color="#fff" /></a>
                                   @endif
                                 @endforeach
                              </div>
                           @endforeach
                       </div>
                </div>
            </div>
            @endif
      </div>
    </div>
@endsection
@section('custom-css')
  <style type="text/css">
  div.jgallery-thumbnails.jgallery-thumbnails-bottom.jgallery-thumbnails-horizontal.images.loaded{
    background-color: black !important;
  }
  </style>
@endsection
@stop
