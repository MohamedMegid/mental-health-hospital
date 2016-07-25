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
    <li class="active">تواصل معنا</li>
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
                                    {{$table_name}}
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-responsive">
                                 @if ($contacts->count())
                                    <table class="table table-bordered">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="check_all" id="checkall">
                                            </th>
                                            <th>الاسم</th>
                                            <th>رقم الجوال</th>
                                            <th>االبريد الالكتروني</th>
                                            <th>العنوان</th>
                                            <th>حالة الرد</th>
                                            <th>تاريخ الرسالة</th>
                                            <th>تفاصيل الرسالة و الرد علىها</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contacts as $view)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                            </td>
                                            <td>
                                                {{ $view->name }}
                                            </td>
                                            <td>
                                                {{ $view->mobile }}
                                            </td>
                                            <td>
                                                {{ $view->mail }}
                                            </td>
                                            <td>
                                                {{ $view->address }}
                                            </td>
                                            <td>
                                                @if ($view->reply_status == 1)
                                                    <p style="color:blue";>تم الرد</p>
                                                @else
                                                    <p style="color:red";>لم يتم الرد</p>
                                                @endif
                                            </td>
                                           
                                            <td>
                                                {{ $view->created_at }}
                                            </td>
                                            <td>
                                                <a href="/admin/contact-us/contacts/{{$view->id}}">تفاصيل الرسالة</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
                                    @endif
                                    </tbody>

                                </table>
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $contacts->count() }} رسالة </div>
                            
                            </div>
                            @if (count($contacts))
                            <div class="form-inline">
                                <div class="form-group">             
                                    <div class="form-group">
                                        <input type="submit" name="delete" value="مسح" class="btn btn-primary">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="/admin/contact-us/contacts/all">الرد على جميع الرسائل</a>
                                </div>
                            </div>
                            @endif
                            {!! Form::close() !!}
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