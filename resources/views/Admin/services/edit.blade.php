@extends('Admin.layouts.app')
@section('title', 'Edit Services')
@section('content')
    <div class="container">
        <div style="color: #86b817; font-size:50px; text-align:center; margin-top: 5px" class="comfortaa">Edit Services</div>

        <form action="{{ route('Admin.services.update', $service->service_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="comfortaa">Tên dịch vụ:</label>
                <input type="text" class="form-control" style="background-color: rgb(255, 255, 160);" id="name" name="name" value="{{ $hotel->hotel_name }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary comfortaa" style="background-color: rgb(255, 99, 120)">Lưu</button>
        </form>
    </div>
@endsection
