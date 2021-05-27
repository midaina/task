<?php

namespace App\Http\Controllers;

use App\Models\solution;
use App\Models\task;
use Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function newtask($id)
    {
        return view('task.nouveau',compact('id'));
    }

    //request dans le cas  de form
    public function add($id,Request $request)
    {
        //recuperer l id de user
        $user_id=Auth::user()->id;
        $request->validate([
            'name' => ['required', 'min:5'],
            'description'=>'required'
        ]);
        task::create([
            'name' => $request->get('name'), // premier name=nom de column de db et 2eme c est le nom de form input
            'description' => $request->get('description'),
            'points' => $request->get('points'),
            'user_id' => $user_id,
            'subject_id'=>$request->get('subject_id')
        ]);
       // return back();
        return redirect()->route('sdetails',$request->get('subject_id'));

    }

    //fonction pour les details
    public function details($id){
        $task=task::with('subjects','solutions')->where('id','=',$id)->first();
        $count= solution::where('task_id','=',$id)->count();
        $count2= solution::where('task_id','=',$id)->where('statut','=',1)->count();
        return view('task.details',compact('task','count','count2'));
    }


    public function update($id){
        $task=task::where('id','=',$id)->first();
        return view('task.update',compact('task'));
    }

    public function updated($id,Request $request){
        $request->validate([
            'name' => ['required', 'min:5'],
            'description'=>'required'
        ]);

        task::where('id','=',$id)->update([
            'name' => $request->get('name'), // premier name=nom de column de db et 2eme c est le nom de form input
            'description' => $request->get('description'),
            'points' => $request->get('points'),
            'user_id' => $request->get('user_id'),
            'subject_id'=>$request->get('subject_id')
        ]);
        return redirect()->route('tdetails',$id);
    }

}
