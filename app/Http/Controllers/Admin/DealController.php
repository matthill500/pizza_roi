<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\Pizza;
use App\Models\Side;
class DealController extends Controller
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
      $deals = Deal::all();

      return view('admin.deals.index')->with([
        'deals' => $deals
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pizzas = Pizza::all();
      $sides = Side::all();

      return view('admin.deals.create')->with([
        'pizzas' => $pizzas,
        'sides' => $sides
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
    'description' => 'required|',
    'retailPrice' => 'required|',
    'pizza' => '',
    'side' => ''
    ]);

    $deal = new Deal();
    $deal->name = $request->input('name');
    $deal->description = $request->input('description');
    $deal->retailPrice = $request->input('retailPrice');
    $deal->save();

    $pizzas = $request->input('pizza_id');
    if($pizzas > 1){
      foreach($pizzas as $pizza){

      $newPizza = Pizza::findOrFail($pizza);

      $newPizza->deals()->attach(Deal::where('name', $deal->name)->first());
      }
    }

    $sides = $request->input('side_id');
    if($sides > 1){
      foreach($sides as $side){

      $newSide = Side::findOrFail($side);

      $newSide->deals()->attach(Deal::where('name', $deal->name)->first());
      }
    }

    return redirect()->route('admin.deals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $deal = Deal::findOrFail($id);

      return view('admin.deals.show')->with([
        'deal' => $deal
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
      $deal = Deal::findOrFail($id);
      $pizzas = Pizza::all();
      $sides = Side::all();
      return view('admin.deals.edit')->with([
        'deal' => $deal,
        'pizzas' => $pizzas,
        'sides'  => $sides
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
      $deal = Deal::findOrFail($id);

      $request->validate([
        'name' => 'required|',
        'description' => 'required|',
        'retailPrice' => 'required|',
        'pizza' => '',
        'side' => ''

      ]);

      $deal->name = $request->input('name');
      $deal->name = $request->input('description');
      $deal->retailPrice = $request->input('retailPrice');


      $deal->save();

      $deal->pizzas()->detach();
      $pizzas = $request->input('pizza_id');

      if($pizzas > 1){
        foreach($pizzas as $pizza){
        $newPizza = Pizza::findOrFail($pizza);

        $newPizza->deals()->attach(Deal::where('name', $deal->name)->first());
        }
      }


      $deal->sides()->detach();
      $sides = $request->input('side_id');
      if($sides > 1){
        foreach($sides as $side){
        $newSide = Side::findOrFail($side);

        $newSide->deals()->attach(Deal::where('name', $deal->name)->first());
        }
      }

      return redirect()->route('admin.deals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $deal = Deal::findOrFail($id);

      $deal->delete();

      return redirect()->route('admin.deals.index');
    }
}
