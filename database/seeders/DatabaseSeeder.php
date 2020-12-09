<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(CustomerAddressTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(ToppingsTableSeeder::class);
        $this->call(PizzasTableSeeder::class);
        $this->call(SidesTableSeeder::class);
        $this->call(DealsTableSeeder::class);


    }
}
