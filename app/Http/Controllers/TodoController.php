<?php

namespace App\Http\Controllers;
use App\Models\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('isActive', true)->orderBy("id", "asc")->paginate(9);
        return view("todolist", ["todos" => $todos]);
    }

    public function pasivetodos()
    {
        $todos = Todo::where("isActive", false)->orderBy("id", "asc")->paginate(9);
        return view("pasivetodolist", ["todos" => $todos]);
    }

    public function create(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:50",
            "description" => "nullable|string",
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->due_date = $request->date;
        $todo->isActive = true;
        $todo->save();
        return redirect()->route('todolist');

    }

    public function getUpdate($id)
    {
        $todo = Todo::find($id);
        if (empty($todo)) {
            return redirect()->route('todolist');
        } else {

            return view('tododetail', ['todo' => $todo]);
        }

    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->due_date = $request->date;
        $todo->isActive = $request->has('isActive') ? true : false;
        $todo->save();
        return redirect()->route('todolist');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return redirect()->route('todolist')->with('error', 'Görev bulunamadı');
        }

        $todo->delete();

        return redirect()->route('todolist')->with('success', 'Görev başarıyla silindi');
    }
}
