<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $merchandise = Merchandise::all();
        return view('home')->with('merchandise', $merchandise);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request,[
        //     'name' => "required",
        //     'price' => 'required',
        //     'destination' => 'required',
        //     'merch_image' => 'image',
        // ]);

        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');

        $filenameWithExt = $request->file('merch_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('merch_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('merch_image')->storeAs('public/merch_images', $fileNameToStore);


        $merchandise = new Merchandise;
        $merchandise->merch_name = $name;
        $merchandise->price = $price;
        $merchandise->description = $description;
        $merchandise->image = $fileNameToStore;

        $merchandise->save();

        return redirect('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {


        $id = $request->id;
        $merchandise = Merchandise::find($id);
        $merchandise->merch_name = $request->name;
        $merchandise->price = $request->price;
        $merchandise->description = $request->description;


        if($request->hasFile('merch_image')){
            $filenameWithExt = $request->file('merch_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('merch_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('merch_image')->storeAs('public/merch_images', $fileNameToStore);
            $merchandise->image = $fileNameToStore;
        }

        $merchandise->save();

        return redirect('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $merchandise = Merchandise::find($id);

        $merchandise->delete();

        return redirect('home');

    }
}
