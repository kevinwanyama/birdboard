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
}
