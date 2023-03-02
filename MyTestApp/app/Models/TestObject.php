<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestObject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'count',
        'price',
        'description',
    ];

    protected $attributes = [
        'count' => 0,
        'price' => 0,
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
