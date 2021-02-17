<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
<p><a href="/tasks">Add Tasks Page</a></p>
<br>
<p><a href="/category">add Category Page</a></p>
<h1>Tasks By Category</h1>
<hr>
<ul>
    @foreach($cats as $cat)
        <li>{{ $cat->name }}
            <ul>
            @foreach($cat->tasks as $task)
                <li>{{ $task->name }}</li>
            @endforeach
            </ul>
        </li>
    @endforeach
    </ul>   
@endsection