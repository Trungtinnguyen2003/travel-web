<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateServicePriceDefault extends Migration
{
    public function up()
    {
        Schema::table('service_details', function (Blueprint $table) {
            $table->decimal('service_price', 8, 2)->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('service_details', function (Blueprint $table) {
            $table->decimal('service_price', 8, 2)->change(); // Hoàn tác lại nếu cần
        });
    }
}
