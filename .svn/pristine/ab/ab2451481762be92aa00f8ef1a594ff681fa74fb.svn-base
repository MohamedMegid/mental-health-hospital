@extends('frontend.master')
@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">تفاصيل الخبر</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                    <a href="/home" class="link-format">الرئيسية/</a>  
                    <a href="/news" class="link-format">قائمة الاخبار/</a> 
                    <a href="#" class="link-format">تفاصيل الخبر</a>
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
                    <div class="product-content-right">
                </div>
            </div> 
            <div class="row">
                <div class="col-md-9">
                    @if ($news->count())
                    @foreach ($news as $view)
                    <div class="product-images">
                        <div class="product-main-img">
                            <img src="/img/uploaded/{{$view->basic_photo}}" alt="" style="width: 100%;height: 200px;">
                        </div>
                        
                        <div class="product-gallery">
                        @foreach ($view->news as $image)
                            <img src="/img/uploaded/images/{{$image->images}}" alt="">
                        @endforeach
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-9" style="clear: both;">
                            <div class="product">
                                <h2 class="news_title">{{$view->title}}</h2>
                            </div>
                    
                            <div class="product">
                                <p class="news_subject">{!! $view->subject!!}</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="detailBox" style="background-color: #E6E6E6;">
                                        <div class="titleBox">
                                          <label style="padding-top:15px;">صندوق التعليقات</label>
                                        </div>
                                        <div class="actionBox" style="clear:both;">
                                        @foreach ($view->comments as $comment)
                                        @if ($comment->status == 1)
                                            <ul class="commentList">
                                                <li>
                                                    <div class="commentText">
                                                        <p style="font-size:15px;color:black;">{{$comment->comment}}</p> <span class="date sub-text">{{$comment->created_at}}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-body" style="border: 1.5px dotted gray;"> 
                                    {!! Form::open(array('method' => 'post')) !!}
                                        <div class="form-group">
                                            <label for="الاسم" style="">تعليق</label><br>
                                            {!! Form::text('comment', null, 
                                                array('class'=>'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="نشر" class="btn btn-primary">
                                        </div>
                                    {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="background-color: #E6E6E6;">
                            <div class="news_details" style="padding:5px;"> 
                                <div class="product-inner-price">
                                    <ins>تاريخ الخبر</ins>{{$view->created_at}}<br>
                                    <ins>عدد القراءة</ins> {{$view->visits}}<br>
                                    <ins>عدد المشاركة</ins> {{$view->visits + $comments_count->count()}}<br>
                                    <ins>عدد التعليقات</ins> {{$comments_count->count()}}<br>
                                    <ins>نشر الخبر</ins><br>
                                    <div id="social-icons">
                                    <table>
                                    <tr>

                                        <?php $url = $_SERVER['REQUEST_URI']; ?>
                                        <td>
                                        <div id="fb-root"></div>
                                        <div class="fb-share-button" data-href="http://corp.innocastle.com/{{$url}}" data-layout="button_count"  style="margin-left: 10px;margin-top: 6px;"></div>
                                        </td>
                                        <td>
                                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="">Tweet</a>
                                        </td>
                                    </tr>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    @include('frontend.blocks.leftsidebar')
                </div>
            </div>
            @endforeach
            @endif 

        </div>
    </div>
    </div>
@endsection
@section('custom-css')
<style type="text/css">
<link rel="stylesheet" href="netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

.detailBox {
    width:320px;
    border:1px solid #bbb;
    margin:50px;
}
.titleBox {
    background-color:#f5f5f5;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}
    .align-format{
        text-align: center !important;
    }
</style>
@endsection
@section('scripts')
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

@endsection
@stop