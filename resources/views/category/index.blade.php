@extends('layout.master')
@section('content')
    <h1 class="page-header">Categories</h1>
    <p>
        <a href="{{ route('category.create') }}" class="btn btn-sm btn-success btn-addon"><i class="glyphicon glyphicon-plus"></i>Create</a>
    </p>
    <div class="table-responsive">
        <table class="table table-striped has-action table-category">
            <thead>
            <tr>
                <th>Name</th>
                <th class="text-center">Luxury</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td class="text-center">
                        @unless (!$category->luxury)
                            <span class="glyphicon glyphicon-ok"></span>
                        @endunless
                    </td>
                    <td class="text-center">
                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection