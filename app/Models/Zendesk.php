<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zendesk extends Model
{
    use HasFactory;

    protected $table = 'zendesk';

    protected $fillable = [
        'domain',
        'user_email',
        'password',
        'client_id',
    ];
}
