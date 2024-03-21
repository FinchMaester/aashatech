<?php

namespace Database\Seeders;

use App\Models\Favicon;
use Illuminate\Database\Seeder;

class FavIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Favicon::create([
            'favicon_thirtyTwo' => 'favicon-32x32.png',
            'favicon_sixteen' => 'favicon-16x16.png',
            'favicon_ico'=> 'favicon.ico',
            'apple_touch_icon' => 'apple-touch-icon.png',
            'file' => 'site.webmanifest',

        ]);
    }
}