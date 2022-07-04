<?php

namespace App\Models\Zendesk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZendeskRules extends Model
{
    use HasFactory;

    protected $table = 'zendesk_rules';

    protected $fillable = [
        'zendesk_visualization_id',
        'zendesk_visualization_name',
        'rule_type',
        'zendesk_formula',
        'green_range',
        'yellow_range',
        'order',
        'client_id',
    ];
}
