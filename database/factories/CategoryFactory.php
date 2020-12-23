<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word;
        $slug = Str::slug($name, '-');
        return [
            'name' => $name,
            'slug' => $slug,
            'image' => 'https://www.robohash.org/'.$slug,
            'description' => $this->faker->paragraph
        ];
    }
}