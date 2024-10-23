<?php

namespace App\Models\shared;

use App\Enums\ActionEnum;
use App\Enums\Log\LogLevelEnum;
use App\Models\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseModel extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @throws \Exception
     */
    public function service()
    {
        $class_name = str_replace('Models', 'Services', static::class).'Service';

        if (! class_exists($class_name)) {
            throw new \Exception('Classname not found.');
        }

        return new $class_name($this);
    }

    /**
     * @throws \Exception
     */
    public function repository()
    {
        $class_name = str_replace('Models', 'Repositories', static::class).'Repository';

        if (! class_exists($class_name)) {
            throw new \Exception('Classname not found.');
        }

        return new $class_name($this);
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'loggable');
    }

    public function logging(LogLevelEnum $level, ActionEnum $action, ?string $message = '', ?array $context = []): void
    {
        $this->logs()->create([
            'level_id' => $level->value,
            'action_id' => $action->value,
            'message' => $message,
            'context' => $context,
        ]);
    }
}
