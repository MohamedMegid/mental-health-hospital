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
    <li class="active">تعديل الالبوم</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    تعديل الالبوم {{$albums->title}}
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                <div class="panel-body">
                    {!! Form::model($albums, [$albums->id, 'files' => true, 'method' => 'POST']) !!}
                        <div class="form-group">
                          <label for="الاسم" style="">اسم الالبوم</label><br>
                          {!! Form::text('name', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
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
<div class="row">
    <div class="col-md-12">
         <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    تعديل الصور الخاصة بالالبوم {{$albums->name}}
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                <div class="panel-body">
                        {!! Form::model($albums, [$albums->id, 'files' => true, 'method' => 'PATCH']) !!}
                        <div class="form-group">
                            {!! Form::label('الصور') !!}<br>
                            @if ($images->count())
                                @foreach($images as $image)
                                    <div class="photos_block">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">            
                                            <img src="/img/uploaded/pgallery/{{ $image->images}}" alt="..." style="height: 140px;">
                                            {!! Form::button('x', 
                                                array('class'=>'btn btn-primary delete_photo_ajax', 'value'=>$image->id)) !!}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div id="selectedFiles">
                            </div>
                            <div class="break_coll"><br><br><br><br><br><br><br><br></div>
                            <input type="file" id="files" name="files[]" multiple accept="image/*" class="upload_photos" >
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
@section('script')
<script type="text/javascript">
  $(document).ready(function($){
        $('button.btn.btn-primary.delete_photo_ajax').click(function(){
            var id = $(this).val();
            $.post("/admin/delete/pgallery/{{$albums->id}}/photos/"+ id,
            function(data) {
                    //$.each(data, function(key, value) {
                        //$('.delete_photo_ajax').val();
              //});
            });
            $(this).hide();
            $(this).parent().parent().hide();
        });
});
</script>
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
        }
    </script>
@endsection
@stop