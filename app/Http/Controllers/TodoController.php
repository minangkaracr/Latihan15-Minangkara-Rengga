<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return response()->json($todos, 200);
    }
    
    // public function index(){
    //     $todos = app('db')->select("select * from todo t
    //             where activity = 'Olahraga'
    //             order by 3 asc");
    //     return response()->json($todos, 200);
    // }

    // public function index(){
    //     $todos = Todo::where('activity', 'Olahraga')->orderBy('description', 'asc')->get();
    //     return response()->json($todos, 200);
    // }

    public function show($id){
        $todo = Todo::find($id);
        if(!$todo){
            return response()->json(["message"=> "To do not found."],404);
        }

        return response()->json($todo, 200);
    }

    public function store(Request $request){
        $todo = Todo::create($request->all());
        return response()->json($todo, 200);
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);

        if(!$todo){
            return response()->json(["message"=> "To do not found"],404);
        }
        $todo->update($request->all());
        return response()->json($todo, 200);
    }

    public function destroy($id){
        $todo = Todo::find($id);
        if(!$todo){
            return response()->json(["message"=> "To do Not Found"],404);
        }
        $todo->delete();
        return response()->json(["message"=>"to do deleted"], 200);
    }
}
