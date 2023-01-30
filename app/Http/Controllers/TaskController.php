<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Company;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function editTask($id)
    {
        $companies = Company::all();
        $task = Task::find($id);
        return view('edit-task', compact('task', 'companies'));
    }

    public function saveTask(TaskRequest $request)
    {
        Task::where('id', $request->id)->update([
            'name' => $request->name,
            'company_id' => $request->company_id,
            'due' => $request->due,
        ]);
        return response()->redirectTo('/');
    }

    public function deleteTask($id)
    {
        Task::destroy($id);
        return response()->redirectTo('/');
    }
}
