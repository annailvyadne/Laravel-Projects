<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Book; // Assuming you might want to reference books
use App\Models\Member; // Assuming you might want to reference members
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all(); // Fetch all reservations
        return view('reservations.indexReservations', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all(); // Fetch all books for dropdown
        $members = Member::all(); // Fetch all members for dropdown
        return view('reservations.createReservations', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'memberId' => 'required',
            'bookId' => 'required',
            'reservation_date' => 'required|date',  // Make sure it's a valid date
            'status' => 'required|boolean',
        ]);

        // Parse the reservation date into a Carbon instance
        $reservationDate = Carbon::parse($request->reservation_date);

        // Create the reservation with formatted date
        Reservation::create([
            'memberId' => $request->memberId,
            'bookId' => $request->bookId,
            'reservation_date' => $reservationDate->format('Y-m-d'), // Format it to the desired format
            'status' => $request->status,
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        return view('reservations.showReservations', compact('reservation')); // Ensure you have this view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $books = Book::all(); // Fetch all books for dropdown
        $members = Member::all(); // Fetch all members for dropdown
        return view('reservations.updateReservations', compact('reservation', 'books', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $reservationId)
    {
        $request->validate([
            'memberId' => 'required',
            'bookId' => 'required',
            'reservation_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        $reservation = Reservation::findOrFail($reservationId);

        $reservation->update([
            'memberId' => $request->memberId,
            'bookId' => $request->bookId,
            'reservation_date' => $request->reservation_date,
            'status' => $request->status,
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
