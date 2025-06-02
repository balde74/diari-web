<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function new_section($post)
    {
        $post = Post::findOrFail($post);
        return view('backend/section/create',compact('post'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'=>'required|min:10',
            'position'=>'required|integer',
            'post_id'=>'required|exists:posts,id',
            'image'=>'sometimes|mimes:jpg,png'
        ]);
        $section = new Section;
        $section->content = $request->content;    
        $section->position = $request->position;
        $section->post_id = $request->post_id;

        $section->save();

        if ($request->image) {
            $hash=md5(mt_rand());
            // if (!empty($section->image)) {
            //     unlink('documents/'.$section->image);
            // }
            $section->image = $request->image->storeAs('sections',$hash.''.$section->id);
            $section->save();
        }
        return redirect()->route('section',$request->post_id);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return view('backend/section/show',compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $post = Post::findOrFail($section->post_id);
        return view('backend/section/edit',compact('section','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'content'=>'required|min:10',
            'position'=>'integer|unique:sections,position',
            'post_id'=>'required|exists:posts,id',
            'image'=>'sometimes|mimes:jpg,png'
        ]);

        $section->content = $request->content;    
        $section->post_id = $request->post_id;
        if ($request->position) {
            $section->position = $request->position;
        }

        // dd($section);
        $section->save();

        if ($request->image) {
            $hash=md5(mt_rand());
            if (!empty($section->image)) {
                unlink('documents/'.$section->image);
            }
            $section->image = $request->image->storeAs('sections',$hash.''.$section->id);
            $section->save();
        }
        return redirect()->route('section',$request->post_id);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        if (!empty($section->image)) {
            unlink('documents/' . $section->image);
        }
        $section->delete();
        return back(); //message flash
    }
}
