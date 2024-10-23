<?php

namespace Database\Seeders\EnumSeeder\Log;

use App\Enums\Log\LogLevelEnum;
use App\Models\Log\LogLevel;
use Illuminate\Database\Seeder;

class LogLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (LogLevelEnum::cases() as $enum) {
            LogLevel::updateOrCreate([
                'id' => $enum->value,
            ], [
                'name' => $enum->name,
            ]);
        }
    }
}
