@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-primary text-center">You are in <strong>{{ app()->environment() }} </strong> environment!</h1>
            <h2 class="text-success text-center">Server Local IP: <strong>{{ isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : 'local' }}</strong></h2>
            <h3 class="text-danger text-center">Version: <strong>11</strong></h3>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to a Demo Site</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
