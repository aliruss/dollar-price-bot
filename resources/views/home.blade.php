@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 rtl sans">
            <div class="panel panel-default">
                <div class="panel-heading">تعداد کاربران سیستم</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ usercount() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
