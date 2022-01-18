<?php

namespace Database\Factories;

use App\Models\T_AD_CoinCharge;
use Illuminate\Database\Eloquent\Factories\Factory;

class T_AD_CoinChargeFactory extends Factory
{
    protected $model = T_AD_CoinCharge::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id'=> 41,
            'request_coin'=> $this->faker->numerify('###'),
            'request_datetime'=> $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
            'request_evd_ID'=>1,
            'decision_by'=>1,
            'decision_status'=> $this->faker->randomElement(['1','2','3'])
        ];
    }
}
