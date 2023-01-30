<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;

class CreateTask extends Component
{
    public $task_name;
    public $company_id;
    public $due_date;

    public function companies()
    {
        $comnpanies = Company::all();
        return $comnpanies;
    }

    public function save()
    {
        $max_priority = Task::max('priority');
        Task::create([
            'name' => $this->task_name,
            'company_id' => $this->company_id,
            'due_date' => $this->due_date,
            'priority' => $max_priority + 1
        ]);
        $this->task_name = "";
        $this->company_id = "";
        $this->due_date = "";
        $this->emit('refreshTaskTable');
    }

    public function render()
    {
        return view('livewire.create-task');
    }
}
