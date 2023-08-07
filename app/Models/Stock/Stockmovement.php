<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockmovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'transaction_type',
        'qty',
        'created_by',
        'updated_by',
        'unit_value',
        'stock_value_total',
    ];
}
