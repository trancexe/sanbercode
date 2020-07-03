<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ["tittle", "content"];

    public function answer(){
        return $this->hasMany("App\Answer",'id_question','id');
        }
}
