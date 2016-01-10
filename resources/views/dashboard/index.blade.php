@extends('layout.master')
@section('content')
    <h1 class="page-header">Dashboard</h1>
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