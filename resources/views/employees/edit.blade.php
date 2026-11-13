{{-- @extends('layouts.app');
@section('title')
    <h2> Edit Employee</h2>
@endsection


@section('content')
<form action="{{ route('employees.update', $employee->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" value="{{ $employee->name }}" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" value="{{ $employee->email }}" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="department_id">Department:</label>
        <select name="department_id" id="department_id" class="form-control" required>
            <option value="">Select a department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" value="{{ $employee->phone }}" name="phone" id="phone" class="form-control">
    </div>
    {{-- <div class="form-group">
        <label for="salary">Salary:</label>
        <input type="number" name="salary" id="salary" class="form-control" step="0.01" min="0">
    </div>   --}}

    <button type="submit" class="btn btn-primary mt-3">Add Employee</button>
</form>
@endsection
 --}}
