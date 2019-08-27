<?php

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
      $this->call(UsersTableSeeder::class);
      factory(App\Models\Setting::class,1)->create();
      //factory(App\Models\Customer::class,1)->create();
    }

}
