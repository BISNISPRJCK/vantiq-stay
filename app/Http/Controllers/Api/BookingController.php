<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function AddBooking(Request $request)
    {

        $request->validate([
            'room_id' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in'
        ]);

        $room = Room::findOrFail($request->room_id);
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);

        $days = $checkIn->diffInDays($checkOut);

        if ($days < 1) {
            return response()->json([
                'success' => false,
                'message' => 'Minimal booking 1 hari'
            ]);
        }

        $existingBooking = Booking::where('room_id', $request->room_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                    ->orWhereBetween('check_out', [$request->check_in, $request->check_out]);
            })->exists();

        if ($existingBooking) {
            return response()->json([
                'success' => false,
                'message' => 'Ruangan sudah terisi untuk selected date'
            ], 400);
        }

        $totalPrice = $days * $room->price;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $totalPrice,
            'status' => 'pending'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking Berhasil',
            'data' => $booking
        ]);
    }
}
