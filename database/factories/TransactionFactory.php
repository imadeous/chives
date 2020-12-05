<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->sentence,
            'remarks' => $this->faker->paragraph,
            'reference_number' => $this->faker->unique()->ean8,
            'income' => $this->faker->boolean(),
            'amount' => $this->faker->randomNumber(4),
            'balance' => $this->faker->randomNumber(5),
            'user_id' => 1
        ];
    }
}
