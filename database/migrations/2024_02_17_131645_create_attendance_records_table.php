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
        Schema::create('AttendanceRecord', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("employeeID");
            $table->dateTime('check_in_time');
            $table->dateTime('check_out_time')->nullable();
            $table->timestamps();


            $table->foreign('employeeID')->references('id')->on('Employee')->onUpdate("cascade")->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('AttendanceRecord');
    }
};
