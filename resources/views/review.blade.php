@extends('layout')

@section('title', 'Review')
@section('navbar')
<h1 class="display-3 text-white mb-3 animated slideInDown">Reviews</h1>
    </div>
@stop
@section('content')

    <!-- review Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Review</h6>
                <h1 class="mb-5">Our Customers Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('images/review2.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Chloe</h5>
                    <p>Hà Nội - Việt Nam</p>
                    <p class="mb-0">Khách sạn view đẹp, rộng rãi, nhân viên nhiệt tình.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('images/review3.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Khanh Linh</h5>
                    <p>Đà Nẵng - Việt Nam</p>
                    <p class="mt-2 mb-0"> một kì nghỉ tuyệt vời cùng gia đình. </p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('images/review4.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Hoàng Bách</h5>
                    <p>Sài Gòn - Việt Nam</p>
                    <p class="mt-2 mb-0">Khách sạn sạch sẽ, thoáng mát, được giải quyết nâng hạng phòng nhanh chóng.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('images/review5.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Emma</h5>
                    <p>Singapore</p>
                    <p class="mt-2 mb-0">Great vacation, my family was very satisfied.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('images/review8.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Pamela</h5>
                    <p>Rạch Giá - Việt Nam</p>
                    <p class="mt-2 mb-0">Convenient location, spacious rooms and attentive service.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('images/review6.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Tuệ Mẫn</h5>
                    <p>Bình Phước - Việt Nam</p>
                    <p class="mt-2 mb-0">Phòng ốc sạch sẽ và thoải mái, nhân viên thân thiện và nhiệt tình. </p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('images/review7.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Daisy</h5>
                    <p>ThaiLand</p>
                    <p class="mt-2 mb-0">Beautiful room, great view and professional service. I am very satisfied and will recommend to my friends and family.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('images/review1.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Harry Potter</h5>
                    <p>Hogwarts</p>
                    <p class="mt-2 mb-0">Great service and reasonable prices. I had a relaxing vacation and will come back when the opportunity arises.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- review End -->
    @stop