<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminHotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('services')->get();
        $hotels = Hotel::paginate(5); //phân trang, mỗi trang 5 phần tử
        return view('Admin.hotels.index', compact('hotels')); //đường dẫn, thư viện compact lấy biến hotel
    }

    public function create()
    {
        $services = DB::table('services')->get();
    
        return view('Admin.hotels.create', compact('services'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
            'address' => 'required|string|max:255', 
            'rating' => 'required|numeric|between:1,5', 
            'number_rooms' => 'nullable|integer|min:0', 
            'services' => 'nullable|array', 
            'services.*' => 'exists:services,service_id', 
            'hotel_images' => 'nullable|image|mimes:jpg,jpeg,png, gif|max:2048', 
        ]);

        $hotel = new Hotel();
        $hotel->hotel_name = $request->input('name');
        $hotel->address = $request->input('address');
        $hotel->rating = $request->input('rating');
        $hotel->amenities = $request->input('amenities');
        $hotel->number_rooms = $request->input('number_rooms');


        if ($request->hasFile('hotel_images')) {
            $image = $request->file('hotel_images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $hotel->hotel_image = $imageName;
        }
        $hotel->save();

        //attach các service vào hotel mới tạo
        $selected_services = $request->input('services', []);
        if (!empty($selected_services)) {
            $hotel->attachServices($selected_services);
        }

        return redirect()->route('Admin.hotels.index')->with('success', 'Hotel created successfully');
    }

    public function edit($hotel_id)
    {
        // Lấy thông tin khách sạn cần chỉnh sửa
        $hotel = Hotel::find($hotel_id);
        // Lấy danh sách các dịch vụ từ bảng 'services'
        $services = Service::all();
        // Lấy các service_id đã chọn
        $selected_services = $hotel->services->pluck('service_id')->toArray();

        return view('Admin.hotels.edit', compact('hotel', 'services', 'selected_services'));
    }

    public function update(Request $request, $hotel_id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'rating' => 'required|numeric|between:1,5',
            'number_rooms' => 'nullable|integer|min:0',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,service_id',
            'hotel_images' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $hotel = Hotel::find($hotel_id);
        $hotel->hotel_name = $request->input('name');
        $hotel->address = $request->input('address');
        $hotel->rating = $request->input('rating');
        // $hotel->amenities = $request->input('amenities');
        if ($request->hasFile('hotel_images')) {
            $image = $request->file('hotel_images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $hotel->hotel_image = $imageName;
        }
        $hotel->save();
        // #hint
        // 1. tìm cách bắt được mảng của các service_id mà view gửi lên
        // 2. gọi hàm lưu dữ liệu cho bảng service_detail trong model Hotel
        // Xử lý dịch vụ
        // Lấy mảng dịch vụ từ form
        $selected_services = $request->input('services', []);
        // Đồng bộ hóa dịch vụ với khách sạn
        $hotel->attachServices($selected_services);
        return redirect()->route('Admin.hotels.index')->with('success', 'Hotel updated successfully');
    }


    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();

        return redirect()->route('Admin.hotels.index')->with('success', 'Hotel deleted successfully');
    }
}