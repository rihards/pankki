@extends('layout.master')
@section('content')
    <h1 class="page-header">Dashboard</h1>
    <h2 class="sub-header">Current month</h2>
    <div class="row">
        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Total</h4>
                </div>
                <div class="panel-body">
                    <h2>€ {{ number_format($month['total'], 2) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Regular</h4>
                </div>
                <div class="panel-body">
                    <h2>€ {{ number_format($month['regular'], 2) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Luxury</h4>
                </div>
                <div class="panel-body">
                    <h2>€ {{ number_format($month['luxury'], 2) }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <div class="panel panel-default">
            <div class="panel-heading">Last ten expenses</div>
            <table class="table table-striped has-action table-category">
                <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-center">Value</th>
                    <th class="text-center">Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense->name }}</td>
                        <td class="text-center">€ {{ number_format($expense->value, 2) }}</td>
                        <td class="text-center">{{ $expense->category->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection