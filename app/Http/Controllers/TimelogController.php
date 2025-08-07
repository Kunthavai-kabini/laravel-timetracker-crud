<?php

namespace App\Http\Controllers;
use App\Models\Timelog;
use Illuminate\Http\Request;
use App\Http\Requests\timeLogRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TaskRepositoryInterface;


class TimelogController extends Controller
{
    protected $taskRepo;

    public function __construct(TaskRepositoryInterface $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    public function taskList()
    {
        $title = "Task Portal";  
        $userId = auth()->id();
        $task_lists = $this->taskRepo->getAll();
        
        return view('timelogs.list', compact('title','task_lists'));
    }

    public function editTask(Request $request){
       
        $task_data = $this->taskRepo->findById($request->input('taskId'));
       
        return view('timelogs.task_edit', compact('task_data'));
    }
    public function updateTask(timeLogRequest $request){
        //update task details for a task      
        
        $this->taskRepo->update($request->input('id'),$request->all());

        return response()->json([
            'redirect_url' => route('taskList', ['succMsg' => 'Task updated successfully!']), // replace with your route
            'message' => 'Task updated successfully!'
        ]);
    }
    public function  addTask(timeLogRequest $request){
        //Both show add form and submit form
        
            
        if ($request->isMethod('post')) {
            $data = $request->all();    
            $data['user_id'] = auth()->user()->id;
            $this->taskRepo->create($data);
            return response()->json([
                'redirect_url' => route('taskList', ['succMsg' => 'Task added successfully!']), 
                'message' => 'Task added successfully!'
            ]);
        }
        return view('timelogs.task_add');
    }
}
