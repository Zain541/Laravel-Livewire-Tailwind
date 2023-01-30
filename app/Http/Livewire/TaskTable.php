<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Filament\Tables\Actions\Action;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class TaskTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    protected $model = Task::class;
    public $company_id = null;

    protected $listeners = [
        'refreshTaskTable' => '$refresh',
        'companyEvent' => 'setCompany'
    ];

    public function setCompany($company_id)
    {
        $this->company_id = $company_id;
    }
    
    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function getTableQuery(): Builder
    {
        if($this->company_id != null)
        {
            return $this->model::query()->where('company_id', $this->company_id)->orderBy('priority', 'ASC');
        }
        else
        {
            return $this->model::query()->orderBy('priority', 'ASC');
        }
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('company.name')
                ->searchable(),
            Tables\Columns\TextColumn::make('priority')
                ->searchable(),
            Tables\Columns\TextColumn::make('due')
                ->searchable(),
        ];
    }

    protected function getTableActions(): array
    {;
        return [
            Action::make('edit')
                ->url(fn (Task $record): string => route('edit.task', ['id' => $record->id])),
            Action::make('delete')
                ->url(fn (Task $record): string => route('delete.task', ['id' => $record->id])),
        ];
    }

    protected function getTableReorderColumn(): ?string
    {
        return 'priority';
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
}
