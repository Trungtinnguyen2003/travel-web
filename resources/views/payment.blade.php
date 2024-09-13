@extends('layout')

@section('title', 'Thanh toán')

@section('navbar')
<h1 class="display-3 text-white mb-3 animated slideInDown">Thanh toán</h1>
@stop

@section('content')
<!-- Bắt đầu thanh toán -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Thanh toán</h6>
            <h1 class="mb-5">Thông tin thanh toán</h1>
        </div>
        <section>
            <div class="row g-4">
                <!-- Thông tin chuyến tham quan (Hình ảnh tour) -->
                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="inputBox mb-4">
                        <img src="{{ asset('images/about.jpg') }}" alt="Tour Image" width="500" height="450">
                    </div>
                </div>
                
                <!-- Thông tin thanh toán (Tên tour, Số lượng, Nút PayPal, Nút VNPay) -->
                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                    <form action="{{ route('payment.process') }}" method="post" class="book-form">
                        @csrf
                        <div class="inputBox mb-3">
                            <label for="tour_name">Tên tour:</label>
                            <input type="text" id="tour_name" placeholder="Tên tour" name="tour_name" value="Vincomw" readonly class="form-control">
                        </div>
                        <div class="inputBox mb-3">
                            <label for="quantity">Số lượng:</label>
                            <input type="number" id="quantity" placeholder="Số lượng" name="quantity" value="1" class="form-control">
                        </div>

                        <!-- PayPal Button Container -->
                        <div id="paypal-button-container" class="mb-3"></div>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script src="https://www.paypal.com/sdk/js?client-id=ATHJ6oFUMn6quErRqdSGlbMBzA9N5lH6j5k-5DMaDYK7xbiRvmVxtrMLTSTXAJGkhKIodL8EMJQea_C1"></script>
                        <script>
                            paypal.Buttons({
                                style: {
                                    size: 'small',  
                                    color: 'gold',
                                    shape: 'pill',
                                },
                                createOrder: function(data, actions) {
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: '120', // Cập nhật giá trị này một cách linh hoạt nếu cần
                                                currency_code: 'USD'
                                            }
                                        }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    console.log('onApprove triggered');  // Debugging line
                                return actions.order.capture().then(function(details) {
                            // Show a confirmation message to the buyer
                            Swal.fire({
                                title: 'Thanh toán thành công!',
                                text: 'Cảm ơn bạn đã mua hàng!',
                                icon: 'success'
                            }).then(() => {
                                location.reload(); // Reload the page
                            });
                        });
                    },
                                onError: function(err) {
                                    Swal.fire({
                                        title: 'Lỗi',
                                        text: 'Đã xảy ra lỗi trong quá trình thanh toán!',
                                        icon: 'error'
                                    });
                                }
                            }).render('#paypal-button-container');
                        </script>

                        <!-- VNPay Button -->
                        <form action="{{ url('/vnpay_payment') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg mt-2" name="redirect">Thanh Toán VNPay</button>
                        </form>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Kết thúc thanh toán -->
@stop
