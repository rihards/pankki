@extends('layout.master')
@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ route('category.update', ['id' => $category->id]) }}">
        <input type="hidden" name="_method" value="PATCH">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit category
            </div>
            <div class="panel-body">
                <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?: $category->name }}">
                        <p class="help-block">{{ ($errors->has('name') ? $errors->first('name') : '') }}</p>
                    </div>
                </div>
                <?php
                    $checked = '';
                    if(!empty(old('luxury')))
                    {
                        $checked = 'checked="checked"';
                    }
                ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Luxury</label>
                    <div class="col-sm-10">
                        <input type="checkbox" name="luxury" class="form-control" {{ $checked }}>
                        <p class="help-block"></p>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-sm btn-info btn-addon"><i class="glyphicon glyphicon-ok"></i>Update</button>
                <a href="{{ route('category.index') }}" class="btn btn-default btn-sm btn-addon"><i class="glyphicon glyphicon-remove"></i>Cancel</a>
            </div>
        </div>
    </form>
@endsection