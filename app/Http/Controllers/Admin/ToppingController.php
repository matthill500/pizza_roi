<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topping;
use App\Models\Pizza;
class ToppingController extends Controller
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
      $toppings = Topping::all();

      return view('admin.toppings.index')->with([
        'toppings' => $toppings
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.toppings.create');
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
      'pieSize' => 'required|',
      'weightPerPieGm' => 'regex:/^[0-9.]+$/',
      'price' => 'required|regex:/^[0-9.]+$/'
      ]);

      $topping = new Topping();
      $topping->name = $request->input('name');
      $topping->pieSize = $request->input('pieSize');
      $topping->weightPerPieGm = $request->input('weightPerPieGm');
      $topping->price = $request->input('price');

      $topping->save();

      return redirect()->route('admin.toppings.index');
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
      $topping = Topping::findOrFail($id);

      return view('admin.toppings.edit')->with([
        'topping' => $topping
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
      $topping = Topping::findOrFail($id);

      $request->validate([
        'name' => 'required|',
        'pieSize' => 'required|',
        'weightPerPieGm' => '',
        'price' => 'required|'
      ]);

      $topping->name = $request->input('name');
      $topping->pieSize = $request->input('pieSize');
      $topping->weightPerPieGm = $request->input('weightPerPieGm');
      $topping->price = $request->input('price');

      $topping->save();

      return redirect()->route('admin.toppings.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $topping = Topping::findOrFail($id);
      $topping->pizzas()->detach();
      $topping->delete();


      return redirect()->route('admin.toppings.index');
    }
}
