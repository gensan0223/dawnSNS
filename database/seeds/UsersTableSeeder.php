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
                'password'=>bcrypt('password'),
                'images'=>'neko1.png'
            ],
            [
                'username'=>'Seeder2',
                'mail'=>'seeder2@mail.com',
                'password'=>bcrypt('password'),
                'images'=>'neko2.png'
            ],
            [
                'username'=>'Seeder3',
                'mail'=>'seeder3@mail.com',
                'password'=>bcrypt('password'),
                'images'=>'tori1.png'
            ],
        ],
        );
        factory(App\User::class, 20)->create();
    }
}
