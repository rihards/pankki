@extends('layout.master')
@section('content')
    <h1 class="page-header">Expenses</h1>
    <p>
        <a href="{{ route('expense.create') }}" class="btn btn-sm btn-success btn-addon"><i class="glyphicon glyphicon-plus"></i>Create</a>
    </p>
    <div class="table-responsive">
        <table class="table table-striped has-action table-category">
            <thead>
            <tr>
                <th>Name</th>
                <th class="text-center">Value</th>
                <th class="text-center">Category</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->name }}</td>
                    <td class="text-center">€ {{ number_format($expense->value, 2) }}</td>
                    <td class="text-center">{{ $expense->category->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('expense.edit', ['id' => $expense->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ route('expense.delete', ['id' => $expense->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection