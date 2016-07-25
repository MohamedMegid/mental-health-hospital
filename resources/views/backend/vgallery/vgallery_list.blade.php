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
        <a href="/admin/vgallery/list">معرض البومات الفيديوهات</a>
    </li>
    <li class="active">عرض قائمة الفيديوهات</li>
</ol>
@endsection
                @section('content')
                {!! Form::open(array('method' => 'post', 'files'=>true, 'class' => 'form-inline')) !!}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    جدول عرض قائمة الالبومات
                                </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                    @if ($albums->count())
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="float:right;">
                                                </th>
                                                <th>اسم الالبوم</th>
                                                <th>
                                                    العمليات
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($albums as $view)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                                </td>
                                                <td>{{ $view->name }}</td>
                                                <td>
                                                    <a href="/admin/vgallery/{{$view->id}}/edit">تعديل</a> - 
                                                    <a href="/admin/vgallery/{{$view->id}}/delete">حذف</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (!($albums->count()))
                                        <div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
                                    @endif
                                    </tbody>
                                </table>
                                @if (count($albums))
                                    <div class="form-group">
                                        <input type="submit" name="delete" value="مسح" class="btn btn-primary">
                                    </div>
                                @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $albums->count() }} البوم </div>
                            </div>
                        </div>
                    </div>
                </div>           
                {!! Form::close() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav>
                                <ul class="pagination">
                                    {!! $albums->render() !!}
                                </ul>
                            </nav>                        
                        </div>
                    </div>
                </div>
                <!-- row-->
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