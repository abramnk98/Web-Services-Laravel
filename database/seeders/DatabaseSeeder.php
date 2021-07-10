<?php

namespace Database\Seeders;

use App\Models\Service;
use Database\Factories\ServiceFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
        \App\Models\Service::factory(12)->create();
        \App\Models\Employee::factory(10)->create();
        \App\Models\Profile::factory(10)->create();

        $this->call([
            PageSeeder::class,
        ]);

    }
}
