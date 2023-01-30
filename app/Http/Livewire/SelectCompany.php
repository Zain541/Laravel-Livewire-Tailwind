<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class SelectCompany extends Component
{
    public $company_id;

    public function selectCompany()
    {
        $this->emit('companyEvent', $this->company_id);
    }

    public function companies()
    {
        return Company::all();
    }

    public function render()
    {
        return view('livewire.select-company');
    }
}
