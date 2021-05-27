<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','description','points','user_id','subject_id'

    ];

    //une tache appartient a un sujet
    public function subjects(){
        //ici User=model et user_id==colomn
        return $this->belongsTo(subject::class,'subject_id');
    }


    //un task a plusieurs solution
    public function solutions(){
        return $this->hasMany(solution::class,'task_id','id');
    }
}
