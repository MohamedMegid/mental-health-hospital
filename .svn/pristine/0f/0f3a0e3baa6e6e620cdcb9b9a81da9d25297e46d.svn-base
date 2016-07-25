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
                        <a href="/doctor/med-consulting/consulting" class="link-format">قائمة الاستشارات/</a>
                        <a href="#" class="link-format">بيانات الرسالة</a>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="container">
            <div class="CSSTableGenerator" >
                        @if (!empty($med))
                <table class="table table-bordered">
                        <tr class="active">
                            <td>
                                الاسم
                            </td>
                            <td>
                                البريد الالكتروني
                            </td>
                            <td>
                                الجنس
                            </td>
                        </tr>


                            <tr class="success">
                                <td>
                                    {{ $med->name }}
                                </td>
                                <td>
                                    {{ $med->mail }}
                                </td>
                                <td>
                                    @if($med->sex == 1)
                                    	ذكر
                                    @else
                                    	انثى
                                    @endif
                                </td>
                            </tr>
                        @endif
                                            
                </table>

            </div>
            @if (!empty($med))
            <div class="form-group">
                نص رسالة العميل
                <textarea name="client_message" class="form-control hide_component" disabled>{{ $med->message }}</textarea>
            </div>
            @endif
            @if ($reply->count())
                @foreach ($reply as $index)
                    <div class="form-group">
                        نص رسالة الرد
                        <textarea name="admin_message" class="form-control hide_component" disabled>{{ $index->reply_message }}</textarea>
                    </div>
                @endforeach
            @else
            {!! Form::open(array('method' => 'post')) !!}

            <div class="form-group">
                {!! Form::label('نص رسالة الرد') !!}<br>
                {!! Form::textarea('reply_message', null, 
                    array('class'=>'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('ارسل', 
                  array('class'=>'btn btn-primary')) !!}
            </div>

            {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection
@section('custom-css')
<style type="text/css">
table.table.table-bordered{
    direction: rtl;
}
th{
    text-align: right;
}
</style>
@endsection
@stop