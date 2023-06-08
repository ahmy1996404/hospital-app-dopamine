<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert([
            'header' => 'We Are Your Trusted Friend',
            'content' => 'Medizo is a trusted name of Medical Services who is always at your side and your health is our first priority.

Medizo Care will be administered through plan-based customizable programs that incorporate partnership between family members and the care givers for long term illness or disease management.

',
        ]);
        DB::table('about_us_services')->insert([
            'header' => '24/7 Support',
            'about_us_id'=>1,
            'content' => 'Our medical team of different department for long term illness writers and editors makes all the',
            'icon' => 'flaticon-24-hours',
        ]);
        DB::table('about_us_services')->insert([
            'header' => 'Emergency Support',
            'about_us_id' => 1,
            'content' => 'Our medical team of different department for long term illness writers and editors makes all the',
            'icon' => 'flaticon-ambulance-2',
        ]);
    }
}
