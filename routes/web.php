<?php


use App\Http\Controllers\Admin\AdminHotelController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminRoomController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;

Route::get('/user', function () {
    $users = User::all();
    return response()->json($users);
});


Route::get('/', function () {
    return view('home');
});
Route::get('/', [HomeController::class, 'getAllHotels']); // Định nghĩa route chỉ gọi phương thức getAllHotels

// Route::get('/', function () {
//     $homeController = new HomeController();
//     return $homeController->getAllHotels(); // Gọi phương thức getAllHotels từ HomeController
// });

Route::get('/service', function () {
    return view('service');
});
Route::get('/review', function () {
    return view('review');
});

Route::get('booking', function () {
    return view('booking');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/hotel', [HotelController::class, 'index']);
Route::get('/hoteldetail', function () {
    return view('hoteldetail');
});

Route::get('/hotel/{hotel_id}', [HotelController::class, 'getHotelById']);


// Route để xử lý việc gửi tin nhắn từ trang Contact Us
Route::post('/contact/send-message', [ContactController::class, 'sendMessage'])->name('contact.send');

// Route để hiển thị trang cảm ơn
Route::get('/contact/thanks', [ContactController::class, 'showThanksPage'])->name('contact.thanks');

// Route cho trang đăng nhập
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');




Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


// Route::get('/profile', function () {
//     return view('profile');
// });


Route::get('/logout', [SignOutController::class, 'logoutAccount'])->name('logout');


Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');

Route::get('/updateProfile/{customer_id}', [ProfileController::class, 'showUpdateInfo'])->name('updateProfile.edit');
Route::put('/updateProfile/{customer_id}', [ProfileController::class, 'updateProfile'])->name('updateProfile.update');

//Admin/hotels
Route::get('/admin/hotels', [AdminHotelController::class, 'index'])->name('Admin.hotels.index');

Route::get('/admin/hotels/create', [AdminHotelController::class, 'create'])->name('Admin.hotels.create');
Route::post('/admin/hotels/store', [AdminHotelController::class, 'store'])->name('Admin.hotels.store');

Route::get('/admin/hotels/{hotel_id}/edit', [AdminHotelController::class, 'edit'])->name('Admin.hotels.edit');
Route::put('/admin/hotels/{hotel_id}/update', [AdminHotelController::class, 'update'])->name('Admin.hotels.update');

Route::delete('/admin/hotels/{hotel_id}/delete', [AdminHotelController::class, 'destroy'])->name('Admin.hotels.delete');
 
//admin room
// Route::get('/admin/rooms', [AdminRoomController::class, 'index'])->name('Admin.rooms.index');
Route::get('admin/hotels/{hotel_id}/rooms', [AdminRoomController::class, 'index'])->name('Admin.hotels.rooms.index');

Route::get('/admin/hotels/{hotel_id}/rooms/create', [AdminRoomController::class, 'create'])->name('Admin.hotels.rooms.create');

Route::post('/admin/hotels/{hotel_id}/rooms/store', [AdminRoomController::class, 'store'])->name('Admin.hotels.rooms.store');


Route::get('/admin/hotels/{room_id}/rooms/edit', [AdminRoomController::class, 'edit'])->name('Admin.rooms.edit');
Route::put('/admin/hotels/{room_id}/rooms/update', [AdminRoomController::class, 'update'])->name('Admin.rooms.update');

Route::delete('/admin/hotels/{room_id}/rooms/delete', [AdminRoomController::class, 'destroy'])->name('Admin.rooms.delete');

Route::get('/hotels/filter', [HotelController::class, 'filter'])->name('hotels.filter');

//Admin/services

Route::get('/admin/services/', [AdminServiceController::class, 'index'])->name('Admin.services.index');

Route::get('/admin/services/create', [AdminServiceController::class, 'create'])->name('Admin.services.create');
Route::post('/admin/services/store', [AdminServiceController::class, 'store'])->name('Admin.services.store');

Route::get('/admin/services/{service_id}/edit', [AdminServiceController::class, 'edit'])->name('Admin.services.edit');
Route::put('/admin/services/{service_id}/update', [AdminServiceController::class, 'update'])->name('Admin.services.update');

Route::delete('/admin/services/{service_id}/delete', [AdminServiceController::class, 'destroy'])->name('Admin.services.delete');

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/cart', function () {
    return view('payment'); // Show the payment form
})->name('payment.form');

Route::post('/cart/process', [PaymentController::class, 'process'])->name('payment.process');

//cong thanh toans
Route::post('/vnpay_payment', [CheckoutController::class, 'vnpay_payment']);


