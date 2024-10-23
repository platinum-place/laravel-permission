<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\shared\BaseAuthModel;
use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

#[ObservedBy([UserObserver::class])]
class User extends BaseAuthModel
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory,HasRoles,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function syncPermissionTo(string $permission): void
    {
        if ($this->hasPermissionTo($permission)) {
            $this->revokePermissionTo($permission);
        } else {
            $this->givePermissionTo($permission);
        }
    }

    public function hasPermissionToAction(string $action, string $model): bool
    {
        return $this->hasPermissionTo("{$action}_{$model}");
    }

    public function syncPermissionToAction(string $action, string $model): void
    {
        $this->syncPermissionTo("{$action}_{$model}");
    }

    public function syncPermissionToActionMultiple(array $permissions): void
    {
        foreach ($permissions as $permission){
            $this->syncPermissionTo($permission);
        }
    }
}
