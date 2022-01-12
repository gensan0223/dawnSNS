<?php

namespace Tests\Feature;

use App\User;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testReadPost()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create([
            'user_id'=>$user->id,
            'posts'=>'testです'
        ]);
        $response = $this->actingAs($user)
            ->get('/top');
        $response->assertStatus(200);
        $response->assertViewIs('posts.index');
        $response->assertSeeText('testです');
    }

    public function testCreatePost()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('/top');
        $response->assertStatus(200);
        $response->assertViewIs('posts.index');

        $url = '/store';
        $postData = ['post'=>'testです'];
        $response = $this->post($url, $postData);
        $response->assertStatus(302);
        $response->assertRedirect('/top');
        $this->assertDatabaseHas('posts',['posts'=>'testです', 'user_id'=>$user->id]);
    }

    public function testEditPost()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create([
            'user_id'=>$user->id,
            'posts'=>'testです'
        ]);
        $response = $this->actingAs($user)
            ->get('/top');
        $response->assertStatus(200);
        $response->assertViewIs('posts.index');
        $this->assertDatabaseHas('posts', ['posts'=>'testです']);

        $url = '/edit/'.$post->id;
        $response = $this->post($url, [
            'post'=>'更新'
        ]);
        $this->assertDatabaseHas('posts', ['posts'=>'更新']);
    }

    public function testPostDelete()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create([
            'user_id'=>$user->id,
            'posts'=>'testです'
        ]);
        $response = $this->actingAs($user)
            ->get('/top');

        $this->assertDatabaseHas('posts', ['posts'=>'testです']);
        $deleteUrl = '/delete/'. $post->id;
        $response = $this->post($deleteUrl);
        $this->assertDatabaseMissing('posts', ['posts'=>'testです']);
    }
}
