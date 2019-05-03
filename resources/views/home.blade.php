@extends('layouts.app')

@section('content')
<div class="container rtl sans">
    <div class="row">
        <div class="col-md-4">
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
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">تعداد درخواست های صف</div>
                <div class="panel-body">{{ $new['pending_update_count'] }}</div>
            </div>
        </div>
        @if (isset($new['last_error_message']))
        <div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">اخرین ارور سیستم</div>
                <div class="panel-body">{{ $new['last_error_message'] }}
                <br>
                {{ $errorDate }}
            </div>
            </div>
        </div>
        @endif
        
    </div>
</div>
@endsection
