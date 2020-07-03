<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $question = Question::find($id);
        $answer = $question->answer;
        return view('jawaban.index',compact('question', 'answer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jawaban = new Answer;
        $jawaban->content = $request->get('content');
        $jawaban->id_question = $request->get('id_question');
        $jawaban->save();

        return redirect()->route('jawaban.index', ['id' => $jawaban->id_question] )->with('status', 'Jawaban Berhasil dibuat');
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jawaban = Answer::show($id);
        return view('jawaban.edit',['jawaban' => $jawaban]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jawaban = Answer::updatedata($request->all(),$id);
        return redirect()->route('jawaban.index',['id'=>$jawaban['id_question']])->with('status', 'jawaban Berhasil dibuat');
        // return $jawaban['id_question'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Answer::destroyAll($id);
        return redirect()->route('jawaban.index',['id'=>$destroy['id_question']])->with('status', 'Answer successfully deleted');
        // return $destroy;
    }
}
