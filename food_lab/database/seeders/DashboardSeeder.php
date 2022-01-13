<?php

namespace Database\Seeders;

use App\Models\DashBoard;
use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DashBoard::factory(20)->create();
    }
}
