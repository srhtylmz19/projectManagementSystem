<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects=Project::with('user')->get();

        foreach ($projects as $project){
            $date = Carbon::parse($project->deadline);
            $now = Carbon::now();

            $diff = $date->diffInDays($now);

            $project->daysLeft = $diff ;
        }

        return view('projects.projects',compact('projects'));
    }

    public function delete_project($id){
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->back();
    }

    public function add(){
        $users = User::all();
        return view('projects.add',compact('users'));
    }

    public function save(Request $request){


        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->is_done = false ;
        $project->user_id = $request->user_id ;
        $project->deadline = $request->deadline;
        $project->cost = $request->cost;
        $project->percentage = 0;
        $project->save();

        return redirect('/projects');

    }

    public function cancel($id){
        $project = Project::findOrFail($id);
        $project->is_done = false;
        $project->percentage = 0 ;

        $project->save();

        return redirect()->back();
    }

    public function make_done($id){
        $project = Project::findOrFail($id);
        $project->is_done = true;
        $project->percentage = 100 ;
        $project->save();

        return redirect()->back();
    }
    public function edit($id){
        $project = Project::findOrFail($id);
        $users = User::all();
        return view('projects.edit',compact('project','users'));
    }

    public function update(Request $request){

        $project = Project::findOrFail($request->project_id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->deadline = $request->deadline;
        $project->cost = $request->cost;
        $project->user_id = $request->user_id;
        $project->percentage = $request->percentage;

        if ($request->percantage >= 100){
            $project->is_done = true;
        }else {
            $project->is_done = false;
        }

        $project->save();

        return redirect('/projects');


    }
}
