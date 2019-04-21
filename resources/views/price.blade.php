@extends('layouts.app')
@section('content')
<form action="{{ route('editarbitag') }}" method="POST">
<div class="container">
        @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @if (session('danger'))
        <div class="alert alert-danger">
            {{session('danger')}}
        </div>
        @endif
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