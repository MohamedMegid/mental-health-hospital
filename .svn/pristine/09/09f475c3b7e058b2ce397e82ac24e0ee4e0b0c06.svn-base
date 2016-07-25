@extends('backend.master')
@section('content-header')
<!-- Main content -->
<ol class="breadcrumb">
    <li>
        <a href="/admin/dashboard">
            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
            الرئيسية
        </a>
    </li>
    <li class="active">
        لوحة التحكم
    </li>
</ol>
@endsection
@section('content')

<div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 text-right">
                                            <span>الالبومات</span><br>
                                            <div style="font-size: 30px;"> {{ $valbums->count() + $palbums->count()}}</div>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">البومات الصور</small>
                                            <h4 id="myTargetElement1.1">
                                                {{$palbums->count()}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">البومات الفيديو</small>
                                            <h4 id="myTargetElement1.2">
                                                {{$valbums->count()}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>الرسائل</span><br>
                                            <div style="font-size: 30px;">{{$messages->count()}}</div>
                                        </div>
                                        <i class="livicon pull-right" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">الرسائل الجديدة</small>
                                            <h4 id="myTargetElement1.1">
                                                {{$messages->count()  - $old_messages->count()}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">الرسائل السابقة</small>
                                            <h4 id="myTargetElement1.2">
                                                {{$old_messages->count()}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>الاخبار</span><br>
                                            <div style="font-size: 30px;">{{$news->count()}}</div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <small class="stat-label">التثقيفية</small>
                                            <h4 id="myTargetElement3.1">
                                            {{$edu->count()}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-4">
                                            <small class="stat-label">العامة</small>
                                            <h4 id="myTargetElement3.1">
                                            {{$news->count() - ($edu->count() + $ach->count())}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-4 text-right">
                                            <small class="stat-label">الانجازات</small>
                                            <h4 id="myTargetElement3.2">
                                                {{$ach->count()}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>عدد المستخدمين</span><br>
                                            <div style="font-size: 30px;">{{$users->count()}}</div>
                                        </div>
                                        <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">اعضاء عاملة</small>
                                            <h4 id="myTargetElement1.1">
                                                {{$workers_users->count()}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">مستخدم</small>
                                            <h4 id="myTargetElement1.2">
                                                {{$users->count() - $workers_users->count()}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="row">
        <div class="col-md-12">
                        <div class="panel panel-primary todolist">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white" data-l="true"></i>
                                    اخر الاخبار
                                </h4>
                            </div>
                            <div class="panel-body nopadmar">
                            <div class="todolist_list showactions">
                                        <div class="col-md-7" style="padding-right:10px;">
                                            <div class="todotext todoitem">الاخبار</div>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="color:#EF6F6C;">عدد التعليقات</span>
                                        </div>
                             </div>
                            @foreach ($last_ten_news as $item)
                                    <div class="todolist_list showactions">
                                        <div class="col-md-7" style="padding-right:10px;">
                                            <a href="/admin/comments/{{$item->id}}"><div class="todotext todoitem">{{$item->title}}</div></a>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="color:#EF6F6C;">{{$item->comments->count()}}</span>
                                        </div>
                                    </div>
                            @endforeach
                            
                            </div>
                        </div>
                        <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $comments->count() }} تعليق - إجمالي : {{ $comments->count() - $old_comments->count() }} تعليق جديد</div>
                    </div>
        </div>
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/backend/css/only_dashboard.css') }}" />
<style type="text/css">
    .todoitem {
        float: right !important;
    }
</style>
@endsection
@stop
