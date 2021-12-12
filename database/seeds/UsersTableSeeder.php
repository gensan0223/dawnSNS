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
        //
        DB::table('users')->insert([
            [
                'username'=>'Seeder1',
                'mail'=>'seeder1@mail.com',
                'password'=>bcrypt('password')
            ]
            ]);
    }
}
