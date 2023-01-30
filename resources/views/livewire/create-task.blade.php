<div>
    <form action="" wire:submit.prevent="save">
        <input type="text" placeholder="task name" class="form-control" wire:model.defer="task_name">
        <select class="form-control" wire:model.defer="company_id">
            <option value="">Select</option>
            @foreach ($this->companies() as $company)
                <option value="{{ $company->id }}">
                    {{ $company->name }}
                </option>
            @endforeach
        </select>

        <input type="datetime-local" class="form-control" wire:model.defer="due_date">
        <input type="submit" class="btn btn-primary">
    </form>
</div>
