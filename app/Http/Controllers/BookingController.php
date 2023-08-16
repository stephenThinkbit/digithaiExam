<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Booking as BookingMailer;
use Exception;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = Booking::paginate(10);
        return view('booking.index', [
            'bookings' => $bookings,
            'request' => $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tours = Tour::orderby('id','desc')->get();
        return view('booking.form', [
            'booking' => null,
            'tours' => $tours,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();
            Booking::create($attributes);
            // Mail::to(auth()->user()->email)->send(new BookingMailer());
            return redirect('booking');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $tours = Tour::orderby('id','desc')->get();
        return view('booking.form', [
            'booking' => $booking,
            'tours' => $tours,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        try {
            $attributes = $request->all();
            $booking->update($attributes);
            return redirect('booking');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
            return redirect('booking');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
