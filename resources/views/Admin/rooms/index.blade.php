@extends('Admin.layouts.app')
@section('title', 'List room')
@section('content')
<!-- resources/views/rooms/index.blade.php -->
    <div class="container" style="padding-top: 20px mb-2">
        <div style="color: #86b817; font-size:80px; text-align:center; margin-top: 5px" class="comfortaa">List Rooms</div>
        <a href="{{ route('Admin.hotels.rooms.create', $hotel->hotel_id )}}" class="btn btn-primary mb-3 comfortaa">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">#</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Room_type</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Price_per_night</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Availability</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Image</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Option</th>

                </tr>
            </thead>
            
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <th style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;" scope="row">{{ $room->room_id }}</th>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;" >{{ $room->room_type }}</td>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;">{{ $room->price_per_night}}</td>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;">{{ $room->availability}}</td>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;">
                            <img src="{{ asset('images/' . $room->room_image) }}" alt="room img">
                        </td>

                        <td style="background-color: rgb(255, 255, 160); text-align:center">
                            <a style="padding: 8px; background-color:rgb(76, 209, 250); margin-bottom: 5px; margin-top: 5px" 
                                href="{{ route('Admin.rooms.edit', $room->room_id) }}"
                                class="btn btn-sm btn-primary comfortaa">
                                <i class="fas fa-edit"></i> edit
                            </a>
                            <form action="{{ route('Admin.rooms.delete', $room->room_id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button style="padding: 8px; background-color:rgb(255, 99, 120); margin-top: 5px" type="submit" class="btn btn-sm btn-danger comfortaa"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                    <i class="fas fa-trash-alt"></i> delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                @if ($rooms->onFirstPage())
                    <!-- k hoạt động khi ở trang đầu tiên -->
                    <span><i class="fas fa-arrow-left fa-sm"></i></span>
                @else
                    <!-- chuyển đến trang trước -->
                    <a href="{{ $rooms->previousPageUrl() }}"><i class="fas fa-arrow-left fa-sm"></i></a>
                @endif
            </div>

            <div>
                @for ($i = 1; $i <= $rooms->lastPage(); $i++)
                    <a class="pt-3 pb-2 pl-3 pr-3 bg-secondary text-dark m-2 {{ $i == $rooms->currentPage() ? 'bg-info text-white' : '' }}"
                        href="{{ $rooms->url($i) }}">{{ $i }}</a>
                @endfor
            </div>

            <div>
                Page {{ $rooms->currentPage() }} / {{ $rooms->lastPage() }}
            </div>

            <div>
                @if ($rooms->hasMorePages())
                    <a href="{{ $rooms->nextPageUrl() }}"><i class="fas fa-arrow-right fa-sm"></i></a>
                @else
                    <span><i class="fas fa-arrow-right fa-sm"></i></span>
                @endif
            </div>
        </div>

    </div>
@endsection
