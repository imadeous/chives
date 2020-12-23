<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\AssignOp\BitwiseOr;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_card = $this->faker->unique()->numerify('A######');
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => $this->faker->phoneNumber,
            'id_card' => $id_card,
            'image' => 'https://robohash.org/' . $id_card . '.png',
            'title' => $this->faker->randomElement([
                'Manager', 'Waiter', 'Admin', 'Cashier'
            ]),
            'level' => $this->faker->numberBetween(1, 3),
            'salary' => $this->faker->randomNumber(4),
            'birthday' => $this->faker->date(),
            'employed' => 1
        ];
    }
}
