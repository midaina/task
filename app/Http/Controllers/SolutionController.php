<?php

namespace App\Http\Controllers;

use App\Models\solution;
use App\Models\task;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    //

    public function newsolution($id)
    {
        $taskdetails=task::with('subjects')->where('id','=',$id)->first();
        return view('solution.nouveau',compact('id','taskdetails'));
    }

    //request dans le cas  de form
    public function add(Request $request)
    {
        //recuperer l id et email de user
        $user_id=Auth::user()->id;
        $student_email=Auth::user()->email;
        $dt = new DateTime();
        $request->validate([
            'solution' => ['required']

        ]);
        solution::create([
            'solution' => $request->get('solution'),
            'sub_date' => $dt->format('Y-m-d H:i:s'),
            'student_email' =>   $student_email,
            'statut'=> '0',
            'earned_points'=> '0',
            'evaluation_time'=>'0',
            'task_id' => $request->get('task_id'),
            'user_id'=>  $user_id
        ]);
         return back();
        //return redirect()->route('tdetails',$request->get('task_id'));

    }


    //fonction pour les details
    public function details($id){
        $solution=solution::with('sotasks')->where('id','=',$id)->first();

        return view('solution.details',compact('solution'));
    }

    //student solution details
    public function stdetails($id){
        $solution=solution::with('tasks')->where('id','=',$id)->first();
        return view('student.sodetails',compact('solution'));
    }

    public function savepoint($id,Request $request){
        $task_id=$request->get('task_id');
        $task_points=$request->get('task_points');

        $request->validate([
            'earned_points' => ['required', 'numeric','min:2','max:'.$task_points]

        ]);
        solution::where('id','=',$id)->update([
            'statut' =>1,
            'earned_points' => $request->get('earned_points')
        ]);
        //reste a faire redirection
        return redirect()->route('tdetails',$task_id);

    }
}
