<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Post::class, 20)->create();
        // DB::table('posts')->insert([
        //     [
        //         'user_id'=>1,
        //         'posts'=>'投稿です。',
        //     ],
        //     [
        //         'user_id'=>2,
        //         'posts'=>'投稿です。',
        //     ],
        //     [
        //         'user_id'=>3,
        //         'posts'=>'投稿です。',
        //     ]
        //     ]);

    }
}
