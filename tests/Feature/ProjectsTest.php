<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
   use WithFAker, RefreshDatabase;
   /**@test */

   public function a_user_can_create_a_project()
   {
       $attribute = [
           'title' => $this->faker->senstence,
           'description'=> $this->faker->paragraph
       ];

       $this->post('/projects',$attributes)->assertRedirect('/projects');

       $this->assertDatabaseHas('projects', $attributes);

       $this->get('/projects')->assertSee($attributes['title']);
   }

   /**@test */
   public function a_user_can_view_a_project()
   {
       $this->withoutExceptionHandling();

       $project = factory('App\Project')->create();

       $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
   }

    /**@test */
   public function a_project_requires_a_title()
   {
       $attribute = factory('App\Project')->raw(['title'=>'']);

       $this->post('/projects',$attributes)->assertSessionHasErrors('title');
   }

    /**@test */
    public function a_project_requires_a_description()
    {
        $attribute = factory('App\Project')->raw(['description'=>'']);

        $this->post('/projects',$attributes)->assertSessionHasErrors('description');
    }

}
