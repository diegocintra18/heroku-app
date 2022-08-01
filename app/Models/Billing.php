<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $table = 'billing';

    protected $fillable = [
        'amount',
        'transaction_hash',
        'expiration_date',
        'transaction_id',
        'status',
        'payment_date',
        'client_id'
    ];
}
