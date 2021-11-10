<?php

namespace Database\Seeders;

use App\Models\Catalogue;
use App\Models\Post;
use App\Models\User;
use Database\Factories\PostFactory;
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
        //\App\Models\User::factory(10)->create();
        $user = User::create([
            'name' => 'jinmou',
            'email' => 'jinmou@ex.com',
            'email_verified_at' => 'd',
            'password' => '!pass',            
        ]);

        Catalogue::create(['name' => 'hobby']);
        Catalogue::create(['name' => 'family']);
        Catalogue::create(['name' => 'tech']);
        Catalogue::create(['name' => 'others']);

        User::factory(20)->create();
        
        Post::factory(100)->create();
        // Post::create([
        //     'title' => 'my first post',
        //     'user_id' => $user->id,
        //     'published_at' => '2021-11-09',
        //     'summary' => 'Motivation',
        //     'catalogue_id' => $catalogue->id,
        //     'body' => 'Motivation.I’d like to summarize my work experience. Summarization is a process that can make my knowledge more clear.I’d like to practice my English writing ability. I need a job, these articles can be a displayation or proof for my ability.'
        // ]);
    }
}
