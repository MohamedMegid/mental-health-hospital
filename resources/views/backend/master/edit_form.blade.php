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
        <a href="/admin/edit/master">المحتويات الاساسية للموقع</a>
    </li>
    <li class="active">تعديل البيانات الاساسية للموقع</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    تعديل البيانات
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                {!! Form::model($content, [$content->id, 'files' => true, 'method' => 'POST']) !!}
                                        <div class="form-group">
                                          <label>تصنيف المؤسسة في كلمة</label><br>
                                          {!! Form::text('org_spec', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                              <label style="font-size: 11px;color: blue;">مثال: مستشفى, مدرسة, .. .</label><br>
                                        </div>
                                        <div class="form-group">
                                          <label>اسم المؤسسة</label><br>
                                          {!! Form::text('org_name', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('اللوجو') !!}
                                            <br>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="/img/uploaded/logo/{{ $content->basic_photo }}" alt="..." style="height:100%"></div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">اختر صورة</span>
                                                        <span class="fileinput-exists">تغيير</span>
                                                        <input type="file" id="basic_photo" name="basic_photo"  class="upload_photos" value="\img\uploaded\logo\{{$content->basic_photo}}"></span>
                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('صورة جانبية') !!}
                                            <br>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="/img/uploaded/logo/{{ $content->photo }}" alt="..." style="height:100%"></div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">اختر صورة</span>
                                                        <span class="fileinput-exists">تغيير</span>
                                                        <input type="file" id="photo" name="photo"  class="upload_photos" value="\img\uploaded\logo\{{$content->photo}}"></span>
                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <label>تغيير محتويات اخر الصفحات (footer)</label><br>
                                        <div class="form-group">
                                          <label>عنوان المجموعة الاولى</label><br>
                                          {!! Form::text('title1', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                          {!! Form::label('محتوى المجموعة الاولى') !!}
                                          {!! Form::textarea('subject1', null, 
                                              array('class'=>'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                          <label>عنوان المجموعة الثانية</label><br>
                                          {!! Form::text('title2', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                          {!! Form::label('محتوى المجموعة الثانية') !!}
                                          {!! Form::textarea('subject2', null, 
                                              array('class'=>'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                          <label>عنوان المجموعة الثالثة</label><br>
                                          {!! Form::text('title3', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                          {!! Form::label('محتوى المجموعة الثالثة') !!}
                                          {!! Form::textarea('subject3', null, 
                                              array('class'=>'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                          <label>عنوان المجموعة الرابعة</label><br>
                                          {!! Form::text('title4', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                          {!! Form::label('محتوى المجموعة الرابعة') !!}
                                          {!! Form::textarea('subject4', null, 
                                              array('class'=>'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!!Form::submit('تعديل',['class'=>'btn btn-default'])!!}
                                        </div>
                                {!!Form::close()!!}
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
        CKEDITOR.replace( 'subject1' );
        CKEDITOR.replace( 'subject2' );
        CKEDITOR.replace( 'subject3' );
        CKEDITOR.replace( 'subject4' );
    </script>
    <script src="{{ asset('assets/backend/vendors/ckeditor-4/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'subject' );
    </script>
    <!-- global js -->
    <script src="{{ asset('assets/backend/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('assets/backend/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/metisMenu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/holder-master/holder.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script src="{{ asset('assets/backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <style>    
        img.resizeme {
            height: 100px;
            width: 150px;

        }
        .break_coll{
            display: none;
        }
        button.btn.btn-primary.delete_photo_ajax{
            margin-top: -250px;
            margin-right: 10px;
        }
        .photos_block{
            float: right;
        }
        .upload_photos{
            clear: both;
        }
    </style>
    <script>

        var selDiv = "";
            
        document.addEventListener("DOMContentLoaded", init, false);
        
        function init() {
            document.querySelector('#files').addEventListener('change', handleFileSelect, false);
            selDiv = document.querySelector("#selectedFiles");
        }
            
        function handleFileSelect(e) {
            
            if(!e.target.files || !window.FileReader) return;

            selDiv.innerHTML = "";
            var i = 0;
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            filesArr.forEach(function(f) {
                var f = files[i];
                if(!f.type.match("image.*")) {
                    return;
                }
                var html = "<div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 200px; max-height: 150px;float:right;'><img class='resizeme' src=\"" + e.target.result + "\">" + f.name + "<br clear=\"left\"/></div>";
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.break_coll').show();
                    var html = "<div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 200px; max-height: 150px;float:right;'><img class='resizeme' src=\"" + e.target.result + "\">" + f.name + "<br clear=\"left\"/></div>";
                
                    selDiv.innerHTML += html;
                }
                reader.readAsDataURL(f); 
                i++;
            });
            
        }
    </script>
    <script type="text/javascript">
            //get the input and UL list
        var input = document.getElementById('filesToUpload');
        var list = document.getElementById('fileList');

        //empty list for now...
        while (list.hasChildNodes()) {
            list.removeChild(ul.firstChild);
        }

        //for every file...
        for (var x = 0; x < input.files.length; x++) {
            //add to list
            var li = document.createElement('li');
            li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
            list.append(li);
        }https://www.google.com.eg/webhp?authuser=2
    </script>
@endsection
@stop