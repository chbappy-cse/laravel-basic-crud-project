<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Want to sell all projects 
        // $projects = Project::latest()->get();
        $projects = Project::latest()->paginate(10);

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'body' => 'required'
        ]);


        $project = new Project();

        $project->name = request('name');
        $project->body = request('body');
        $project->save();

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.single', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, $id)
    {
        request()->validate([
            'name' => 'required',
            'body' => 'required'
        ]);


        $project = Project::findOrFail($id);

        $project->name = request('name');
        $project->body = request('body');
        $project->save();

        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, $id)
    {
        $project = Project::findOrFail($id);

        $project->delete();
        return redirect('/projects');
    }
}
