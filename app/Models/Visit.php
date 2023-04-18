<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class Visit extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'pet_id',
        'history',
        'diagnosis',
        'instructions',
        'notes'
    ];

    protected $casts = [
        'medicaments' => FlexibleCast::class,
        'procedures' => FlexibleCast::class
    ];

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
