<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_code',
        'name',
        'phone',
        'address',
        'note',
        'product_name',
        'total_order',
        'total',
        'status',
    ];
}
