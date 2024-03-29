<?php

namespace Database\Seeders;

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
        \App\Models\Admin::factory()->create();
        $this->call([
            SettingSeeder::class
        ]);
        $this->call([
            AboutUsSeeder::class
        ]);
    }
}
