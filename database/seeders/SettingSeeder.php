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
        DB::table('settings')->insert([
            'name' => 'address',
            'value' => '123 William St Suite 801, New York, USA',
        ]);
        DB::table('settings')->insert([
            'name' => 'phone',
            'value' => '+001-548-159-2491',
        ]);
        DB::table('settings')->insert([
            'name' => 'email',
            'value' => 'hello@medizo.com',
        ]);
    }
}
