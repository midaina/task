<?php

namespace App\Http\Controllers;

use App\Models\taken_subject;
use Auth;
use Illuminate\Http\Request;

class TakenSubjectController extends Controller
{

    //request dans le cas  de form
    public function add($id)
    {
        $user_id=Auth::user()->id;
        taken_subject::create([
            'subject_id' => $id,
            'student_id' => $user_id,
            'teacher_name' => 'teacher name'
//            'sub_code' => $request->get('sub_code'),
//            'credit_val' => $request->get('credit_val'),
//            'user_id'=>$id
        ]);
        //return back();
        return redirect()->route('subjectlist');

    }

    public function leavesubject($id){
        taken_subject::where('id','=',$id)->delete();
        return back();

    }
    //

}
