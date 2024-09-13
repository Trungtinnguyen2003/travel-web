@extends('Admin.layouts.app')
@section('title', 'Create Services')
@section('content')
    <div class="container">
        <div style="color: #86b817; font-size:50px; text-align:center; margin-top: 5px" class="comfortaa">Create Services</div>
        <form action="{{ route('Admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="comfortaa" for="name">Tên dịch vụ:</label>
                <input style="background-color: rgb(255, 255, 160);" type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <button type="submit" style="background-color: rgb(99, 139, 192);" class="btn btn-primary comfortaa">Thêm</button>
        </form>
    </div>
@endsection
