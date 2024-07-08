<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Employee;
use Illuminate\Http\Request;

class BookingController extends Controller
{


    public function index(Booking $booking)
 {
    $bookings = Booking::with('organizer')->get();

    return view('booking.index', compact('bookings'));
  }


    public function create()
 {
    $bookings = Booking::all();
    $employees = Employee::all(); // Fetch employees from the database
    return view('booking.create', compact('bookings','employees'));
    // return view('bookings', compact('bookings', 'employees'));

   }
    // Other methods like edit, update, and destroy can also use Route Model Binding.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'organizer_id' => 'required|exists:employees,id',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
        ]);

        $conflict = $this->checkForSchedulingConflict($request->input('organizer_id'), $request->input('start_time'), $request->input('end_time'));

        if ($conflict) {
            return redirect()->back()->withInput()->withErrors(['conflict' => 'There is a scheduling conflict for the selected time. Please choose a different time.']);
        }
        Booking::create($request->all());
        // return redirect()->back()->with('success', 'Booking created successfully.');
        return redirect()->back()->withInput()->withErrors(['conflict' => 'Booking created successfully.']);

    }

    // Add functions for update and delete
    public function destroy($id)
    {
        $Booking = Booking::findOrFail($id);
        $Booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }

    private function checkForSchedulingConflict($organizerId, $startTime, $endTime)
    {
        return Booking::where('organizer_id', $organizerId)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                    ->orWhereBetween('end_time', [$startTime, $endTime]);
            })
            ->exists();
    }

    // public function create()
    // {
    //     $employees = Employee::all(); // Fetch employees from the database
    //     return view('Home', compact('employees'));
    // }
}
