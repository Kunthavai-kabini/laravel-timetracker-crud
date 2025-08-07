<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApplyLeaveRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Leave;
class LeaveController extends Controller
{
    
    public function addLeave(ApplyLeaveRequest $request)
    {
        if ($request->isMethod('post')) {
            
            $userId = auth()->id();
            Leave::create([
                'user_id' => $userId,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'comments' => $request->comments,
            ]);
            return response()->json([
                'redirect_url' => route('taskList', ['succMsg' => 'Leave added successfully!']), // replace with your route
                'message' => 'Leave added successfully!'
            ]);
        }
        return view('leaves.leave_add');
        
    }

}
