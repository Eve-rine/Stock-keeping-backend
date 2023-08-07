<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'country',
        'created_by',
        'updated_by',
        'status',
        'id_number',
        'location',
    ];
}
