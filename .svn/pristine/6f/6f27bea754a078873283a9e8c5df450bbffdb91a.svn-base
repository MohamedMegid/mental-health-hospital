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
        <a href="/admin/pages">قائمة الصفحات</a>
    </li>
    <li class="active">تعديل بيانات الصفحات</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    تعديل بيانات الصفحات  {{$page->title}}
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                <div class="panel-body">
                    {!! Form::model($page, [$page->id, 'files' => true, 'method' => 'POST']) !!}
                        <div class="form-group">
                          <label for="الاسم" style="">اسم الصفحة في القائمة</label><br>
                          {!! Form::text('name', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>
                        <div class="form-group">
                          <label for="الاسم" style="">العنوان</label><br>
                          {!! Form::text('title', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>

                        <div class="form-group">
                          <label for="الاسم" style="">الموضوع</label><br>
                          {!! Form::textarea('body', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>
                        
                        <div class="form-group">
                        @if ($page->publish == 1)
                          <input type="checkbox" name="publish" value="1" checked> نشر الصفحة<br>
                        @else
                          <input type="checkbox" name="publish" value="1"> نشر الصفحة<br>
                        @endif
                        </div>
                        <div class="form-group">
                            {!! Form::submit('تعديل', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <script src="{{ asset('assets/backend/vendors/ckeditor-4/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'body' );
    </script>
@endsection
@stop