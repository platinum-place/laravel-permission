<?php

namespace App\Models;

use App\Models\Log\LogLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'level_id', 'message', 'context',
        'loggable_id', 'loggable_type', 'action_id',
    ];

    protected $casts = [
        'context' => 'array',
    ];

    public function loggable()
    {
        return $this->morphTo();
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(LogLevel::class, 'level_id');
    }
}
