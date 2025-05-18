<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docs = Documentation::all();
        return view('backend/documentation/index',compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend/documentation/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file'=>'required|mimes:pdf',
            'title' => 'required|min:3'
        ]);

       $doc = new Documentation;
       $doc->title = $request->title;
       $doc -> save();

        if ($request->file) {
            $hash=md5(mt_rand());
           $doc->file = $request->file->storeAs('documentation',$hash.''.$doc->id);
           $doc->save();
        }

        return redirect()->route('documentation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Documentation $documentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documentation $documentation)
    {
        $doc = $documentation;
        return view('backend/documentation/edit',compact('doc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documentation $documentation)
    {
        $request->validate([
            'file'=>'sometimes|mimes:pdf',
            'title' => 'required|min:3'
        ]);

        $doc = $documentation;
        $doc->title = $request->title;
        $doc-> save();

        if ($request->file) {
            $hash=md5(mt_rand());
            if (!empty($doc->file)) {
                unlink('documents/' . $doc->file);
            }
            $doc->file = $request->file->storeAs('documentation',$hash.''.$doc->id);
            $doc->save();
        }

        return redirect()->route('documentation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documentation $documentation)
    {
        $doc = $documentation;
        if (!empty($doc->file)) {
            unlink('documents/' . $doc->file);
        }
        $doc->delete();
        return redirect()->route('documentation.index'); //message flash
    }
}
