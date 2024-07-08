<!-- resources/views/bookings/create.blade.php -->
@extends('layouts.app')

{{-- @extends('layouts.sidebar') --}}

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if($errors->has('conflict'))
<div class="alert alert-danger mt-3">
    {{ $errors->first('conflict') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Create Booking</h2>

            <form action="{{ route('bookings.store') }}" method="POST" class="text-left mx-auto">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="organizer_id" class="form-label">Organizer</label>
                    <select class="form-control" id="organizer_id" name="organizer_id" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                </div>
                <div class="mb-3">
                    <label for="end_time" class="form-label">End Time</label>
                    <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create Booking</button>
                    <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back to Booking List</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
