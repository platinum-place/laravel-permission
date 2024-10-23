<?php

namespace Database\Seeders\EnumSeeder;

use App\Enums\ActionEnum;
use App\Models\Action;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (ActionEnum::cases() as $enum) {
            Action::updateOrCreate([
                'id' => $enum->value,
            ], [
                'name' => $enum->getLabel(),
            ]);
        }
    }
}
