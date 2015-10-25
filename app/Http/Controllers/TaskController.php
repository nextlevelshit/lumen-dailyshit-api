<?php namespace App\Http\Controllers;

use App\Task;
use App\TaskDone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TaskController extends Controller {

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * List all available tasks and output in json
     */

    public function index(){

        $Tasks  = Task::all();

        return response()->json($Tasks);

    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * Get particular task by ID and output in json
     */

    public function getTask($id){

        $Task  = Task::find($id);

        return response()->json($Task);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * Create new task and output response in json
     */

    public function createTask(Request $request){

        $Task = Task::create($request->all());

        // return response()->json($Task);
	return $request;

    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * Delete task by particular ID and output response in json
     */

    public function deleteTask($id){
        $Task  = Task::find($id);
        $Task->delete();

        return response()->json('deleted');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * Update particular task by ID and output response in json
     */

    public function updateTask(Request $request,$id){
        $Task  = Task::find($id);
        $Task->name = $request->input('name');
        $Task->description = $request->input('description');
        $Task->repetition = $request->input('repetition');
        $Task->save();

        return response()->json($Task);
    }


    public function changeDone(Request $request,$id)
    {
        $Task  = Task::find($id);
        
	if(!$TaskDone = TaskDone::where('task_id', $id)->where('date', $request->input('date'))->get()->first()) {
		$TaskDone = TaskDone::create(['task_id' => $id]);
	}
        $TaskDone->done = $request->input('done');
	$TaskDone->date = $request->input('date');
        $TaskDone->save();

        return response()->json($TaskDone);
    }

}
