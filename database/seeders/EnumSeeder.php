<?php

namespace Database\Seeders;

use Database\Seeders\EnumSeeder\ActionSeeder;
use Database\Seeders\EnumSeeder\Log\LogLevelSeeder;
use Database\Seeders\EnumSeeder\PermissionSeeder;
use Database\Seeders\EnumSeeder\RoleSeeder;
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
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
