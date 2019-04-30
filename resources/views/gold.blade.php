@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-hover sans rtl">
        <thead class="bg-success">
            <tr>
                <th>عنوان</th>
                <th>بیشترین قیمت فروش</th>
                <th>کمترین قیمت فروش</th>
                <th>بیشترین قیمت خرید</th>
                <th>کمترین قیمت خرید</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $fullcoin->title() }}</td>
                <td>{{ $fullcoin->bmaxprice }}</td>
                <td>{{ $fullcoin->bminprice }}</td>
                <td>{{ $fullcoin->smaxprice }}</td>
                <td>{{ $fullcoin->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $oldcoin->title() }}</td>
                <td>{{ $oldcoin->bmaxprice }}</td>
                <td>{{ $oldcoin->bminprice }}</td>
                <td>{{ $oldcoin->smaxprice }}</td>
                <td>{{ $oldcoin->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $halfcoin->title() }}</td>
                <td>{{ $halfcoin->bmaxprice }}</td>
                <td>{{ $halfcoin->bminprice }}</td>
                <td>{{ $halfcoin->smaxprice }}</td>
                <td>{{ $halfcoin->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $geramcoin->title() }}</td>
                <td>{{ $geramcoin->bmaxprice }}</td>
                <td>{{ $geramcoin->bminprice }}</td>
                <td>{{ $geramcoin->smaxprice }}</td>
                <td>{{ $geramcoin->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $quartercoin->title() }}</td>
                <td>{{ $quartercoin->bmaxprice }}</td>
                <td>{{ $quartercoin->bminprice }}</td>
                <td>{{ $quartercoin->smaxprice }}</td>
                <td>{{ $quartercoin->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $geramgold->title() }}</td>
                <td>{{ $geramgold->max }}</td>
                <td>{{ $geramgold->min }}</td>
            </tr>
            <tr>
                <td>{{ $intergeram->title() }}</td>
                <td>{{ $intergeram->max }}</td>
                <td>{{ $intergeram->min }}</td>
            </tr>
        </tbody>
    </table>
</div>
<form action="{{ route('gold-arbitag-update') }}" method="POST">
    <div class="container rtl sans">
        {{ csrf_field() }}
        <div class="col-md-3">
            <label>سکه تمام :</label>
            <input type="number" name="fullcoin" class="form-control" value="{{ $goldarb->fullcoin }}">
        </div>
        <div class="col-md-3">
            <label>نیم سکه :</label>
            <input type="number" name="halfcoin" class="form-control" value="{{ $goldarb->halfcoin }}">
        </div>
        <div class="col-md-3">
            <label>سکه طرح قدیم :</label>
            <input type="number" name="oldfullcoin" class="form-control" value="{{ $goldarb->oldfullcoin }}">
        </div>
        <div class="col-md-3">
            <label>ربع سکه :</label>
            <input type="number" name="quartercoin" class="form-control" value="{{ $goldarb->quartercoin }}">
        </div>
        <div class="col-md-3">
            <label>سکه گرمی :</label>
            <input type="number" name="geramcoin" class="form-control" value="{{ $goldarb->geramcoin }}">
        </div>
        <div class="col-md-3">
            <label>هر گرم طلا :</label>
            <input type="number" name="geramgold" class="form-control" value="{{ $goldarb->geramgold }}">
        </div>
        <div class="col-md-3">
            <label>انس جهانی طلا :</label>
            <input type="number" name="intergeram" class="form-control" value="{{ $goldarb->intergeram }}">
        </div>

    </div>
    <hr>
    <div class="container rtl">
        <button type="submit" class="btn btn-danger sans">ارسال</button>
        <a href="{{ route('run-save-gold') }}" class="btn btn-info sans">به روزرسانی قیمت</a>
    </div>
</form>
@endsection