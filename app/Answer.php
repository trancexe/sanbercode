<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Answer extends Model
{
  protected $fillable = [ "content", "id_question"];
  public function question()
  {
    return $this->belongsTo('App\Question','id_question','id');
  }

  public static function show($id){
    $Answer = Answer::where('id','=',$id)->first();
    return $Answer;
  }

  public static function updatedata($request, $id){
    $Answer = Answer::where('id','=',$id)
    ->update([
      'content'=> $request['content'],
    ]);
    $Answer = Answer::where('id','=',$id)->first();
    return $Answer;
  }

  public static function destroyAll($id){
    $Answer = Answer::where('id','=',$id)->first();
    $Answer2 = Answer::where('id','=',$id)->first();
    $Answer->delete();
    return $Answer2;
  }
}
