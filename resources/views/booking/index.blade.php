@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   <div class="containter">
    <div class="row justify-content-center" >
        <div class="col-md-9" style="border: 1px solid">
            <h2 class="text-center" style="border: 1px solid #333; background-color: #333; color: #fff;">Booking List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Empoyee Name</th>
                        <th>Eployee Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->title }}</td>
                            <td>{{ $booking->start_time }}</td>
                            <td>{{ $booking->end_time }}</td>
                            <td>{{ $booking->organizer->name }}</td>
                            <td>{{ $booking->organizer->department }}</td>
                            <td>
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

<div class="text-center">
    <a href="{{ route('bookings.create') }}" class="btn btn-success ">Add Booking</a>

</div>

        </div>

    </div>

   </div>


@endsection
