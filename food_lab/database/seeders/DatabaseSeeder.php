<?php

namespace Database\Seeders;

use App\Models\T_AD_Order;
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
        \App\Models\T_AD_Order::factory(10000)->create();
    }
}
