<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Armin Djulovic',
            'email' => 'armindjulovic@msn.com',
            'password' => bcrypt('arminking6'),
            'is_role' => 'super_admin',
        ]);
    }
}
