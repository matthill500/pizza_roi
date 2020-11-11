<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_user = Role::where('name', 'user')->first();
      $role_shop = Role::where('name', 'shop')->first();

      $admin = new User();
      $admin->name='Matt Hill';
      $admin->email='admin@pizzaroi.ie';
      $admin->password= bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $user = new User();
      $user->name='john jones';
      $user->email='johnj@pizzaroi.ie';
      $user->password= bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);

      $shop1 = new User();
      $shop1->name='glenageary';
      $shop1->email='S27327@pizzaroi.ie';
      $shop1->password= bcrypt('secret');
      $shop1->save();
      $shop1->roles()->attach($role_shop);


      $shop2 = new User();
      $shop2->name='dundrum';
      $shop2->email='S27311@pizzaroi.ie';
      $shop2->password= bcrypt('secret');
      $shop2->save();
      $shop2->roles()->attach($role_shop);


      $shop3 = new User();
      $shop3->name='leopardstown';
      $shop3->email='S27344@pizzaroi.ie';
      $shop3->password= bcrypt('secret');
      $shop3->save();
      $shop3->roles()->attach($role_shop);


    }
}
