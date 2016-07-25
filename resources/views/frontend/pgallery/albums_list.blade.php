
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
                        <a href="/home" class="link-format">الرئيسية/</a> 
                        <a href="/pgallery" class="link-format">معرض الصور</a>
                </div>
            </div>
        </div>
    </div>
    @if ($albums->count())
    <div class="single-product-area">
        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="section-title">{{$page_title}}</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            
              @include('frontend.pgallery.albums_list_temp')
            
          </div>
          <div class="col-md-2">
            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>الالبومات</h3>
                                </div>
                                <div class="info_format">
                                  @foreach($albums as $album)

                                  <div class="row" id="sidebar-des">
                                    <div class="col-md-12">
                                      <a href="/pgallery/{{$album->id}}" style="color:#eee;">{{$album->name}}</a>
                                    
                                    </div>
                                  </div>
                                  @endforeach
                                </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    @endif
@endsection
@section('custom-css')
  <style type="text/css">
  div.jgallery-thumbnails.jgallery-thumbnails-bottom.jgallery-thumbnails-horizontal.images.loaded{
    background-color: black !important;
  }
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
