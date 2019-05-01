@extends('layouts.app')
@section('content')
    <div class="container rtl">
        <div class="col-md-12 sans">
            <h4>تعداد کاربران سیستم: {{ $count }}</h4>
        </div>
        <form action="{{ route('send-message-all') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-12 col-xs-12 sans">
                <div class="form-group">
                    <label for="textarea">متن پیغام را وارد کنید:</label>
                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
        </div>
        <button type="submit" class="btn btn-danger sans">ارسال</button>
    </form>
    </div>
@endsection