<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $primaryKey = 'hotel_id';

    protected $fillable = [
        'hotel_name',
        'address',
        'rating',
        'amenities',
        'hotel_image'
    ];
    // #hint từ hàm services, gọi phương thức để lưu mảng service_id cần đính kèm vào hotel
    // tham khảo:
    // - https://laravel.com/docs/11.x/eloquent-relationships#many-to-many
    // - https://laravel.com/docs/11.x/eloquent-relationships#updating-many-to-many-relationships
    //   $hotel->services()->attach($service_ids) e.g, $service_ids = [2,3,6]
    public function services() {
        return $this->belongsToMany(Service::class, 'service_details', 'hotel_id', 'service_id');
    }
    public function attachServices($service_ids)
    {
        // Lấy danh sách các service_id hiện tại của khách sạn từ cơ sở dữ liệu
        $existing_services = $this->services->pluck('service_id')->toArray();
        
        // Tạo mảng chứa các dịch vụ cần thêm vào
        $service_details = [];
        
        // Lặp qua các service_id được gửi lên
        foreach ($service_ids as $service_id) {
            // Kiểm tra nếu service_id chưa tồn tại thì thêm vào mảng
            if (!in_array($service_id, $existing_services)) {
                $service_details[$service_id] = ['service_description' => 'no description', 'service_price' => 0];
            }
        }
    
        // Nếu có dịch vụ cần thêm vào thì thực hiện attach
        if (!empty($service_details)) {
            $this->services()->attach($service_details);
        }
    }
    
}
