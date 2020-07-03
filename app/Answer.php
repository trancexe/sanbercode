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
}
