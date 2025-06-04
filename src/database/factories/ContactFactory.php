<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Contact; 

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'first_name' => $this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'gender' => $this->faker->randomElement([1, 2, 3]),
        'email' => $this->faker->unique()->safeEmail,
        'tel' => $this->faker->phoneNumber,
        'address' => $this->faker->prefecture . $this->faker->city . $this->faker->streetAddress,
        'building' => $this->faker->secondaryAddress,
        'detail' => $this->faker->realText(120),
        'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
