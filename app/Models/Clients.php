<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'cnpj',
        'email',
        'phone',
        'address_name',
        'address_number',
        'state',
        'zip_code',
    ];
}
