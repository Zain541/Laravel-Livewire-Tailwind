<div class="container">
  <form action="{{ route('save.task') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $task->id }}">
    <input type="text" placeholder="task name" class="form-control" name="name" value="{{ $task->name }}">
    @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <select class="form-control" name="company_id">
      <option value="">Select</option>
      @foreach ($companies as $company)
      @if($task->company_id == $company->id)
        <option selected value="{{ $company->id }}">
          {{ $company->name }}
        </option>
      @else
        <option value="{{ $company->id }}">
          {{ $company->name }}
        </option>
      @endif
      @endforeach
    </select>
    @error('company_id')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <input type="date" name="due" value="{{ $task->due }}">
    <input type="submit" class="btn btn-primary">
  </form>
</div>
