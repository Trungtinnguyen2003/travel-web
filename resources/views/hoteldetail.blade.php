@extends('layout')

@section('title', 'SB Hotel')

@section('navbar')
<h1 class="display-3 text-white mb-3 animated slideInDown">Create Memories to Treasure!</h1>

    </div>
@stop

@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                    <img src="{{ asset('images/' . $hotel->hotel_image) }}" alt="" width="500" height="500">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Hotel</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary">{{ $hotel->hotel_name}}</span></h1>
                    <p class="">
                        <i class="fas fa-star text-warning me-3" style="color: black">
                        </i>
                        {{$hotel->rating}}
                    </p>
                    <p class="mb-4"><i class="fa fa-map-marker-alt text-warning me-3"></i>{{ $hotel->address}}</p>
                    <p class="mb-4"><i class="fas fa-tags text-warning me-2"></i></i>{{ $hotel->amenities}}</p>
                    <!-- @foreach($rooms as $room)
                        <p class="mb-4">{{ $room->room_type}}</p>
                        <p class="mb-4">{{ $room->price_per_night}}</p>
                    @endforeach -->
                    <div class="gy-4 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-3"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-3"><i class="fa fa-arrow-right text-primary me-2"></i>Provide enough information</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-3"><i class="fa fa-arrow-right text-primary me-2"></i>Upgrade membership</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Hotel Start -->
    <div class="container-xxl py-5">

        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Room</h6>
                <h1 class="mb-5">Explore Our Room Collection</h1>
            </div>
            <div class="row g-5">
                @foreach($rooms as $room) 
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <a href = "{{ 'room/' . $room->room_id }}">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('images/' . $room->room_image) }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -35px;">
                            <a href="" class="btn btn-primary rounded-pill py-10 px-10">
                                <div class="d-flex justify-content-center" style="margin-top: 15px;">
                                    <i class="fas fa-hand-holding-usd text-warning"></i>
                                    <p style="margin-left: 5px;"> <h5 class="pricecolor">{{ $room->price_per_night}} <i class="fas fa-dollar-sign"></i></p>
                                </div>
                            </a>
                        </div>
                        <div class="text-center p-4" style="margin-top: -2px;">
                            <a href = "{{ 'hotel/' . $hotel->hotel_id }}">
                                <h5 class="primarycolor mb-0">{{ $room->room_type}}</h5>
                            </a>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Hotel End -->
@stop


