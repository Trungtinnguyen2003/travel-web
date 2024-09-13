@extends('layout')

@section('title', 'Hotel')
@section('navbar')
    <h1 class="display-3 text-white mb-3 animated slideInDown">Hotel</h1>
    </div>
@stop

@section('content')
    <!-- Hotel Start -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">DISCOUNT</h6>
                <h1 class="mb-5">Save big today!</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img src="{{ asset('images/hotel1.jpg') }}" alt="hotel1" width="650" height="200">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">Diamond member, 40% discount</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">River Side</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img src="{{ asset('images/hotel2.jpg') }}" alt="hotel 2 Image" width="380" height="200">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">10% OFF</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Gạo Trắng</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img src="{{ asset('images/hotel3.jpg') }}" alt="hotel 3 Image" width="380" height="200">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">Gold member, 35% discount</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Cát Tường</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img src="{{ asset('images/hotel4.jpg') }}" alt="hotel 4" width="500" height="415">
                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">Best Seller</div>
                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Hòa Bình</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hotel Start -->

    <!-- Filter Section -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Bộ lọc</h6>
            </div>
            <form action="{{ route('hotels.filter') }}" method="GET">
                <div class="row g-3">
                    <!-- Giá cả -->
                    <div class="col-lg-4">
                        <label for="price" class="form-label">Khoảng giá:</label>
                        <select class="form-select" id="price" name="price">
                            <option value="">Tất cả</option>
                            <option value="cheap">300.00-500.000VNĐ</option>
                            <option value="moderate">500.000-1.000.000VNĐ</option>
                            <option value="expensive">1.000.000-2.000.000VNĐ</option>
                        </select>
                    </div>
                    <!-- Dịch vụ -->
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
                    <!-- Số sao -->
                    <div class="col-lg-4">
                        <label for="star_rating" class="form-label">Số sao:</label>
                        <select class="form-select" id="star_rating" name="star_rating">
                            <option value="">Tất cả</option>
                            <option value="1">1 sao</option>
                            <option value="2">2 sao</option>
                            <option value="3">3 sao</option>
                            <option value="4">4 sao</option>
                            <option value="5">5 sao</option>
                        </select>
                    </div>
                    <!-- Nút lọc -->
                    <div class="col-lg-12 mt-3">
                        <button type="submit" class="btn btn-primary">Lọc</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Filter Section End -->

    <!-- Danh sách khách sạn -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Danh sách khách sạn</h6>
            </div>
            <div class="row g-4">
                @foreach($hotels as $hotel) 
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{ 'hotel/' . $hotel->hotel_id }}">
                            <div class="team-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{ asset('images/' . $hotel->hotel_image) }}" alt="">
                                </div>
                                <div class="position-relative d-flex justify-content-center" style="margin-top: -25px;">
                                    <a href="" class="btn btn-primary rounded-pill py-10 px-15">
                                        <div class="d-flex justify-content-center" style="margin-top: 15px;">
                                            <i class="fas fa-star text-warning"></i>
                                            <p style="margin-left: 5px;"> {{ $hotel->rating}} </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="text-center p-4" style="margin-top: -20px;">
                                    <a href="{{ 'hotel/' . $hotel->hotel_id }}">
                                        <h5 class=" primarycolor mb-0">{{ $hotel->hotel_name}}</h5>
                                    </a>
                                    <div class="d-flex justify-content-center" style="margin-top: 15px;">
                                        <p class="mb-2"><i class="fa fa-map-marker-alt text-warning me-3 "></i>{{ $hotel->address }}</p>
                                    </div>
                                    <div style="cursor: pointer;" class="add-to-compare absolute" data-hotel-id="{{ $hotel->hotel_id }}" data-hotel-name="{{ $hotel->hotel_name }}" data-hotel-rating="{{ $hotel->rating}}" data-hotel-image="{{ $hotel->hotel_image }}"> <i class="fas fa-plus-circle"></i></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>
    <!-- Danh sách khách sạn End -->

@stop

@section('manual_script')
    <script>
        new MultiSelectTag('services')  // id
    </script>
@endsection
