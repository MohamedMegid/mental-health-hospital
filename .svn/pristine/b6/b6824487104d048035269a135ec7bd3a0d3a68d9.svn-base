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
    <li>
        <a href="/admin/vgallery/list">معرض الفيديوهات</a>
    </li>
    <li>
        <a href="/admin/vgallery/{{$videos->vgallery_id}}/edit">الالبوم</a>
    </li>
    <li class="active">تعديل الفيديو</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    تعديل الفيديو {{$videos->title}}
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                <div class="panel-body">
                    {!! Form::model($videos, [$videos->id, 'files' => true, 'method' => 'POST']) !!}
                        <div class="form-group">
                          <label>الاسم</label><br>
                          {!! Form::text('name', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>

                        <div class="form-group">
                          <label>رابط الفيديو من اليوتيوب</label><br>
                          {!! Form::text('link', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>

                        <div class="form-group">
                          <label>نبذة مختصرة</label><br>
                          {!! Form::textarea('summary', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>

                        <div class="form-group">
                          <label>الالبوم التابع له</label><br>
                            <select class="form-control" name="vgallery_id">
                            	@foreach($albums as $album)
                                	<option value={{$album->id}}  <?php if ($album->id == $videos->vgallery_id){ print " selected";} ?> >{{$album->name}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group" style="clear:both;">
                            {!! Form::submit('تعديل', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
@endsection
@stop