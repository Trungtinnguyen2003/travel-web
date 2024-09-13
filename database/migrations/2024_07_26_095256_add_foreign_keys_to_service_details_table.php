<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('service_details', function (Blueprint $table) {
            $table->foreign('hotel_id')->references('hotel_id')->on('hotels')->onDelete('cascade');
            $table->foreign('service_id')->references('service_id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_details', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->dropForeign(['service_id']);
        });
    }
};
