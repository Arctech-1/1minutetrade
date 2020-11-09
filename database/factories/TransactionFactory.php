<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id'       => User::factory(),
            'amount'        => $this->faker->randomFloat($nmMaxDecimals = 2, $min = 1000, $max = null),
            'created_at'    => now(),
             
        ];
    }

    public function type()
    {
        return $this->state(function (array $attributes){
            return [
                'type' => 'credit',
            ];
        });
    }

    public function status()
    {
        return $this->state(function (array $attributes){
            return [
                'status' => 'completed',
            ];
        });
    }
}
