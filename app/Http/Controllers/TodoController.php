<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    // The constructor
    public function __construct()
    {
        $this->middleware('auth'); // sets 'auth' for all functions/routes
    }

    // View for all todos
    function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index')->with(['todos' => $todos]);
    }

    // View for creating a todo
    function create()
    {
        return view('todos.create');
    }

    // Store the todo into the database
    function store(Request $request)
    {
        // validate the title
        $request->validate([
            'title' => 'required | max:255',
            'description' => 'required | max:255'
        ]);

        $todo = auth()->user()->todos()->create($request->all());

        if ($request->step) { // if has steps then execute the loop
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }

        return redirect()->back()->with('message', 'Todo created succesfully!');
    }

    // Edit a specific todo
    function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit')->with(['todo' => $todo]);
    }

    // Update the values for a specific todo by id
    function update(Request $request, $id)
    {
        // validate the title
        $request->validate([
            'title' => 'required | max:255',
            'description' => 'required | max:255'
        ]);

        $todo = Todo::find($id);
        $todo->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect(route('todos.index'))->with('message', 'Updated!');
    }

    function complete($id)
    {
        $todo = Todo::find($id);
        $todo->update(['completed' => true]);

        return redirect()->back()->with('message', 'Task Marked as Completed!');
    }

    function incomplete($id)
    {
        $todo = Todo::find($id);
        $todo->update(['completed' => false]);

        return redirect()->back()->with('message', 'Task Marked as Incompleted!');
    }

    function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->steps->each->delete();
        $todo->delete();

        return redirect()->back()->with('message', 'Task Deleted Successfully!');
    }

    // Show a specific Todo by id
    function show($id)
    {
        $todo = Todo::find($id);
        return view('todos.show')->with(['todo' => $todo]);
    }

}
