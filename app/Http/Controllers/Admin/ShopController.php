<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class ShopController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();

        return view('admin.shops.index')->with([
          'shops' => $shops
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.shops.create');
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
      'first_name' => 'required|',
      'last_name' => '',
      'shopCode' => 'required|',
      'eircode' => 'required|',
      'email' => 'required|',
      'password' => 'required|'
      ]);

      $user = new User();
      $user->first_name = $request->input('first_name');
      $user->last_name = $request->input('last_name');
      $user->email = $request->input('email');
      $user->password = Hash::make($request->input('password'));
      $user->save();

      $uId = $user->id;

      $user->roles()->attach(Role::where('name','shop')->first());

      $shop = new Shop();
      $shop->name = $request->input('first_name');
      $shop->shopCode = $request->input('shopCode');
      $shop->eircode = $request->input('eircode');
      $shop->user_id = $uId;
      $shop->save();

      return redirect()->route('admin.shops.index');
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
      $shop = Shop::findOrFail($id);

      return view('admin.shops.edit')->with([
        'shop' => $shop
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
      $shop = Shop::findOrFail($id);

      $request->validate([
      'name' => 'required|',
      'email' => 'required|',
      'shopCode' => 'required|',
      'eircode' => 'required|'
      ]);

      $shop->name = $request->input('name');
      $shop->shopCode = $request->input('shopCode');
      $shop->eircode = $request->input('eircode');

      $shop->save();

      $user = User::findOrFail($shop->user_id);

      $user->email = $request->input('email');
      $user->save();

      return redirect()->route('admin.shops.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        $uId2 = $shop->user_id;
        $user = User::findOrFail($uId2);

        $shop->delete();

        $user->roles()->detach();

        $user->delete();

          return redirect()->route('admin.shops.index');
    }
}
