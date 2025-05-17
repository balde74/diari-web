<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\District;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        return view('backend/staff/index',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $districts = District::all();
        return view('backend.staff.create',compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:staff,email',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'start_date' => 'required|date',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'district_id' => 'nullable|exists:districts,id',
        ]);

        $completeDate = $request->start_date . '-01';

        $staff = new Staff;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->position = $request->position;
        $staff->department = $request->department;
        $staff->start_date = $completeDate;
        $staff->bio = $request->bio;
       
        if ($request->district_id) {
            $staff->district_id = $request->district_id;
        } else {
            $staff->district_id = null;
        }
        $staff->save();

        if ($request->image) {
            $hash = md5(mt_rand());
            // if (!empty($staff->image)) {
            //     unlink('documents/'.$staff->image);
            // }
            $staff->image = $request->image->storeAs('staff', $hash . '' . $staff->id);
            $staff->save();
        }

        return redirect()->route('staff.show', $staff->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('backend.staff.show',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $districts = District::all();
        return view('backend.staff.edit',compact('staff','districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:staff,email,' . $staff->id,
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'start_date' => 'required|date',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'district_id' => 'nullable|exists:districts,id',
        ]);

        $completeDate = $request->start_date . '-01';

        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->position = $request->position;
        $staff->department = $request->department;
        $staff->start_date = $completeDate;
        $staff->bio = $request->bio;
       
        if ($request->district_id) {
            $staff->district_id = $request->district_id;
        } else {
            $staff->district_id = null;
        }
        $staff->save();

        if ($request->image) {
            $hash = md5(mt_rand());
            if (!empty($staff->image)) {
                unlink('documents/'.$staff->image);
            }
            $staff->image = $request->image->storeAs('staff', $hash . '' . $staff->id);
            $staff->save();
        }

        return redirect()->route('staff.show', $staff->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        if (!empty($staff->image)) {
            unlink('documents/' . $staff->image);
        }
        $staff->delete();
        return redirect()->route('staff.index'); //message flash
    }
}