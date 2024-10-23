<?php

namespace Database\Seeders;

use App\Enums\ActionEnum;
use App\Enums\ModelEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EnumSeeder::class,
        ]);

        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Warlyn García',
            'email' => 'warlyn@laravel.com',
            'username' => 'warlyn.garcia',
        ]);

        $user->syncPermissionToAction(ActionEnum::view->name, ModelEnum::user->name);
    }
}
