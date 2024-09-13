<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Service;

class HotelController extends Controller
{

    public function index(Request $request)
    {
        // Lấy tất cả khách sạn
        $hotels = Hotel::paginate(5);

        // Lấy danh sách dịch vụ để hiển thị trong filter
        $services = Service::all();

        return view('hotel', compact('hotels', 'services'));
    }

    public function getAllHotels()
    {
        
        $hotels = DB::table('hotels')->get();

        return view('hotel', ['hotels' => $hotels]);
    }
    
     // Phương thức để xử lý yêu cầu lọc từ form
     public function filter(Request $request)
     {
         // Lấy các tham số lọc từ request
         $price = $request->input('price');
         $services = $request->input('services'); // Lấy mảng services
         $star_rating = $request->input('star_rating');
         
         $query = DB::table('hotels');
         
         // Lọc theo giá
         if ($price) {
             if ($price == 'cheap') {
                 $query->where('price', '<', 500000);
             } elseif ($price == 'moderate') {
                 $query->whereBetween('price', [500000, 1000000]);
             } elseif ($price == 'expensive') {
                 $query->where('price', '>', 1000000);
             }
         }
         
         // Lọc theo dịch vụ
         //viết câu truy vấn để lọc khách sạn mà người dùng gửi lên
         if ($services && is_array($services)) {
             $query->join('service_details', 'hotels.hotel_id', '=', 'service_details.hotel_id')
                   ->whereIn('service_details.service_id', $services);
         }
         
         // Lọc theo số sao
         if ($star_rating) {
             $query->where('rating', $star_rating);
         }
         
         // Lấy danh sách khách sạn đã lọc
         $filteredHotels = $query->get();

         $servicesDB = Service::all();
         
         return view('hotel', ['hotels' => $filteredHotels, 'services' => $servicesDB]);
     }
     

    public function getHotelById($hotel_id)
    {   
        // Lấy thông tin của khách sạn từ bảng 'hotels'
        $hotel = DB::table('hotels')->where('hotel_id', $hotel_id)->first();

        if ($hotel) {
            // Lấy danh sách các phòng của khách sạn từ bảng 'rooms'
            $rooms = DB::table('rooms')->where('hotel_id', $hotel_id)->get();

            // Trả về view 'hoteldetail' với thông tin của khách sạn và danh sách phòng
            return view('hoteldetail', ['hotel' => $hotel, 'rooms' => $rooms]);
        } else {
            // Xử lý trường hợp không tìm thấy khách sạn với ID đã cho
            return redirect()->back()->with('error', 'Không tìm thấy khách sạn với ID đã cho.');
        }
    }

    

}


