<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Customer extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'customer_image',
    ];

    // Định nghĩa các phương thức cần thiết
    public function getAuthIdentifierName()
    {
        return 'customer_id'; // Tên trường chứa ID của khách hàng
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Trả về ID của khách hàng
    }

    public function getAuthPassword()
    {
        return $this->password; // Trả về mật khẩu đã mã hóa của khách hàng
    }

    public $timestamps = false;
}
