<?php
namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::all();
        return view('backend.post.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|min:3',
            'introduction' => 'required|min:5',
            'district_id'  => 'nullable|exists:districts,id',
            'image'        => 'required|mimes:jpg,png',
        ]);

        $post               = new post;
        $post->title        = $request->title;
        $post->introduction = $request->introduction;
        $post->slug         = Str::slug($post->title) . '-' . Str::random(5);
        $post->user_id      = Auth::user()->id;

        if ($request->district_id) {
            $post->district_id = $request->district_id;
        }
        // dd($post);
        $post->save();

        if ($request->image) {
            $hash = md5(mt_rand());
            // if (!empty($post->image)) {
            //     unlink('documents/'.$post->image);
            // }
            $post->image = $request->image->storeAs('posts', $hash . '' . $post->id);
            $post->save();
        }

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $districts = District::all();
        return view('backend.post.edit', compact('post', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'        => 'required|string|min:3',
            'introduction' => 'required|min:5',
            'district_id'  => 'nullable|exists:districts,id',
            'image'        => 'sometimes|mimes:jpg,png',
        ]);

        $post->title        = $request->title;
        $post->introduction = $request->introduction;
        $post->slug         = Str::slug($post->title) . '-' . Str::random(5);

        if ($request->district_id) {
            $post->district_id = $request->district_id;
        } else {
            $post->district_id = null;
        }
        $post->save();

        if ($request->image) {
            $hash = md5(mt_rand());
            if (! empty($post->image)) {
                unlink('documents/' . $post->image);
            }
            $post->image = $request->image->storeAs('posts', $hash . '' . $post->id);
            $post->save();
        }

        return redirect()->route('post.index');
    }

    public function publish($id)
    {
        $post = Post::findOrFail($id);

        $post->publish = ! $post->publish;
        $post->save();

        return back(); //message flash
    }

    public function section($post)
    {
        $post = Post::findOrFail($post);
        return view('backend/post/section', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Suppression des images des sections lier a l'article
        foreach ($post->sections as $section) {
            if (!empty($section->image)) {
                $imagePath = public_path('documents/' . $section->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        // Suppression de l'image de l'article
        if (!empty($post->image)) {
            $imagePath = public_path('documents/' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $post->delete();
        return redirect()->route('post.index'); //message flash
    }
}
