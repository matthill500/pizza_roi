<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Topping;
use App\Models\PizzaTop;
class PizzaController extends Controller
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
      $pizzas = Pizza::all();

      return view('admin.pizzas.index')->with([
        'pizzas' => $pizzas
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $toppings = Topping::all();

      return view('admin.pizzas.create')->with([
        'toppings' => $toppings
      ]);
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
      'size' => 'required|',
      'retailPrice' => 'required|'
      ]);

      $pizza = new Pizza();
      $pizza->name = $request->input('name');
      $pizza->size = $request->input('size');
      $pizza->retailPrice = $request->input('retailPrice');
      $pizza->save();

      $toppings = $request->input('topping_id');
      foreach($toppings as $topping){

      $newTopping = Topping::findOrFail($topping);

      $newTopping->pizzas()->attach(Pizza::where('name', $pizza->name)->first());
      }

      return redirect()->route('admin.pizzas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $pizza = Pizza::findOrFail($id);

      return view('admin.pizzas.show')->with([
        'pizza' => $pizza
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $pizza = Pizza::findOrFail($id);
      $toppings = Topping::all();
      return view('admin.pizzas.edit')->with([
        'pizza' => $pizza,
        'toppings'  => $toppings
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
      $pizza = Pizza::findOrFail($id);

      $request->validate([
        'name' => 'required|',
        'size' => 'required|',
        'retailPrice' => 'required|'
      ]);

      $pizza->name = $request->input('name');
      $pizza->size = $request->input('size');
      $pizza->retailPrice = $request->input('retailPrice');

      $pizza->save();

      $pizza->toppings()->detach();

      $toppings = $request->input('topping_id');
      foreach($toppings as $topping){

      $newTopping = Topping::findOrFail($topping);


      $newTopping->pizzas()->attach(Pizza::where('name', $pizza->name)->first());
      }

      return redirect()->route('admin.pizzas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pizza = Pizza::findOrFail($id);

      $pizza->delete();

      return redirect()->route('admin.pizzas.index');
    }
}
