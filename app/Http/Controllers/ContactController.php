<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    // Phương thức để xử lý việc gửi tin nhắn từ trang Contact Us
    public function sendMessage(Request $request)
    {
        // Xử lý logic gửi tin nhắn ở đây (ví dụ: lưu vào cơ sở dữ liệu, gửi email, v.v.)
        
        // Sau khi xử lý xong, chuyển hướng người dùng đến trang cảm ơn
        return redirect()->route('contact.thanks');
    }

    // Phương thức để hiển thị trang cảm ơn
    public function showThanksPage()
    {
        return view('contact_thanks');
    }

    

}
