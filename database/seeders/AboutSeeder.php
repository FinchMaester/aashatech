<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title'=> 'Who we are',
            'slug'=> '',
            'subtitle'=>'',
            'image'=>'',
            'description'=>'When we proposed the idea of Aasha Tech, we thought about giving something back to the society that has given us so much. The name stands as “Hope” and we hope to see Digital Nepal someday and we want to be the part of the team to do so.
            With years of knowledge and experience garnered in the field of Web and Software, we started this company in 2018 solely to help startups and small businesses get the platform to flourish. And with our creative ideas and hard work, we were offered Government contracts to build their software, websites and android applications. Our track record has been excellent. We love what we do, that you can see in our work. We complete our tasks on time and our sole purpose is to work out something creative that just clicks for everyone.',
            'content'=>'',
        ]);
    }
}
