<?php

namespace App\Http\Controllers;

use App\Work;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;


class WorksController extends Controller
{

    public function index()
    {
        $works = Work::all();

        return view('works.index')->with('works', $works);
        
        
    }


    public function create()
    {
        return view('works.create');
    }


    public function store()
    {
         Work::create(request()->all());

        return redirect ()->to('/api/work');
    }


    public function show($id)
    {
        return response()->json(Work::find($id));
    }


    public function edit($id)
    {
        $work = Work::find($id);
        return view('works.edit')->with('work', $work);
    }


    public function update($id)
    {
        Work::findOrFail($id)->update(request()->all());

        return redirect()->to('/api/work');
    }


    public function deleteTask($id)
    {
        Work::findOrFail($id)->delete();

        return redirect()->to('/api/work');

    }
}
