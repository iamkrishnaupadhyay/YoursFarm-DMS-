<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilkDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 
        'date_time', 
        'quantity', 
        'fat_percentage', 
        'price_per_liter', 
        'total_payment'
    ];

    /**
     * Get the customer that owns the milk delivery.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
