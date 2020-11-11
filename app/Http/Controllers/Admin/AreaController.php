<?php

namespace App\Http\Controllers\admin;
use App\Models\Area;
use App\Models\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $areas = Area::all();

      return view('admin.areas.index')->with([
        'areas' => $areas
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      $area = Area::findOrFail($id);
      $shops = Shop::all();

      return view('admin.areas.edit')->with([
        'area' => $area,
        'shops' => $shops
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

      $area = Area::findOrFail($id);

      $request->validate([
      'area' => 'required|',
      'shop_id' => 'required|'
      ]);

      $area->area = $request->input('area');
      $area->shop_id = $request->input('shop_id');

      $area->save();

      return redirect()->route('admin.areas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $area = Area::findOrFail($id);

      $area->delete();

        return redirect()->route('admin.areas.index');
    }
}
