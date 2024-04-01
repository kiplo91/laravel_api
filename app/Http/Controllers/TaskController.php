<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index(){

        $tasks = Task::all();
        

        if(count($tasks) > 0){
            return response()->json([
                "status"=>200,
                "tasks"=> $tasks
            ],200);

        }else{
            return response()->json([
                "status"=>404,
                "message"=> "no tasks found"
            ],404);

        }   
    }

    public function create(Request $request){
        try{
            Task::create($request->all());
        return response()->json([
            "status"=> 200,
            "message"=> "Successfully added new task"
        ]);

        }catch(\Exception $e){
            return response()->json([500] , $e->getMessage());

        }
        

    }

    public function find($id){

        try{
            $task = Task::findOrFail($id);

            return response()->json([
                "status"=> 200,
                "task"=> $task
            ]);

        }catch(\Exception $e){
             return response()->json([
                'status' =>500 , 
                'error' => $e->getMessage()
            ]);
        }


    }

    public function update(Request $request, $id){

        try{

        Task::find($id)->update($request->all());
        return response()->json([
            "status"=> 200,
            "message"=> "Task successfully updated",
            "data" => $request->all()
        ]);
    }catch(\Exception $e){
        return response()->json([500] , $e->getMessage());
    }
    
}

public function destroy($id){
    try{
        Task::destroy($id);
        return response()->json([202]);
    }catch(\Exception $e){
        return response()->json([500] , $e->getMessage());
    }
    
}
}