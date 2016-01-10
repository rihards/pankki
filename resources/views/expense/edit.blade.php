@extends('layout.master')
@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ route('expense.update', ['id' => $expense->id]) }}">
        <input type="hidden" name="_method" value="PATCH">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit expense
            </div>
            <div class="panel-body">
                <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?: $expense->name }}">
                        <p class="help-block">{{ ($errors->has('name') ? $errors->first('name') : '') }}</p>
                    </div>
                </div>
                <div class="form-group {{ ($errors->has('value')) ? 'has-error' : '' }}">
                    <label class="col-sm-2 control-label">Value</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" name="value" class="form-control" value="{{ old('value') ?: $expense->value }}">
                        <p class="help-block">{{ ($errors->has('value') ? $errors->first('value') : '') }}</p>
                    </div>
                </div>
                <div class="form-group {{ ($errors->has('category_id')) ? 'has-error' : '' }}">
                    <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id === $expense->category_id) selected="selected" @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <p class="help-block">{{ ($errors->has('category_id') ? $errors->first('category_id') : '') }}</p>
                    </div>
                </div>
                <div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control">{{ old('description') ?: $expense->description }}</textarea>
                        <p class="help-block">{{ ($errors->has('description') ? $errors->first('description') : '') }}</p>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-sm btn-info btn-addon"><i class="glyphicon glyphicon-ok"></i>Update</button>
                <a href="{{ route('expense.index') }}" class="btn btn-default btn-sm btn-addon"><i class="glyphicon glyphicon-remove"></i>Cancel</a>
            </div>
        </div>
    </form>
@endsection