<?php

namespace Database\Factories;

use App\Models\Dashboardtransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderTransactionFactory extends Factory
{
    protected $model = Dashboardtransaction::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id'=>$this->faker->numerify('O######'),
            'product_id'=>$this->faker->numerify('P######'),
            'quantity'=>$this->faker->numerify('##'),
            'total_coin'=>$this->faker->numerify('###'),
            'total_cash'=>$this->faker->numerify('#####'),
            'note'=>$this->faker->name()
        ];
    }
}
