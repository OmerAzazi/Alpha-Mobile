<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Order extends Model
{
    use HasFactory;
    use Notifiable;
    
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'tracking_no',
        'name',
        'email',
        'phone',
        'pincode',
        'address',
        'delivery_status',
        'payment_status',
        'payment_id',
        
    ];


}
