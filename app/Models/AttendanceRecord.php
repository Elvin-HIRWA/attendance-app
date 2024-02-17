<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    use HasFactory;

    protected $table = 'AttendanceRecord';

    protected $fillable = ['employeeID', 'check_in_time', 'check_out_time'];
}