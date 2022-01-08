<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demoform extends Model
{
    use HasFactory;
    protected $table='demoform';
    protected $fillable = [
        'name', 'email', 'enumfield'
    ];
    public $timestamps = false;
}
