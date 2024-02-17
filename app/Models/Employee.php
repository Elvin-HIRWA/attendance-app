<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'Employee';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'identity_number'
    ];
}
