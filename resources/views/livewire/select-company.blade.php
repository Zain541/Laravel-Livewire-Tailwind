<div>
    <div class="row pb-2">
    <select class="form-control" wire:change="selectCompany" wire:model="company_id">
        <option value="">Select Company</option>
        @foreach ($this->companies() as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
    </select>
</div>
</div>
