<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use App\Models\Category;

/**
 * Add New Categories
 */

Route::get('/category', function () {
    $categories = Category::orderBy('name', 'asc')->get();

    return view('category', [
        'categories' => $categories
    ]);
});

/**
 * Add New Categories
 */
Route::post('/categories', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:20',
    ]);

    if ($validator->fails()) {
        return redirect('/category')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Category;
    $task->name = $request->name;
    $task->save();

});

Route::delete('/category/{category}', function (Category $categories) {
    $categories->delete();

    return redirect('/category');
});

/**
 * Show Task Dashboard
 */

Route::get('/', function () {
    $tasks = Task::orderBy('name', 'asc')->get();
    $categories = Category::orderBy('name', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks, 'categories' => $categories
    ]);
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:20',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->cat_id = $request->category;
    $task->save();

    return redirect('/');
});

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});
