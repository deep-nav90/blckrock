<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admins
        \DB::table('admins')->delete();
        \DB::table('admins')->insert([
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'superadmin@bookys.com',
                'password' => Hash::make('Sup3r@dm!n'),
                'role_id' => 1
            ],
        ]);
    }
}



   
  
   
    
   
  
