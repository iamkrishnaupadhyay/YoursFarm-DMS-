<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

        protected $fillable = ['name', 'phone', 'address', 'email', 'password'];


    /**
     * Get the milk deliveries for the customer.
     */
    public function milkDeliveries()
    {
        return $this->hasMany(MilkDelivery::class);
    }
}