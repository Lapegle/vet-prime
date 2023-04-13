<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class Species extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'name',
        'icon'
    ];

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function breeds(): HasMany
    {
        return $this->hasMany(Breed::class);
    }

}
