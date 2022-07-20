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
        'inscricao_estadual',
        'email',
        'phone',
        'address_name',
        'address_number',
        'district',
        'complement',
        'city',
        'state',
        'zipcode',
        'status',
        'client_hash'
    ];

    //status = 0 -> cancelado
    //status = 1 -> aguardando pagamento
    //status = 2 -> ativo
}
