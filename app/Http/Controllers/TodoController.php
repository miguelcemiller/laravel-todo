<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // read all todos
    public function index()
    {
        return view('home', [
            'todos' => Todo::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    // create todo
    public function store(Request $request)
    {
        Todo::create([
            'user_id' => $request->user()->id,
            'todo' => $request->todo
        ]);
        return back();
    }

    // update todo
    public function update(Request $request, Todo $todo)
    {
        $todo->update([
            'todo' => $request->todo,
            'is_checked' => $request->has('is_checked')
        ]);
        return back();
    }

    // delete todo
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back();
    }
}
