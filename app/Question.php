<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ["tittle", "content"];

    public function answer(){
        return $this->hasMany("App\Answer",'id_question','id');
        }

    public static function show($id){
        $Question = Question::where('id','=',$id)->first();
        return $Question;
    }

    public static function updatedata($request, $id){
        $Question = Question::where('id','=',$id)
        ->update([
            'tittle'=> $request['tittle'],
            'content'=> $request['content'],
        ]);
        return $Question;
    }

    public static function destroyAll($id){
        $Question = Question::where('id','=',$id)->first();
        $Answer = Answer::where('id_question','=',$id);
        $Answer->delete();
        $Question->delete();
        return $Question;
    }
}
