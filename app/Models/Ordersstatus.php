<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordersstatus extends Model
{
    use HasFactory;
    protected $table = 'ordersstatus';
    protected $fillable = ['status'];
}
