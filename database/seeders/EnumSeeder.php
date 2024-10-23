<?php

namespace Database\Seeders;

use Database\Seeders\EnumSeeder\ActionSeeder;
use Database\Seeders\EnumSeeder\Log\LogLevelSeeder;
use Illuminate\Database\Seeder;

class EnumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            LogLevelSeeder::class,
            ActionSeeder::class,
        ]);
    }
}
