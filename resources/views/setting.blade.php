@extends('layouts.app')
@section('content')
<form action="{{ route('save-app-setting') }}" method="post">
{{ csrf_field() }}
    <div class="container sans rtl">
        <div class="col-md-6">
            <div class="form-group">
                <label>نام برنامه :</label>
                <input type="text" name="name" class="form-control" value="{{ $setting->name }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>آدرس کانال :</label>
                <input type="text" name="channel" class="form-control" placeholder="example: @alirus" value="{{ $setting->channel }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>متن راهنمای ربات:</label>
                <textarea name="help" id="" cols="30" rows="10" class="form-control">{{ $setting->help }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>متن دریافت مشاوره:</label>
                <textarea name="moshavere" id="" cols="30" rows="10" class="form-control">{{ $setting->moshavere }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-danger sans pull-right">ارسال</button>
    </div>
</form>
@endsection