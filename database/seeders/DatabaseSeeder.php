<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $organization = Organization::create([
            'name' => 'Demo Organization',
            'slug' => 'demo'
        ]);

        User::create([
            'organization_id' => $organization->id,
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'password' => bcrypt('password')
        ]);
 
    }
}