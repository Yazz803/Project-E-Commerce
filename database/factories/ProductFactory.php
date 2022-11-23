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
    private $category = ['foods', 'drinks'];
    private $thumb_img = ['bannermakanan.jpg', 'bannerminuman.jpg', 'pplg.jpg'];
    public function definition()
    {
        return [
            'name' => $this->Products[mt_rand(0,count($this->Products)-1)],
            'slug' => str_replace(' ', '-', strtolower($this->Products[mt_rand(0,count($this->Products)-1)])),
            'user_id' => 1,
            'price' => $this->faker->numerify('######'),
            'stock' => mt_rand(1,100),
            'description' => $this->faker->sentence(60),
            'detail' => $this->faker->sentence(80),
            'thumb_img' => $this->thumb_img[mt_rand(0,count($this->thumb_img)-1)],
            'code_product' => 'P-'.mt_rand(1,99),
            // 'category' => $this->category[mt_rand(1,count($this->category)-1)],
            'category_product_id' => mt_rand(1,2),
        ];
    }
}
