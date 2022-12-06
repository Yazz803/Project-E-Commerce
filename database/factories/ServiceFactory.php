<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private $services = ['web developer', 'software engineer', 'ios developer', 'android developer', 'data analyst'];
    public function definition()
    {
        return [
            'name' => $this->services[mt_rand(0,count($this->services)-1)],
            'slug' => str_replace(' ', '-', strtolower($this->services[mt_rand(0,count($this->services)-1)])),
            'user_id' => 1,
            'price' => $this->faker->numerify('#######'),
            'description' => $this->faker->sentence(60),
            'detail' => $this->faker->sentence(80),
            'thumb_img' => 'pplg2.jpg',
            'code_service' => 'S-'. mt_rand(1, 20),
            'tag' => 'pplg',
            'category_service_id' => 1,
        ];
    }
}
