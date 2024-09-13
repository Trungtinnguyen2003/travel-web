<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRoomController extends Controller
{
    public function index($hotel_id){
        $hotel = Hotel::find($hotel_id);

        if ($hotel) {
            $rooms = DB::table('rooms')->where('hotel_id', $hotel_id)->paginate(7   );;
            
            return view('Admin.rooms.index', ['hotel' => $hotel, 'rooms' => $rooms]);
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy khách sạn với ID đã cho.');
        }
    }

    public function create($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        return view('Admin.rooms.create', compact('hotel'));
    }

    public function store(Request $request, $hotel_id)
    {
        $room = new Room();
        $room->hotel_id = $hotel_id;
        $room->room_type = $request->input('room_type');
        $room->price_per_night = $request->input('price_per_night');
        $room->availability = $request->input('availability');
        if ($request->hasFile('room_image')) {
            $image = $request->file('room_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $room->room_image = $imageName;
        }
        $room->save();
        return redirect()->route('Admin.hotels.rooms.index', $hotel_id)->with('success', 'Room updated successfully');

    }

    public function edit($room_id)
    {
        $room = Room::find($room_id);
        return view('Admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, $room_id)
    {
        $room = Room::find($room_id);
        $room->room_type = $request->input('room_type');
        $room->price_per_night = $request->input('price_per_night');
        $room->availability = $request->input('availability');
        if ($request->hasFile('room_image')) {
            $image = $request->file('room_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $room->room_image = $imageName;
        }
        $hotel_id = $room->hotel_id;
        $room->save();

        return redirect()->route('Admin.hotels.rooms.index', $hotel_id)->with('success', 'Room updated successfully');
    }


    public function destroy($id)
    {
        $room = Room::find($id);
        $hotel_id = $room->room_id;
        $room->delete();

        return redirect()->route('Admin.hotels.rooms.index', $hotel_id)->with('success', 'Room updated successfully');
    }
    
}
