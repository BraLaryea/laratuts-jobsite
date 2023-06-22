<?php

namespace Database\Seeders;

use App\Models\Listing;
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
        \App\Models\User::factory(10)->create();

        Listing::factory(6)->create();

        // Listing::create([
        //     'title' => 'Job Title 1',
        //     'tags' => 'Tag1, Tag2',
        //     'company' => 'Company A',
        //     'location' => 'Location A',
        //     'email' => 'email1@example.com',
        //     'website' => 'https://www.example.com',
        //     'description' => 'This is the description for Job 1.',  
        // ]);

        // Listing::create([
        //     'title' => 'Job Title 2',
        //     'tags' => 'Tag3, Tag4',
        //     'company' => 'Company B',
        //     'location' => 'Location B',
        //     'email' => 'email2@example.com',
        //     'website' => 'https://www.example.com',
        //     'description' => 'This is the description for Job 2.',
        // ]);
    }
}
