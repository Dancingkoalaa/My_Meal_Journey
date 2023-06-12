<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishedMeal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'meal_date', 'meal_time'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author');
    }
}

