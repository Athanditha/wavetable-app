<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected  $table = 'customers';

    protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'email',
        'password',
        'contact_no',
    ];

}