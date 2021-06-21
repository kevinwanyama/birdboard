<?php

namespace App\Http\Controllers;

use App\project;
 use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects= Project::all();


    return view('projects.index',compact('projects'));
    }

    public function show(Projects $project)
    {

        return view('projects.show',compact('projects'));
    }

    public function store()
    {
   
    $attributes=request()->validate([
        'title'=>'required',
        'description'=>'required'
        ]);
   
    project::create($attributes);
   
    return redirect('/projects');
    }
}
