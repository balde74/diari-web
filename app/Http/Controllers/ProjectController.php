<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->get();
        return view('backend.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.project.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'status'      => 'required|in:prévu,en cours,realisé',
            'budget'      => 'nullable|numeric|min:0',
            'image'       => 'nullable|image|max:2048',
            'description' => 'required|string|min:100',
        ]);

        $project              = new Project();
        $project->title       = $request->title;
        $project->slug        = Str::slug($project->title) . '-' . Str::random(5);
        $project->description = $request->description;
        $project->start_date  = $request->start_date;
        $project->end_date    = $request->end_date;
        $project->status      = $request->status;
        $project->budget      = $request->budget;
        $project->user_id     = Auth::id();

        if ($request->image) {
            $hash           = md5(mt_rand());
            $project->image = $request->image->storeAs('projects', $hash . '' . $project->id);
            $project->save();
        }

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('backend.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('backend.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'status'      => 'required|in:prévu,en cours,realisé',
            'budget'      => 'nullable|numeric|min:0',
            'image'       => 'nullable|image|max:2048',
            'description' => 'required|string|min:100',
        ]);

        $project->title       = $request->title;
        $project->slug        = Str::slug($project->title) . '-' . Str::random(5);
        $project->description = $request->description;
        $project->start_date  = $request->start_date;
        $project->end_date    = $request->end_date;
        $project->status      = $request->status;
        $project->budget      = $request->budget;
        $project->user_id     = Auth::id();
        $project->save();

        if ($request->image) {
            if (! empty($project->image)) {
                $imagePath = public_path('documents/' . $project->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $hash           = md5(mt_rand());
            $project->image = $request->image->storeAs('projects', $hash . '' . $project->id);
            $project->save();

        }

        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Suppression de l'image du projet
        if (! empty($project->image)) {
            $imagePath = public_path('documents/' . $project->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $project->delete();
        return redirect()->route('project.index'); //message flash
    }
}
