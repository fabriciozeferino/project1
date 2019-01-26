<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Repositories\ProjectRepository;
use App\User;

class ProjectsTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function test_only_authenticated_users_can_create_projects()
    {
        $attributes = [
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => 'jhon123',
            'password_confirmation' => 'jhon123',
        ];

        $user = $this->json('post', '/api/register', $attributes)->assertStatus(201);

        $api = json_decode($user->content());

        $token = $api->data->api_token;

        $headers = ['Authorization' => "Bearer $token"];

        $project = [
            'Authorization' => "Bearer $token",
            'title' => 'Title of a Project',
            'description' => 'Body of a Project',
            'user_id' => 1
        ];

        $this->json('post', '/api/projects', $project, $headers)->assertStatus(201);
    }

    // public function test_a_user_can_create_a_project()
    // {
    //     $this->actingAs(factory('App\User')->create());

    //     $attributes = factory('App\Project')->raw();

    //     $this->post('/projects', $attributes)->assertRedirect('/projects');

    //     $this->assertDatabaseHas('projects', $attributes);

    //     $this->get('/projects')->assertSee($attributes['title']);
    // }

    // public function test_a_user_can_view_a_project()
    // {
    //     $this->actingAs(factory('App\User')->create());

    //     $this->withoutExceptionHandling();

    //     $project = factory('App\Project')->create();

    //     $this->get('/projects/' . $project->id)
    //         ->assertSee($project->title)
    //         ->assertSee($project->description);
    // }

    // public function test_a_project_requires_a_title()
    // {
    //     $this->actingAs(factory('App\User')->create());

    //     $attributes = factory('App\Project')->raw(['title' => '']);

    //     $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    // }

    // public function test_a_project_requires_a_description()
    // {
    //     $this->actingAs(factory('App\User')->create());

    //     $attributes = factory('App\Project')->raw(['description' => '']);

    //     $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    // }

}
