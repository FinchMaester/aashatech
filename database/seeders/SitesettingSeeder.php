<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SitesettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sitesettings')->insert([
            'govn_name' => 'Nepal',
            'ministry_name' => 'Nepal',
            'department_name' => 'Nepal',
            'office_name' => 'Aasha Tech',
            'office_address' => 'Sinamangal,Kathmandu',
            'office_contact' => '+9774596538, 9851241656',
            'office_mail' => 'info.aashatech@gmail.com',
            'main_logo' => 'uploads/sitesetting/main_logo.png',
            'side_logo' => 'uploads/sitesetting/side_logo.png',
            'face_link' => 'https://www.facebook.com/aashatech',
            'insta_link' => 'https://www.instagram.com/aashatech/',
            'linked_link' => 'https://www.linkedin.com/in/bibek-guragain-b020a9198/',
            'social_link' => 'https://www.linkedin.com/',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.5838728332933!2d85.3486855148711!3d27.699253482795278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1bdfeb28a41f%3A0xf0e4c10a1694fa53!2sAasha%20Tech!5e0!3m2!1sen!2snp!4v1674808462785!5m2!1sen!2snp',
            'f_page' => 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Faashatech&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId',
            'slogan' => 'This is our default slogan',
            'desc' => 'This is our default description',
            'year' => '2019'
        ]);
    }
}
