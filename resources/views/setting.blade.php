@extends('layouts.app')
@section('content')
    <div class="container sans rtl">
        <div class="col-md-6">
            <div class="form-group">
                <label>نام برنامه :</label>
                <input type="text" name="appname" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>آدرس کانال :</label>
                <input type="text" name="appname" class="form-control" placeholder="example: @alirus">
            </div>
        </div>
    </div>
@endsection