<?php
namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('backend.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::all();
        return view('backend.event.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'date'        => 'required',
            'place'       => 'required|string',
            'image'       => 'sometimes|mimes:jpg,png',
        ]);
        $event              = new Event;
        $event->title       = $request->title;
        $event->date        = $request->date;
        $event->description = $request->description;
        $event->place       = $request->place;
        $event->user_id     = Auth::user()->id;

        if ($request->district_id) {
            $event->district_id = $request->district_id;
        }

        $event->save();

        if ($request->image) {
            $hash         = md5(mt_rand());
            $event->image = $request->image->storeAs('events', $hash . '' . $event->id);
            $event->save();
        }

        return redirect()->route('event.show', $event->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('backend.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $districts = District::all();
        return view('backend.event.edit', compact('event', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'date'        => 'required',
            'place'       => 'required|string',
            'image'       => 'sometimes|mimes:jpg,png',
        ]);

        $event->title       = $request->title;
        $event->date        = $request->date;
        $event->description = $request->description;
        $event->place       = $request->place;
        if ($request->district_id) {
            $event->district_id = $request->district_id;
        } else {
            $event->district_id = null;
        }

        $event->save();

        if ($request->image) {
            $hash = md5(mt_rand());
            if (!empty($event->image)) {
                unlink('documents/'.$event->image);
            }
            $event->image = $request->image->storeAs('events', $hash . '' . $event->id);
            $event->save();
        }

        return redirect()->route('event.show', $event->id);
    }

    public function publish($id)
    {
        $event = Event::findOrFail($id);

        $event->publish = ! $event->publish;
        $event->save();

        return back(); //message flash
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if (!empty($event->image)) {
            unlink('documents/' . $event->image);
        }
        $event->delete();
        return redirect()->route('event.index'); //message flash
    }
}
