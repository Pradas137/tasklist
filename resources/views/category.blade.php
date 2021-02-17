<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->
<p><a href="/taskByCategory">Veura taskas by category</a></p>
<br>
<p><a href="/tasks">add Tasks Page</a></p>
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Category Form -->
    <form action="{{ url('category') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Category Name -->
        <div class="form-group">
            <label for="category-name" class="col-sm-3 control-label">Category Name</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="category-name" class="form-control">
            </div>
        </div>

        <!-- Category Parent -->
        <div class="form-group">
            <label for="category-parent" class="col-sm-3 control-label">Category Parent</label>
            <div class="col-sm-6">
                <select name="category_parent" id="category-parent" class="form-control">
                    <option selected value="">-</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Add Category Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Category
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
