<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('backend.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',          
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $partner = new Partner;
        $partner->name = $request->name;
        $partner->acronym = $request->acronym;
        $partner->link = $request->link;
        $partner->save();


        if ($request->image) {
            $hash = md5(mt_rand());
            $partner->image = $request->image->storeAs('partner', $hash . '' . $partner->id);
            $partner->save();
        }

        return redirect()->route('partner.index'); //message flash
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('backend.partner.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',          
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $partner->name = $request->name;
        $partner->acronym = $request->acronym;
        $partner->link = $request->link;
        $partner->save();


        if ($request->image) {
            $hash = md5(mt_rand());
            if (!empty($partner->image)) {
                unlink('documents/'.$partner->image);
            }
            $partner->image = $request->image->storeAs('partner', $hash . '' . $partner->id);
            $partner->save();
        }

        return redirect()->route('partner.index'); //message flash
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        if (!empty($partner->image)) {
            unlink('documents/' . $partner->image);
        }
        $partner->delete();
        return redirect()->route('partner.index'); //message flash
    }
}
