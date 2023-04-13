<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class Breed extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'species_id',
        'name'
    ];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }
}
