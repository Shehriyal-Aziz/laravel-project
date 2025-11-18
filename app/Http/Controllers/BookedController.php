<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;


class BookedController extends Controller
{
    public function storerecord(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'num' => 'required|string',
            'email' => 'required|email|unique:bookings,email',
            'persons' => 'required|string',
            'date' => 'required|date',
        ]);

        $booking = new Booking();
        $booking->name = $request->name;
        $booking->num = $request->num;
        $booking->email = $request->email;
        $booking->persons = $request->persons;
        $booking->date = $request->date;

        $booking->save();

        return redirect('/');
    }

    function records()
    {

        $records = Booking::all();
        return view('admin.booked', compact('records'));
    }

    public function destroy($id)
    {
        Booking::destroy($id);   // deletes by id
        return redirect()->back();
    }
}
