<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solution extends Model
{
    use HasFactory;
    protected $fillable=[
        'solution','sub_date','statut','student_email','earned_points','earned_points','evaluation_time','task_id','user_id'

    ];

    //une tache appartient a un sujet
    public function tasks(){
        return $this->belongsTo(subject::class,'task_id');
    }

    //une solution appartient a un utilisateur(student)
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    //une solution appartient a un task
    public function sotasks(){
        return $this->belongsTo(task::class,'task_id');
    }
}
