<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogLevel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id', 'name',
    ];
}
