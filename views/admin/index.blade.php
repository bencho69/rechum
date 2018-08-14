@extends('layouts.admin')

@section('content')
@include('alerts.request')
@include('alerts.success')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Estas dentro!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content-header')

@endsection