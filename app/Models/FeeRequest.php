<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeRequest extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'email',
    'fee_for',
    'amount',
    'token_number',
    'status'
];
}
