@extends('backend.master')
@section('content-header')
<!-- Main content -->
<ol class="breadcrumb">
    <li>
        <a href="/admin/dashboard">
            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
            {{$page_name}}
        </a>
    </li>
    <li class="active">تعديل {{$page_name}}</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    تعديل {{$page_name}}
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            @if (empty($specialpages))
                                <h3 class="panel-body">اضف محتوى الصفحة اولا لتقوم بعملية التعديل</h3>
                            @else
                <div class="panel-body">
                    {!! Form::model($specialpages, [$record_id, 'files' => true, 'method' => 'POST']) !!}
                        <?php
                            $url = $_SERVER['REQUEST_URI'];
                            $edit_link = $url . "/edit";
                            $explode = explode('/', $url);
                            $page_id = $explode[3];
                        ?>
                        @if ($page_id == 1 || $page_id == 4)
                            <div class="form-group">
                              <label for="الاسم" style="">عنوان الصفحة</label><br>
                              {!! Form::text('page_title', null, 
                                  array('class'=>'form-control', 'style'=>'width:100%')) !!}
                            </div>
                            @if ($page_id == 1)
                                <p class="text-muted">مثال: كلمة مدير المؤسسة.</p>
                            @endif
                            @if ($page_id == 4)
                                <p class="text-muted">مثال: حقوق المستفيد من الخدمة المقدمة.</p>
                            @endif
                        @endif
                        <div class="form-group">
                          <label for="الاسم" style="">العنوان</label><br>
                          {!! Form::text('title', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>
                        <div class="form-group">
                            <textarea id="subject" cols="80">{{ $specialpages->subject }}</textarea>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('تعديل', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                @endif
        </div>
    </div>
</div>
@endsection
@section('footer')
    <!-- global js -->
    <script src="{{ asset('assets/backend/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}" type="text/javascript"></script>
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
    <script src="{{ asset('assets/backend/vendors/ckeditor-4/ckeditor.js') }}"></script>

    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'subject' );
            </script>
    <style>    
        img.resizeme {
            height: 100px;
            width: 150px;

        }
        .break_coll{
            display: none;
        }
        #cke_subject{
            min-width: 100%;
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

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.photos_block').hide();
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
        }
    </script>
@endsection
@stop