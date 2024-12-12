<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $guarded = [];


    public function semester(){
        return $this->belongsTo(Semester::class);
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class,'subject_teacher');
    }
}
