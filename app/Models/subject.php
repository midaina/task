<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','description','sub_code','credit_val','user_id'

    ];

    public function users(){
        //ici User=model et user_id==colomn
        return $this->belongsTo(User::class,'user_id');
    }

    //un sujet a plusieurs task
    public function tasks(){
        return $this->hasMany(task::class,'subject_id','id');
    }

    public function taken_subjects(){
        return $this->hasMany(taken_subject::class,'subject_id','id');
    }

    //un sujet peut etre pris plusieurs fois
    public function t_subjects(){
        return $this->belongsTo(taken_subject::class,'subject_id');
       // return $this->hasMany(taken_subject::class,'subject_id','id');
    }


}
