<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2) {
            $carousels = Carousel::all();
        }
        else
        {
           $carousels = Carousel::where('district_id',Auth::user()->district_id)->get();
        }
       return view('backend/carousel/index',compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::all();
        return view('backend/carousel/create',compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required|string',
            'image'=>'required|mimes:jpg,png'
        ]);
        
        $carousel = new Carousel;
        $carousel->description = $request->description;
        $carousel->link = $request->link;

        if ($request->district_id) {
            $carousel->district_id = $request->district_id;
        }
       
        $carousel->save();

        if ($request->image) {
            $hash=md5(mt_rand());
            $carousel->image = $request->image->storeAs('carousels',$hash.''.$carousel->id);
            $carousel->save();
            
        }
        return redirect()->route('carousel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        $districts = District::all();
        return view('backend/carousel/edit',compact('districts','carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'description'=>'required|string',
            'image'=>'sometimes|mimes:jpg,png'
        ]);
        
        $carousel->description = $request->description;
        $carousel->link = $request->link;

        if ($request->district_id) {
            $carousel->district_id = $request->district_id;
        }
       
        $carousel->save();

        if ($request->image) {
            $hash=md5(mt_rand());
            if (!empty($carousel->image)) {
                unlink('documents/'.$carousel->image);
            }
            $carousel->image = $request->image->storeAs('carousels',$hash.''.$carousel->id);
            $carousel->save();
            
        }
        return redirect()->route('carousel.index'); //message flash
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        unlink('documents/'.$carousel->image);
        $carousel->delete();
        return redirect()->route('carousel.index');
    }
}
