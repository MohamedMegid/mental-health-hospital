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
    <li class="active">الاستشارات</li>
</ol>
@endsection
@section('content')
{!! Form::open(array('method' => 'post')) !!}
            <div class="row">
                <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    استعراض كل رسائل الاستشارات
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-responsive">
                                 @if ($med->count())
                                    <table class="table table-bordered">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="check_all" id="checkall">
                                            </th>
                                            <th>الاسم</th>
                                            <th>االبريد الالكتروني</th>
                                            <th>الجنس</th>
                                            <th>حالة الرد</th>
                                            <th>تاريخ الرسالة</th>
                                            <th>تفاصيل الرسالة و الرد علىها</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($med as $view)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                            </td>
                                            <td>
                                                {{ $view->name }}
                                            </td>
                                            <td>
                                                {{ $view->mail }}
                                            </td>
                                            <td>
                                                @if ($view->sex == 1)
                                                    ذكر
                                                @else
                                                    انثى
                                                @endif
                                            </td>
                                            @if ($reply->count())
                                                <td>
                                                    @foreach ($reply as $index)
                                                        @if ($view->id == $index->med_id)
                                                            <p style="color:blue";>تم الرد</p>
                                                            <?php break; ?>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            @endif
                                            <td>
                                                {{ $view->created_at }}
                                            </td>
                                            <td>
                                                <a href="/admin/med-consulting/consulting/{{$view->id}}">تفاصيل الرسالة</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
                                    @endif
                                    </tbody>

                                </table>
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $med->count() }} رسالة </div>
                            
                            </div>
                            @if (count($med))
                            <div class="form-inline">
                                <div class="form-group">             
                                    <div class="form-group">
                                        <input type="submit" name="delete" value="مسح" class="btn btn-primary">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="/admin/med-consulting/consulting/all">الرد على جميع الرسائل</a>
                                </div>
                            </div>
                            @endif
                            {!! Form::close() !!}
                    </div>
                </div>
            </div> 
        </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-pagination text-center">
                                <nav>
                                    <ul class="pagination">
                                        {!! $med->render() !!}
                                    </ul>
                                </nav>                        
                            </div>
                        </div>
                    </div>    
@endsection
@section('script')
<script>
    $('#checkall').change(function(event) {
        if(this.checked) {
            $('.check_list').each(function() {
                this.checked = true;
            });
        }else{
            $('.check_list').each(function() {
                this.checked = false;
            });        
        }
    });
</script>
@endsection
@stop