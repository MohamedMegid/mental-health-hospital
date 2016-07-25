
@extends('frontend.master')
@section('content')
@if (!empty($first_banner))
<div class="row" style="width: 100%;">
<div class="col-md-12" style="width: 100%;">
<div class="site-branding-area" style="height: 400px;">
      
    <div class="slider-area">
        
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
            <div class="item active" style="width:100%;height: 400px;">
                    <div class="single-slide">
                        <div class="slide-bg slide-one">
                         <a href="{{$first_banner->link}}"><img class="slider-format" src="/img/uploaded/banner/{{$first_banner->basic_photo}}" alt="{{$first_banner->title}}"></a>
                        </div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!empty($second_banner))
                <div class="item" style="width:100%;height: 400px;">
                    <div class="single-slide">
                        <div class="slide-bg slide-two">
                            <a href="{{$second_banner->link}}"><img class="slider-format" src="/img/uploaded/banner/{{ $second_banner->basic_photo }}" alt="{{$second_banner->title}}"></a>
                        </div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2></h2>
                                            </div>
                                        </div>
                                    </div>/
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($third_banner))
                <div class="item" style="width:100%;height: 400px;">
                    <div class="single-slide">
                        <div class="slide-bg slide-three">
                            <a href="{{$third_banner->link}}"><img class="slider-format" src="/img/uploaded/banner/{{ $third_banner->basic_photo }}" alt="{{$third_banner->title}}"></a>
                        </div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2></h2>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>        
    </div> <!-- End slider area -->
</div>
</div>
</div>
@endif
<br>
<div class="maincontent-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                <div class="row" style="background-color:#f0EEEE;">
                <div class="col-md-12">
                <br>
                    @if (!empty($last_news))
                    <div class="row">
                        <div class="col-md-12">
                        <h2 class="section-title">اخر الاخبار</h2>
                        <h2><a href="/news/{{$last_news->id}}">{{$last_news->title}}</a></h2>
                        <h5 style="float:right;">{{$last_news->created_at}}</h5>
                        <a href="news/{{$last_news->id}}"><img src="/img/uploaded/{{$last_news->basic_photo}}" style="height:200px;width:100%"></a>
                        <br>
                        <p class="format-rtl" style="margin-top:5px;">{!!$last_news->subject!!}</p>
                        <br>
                        </div>
                    </div>
                        
                    @endif
                    @if ($mylatest_news->count())
                    <div class="row">
                    <div class="col-md-12">
                    <div class="latest-product">
                        <div class="product-carousel">
                        
                        @foreach ($mylatest_news as $view)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="/img/uploaded/{{$view->basic_photo}}" alt="" style="height: 111px;">
                                    <div class="product-hover">
                                        <a href="/news/{{$view->id}}" class="view-details-link"><i class="fa fa-link"></i> مشاهدة التفاصيل</a>
                                    </div>
                                </div>
                                <?php
                                $limit = 55;
                                $summary = $view->title;
                                    if (strlen($summary) > $limit)
                                      $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '...';
                                ?>
                                <h2><a href="/news/{{$view->id}}">{{$summary}}</a></h2>
                                <?php
                                $limit = 55;
                                $summary = $view->summary;
                                    if (strlen($summary) > $limit)
                                      $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '...';
                                ?>
                                <div class="product-carousel-price">
                                    <p>{{$summary}}</p>
                                </div> 
                            </div>
                        @endforeach
                        
                        </div>
                    </div>
                    </div>
                    </div>
                    <p><a href="/news">المزيد من الاخبار</a></p>
                    </div>
                    </div>
                    @endif

                    <br><br>

                    @if ($last_photo->count())
                    <div class="row" style="background-color:#f0EEEE;">
                    <div class="col-md-12">
                    <br>
                    <h2 class="section-title">اخر الصور</h2>
                    <p>
                    @foreach ($last_photo as $item)
                        <img class="image" src="/img/uploaded/pgallery/{{$item->images}}" style="width:18%;height:150px;margin-right: 15px;float:right;">
                    @endforeach
                    </p>
                    <p><a href="/pgallery">المزيد من الصور</a></p>
                    </div>
                    </div>
                    @endif
                    
                    <br><br>

                    @if ($news->count())
                    <div class="latest-product">

                    <div class="row" style="background-color:#f0EEEE;">
                    <div class="col-md-12">
                        <h2 class="section-title">الاخبار الهامة</h2>
                        <div class="product-carousel">
                        @foreach ($news as $view)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="/img/uploaded/{{$view->basic_photo}}" alt="" style="height: 111px;">
                                    <div class="product-hover">
                                        <a href="/news/{{$view->id}}" class="view-details-link"><i class="fa fa-link"></i> مشاهدة التفاصيل</a>
                                    </div>
                                </div>
                                <?php
                                $limit = 55;
                                $summary = $view->title;
                                    if (strlen($summary) > $limit)
                                      $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '...';
                                ?>
                                <h2><a href="/news/{{$view->id}}">{{$summary}}</a></h2>
                                <?php
                                $limit = 55;
                                $summary = $view->summary;
                                    if (strlen($summary) > $limit)
                                      $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '...';
                                ?>
                                <div class="product-carousel-price">
                                    <p>{{$summary}}</p>
                                </div> 
                            </div>
                        @endforeach
                        </div>
                    </div>
                    </div>
                    </div>
                    @endif

                </div>
                <div class="col-md-3">
                <div class="row">
                <div class="panel-heading">
                                    <h3 class="panel-title" style="color:#eee;"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i></h3>
                                </div>
                @include('frontend.blocks.leftsidebar_banners')
                </div>
                
                @if ($last_video->count())
                <div class="row" style="background-color:#F0EEEE;">
                 <div class="">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="color:#eee;"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>اخر الفيديوهات</h3>
                                </div>
                    @foreach ($last_video as $item)
                    <div style="padding:5px;">
                        <div style="margin-left:31px;"> {!!$item->link!!}</div>
                        <?php
                                $limit = 100;
                                $summary = $item->name;
                                    if (strlen($summary) > $limit)
                                      $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '...';
                                ?>
                        <h5 style="direction:rtl;">{{$summary}}</h5>
                    </div>
                    @endforeach
                    <a href="/vgallery" style="float:right;padding:5px;">لمشاهدة المزيد من الفيديوهات</a>
                </div>
                </div>
                @endif
       
                <div class="row">
                @if ($sites->count())
                <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>المواقع الصديقة</h3>
                                </div>
                    <div style="padding:5px;">
                        @foreach($sites as $view)
                        <p>
                                <a href="{{$view->link}}" style="float:right;font-size: 20px;">{{$view->title}}</a>
                           </p><br>
                            
                        @endforeach
                        <br><br>
                    </div>
                </div>
                @endif
                </div>
                </div>
            </div>
        </div>
</div>

    @endsection
    @section('custom-css')
        <style type="text/css">
            .slider-format{
                height: 100%;
                left: 0px;
                position: absolute;
                top: 0px;
                width: 100%;
                background-position: center center;
                background-size: cover;
            }
            .border-format{
                border: solid;
                margin: 5px;
                padding: 5px;
            }
            div.product-carousel.owl-carousel.owl-theme.owl-responsive-1000.owl-loaded{
                float: left;
            }
            iframe{
                width: 200px;
                height: 150px;
                float: left;
                margin-left: 10px;
            }
            .paragraph-format{
                font-size: 20px;
                margin-top: -7px;
            }
            html, body {
    max-width: 100%;
    overflow-x: hidden;
}
</style>
    @endsection
    @stop
