<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places=Place::all();
        return view('places.index',compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            ]);
        $place = new Place();
        $place->name = $request->name;
        $place->address = $request->address;

        if($request->hasFile('place_image'))
        {
            $imageName=uniqid().'.'.$request->place_image->extension();
            $request->place_image->move(public_path('placeImages'),$imageName);
            $place->place_image='placeImages/'.$imageName; 
        }


        $place->save();
           

        return redirect('/places')->with('addPlace','place created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place=Place::find($id);
        return view('places.show', compact(['place','id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Place $place,Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            ]);
        $place->name = $request->name;
        $place->address = $request->address;

        $place->save();
        return redirect('/places')->with('updatePlace','place updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();
        return redirect('/places')->with('destroyPlace','place deleted successfully!');
    }
}
