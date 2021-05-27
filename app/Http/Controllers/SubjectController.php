<?php

namespace App\Http\Controllers;

use App\Models\solution;
use App\Models\subject;
use App\Models\taken_subject;
use App\Models\task;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{

    public function newsubject()
    {
        return view('subject.nouveau');
    }

    //request dans le cas  de form
    public function add($id,Request $request)
    {
        //validation rules
        $request->validate([
            'name' => ['required', 'min:3'],
            'sub_code'=>['required'],
            'credit_val'=>['required','numeric']
        ]);
        subject::create([
            'name' => $request->get('name'), // premier name=nom de column de db et 2eme c est le nom de form input
            'description' => $request->get('description'),
            'sub_code' => $request->get('sub_code'),
            'credit_val' => $request->get('credit_val'),
            'user_id'=>$id
        ]);
        //return back();
        return redirect()->route('dashboard');
    }

    //Teacher subject details
    public function details($id){
        $cl=subject::with('users','tasks')->where('id','=',$id)->first();
        $count= taken_subject::where('subject_id','=',$id)->count();
        //reste a faire
        $students= taken_subject::with('users')->where('subject_id','=',$id)->get();
        return view('subject.details',compact('cl','count','students'));
    }

    //Student subject details
    public function sdetails($id){
        $user_id=Auth::user()->id;
        $subjects=subject::with('users','tasks')->where('id',$id)->first();
        $solutions=solution::where('user_id',$user_id)->get();
        $count= taken_subject::where('subject_id',$id)->count();
        //reste a faire
        $students= taken_subject::with('users')->where('subject_id',$id)->get();
//        dd($subjects);
        return view('student.details',compact('subjects','count','students','solutions'));
    }


    //Display subjects
    public function subjectlist()
    {
        //recuperer l id de user
        $id=Auth::user()->id;
        $status=Auth::user()->status;
//        $lists=DB::table('todo_lists')->get();
        //$lists=clinique::all();
        //with pour la relation. 'users' represente la fonction dans le model clinique
        $lists = subject::where('user_id','=',$id)->with('users')->get();
        $lists2 = subject::with('users')->get();

//         dd($lists);
        if ($status=='1')
        return view('subject.liste', compact('lists'));
        else
            $lists = taken_subject::where('student_id','=',$id)->with('users','subjects')->get();
        return view('student.takensubjectliste', compact('lists'));
        //return view('student.liste', compact('lists2'));

    }

    public function deletefonction($id){
        subject::where('id','=',$id)->delete();
        //dashboard
        return redirect()->route('dashboard');

    }

    //taken subjects
    public function takensubjectlist()
    {
        //recuperer l id de user
        $id=Auth::user()->id;
       // $lists = taken_subject::where('subject_id','!=',$id)->with('taken_subjects')->get();
        $lists = taken_subject::where('student_id','=',$id)->with('subjects')->get();
            return view('student.takensubjectliste', compact('lists'));
    }

    //untaken subjects
    public function untakensubjectlist()
    {
        //recuperer l id de user
        $id=Auth::user()->id;
        $taken_subjects = taken_subject::where('student_id','=',$id)->with('users')->get();
        $subjects=subject::with('users')->get();
        //$lists2 = subject::with('taken_subjects')->get();
        $count= taken_subject::where('subject_id','=',$id)->count();
        return view('student.untakensubjectliste', compact('taken_subjects','subjects','count'));
    }



    public function update($id){
        $cl=subject::where('id','=',$id)->first();
        return view('subject.update',compact('cl'));
    }
            public function updated($id,Request $request){
                //1er id de column db et 2eme c est id de form
                $user_id=Auth::user()->id;

                //validation rules
                $request->validate([
                    'name' => ['required', 'min:3'],
                    'sub_code'=>['required'],
                    'credit_val'=>['required','numeric']
                ]);
                subject::where('id','=',$id)->update([
                    'name' => $request->get('name'), // premier name=nom de column de db et 2eme c est le nom de form input
                    'description' => $request->get('description'),
                    'sub_code' => $request->get('sub_code'),
                    'credit_val' => $request->get('credit_val'),
                    'user_id'=>$user_id
                ]);

                //redirect pour redirection
                return redirect()->route('dashboard');
            }
}
