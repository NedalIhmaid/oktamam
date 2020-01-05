<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        
        $user->attachRole('admin');

    }//end of run

}//end of users table seeder
