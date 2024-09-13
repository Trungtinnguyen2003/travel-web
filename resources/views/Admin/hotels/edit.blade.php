@extends('Admin.layouts.app')
@section('title', 'Edit Hotel')
@section('content')
    <div class="container">
        <div style="color: #86b817; font-size:50px; text-align:center; margin-top: 5px" class="comfortaa">Edit Hotel</div>

        <form action="{{ route('Admin.hotels.update', $hotel->hotel_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="comfortaa">Tên khách sạn:</label>
                <input type="text" class="form-control" style="background-color: rgb(255, 255, 160);" id="name" name="name" value="{{ $hotel->hotel_name }}" required>
            </div>
            <div class="form-group">
                <label for="address" class="comfortaa">Địa chỉ:</label>
                <input type="text" class="form-control" style="background-color: rgb(255, 255, 160);" id="address" name="address" value="{{ $hotel->address }}"
                    required>
            </div>
            <div class="form-group">
                <label for="rating" class="comfortaa">Đánh giá:</label>
                <input type="number" step="0.1" class="form-control" style="background-color: rgb(255, 255, 160);" min=1 max=5 id="rating" name="rating"
                    value="{{ $hotel->rating }}" required>
            </div>
            <div class="form-group">
                <label for="amenities" class="comfortaa">Tiện ích:</label>
                <input type="text" class="form-control" style="background-color: rgb(255, 255, 160);" id="amenities" name="amenities" value="{{ $hotel->amenities }}">
            </div>
            <div class="form-group">
                <label class="comfortaa" for="services">Dịch vụ:</label>
                <select class="form-control" id="services" name="services[]" multiple>
                    <!-- tìm các gửi mảng bao gồm service_id của các dịch vụ được chọn lên controller -->
                    @foreach ($services as $service)
                        <option value="{{ $service->service_id }}"
                            {{ in_array($service->service_id, old('services', $selected_services)) ? 'selected' : '' }}>
                            {{ $service->service_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="number_rooms" class="comfortaa">Số phòng:</label>
                <input type="number" class="form-control" style="background-color: rgb(255, 255, 160);" id="number_rooms" name="number_rooms">
            </div>
            <div class="form-group">
                <label for="hotel_images" class="comfortaa">Giá:</label>
                <input type="decimal" class="form-control" style="background-color: rgb(255, 255, 160);" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="hotel_images" class="comfortaa">Hình ảnh:</label>
                <input type="file" class="form-control-file" style="background-color: rgb(255, 255, 160);" id="hotel_images" name="hotel_images">
            </div>
            
            <button type="submit" class="btn btn-primary comfortaa" style="background-color: rgb(255, 99, 120)">Save</button>
        </form>
    </div>
@endsection