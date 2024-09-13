<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--Libraries Stylesheet Css asset  -->
    <link rel="stylesheet" href="{{asset('assets/lib/animate/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}">

    <!-- Customized Bootstrap Stylesheet -->    
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">

</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>999 Đại Lộ Hòa Bình - Cần Thơ - Việt Nam</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>0999 68 68 68</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>searchbookinghotel@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>

        </div>
    </div>
    <!-- Topbar End -->
    

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>SB Hotels</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    <a href="/service" class="nav-item nav-link {{ Request::is('service') ? 'active' : '' }}">Services</a>
                    <a href="/review" class="nav-item nav-link {{ Request::is('review') ? 'active' : '' }}">Review</a>
                    <a href="/hotel" class="nav-item nav-link {{ Request::is('hotel') ? 'active' : '' }}">Hotel</a>
                    <a href="/booking" class="nav-item nav-link {{ Request::is('booking') ? 'active' : '' }}">Booking</a>
                    <a href="/cart" class="nav-item nav-link {{ Request::is('cart') ? 'active' : '' }}">Cart</a> <!-- Added Cart Link -->

                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('hotel') || Request::is('booking') ? 'active' : '' }}" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="/hotel" class="dropdown-item {{ Request::is('hotel') ? 'active' : '' }}">Hotel</a>
                            <a href="/booking" class="dropdown-item {{ Request::is('booking') ? 'active' : '' }}">Booking</a>
                        </div>
                    </div> -->

                    <a href="/contact" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                </div>
                
                @if(session('user'))
                    <div class="nav-item dropdown {{ Request::is('profile*') || Request::is('logout*') ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ session('user')->username}}</a>
                        <div class="dropdown-menu m-0">
                            <a href="/profile" class="dropdown-item {{ Request::is('profile') ? 'active' : '' }}">Profile</a>
                            <a href="{{ route('logout') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                {{-- <a href="/profile" class="nav-item nav-link {{ Request::is('profile') ? 'active' : '' }}" style="font-size: larger; font-family: Arial, sans-serif;">{{ session('user')->username}}</a> --}}
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4">Login</a>
                @endif
                <!-- <a href="" class="btn btn-primary rounded-pill py-2 px-4">Register</a> -->
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header" id="background">  
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        @yield('navbar')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <button type="button" class="btn btn-primary btn-compare" data-toggle="modal" data-target="#compareModal">
        Xem so sánh
    </button>
    <div class="modal fade" id="compareModal" tabindex="-1" role="dialog" aria-labelledby="compareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="compareModalLabel">So sánh phòng khách sạn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="compareContainer">
                        <!-- Nội dung so sánh sẽ được thêm vào đây -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        @yield('content')
    </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">SB Hotel</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>999 Đại Lộ Hòa Bình - Cần Thơ - Việt Nam</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0999 68 68 68</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>searchbookinghotel@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img src="{{ asset('images/ga1.jpg') }}" alt="ga1" width="75" height="70">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/ga2.jpg') }}" alt="ga2 " width="75" height="70">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/ga3.jpg') }}" alt="ga3 " width="75" height="70">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/ga4.jpg') }}" alt="ga4 " width="75" height="70">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/ga5.jpg') }}" alt="ga5 " width="75" height="70">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/ga6.jpg') }}" alt="ga6 " width="75" height="70">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Enjoy exclusive offers</p>
                    <p>Sign up for the newsletter to receive the latest information about promotions from SB Hotel.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">SB Hotel</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>

    @yield('manual_script') 

    <!-- Template Javascript -->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>