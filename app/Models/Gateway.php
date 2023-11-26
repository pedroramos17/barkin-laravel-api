<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gateway extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'date',
        'parked',
        'driver_id',
    ];

    protected $casts = [
        'date' => 'datetime',
        'parked' => 'boolean',
    ];

    public function drivers(): BelongsTo {
        return $this->belongsTo(Driver::class);
    }
}
