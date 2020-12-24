<?php

namespace Database\Factories;

use App\Models\Payslip;
use Illuminate\Database\Eloquent\Factories\Factory;

class PayslipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payslip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amount = $this->faker->randomNumber(4);
        $service_charge = $this->faker->randomNumber(3);

        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'amount' => $amount,
            'service_charge' => $service_charge,
            'total' => $amount + $service_charge,
            'paid_on' => date('Y-m-d'),
            'type' => $this->faker->randomElement([
                'Salary', 'Compenation', 'Bonus'
            ]),
            'remarks' => $this->faker->paragraph()
        ];
    }
}
