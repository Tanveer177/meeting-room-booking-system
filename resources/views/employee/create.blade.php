
@extends('layouts.app')
@section('content')
    <h2>Create Employee</h2>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>

    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to Employee List</a>
@endsection
