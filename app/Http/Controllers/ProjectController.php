<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function update(Project $project, Request $request)
    {
        $project->update($request->all());

        return $project;
    }

    public function store(Request $request)
    {
        return Project::create($request->all());
    }
}
