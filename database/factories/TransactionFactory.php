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
            'title' => 'Initial Investment',
            'remarks' => 'Strating balance of the restaurant',
            'reference_number' => 'CHIVES/0001',
            'income' => 1,
            'amount' => 1000000,
            'balance' => 1000000,
            'user_id' => 1
        ];
    }
}
