@extends('Admin.layouts.app')
@section('title', 'Create Room')
@section('content')
    <div class="container">
        <div style="color: #86b817; font-size:50px; text-align:center; margin-top: 5px" class="comfortaa">Create Room</div>
        <form action="{{ route('Admin.hotels.rooms.store', $hotel->hotel_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="comfortaa" for="room_type">Room_type</label>
                <input style="background-color: rgb(255, 255, 160);" type="text" class="form-control" id="room_type" name="room_type" required>
            </div>
            <div class="form-group">
                <label class="comfortaa" for="price_per_night">Price_per_night</label>
                <input style="background-color: rgb(255, 255, 160);" type="number" class="form-control" id="price_per_night" name="price_per_night" required>
            </div>
            <div class="form-group">
                <label for="rating" class="comfortaa">Availability</label>
                <input type="number" min="0" max="1" step="1" class="form-control" style="background-color: rgb(255, 255, 160);"  id="availability" name="availability"
                     required>
            </div>
            
            <div class="form-group">
                <label class="comfortaa" for="room_image">Image</label>
                <input style="background-color: rgb(255, 255, 160);" accept="image/*" type="file" class="form-control-file" id="room_image" name="room_image">
            </div>
            
            <button type="submit" style="background-color: rgb(99, 139, 192);" class="btn btn-primary comfortaa">Create</button>
        </form>
    </div>
@endsection
