@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Dashboard</h1>

    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h3>120</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Total Orders</h5>
                    <h3>80</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Revenue</h5>
                    <h3>$2,500</h3>
                </div>
@endsection