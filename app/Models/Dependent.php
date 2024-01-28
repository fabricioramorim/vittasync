<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'cpf',
        'birth_date',
        'phone',
        'vaccine_id',
        'employee_id',
        'is_active',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
