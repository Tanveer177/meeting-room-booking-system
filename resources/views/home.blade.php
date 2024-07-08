@extends('layouts.sidebar')
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Booking</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('bookings.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Meeting Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="organizer_id">Organizer:</label>
                <select name="organizer_id" id="organizer_id" class="form-control" required>
                    <option value="">Select Organizer</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('organizer_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
                @error('organizer_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}" required>
                @error('start_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}" required>
                @error('end_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Booking</button>
        </form>

        @error('conflict')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
    </div>
@endsection
