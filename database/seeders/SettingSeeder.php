<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name' => 'title_text',
            'value' => 'Dopamine',
        ]);
        DB::table('settings')->insert([
            'name' => 'logo',
            'value' => 'patient/assets/img/logo3.png',
        ]);
    }
}
