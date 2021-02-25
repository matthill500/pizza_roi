<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topping;
use App\Models\Side;
use Carbon\Carbon;
use App\Models\ActualStock;

class StockController extends Controller
{
    public function __construct()
     {
          $this->middleware('auth');
          $this->middleware('role:shop');

     }
   
    public function create()
    {
        $actualStocks = ActualStock::all()->where('date', '=', Carbon::now()->subDay()->toDateString());
        
        foreach($actualStocks as $actualStock){
            $topping = Topping::where('id', $actualStock->top_id)->get();
            $actualStock->topping=$topping;
        }
        
        return view('shop.stock.create')->with([
          'stocks' => $actualStocks
        ]);
    }

    public function store(Request $request)
    { 
      $actualStocks = ActualStock::all();
      foreach($actualStocks as $actualStock){
        if($actualStock->top_id !== null){
        $topping = Topping::where('id', $actualStock->top_id)->get();
        $toppingName = $topping[0]->name;
        $newStockTopping = new ActualStock();
        $newStockTopping->top_id = $actualStock->top_id;
        $newStockTopping->Qty = $request->input($toppingName);
        $newStockTopping->date = $request->input('stock-date');
        $newStockTopping->save();
        }else{
        $side = Side::where('id', $actualStock->side_id)->get();
        $sideName = $side[0]->name;
        $newStockSide = new ActualStock();
        $newStockSide->side_id = $actualStock->side_id;
        $newStockSide->Qty = $request->input($sideName);
        $newStockSide->date = $request->input('stock-date');
        $newStockSide->save(); 
        }
       }
       return redirect()->route('shop.orders.index');
    }
}
