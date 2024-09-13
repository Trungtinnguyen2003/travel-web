@extends('Admin.layouts.app')
@section('title', 'Edit Room')
@section('content')
    <div class="container">
        <div style="color: #86b817; font-size:50px; text-align:center; margin-top: 5px" class="comfortaa">Edit Room</div>

        <form action="{{ route('Admin.rooms.update', $room->room_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="comfortaa">Room_type</label>
                <input type="text" class="form-control" style="background-color: rgb(255, 255, 160);" id="room_type" name="room_type" value="{{ $room->room_type }}" required>
            </div>
            <div class="form-group">
                <label for="address" class="comfortaa">Price_per_night</label>
                <input type="text" class="form-control" style="background-color: rgb(255, 255, 160);" id="price_per_night" name="price_per_night" value="{{ $room->price_per_night }}"
                    required>
            </div>
            <div class="form-group">
                <label for="rating" class="comfortaa">Availability</label>
                <input type="number" min="0" max="1" step="1" class="form-control" style="background-color: rgb(255, 255, 160);"  id="availability" name="availability"
                    value="{{ $room->availability}}" required>
            </div>
            <div class="form-group">
                <label for="amenities" class="comfortaa">Image</label>
                <input type="file" class="form-control" style="background-color: rgb(255, 255, 160);" id="room_image" name="room_image" value="{{ $room->room_image }}">
            </div>
            
            
            <button type="submit" class="btn btn-primary comfortaa" style="background-color: rgb(255, 99, 120)">Save</button>
        </form>
    </div>
@endsection
