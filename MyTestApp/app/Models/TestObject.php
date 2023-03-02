<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestObject extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'count',
        'price',
        'description'
    ];
    protected $attributes = [
        'count' => 0,
        'price' => 0
    ];
}
