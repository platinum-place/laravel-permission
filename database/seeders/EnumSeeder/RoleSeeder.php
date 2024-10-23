<?php

namespace Database\Seeders\EnumSeeder;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RoleEnum::cases() as $enum) {
            Role::updateOrCreate([
                'id' => $enum->value,
            ], [
                'name' => $enum->getLabel(),
            ]);
        }
    }
}
