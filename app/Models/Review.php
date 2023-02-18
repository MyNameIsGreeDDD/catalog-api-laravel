<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['first_name', 'text'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
