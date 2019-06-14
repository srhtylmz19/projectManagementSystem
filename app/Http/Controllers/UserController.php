<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        foreach ($users as $user){
            $project_count = Project::where('user_id',$user->id)->count();
            $user->project_count = $project_count ;
        }
        return view('users.users',compact('users'));
    }

    public function delete_user($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function add(){
        return view('users.add');
    }

    public function save(Request $request){

        $users = User::all();

        foreach ($users as $usr){
            if ($usr->email == $request->email){
                return redirect()->back()->with('error','Bu mail adresi kullanımda');
            }
        }

        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->name);

        $user->save();

        return redirect('/users');
    }
    public function edit_user($id){
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    public function update(Request $request){
        $users = User::all();
        foreach ($users as $usr){
            if ($usr->email == $request->email){
                return redirect()->back()->with('error','Bu mail adresi kullanımda');
            }
        }
        $user = User::findOrFail($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/users');

    }

    public  function add_to_project($id){
        $user_id = $id ;
        $projects = Project::all();
        return view('users.add_to_project',compact('user_id','projects'));
    }

    public function add_user_to_project(Request $request){
        $project=Project::findOrFail($request->project_id);
        $project->user_id = $request->user_id;
        $project->save();

        $user=User::findOrFail($request->user_id);
        $user->number_of_projects ++ ;
        $user->save();

        return redirect('/users');
    }
}
