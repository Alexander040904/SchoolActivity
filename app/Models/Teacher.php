<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $guarded  = [];
    public function subjects(){
        return $this->belongsToMany(Subject::class, 'subject_teacher');

    }
}
