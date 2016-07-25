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
                                    تعديل الالبوم {{$albums->name}}
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                <div class="panel-body">
                    {!! Form::model($albums, [$albums->id, 'files' => true, 'method' => 'POST']) !!}
                        <div class="form-group">
                          <label>الاسم</label><br>
                          {!! Form::text('name', null, 
                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                        </div>



                        <div class="form-group" style="clear:both;">
                            <input type="submit" value="تعديل" name="edit" class="btn btn-primary" />
                            <a href="/admin/vgallery/create">اضافة فيديو</a>
                        </div>

                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
{!! Form::open(array('method' => 'post', 'files'=>true, 'class' => 'form-inline')) !!}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    استعراض قائمة الفيديوهات
                                </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                    @if ($videos->count())
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="float:right;">
                                                </th>
                                                <th>اسم الفيديو</th>
                                                <th>
                                                    العمليات
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($videos as $view)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                                </td>
                                                <td>{{ $view->name }}</td>
                                                <td>
                                                    <a href="/admin/vgallery/video/{{$view->id}}/edit">تعديل</a> - 
                                                    <a href="/admin/vgallery/video/{{$view->id}}/delete">حذف</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (!($videos->count()))
                                        <div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
                                    @endif
                                    </tbody>
                                </table>
                                @if (count($videos))
                                    <div class="form-group">
                                        <input type="submit" name="delete" value="مسح" class="btn btn-primary">
                                    </div>
                                @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $videos->count() }} فيديو </div>
                            </div>
                        </div>
                    </div>
                </div>           
                {!! Form::close() !!}
@endsection
@section('script')
                    <script>
                            $('#checkall').change(function(event) {
                                if(this.checked) {
                                    $('.check_list').each(function() {
                                        this.checked = true;
                                    });
                                }
                                else{
                                    $('.check_list').each(function() {
                                        this.checked = false;
                                    });        
                                }
                            });
                    </script>    
                @endsection
                @section('footer')
                <style type="text/css">
                    #form-hidden-imd{
                        display: none;
                    }
                </style>
                @endsection
@stop