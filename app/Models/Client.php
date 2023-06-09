<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class Client extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
    ];

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }
}
