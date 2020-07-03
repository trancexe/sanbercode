<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question as Question;
use App\Answer as Answer;
class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = Question::withCount('answer')->get();
        return view('pertanyaan.index',['pertanyaan' => $q]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pertanyaan = new Question;
        $pertanyaan->tittle = $request->get('tittle');
        $pertanyaan->content = $request->get('content');
        $pertanyaan->save();

        return redirect()->route('pertanyaan.index')->with('status', 'Pertanyaan Berhasil dibuat');
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = Question::show($id);
        return view('pertanyaan.show',['pertanyaan' => $pertanyaan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Question::show($id);
        return view('pertanyaan.edit',['pertanyaan' => $pertanyaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pertanyaan = Question::updatedata($request->all(),$id);
        return redirect()->route('pertanyaan.index')->with('status', 'Pertanyaan Berhasil dibuat');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Question::destroyAll($id);
        return redirect()->route('pertanyaan.index')->with('status', 'question successfully
        deleted');
    }
}
