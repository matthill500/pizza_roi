<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Side;
use Storage;
class SideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role:admin');
     }

    public function index()
    {
      $sides = Side::all();

      return view('admin.sides.index')->with([
        'sides' => $sides
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.sides.create');
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
      'name' => 'required|',
      'retailPrice' => 'required|',
      'wholesalePrice' => 'required|',
      'image' => 'nullable|image|max:1999'
      ]);

      $side = new Side();
      $side->name = $request->input('name');
      $side->retailPrice = $request->input('retailPrice');
      $side->wholesalePrice = $request->input('wholesalePrice');
      $side->type = 'side';

      if($request->hasFile('image')){
      $image = $request->image;
      $ext = $image->getClientOriginalExtension();
      $filename = uniqid().'.'.$ext;
      $image->storeAs('public/images',$filename);
      Storage::delete("public/images/{$side->image}");
      $side->image = 'storage/images/'.$filename;
      }

      $side->save();


      return redirect()->route('admin.sides.index');
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
    public function edit($id)
    {
      $side = Side::findOrFail($id);

      return view('admin.sides.edit')->with([
        'side' => $side
      ]);
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
      $side = Side::findOrFail($id);

      $request->validate([
      'name' => 'required|',
      'retailPrice' => 'required|',
      'wholesalePrice' => 'required|',
      'image' => 'nullable|image|max:1999'
      ]);

      $side->name = $request->input('name');
      $side->retailPrice = $request->input('retailPrice');
      $side->wholesalePrice = $request->input('wholesalePrice');
      $side->type = 'side';

      if($request->hasFile('image')){
      $image = $request->image;
      $ext = $image->getClientOriginalExtension();
      $filename = uniqid().'.'.$ext;
      $image->storeAs('public/images',$filename);
      Storage::delete("public/images/{$side->image}");
      $side->image = 'storage/images/'.$filename;
      }

      $side->save();

      return redirect()->route('admin.sides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $side = Side::findOrFail($id);

      $side->delete();

      return redirect()->route('admin.sides.index');
    }
}
