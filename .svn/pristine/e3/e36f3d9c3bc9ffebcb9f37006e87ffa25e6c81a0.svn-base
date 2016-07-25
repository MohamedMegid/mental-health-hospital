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
        <a href="/admin/pgallery/list">معرض الصور</a>
    </li>
    <li class="active">اضافة البوم صور</li>
</ol>
@endsection
@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    اضافة البوم صور
                                </h4>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                {!! Form::open(array('method' => 'post', 'files'=>true, 'id'=>'fileupload')) !!}
                                        <div class="form-group">
                                          <label>اسم الالبوم</label><br>
                                          {!! Form::text('name', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('الصور') !!}
                                            <div class="photos_block">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img data-src="holder.js/100%x100%" alt="...">
                                                </div>
                                            </div>
                                            <div id="selectedFiles"></div>
                                            <div class="break_coll"><br><br><br><br><br><br><br><br></div>
                                            <input type="file" id="files" name="files[]" multiple accept="image/*" class="upload_photos" >
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('حفظ', 
                                              array('class'=>'btn btn-primary')) !!}
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
        <!-- right-side -->
    <!-- ./wrapper -->

    <!-- global js -->
    @section('script')
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
    <style>    
        img.resizeme {
            height: 100px;
            width: 150px;

        }
        .break_coll{
            display: none;
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