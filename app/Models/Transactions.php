<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transactions extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'phone', 'address', 'city', 'state', 'zip', 'country', 'card_number', 'card_holders_name', 'expiry_month', 'expiry_year', 'cvc', 'ip_address', 'created_at'];

    

    use HasFactory;
}
