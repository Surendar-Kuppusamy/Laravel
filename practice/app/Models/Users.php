<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    /* const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on'; */
    protected $fillable = [
        'name', 'address', 'email', 'password', 'email_verified', 'created_on', 'updated_on'
    ];
}
