@extends('layout')

@section('title', 'Service')

@section('navbar')
<h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
    </div>
@stop

@section('content')
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="mb-5">Our Services</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5>Loyalty program</h5>
                            <p>Thank you for accompanying SB Hotel!</p>
                            <p>To thank customers who regularly use our services, we launch a Loyalty program with many attractive incentives</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                            <h5>Accumulate points</h5>
                            <p>Earn points every time you make a reservation, redeem attractive gifts!</p>
                            <p> The higher the level, the greater the benefit!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user text-primary mb-4"></i>
                            <h5>24/7 Customer Support</h5>
                            <p>Our professional and enthusiastic support staff will answer all your questions and help you book a hotel room quickly and easily.</p>
                            <p>Please contact us today!</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cog text-primary mb-4"></i>
                            <h5>Promotions and offers</h5>
                            <p>Brilliant promotions - Surprisingly cheap prices!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
@stop