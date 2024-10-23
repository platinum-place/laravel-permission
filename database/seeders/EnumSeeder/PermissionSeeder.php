<?php

namespace Database\Seeders\EnumSeeder;

use App\Enums\ActionEnum;
use App\Enums\ModelEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (ActionEnum::cases() as $action) {
            foreach (ModelEnum::cases() as $model) {
                $value = "{$action->name}_{$model->name}";
                Permission::updateOrCreate([
                    'name' => $value,
                ]);
            }
        }
    }
}
