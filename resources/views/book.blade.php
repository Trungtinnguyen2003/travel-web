<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>

    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css') }}"/>

    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css') }}" />

    <!-- file css link -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> 

    <!-- bootstrap library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        .form-select {
            height: calc(4.7rem + 2px); /* Adjust height to match other inputs */
            padding: 0.5rem 2rem;
            font-size: 1.475rem;
        }
        .inputBox {
            margin-bottom: 1rem; /* Adjust spacing between inputs */
        }
        .flex {
            display: flex;
            flex-wrap: wrap;
        }
        .inputBox span {
            display: block;
            margin-bottom: 0.5rem;
        }

        .inputBox label {
        display: block; /* Đặt label lên trên cùng của input */
        margin-bottom: 0.5rem; /* Khoảng cách giữa label và input */
        }
        .inputBox input,
        .inputBox select {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<meta name="csrf-token" content="{{ csrf_token() }}">

<body>
    <!-- header section start -->
    <section class="header">
        <a href="{{ url('/') }}" class="logo">Hieu Travel</a>

        <nav class="navbar">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/package') }}">Package</a>
            <a href="{{ url('/book') }}">Book</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
    <!-- header section end -->

    <div class="heading" style="background: url(images/pano.jpg)">
        <h1>Đặt bây giờ</h1>
    </div>

    <!-- book start -->
    <section class="booking">
        <h1 class="heading-title">Đặt chuyến đi của bạn</h1>

        <form action="{{ route('book.store') }}" method="post" class="book-form">
            @csrf
            <div class="flex">
                <div class="inputBox">  
                    <span>Tên: </span>
                    <input type="text" placeholder="Họ và tên" name="name" required class="form-control">
                </div>

                <div class="inputBox">  
                    <span>Email: </span>
                    <input type="email" placeholder="Email" name="email" required class="form-control">
                </div>

                <div class="inputBox">  
                    <span>Số điện thoại: </span>
                    <input type="text" placeholder="Số điện thoại" name="phone" required class="form-control">
                </div>

                <div class="inputBox">  
                    <span>Địa chỉ: </span>
                    <input type="text" placeholder="Địa chỉ" name="address" required class="form-control">
                </div>

                <div class="inputBox">  
                    <span>Điểm đến: </span>
                    <select name="location" class="form-select">
                        <option value="">Chọn tour</option>
                        @foreach($tours as $tour)
                            <option value="{{ $tour->id }}"  data-price="{{ $tour->price }}" {{ old('location') == $tour->id ? 'selected' : '' }}>
                                {{ $tour->name }} - {{ $tour->price }} VND
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="inputBox">
                    <span>Số lượng hành khách: </span>
                    <input type="number" id="guests" placeholder="Nhập số lượng hành khách" name="guests" required min="1" class="form-control">
                </div>

                <div class="inputBox">  
                    <span>Ngày khởi hành: </span>
                    <input type="date" name="arrival" id="arrival" required class="form-control">
                </div>

                <div class="inputBox">  
                    <span>Ngày rời đi: </span>
                    <input type="date" name="leaving" id="leaving" required class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-lg">Đặt Tour</button>
        </form>
    </section>     
    <!-- book end -->

    <!-- footer start -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Đường dẫn</h3>
                <a href="{{ url('/') }}"><i class="fas fa-angle-right"></i>home</a>
                <a href="{{ url('/about') }}"><i class="fas fa-angle-right"></i>about</a>
                <a href="{{ url('/package') }}"><i class="fas fa-angle-right"></i>package</a>
                <a href="{{ url('/book') }}"><i class="fas fa-angle-right"></i>book</a>
            </div>

            <div class="box">
                <h3>Liên kết phụ</h3>
                <a href="#"><i class="fas fa-angle-right"></i>Đặt câu hỏi</a>
                <a href="#"><i class="fas fa-angle-right"></i>Về chúng tôi</a>
                <a href="#"><i class="fas fa-angle-right"></i>Chính sách bảo mật</a>
                <a href="#"><i class="fas fa-angle-right"></i>Điều khoản sử dụng</a>
            </div>

            <div class="box">
                <h3>Thông tin liên lạc</h3>
                <a href="#"><i class="fas fa-phone"></i>0911-60-10-55</a>
                <a href="#"><i class="fas fa-phone"></i>02923-11-86-86</a>
                <a href="#"><i class="fas fa-envelope"></i>hieutravel@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i>Can Tho, Viet Nam</a>
            </div>
            
            <div class="box">
                <h3>Theo dõi chúng tôi</h3>
                <a href="#"><i class="fab fa-facebook"></i>Facebook</a>
                <a href="#"><i class="fab fa-twitter"></i>Twitter</a>
                <a href="#"><i class="fab fa-instagram"></i>Instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i>LinkedIn</a>
            </div>         
        </div>

        <div class="credit"> Created by <span>hieuTravel</span></div>
    </section>
    <!-- footer end -->    

    <!-- swiper js link  -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- file js -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('arrival').setAttribute('min', today);
            document.getElementById('leaving').setAttribute('min', today);
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelector('form.book-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn gửi form mặc định

        const form = event.target;
        const guests = parseInt(form.guests.value);
        const tourSelect = form.location;
        const selectedTour = tourSelect.options[tourSelect.selectedIndex];
        const tourPrice = parseFloat(selectedTour.getAttribute('data-price'));
        const totalPrice = guests * tourPrice * 1000; 

        Swal.fire({
            title: 'Xác nhận đặt tour',
            html: `
                <p>Bạn đã chọn tour: <strong>${selectedTour.text}</strong></p>
                <p>Số lượng hành khách: <strong>${guests}</strong></p>
                <p>Tổng giá tiền: <strong>${totalPrice.toLocaleString('vi-VN')} VND</strong></p>
            `,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tạo FormData từ form
                const formData = new FormData(form);

                // Gửi dữ liệu form qua AJAX
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                }).then(response => {
                    if (response.ok) {
                        return response.json(); // Giả sử server trả về JSON
                    }
                    throw new Error('Network response was not ok.');
                }).then(data => {
                    // Xử lý phản hồi từ máy chủ
                    if (data.success) {
                        Swal.fire({
                            title: 'Thành công!',
                            text: 'Đặt tour thành công!',
                            icon: 'success'
                        }).then(() => {
                            location.reload(); // Reload lại trang
                        });
                    } else {
                        Swal.fire({
                            title: 'Thất bại!',
                            text: 'Đặt tour thất bại!',
                            icon: 'error'
                        }).then(() => {
                            location.reload(); // Reload lại trang
                        });
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Lỗi!',
                        text: 'Có lỗi xảy ra khi đặt tour!',
                        icon: 'error'
                    }).then(() => {
                        location.reload(); // Reload lại trang
                    });
                });
            }
        });
    });
</script>





</body>
</html>
