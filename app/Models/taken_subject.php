<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taken_subject extends Model
{
    use HasFactory;
    protected $fillable=[
        'subject_id','student_id','teacher_name'

    ];

    //une subject pris appartient a un subject
    public function subjects(){
        return $this->belongsTo(subject::class,'subject_id');
    }


    //une subject pris appartient aussi a un student
    public function users(){
        return $this->belongsTo(User::class,'student_id');
    }




}
