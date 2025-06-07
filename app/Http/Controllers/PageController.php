<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('parent_zone')->get();
        return view('backend.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:pages,title',
            'parent_zone' => 'required',
            'content' => 'required|string',
        ]);

        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'parent_zone' => $request->parent_zone,
            'content' => $request->content,
        ]);

        return redirect()->route('page.index'); //message flash 

    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        // $page = Page::where('slug', $slug)->firstOrFail();
        return view('backend.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('backend.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
           'title' => 'required|unique:pages,title,' . $page->id,
            'parent_zone' => 'required',
            'content' => 'required|string',
        ]);

        $page->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'parent_zone' => $request->parent_zone,
            'content' => $request->content,
        ]);

        return redirect()->route('page.show',$page->id);
    }

    public function publish($id)
    {
        $page = Page::findOrFail($id);
        $page->publish = ! $page->publish;
        $page->save();

        return back(); //message flash
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('page.index');
    }
}
