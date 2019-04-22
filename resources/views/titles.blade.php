@extends('layouts.app')
@section('content')
<form action="{{ route('client-titles-update') }}" method="post">
{{ csrf_field() }}
    <div class="container rtl sans">
        <div class="col-xs-6 pull-right">
            <div class="form-group">
                <label>دلار :</label>
                <input type="text" name="usd" class="form-control" value="{{ $title->usd }}">
            </div>
        </div>
        <div class="col-xs-6 pull-right">
            <div class="form-group">
                <label>سکه :</label>
                <input type="text" name="fullcoin" class="form-control" value="{{ $title->fullcoin }}">
            </div>
        </div>
        <div class="col-xs-6 pull-right">
            <div class="form-group">
                <label>مثقال :</label>
                <input type="text" name="mes" class="form-control" value="{{ $title->mes }}">
            </div>
        </div>
        <div class="col-xs-6 pull-right">
            <div class="form-group">
                <label>مثقال با گرم :</label>
                <input type="text" name="geram" class="form-control" value="{{ $title->geram }}">
            </div>
        </div>
        <div class="col-xs-6 pull-right">
            <div class="form-group">
                <label>دینار عراق :</label>
                <input type="text" name="iqd" class="form-control" value="{{ $title->iqd }}">
            </div>
        </div>
        <div class="col-xs-6 pull-right">
            <div class="form-group">
                <label>لیر ترکیه :</label>
                <input type="text" name="lir" class="form-control" value="{{ $title->lir }}">
            </div>
        </div>
        <button type="submit" class="btn btn-success sans">ارسال</button>
    </form>
    </div>
@endsection