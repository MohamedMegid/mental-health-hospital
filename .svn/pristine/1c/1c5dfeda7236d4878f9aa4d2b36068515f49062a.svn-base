@extends('frontend.master')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 head-ban">
                    <div class="product-bit-title text-center">
                        <h2 class="pag-head">الاستشارات</h2>
                    </div>
                </div>
                <div class="col-md-6 breadcroumb">
                        <a href="/home" class="link-format">الرئيسية/</a> 
                        <a href="/med-consulting" class="link-format">قائمة الاستشارات</a>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="container">
            {!! Form::open(array('method' => 'post')) !!}
            <div class="row">
                <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    <h4 class="float-right">استعراض كل رسائل الاستشارات</h4>
                                </div>
                            </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
                            <div class="portlet-body">
                                <div class="table-responsive">
                                 @if ($med->count())
                                    <table class="table table-bordered">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>الاسم</th>
                                            <th>البريد الالكتروني</th>
                                            <th>الجنس</th>
                                            <th>حالة الرد</th>
                                            <th>تاريخ الرسالة</th>
                                            <th><a href="/doctor/med-consulting/consulting/all" style="color:white;">الرد على جميع الرسائل</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($med as $view)
                                        <tr>
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
                                                <a href="/doctor/med-consulting/consulting/{{$view->id}}">تفاصيل الرسالة و الرد عليها   </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
                                    @endif
                                    </tbody>

                                </table>
                                <div class="float-right"> <i class="fa fa-folder-o"></i> إجمالي : {{ $med->count() }} رسالة </div>
                            
                            </div>
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
    </div>
</div>     
@endsection
@section('custom-css')
<style type="text/css">
thead.flip-content{
    background-color: #053A6E;
    color: white;
}
table.table.table-bordered{
    direction: rtl;
}
th{
    text-align: right;
}
/*
    div.portlet-title {
        background-color: #AB413F;
        color: white;
        height: 40px;
        text-align: right;
        padding: 10px;
        font-size: 19px;
    }
    table.table.table-bordered, div{
        direction: rtl;
    }
*/
</style>
@endsection
@stop