<!-- resources/views/hotels/index.blade.php -->

@extends('Admin.layouts.app')
@section('title', 'List hotel')
@section('content')
    <div class="container" style="padding-top: 20px mb-2">
        <div style="color: #86b817; font-size:80px; text-align:center; margin-top: 5px" class="comfortaa">List Hotels</div>
        <a href="{{ route('Admin.hotels.create') }}" class="btn btn-primary mb-3 comfortaa">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">#</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Name</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Address</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Rating</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Amenities</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Services</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Image</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Option</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($hotels as $hotel)
                    <tr>
                        <th style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;" scope="row">{{ $hotel->hotel_id }}</th>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;" >{{ $hotel->hotel_name }}</td>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;">{{ $hotel->address }}</td>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;">{{ $hotel->rating }}</td>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;">{{ $hotel->amenities }}</td>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;">
                            <ul>
                                @foreach ($hotel->services as $service)
                                    <li>{{ $service->service_name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;">
                            <img src="{{ asset('images/' . $hotel->hotel_image) }}" alt="hotel img">
                        </td>

                        <td style="background-color: rgb(255, 255, 160); text-align:center">
                            <a style="padding: 8px; background-color:rgb(76, 209, 250); margin-bottom: 5px; margin-top: 5px" href="{{ route('Admin.hotels.edit', $hotel->hotel_id) }}"
                                class="btn btn-sm btn-primary comfortaa">
                                <i class="fas fa-edit"></i> edit
                            </a>
                            <form action="{{ route('Admin.hotels.delete', $hotel->hotel_id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button style="padding: 8px; background-color:rgb(255, 99, 120); margin-top: 5px" type="submit" class="btn btn-sm btn-danger comfortaa"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                    <i class="fas fa-trash-alt"></i> delete
                                </button>
                            </form>
                            <a style="padding: 8px; background-color:rgb(250, 192, 133); margin-bottom: 5px; margin-top: 5px" 
                                href="{{ route('Admin.hotels.rooms.index', $hotel->hotel_id) }}"
                                class="btn btn-sm btn-primary comfortaa">
                                <i class="fas fa-edit"></i> room
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                @if ($hotels->onFirstPage())
                    <!-- k hoạt động khi ở trang đầu tiên -->
                    <span><i class="fas fa-arrow-left fa-sm"></i></span>
                @else
                    <!-- chuyển đến trang trước -->
                    <a href="{{ $hotels->previousPageUrl() }}"><i class="fas fa-arrow-left fa-sm"></i></a>
                @endif
            </div>

            <div>
                @for ($i = 1; $i <= $hotels->lastPage(); $i++)
                    <a class="pt-3 pb-2 pl-3 pr-3 bg-secondary text-dark m-2 {{ $i == $hotels->currentPage() ? 'bg-info text-white' : '' }}"
                        href="{{ $hotels->url($i) }}">{{ $i }}</a>
                @endfor
            </div>

            <div>
                Page {{ $hotels->currentPage() }} / {{ $hotels->lastPage() }}
            </div>

            <div>
                @if ($hotels->hasMorePages())
                    <a href="{{ $hotels->nextPageUrl() }}"><i class="fas fa-arrow-right fa-sm"></i></a>
                @else
                    <span><i class="fas fa-arrow-right fa-sm"></i></span>
                @endif
            </div>
        </div>

    </div>
@endsection
