<?php

namespace Database\Seeders;

use App\Models\DashBoard;
use App\Models\Dashboardtransaction;
use Database\Factories\orderTransactionFactory;
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
