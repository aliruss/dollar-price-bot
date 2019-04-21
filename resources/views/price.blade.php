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
                <td>{{ $usd->title() }}</td>
                <td>{{ $usd->bmaxprice }}</td>
                <td>{{ $usd->bminprice }}</td>
                <td>{{ $usd->smaxprice }}</td>
                <td>{{ $usd->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $cad->title() }}</td>
                <td>{{ $cad->bmaxprice }}</td>
                <td>{{ $cad->bminprice }}</td>
                <td>{{ $cad->smaxprice }}</td>
                <td>{{ $cad->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $lir->title() }}</td>
                <td>{{ $lir->bmaxprice }}</td>
                <td>{{ $lir->bminprice }}</td>
                <td>{{ $lir->smaxprice }}</td>
                <td>{{ $lir->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $eur->title() }}</td>
                <td>{{ $eur->bmaxprice }}</td>
                <td>{{ $eur->bminprice }}</td>
                <td>{{ $eur->smaxprice }}</td>
                <td>{{ $eur->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $iqd->title() }}</td>
                <td>{{ $iqd->bmaxprice }}</td>
                <td>{{ $iqd->bminprice }}</td>
                <td>{{ $iqd->smaxprice }}</td>
                <td>{{ $iqd->sminprice }}</td>
            </tr>
            <tr>
                <td>{{ $gbp->title() }}</td>
                <td>{{ $gbp->bmaxprice }}</td>
                <td>{{ $gbp->bminprice }}</td>
                <td>{{ $gbp->smaxprice }}</td>
                <td>{{ $gbp->sminprice }}</td>
            </tr>
        </tbody>
    </table>
</div>
<form action="{{ route('editarbitag') }}" method="POST">
    <div class="container">
        {{ csrf_field() }}
        <div class="col-md-3">
            <label>Dollar:</label>
            <input type="number" name="usd" class="form-control" value="{{ $arbitag->usd }}">
        </div>
        <div class="col-md-3">
            <label>Eur:</label>
            <input type="number" name="eur" class="form-control" value="{{ $arbitag->eur }}">
        </div>
        <div class="col-md-3">
            <label>Lir:</label>
            <input type="number" name="lir" class="form-control" value="{{ $arbitag->lir }}">
        </div>
        <div class="col-md-3">
            <label>Dinar:</label>
            <input type="number" name="iqd" class="form-control" value="{{ $arbitag->iqd }}">
        </div>
        <div class="col-md-3">
            <label>Pond:</label>
            <input type="number" name="gbp" class="form-control" value="{{ $arbitag->gbp }}">
        </div>
        <div class="col-md-3">
            <label>Canada:</label>
            <input type="number" name="cad" class="form-control" value="{{ $arbitag->cad }}">
        </div>

    </div>
    <hr>
    <div class="container">
        <button type="submit" class="btn btn-danger">submit</button>
    </div>
</form>
@endsection