<?php

namespace Tests\Feature;

use App\User;
use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test CreateUser.
     *
     * @return void
     */
    public function testCanLogin() :void
    {
        $user = factory(User::class)->create([
            'username'=>'test',
            'mail'=>'test@mail',
            'password'=>bcrypt('password'),
            'bio'=>'テストです。',
            'images'=>'dawn.png'
        ]);

        $response = $this->from('/login')->post('/login',[
            'mail'=>$user->mail,
            'password'=>'password'
        ]);

        $response->assertRedirect('/top');

        $this->assertAuthenticatedAs($user);
    }

    public function testInsertFactoryTest()
    {
        $user = factory(User::class)->create([
            'username'=>'test',
            'mail'=>'test@mail',
            'password'=>bcrypt('password'),
            'bio'=>'テストです。',
            'images'=>'dawn.png'
        ]);

        $response = $this->actingAs($user)
            ->get('/top');

        $posts = factory(Post::class, 3)
            ->create(['user_id'=>$user->id]);

        $count = count($posts);

        $this->assertEquals(3, $count);
    }

    /**
     * A basic test CreateUser.
     *
     * @return void
     */
    public function testRegisterUser() :void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

        $url = '/register';
        $postdata = [
            'username'=>'test',
            'mail'=>'te@ma.il',
            'password'=>'password',
            'password_confirmation'=>'password'
        ];
        $response = $this->post($url, $postdata);

        $response->assertStatus(302);
        $response->assertRedirect('/added');
        $this->assertDatabaseHas('users', [
            'username'=>'test'
        ]);

    }

    public function testEditUser()
    {
        $user = factory(User::class)->create(['username'=>'test']);

        $response = $this->actingAs($user)
            ->get('/selfProfile');
        $response->assertStatus(200);
        $response->assertViewIs('posts.showSelfProfile');
        $response->assertSeeText('test');

        $url = '/getSelfProfile';
        $postdata = [
            'username' => 'test',
            'mail' => 'te@mai.co',
            'newPassword' => 'password'
        ];
        $response = $this->post($url, $postdata);

        $response->assertStatus(302);
        $response->assertRedirect('/top');
        $this->assertDatabaseHas('users', ['mail'=>'te@mai.co']);
    }
}
