<?php

namespace Database\Factories;

use App\Models\T_AD_CoinCharge;
use Illuminate\Database\Eloquent\Factories\Factory;

class T_AD_CoinChargeFactory extends Factory
{
    protected $model = T_AD_CoinCharge::class;
<<<<<<< HEAD
=======

>>>>>>> aac667904bdc45dacba873141a804b01107ba96a
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
<<<<<<< HEAD
            'customer_id'=> 41,
            'request_coin'=> $this->faker->numerify('###'),
            'request_datetime'=> $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
            'request_evd_ID'=>1,
            'decision_by'=>1,
            'decision_status'=> $this->faker->randomElement(['1','2','3'])
=======
            'customer_id' => 1,
            'request_coin' => $this->faker->numerify('####'),
            'request_evd_ID' => 1,
            'request_datetime' => $this->faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
            'decision_status' => $this->faker->numberBetween(1, 4),
            're_decision' => 0,
            'decision_by' => 1,
            'del_flg' => 0
>>>>>>> aac667904bdc45dacba873141a804b01107ba96a
        ];
    }
}
