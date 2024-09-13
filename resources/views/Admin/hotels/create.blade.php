@extends('Admin.layouts.app')
@section('title', 'Create Hotel')
@section('content')
    <div class="container">
        <div style="color: #86b817; font-size:50px; text-align:center; margin-top: 5px" class="comfortaa">Create Hotel</div>
        <form action="{{ route('Admin.hotels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="comfortaa" for="name">Tên:</label>
                <input style="background-color: rgb(255, 255, 160);" type="text" class="form-control" id="name" name="name" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="comfortaa" for="address">Địa chỉ:</label>
                <input style="background-color: rgb(255, 255, 160);" type="text" class="form-control" id="address" name="address" required>
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="comfortaa" for="rating">Rating</label>
                <input style="background-color: rgb(255, 255, 160);" type="number" step="0.1" min="1" max="5" class="form-control" id="rating" name="rating">
                @error('rating')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div>
            <div class="form-group">
                <label class="comfortaa" for="amenities">Tiện ích:</label>
                <textarea style="background-color: rgb(255, 255, 160);" class="form-control" id="amenities" name="amenities" rows="3"></textarea>
                @error('amenities')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="comfortaa" for="services">Dịch vụ:</label>
                    <select class="form-control" id="services" name="services[]" multiple>
                        @foreach ($services as $service)
                            <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                        @endforeach
                    </select>
                    @error('services')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label class="comfortaa" for="number_rooms">Số phòng:</label>
                <input style="background-color: rgb(255, 255, 160);" type="number" class="form-control" id="number_rooms" name="number_rooms">
                @error('number_rooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror      
            </div>
            <div class="form-group">
                <label class="comfortaa" for="price">Giá:</label>
                <input style="background-color: rgb(255, 255, 160);" type="decimal" class="form-control" id="price" name="price">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="comfortaa" for="hotel_images">Hình ảnh:</label>
                <input style="background-color: rgb(255, 255, 160);" accept="image/*" type="file" class="form-control-file" id="hotel_images" name="hotel_images">
                @error('hotel_images')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" style="background-color: rgb(99, 139, 192);" class="btn btn-primary comfortaa">Thêm</button>
        </form>
    </div>
@endsection
