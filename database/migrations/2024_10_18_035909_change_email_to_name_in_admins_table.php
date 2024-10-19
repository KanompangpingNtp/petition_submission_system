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
        Schema::table('admins', function (Blueprint $table) {
            //
            // ลบคอลัมน์ email เดิม
            $table->dropColumn('email');

            // เพิ่มคอลัมน์ name ใหม่
            $table->string('name'); // เปลี่ยนเป็น string ตามต้องการ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            //
            // เพิ่มคอลัมน์ email กลับคืน
            $table->string('email')->unique();

            // ลบคอลัมน์ name
            $table->dropColumn('name');
        });
    }
};
