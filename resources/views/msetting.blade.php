@extends('layouts.app')
@section('content')
<div class="container sans rtl titles">
<form action="{{ route('client-message-update') }}" method="post">
    {{ csrf_field() }}
    <h4>ویرایش تنضیمات ارسال پیام در کانال</h4>
    <div class="col-md-12">
        <label>ارسال پیام</label>
        <div class="switch-field">
            <input type="radio" id="radio-one" name="send" value="1" @if ($set->send)
            checked
            @endif  />
            <label for="radio-one">فعال</label>
            <input type="radio" id="radio-two" name="send" value="0" @if (!$set->send)
                checked
            @endif />
            <label for="radio-two">غیر فعال</label>
        </div>
    </div>
    <div class="col-md-12">
        <label>ارسال قیمت دلار</label>
        <div class="switch-field">
            <input type="radio" id="dollar-one" name="usd" value="1" @if ($set->usd)
                checked
            @endif />
            <label for="dollar-one">فعال</label>
            <input type="radio" id="dollar-two" name="usd" value="0" @if (!$set->usd)
                checked
            @endif />
            <label for="dollar-two">غیر فعال</label>
        </div>
    </div>
    <div class="col-md-12">
        <label>ارسال سکه</label>
        <div class="switch-field">
            <input type="radio" id="coin-one" name="fullcoin" value="1" @if ($set->fullcoin)
                checked
            @endif />
            <label for="coin-one">فعال</label>
            <input type="radio" id="coin-two" name="fullcoin" value="0" @if (!$set->fullcoin)
                checked
            @endif />
            <label for="coin-two">غیر فعال</label>
        </div>
    </div>
    <div class="col-md-12">
        <label>ارسال مثقال</label>
        <div class="switch-field">
            <input type="radio" id="mes-one" name="mes" value="1" @if ($set->mes)
                checked
            @endif />
            <label for="mes-one">فعال</label>
            <input type="radio" id="mes-two" name="mes" value="0" @if (!$set->mes)
                checked
            @endif />
            <label for="mes-two">غیر فعال</label>
        </div>
    </div>
    <div class="col-md-12">
        <label>ارسال گرم در کنار مثقال</label>
        <div class="switch-field">
            <input type="radio" id="geram-one" name="geram" value="1" @if ($set->geram)
                checked
            @endif />
            <label for="geram-one">فعال</label>
            <input type="radio" id="geram-two" name="geram" value="0" @if (!$set->geram)
                checked
            @endif />
            <label for="geram-two">غیر فعال</label>
        </div>
    </div>
    <div class="col-md-12">
        <label>ارسال دینار</label>
        <div class="switch-field">
            <input type="radio" id="dinar-one" name="iqd" value="1" @if ($set->iqd)
                checked
            @endif />
            <label for="dinar-one">فعال</label>
            <input type="radio" id="dinar-two" name="iqd" value="0" @if (!$set->iqd)
                checked
            @endif />
            <label for="dinar-two">غیر فعال</label>
        </div>
    </div>
    <div class="col-md-12">
        <label>ارسال لیر</label>
        <div class="switch-field">
            <input type="radio" id="lir-one" name="lir" value="1" @if ($set->lir)
                checked
            @endif />
            <label for="lir-one">فعال</label>
            <input type="radio" id="lir-two" name="lir" value="0" @if (!$set->lir)
                checked
            @endif />
            <label for="lir-two">غیر فعال</label>
        </div>
    </div>
    <button type="submit" class="btn btn-info sans">ثبت</button>
</form>
</div>
@endsection