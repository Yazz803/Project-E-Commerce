<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // private $category = ['foods', 'drinks'];
    private $Products = ['Bolsu', 'Mie Ayam', 'Corndog', 'Sandwich', 'Bread', 'Cookies', 'Onde-Onde', 'Donut', 'Seblak'];
    public function definition()
    {
        return [
            'name' => $this->Products[mt_rand(0,count($this->Products)-1)],
            'slug' => str_replace(' ', '-', strtolower($this->Products[mt_rand(0,count($this->Products)-1)])),
            'price' => $this->faker->numerify('#####'),
            'stock' => mt_rand(1,100),
            'description' => $this->faker->sentence(10),
            'detail' => $this->faker->sentence(20),
            // 'category' => $this->category[mt_rand(1,count($this->category)-1)],
            'category' => 'foods',
            'seller_name' => $this->faker->name(),
            'seller_num' => $this->faker->phoneNumber()
        ];
    }
}
