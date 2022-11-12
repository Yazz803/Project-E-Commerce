<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ImageProduct;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory(20)->create();
        
        // Service::factory()->create([
        //     'name' => 'Web Developer',
        //     'slug' => 'web-developer',
        //     'code_service' => 'S-1',
        //     'thumb_img' => 'pplg.jpg',
        //     'price' => '150000',
        //     'description' => fake()->sentence(40),
        //     'detail' => fake()->sentence(70),
        //     'seller_name' => 'Muhammad Yazid Akbar',
        //     'seller_num' => '+62 812-9021-5655',
        //     'category' => 'progtech',
        //     'tag' => 'pplg'
        // ]);
        // Service::factory()->create([
        //     'name' => 'Pemasangan Wi-Fi',
        //     'slug' => 'pemasangan-wi-fi',
        //     'code_service' => 'S-1',
        //     'thumb_img' => 'pplg.jpg',
        //     'price' => '100000',
        //     'description' => fake()->sentence(40),
        //     'detail' => fake()->sentence(70),
        //     'seller_name' => 'Obed Syarif Musaffa',
        //     'seller_num' => '+62 812-0909-2012',
        //     'category' => 'progtech',
        //     'tag' => 'tkjt'
        // ]);
        // Service::factory()->create([
        //     'name' => 'Design Logo',
        //     'slug' => 'design-logo',
        //     'code_service' => 'S-1',
        //     'thumb_img' => 'pplg.jpg',
        //     'price' => '100000',
        //     'description' => fake()->sentence(40),
        //     'detail' => fake()->sentence(70),
        //     'seller_name' => 'Muhammad Mulki Hafiz',
        //     'seller_num' => '+62 812-2901-2001',
        //     'category' => 'design',
        //     'tag' => 'dkv'
        // ]);
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'full_name' => 'Muhammad Yazid Akbar',
            'username' => 'yazz803',
            'email' => 'yazzhanz@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Bolsu Wikrama',
            'code_product' => 'P-1',
            'thumb_img' => 'Product_636b3c317433a.jpg',
            'slug' => 'bolsu-wikrama',
            'price' => 1000,
            'stock' => 99,
            'description' => '<div>alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld v</div>',
            'detail' => '<div>alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld</div>',
            'category' => 'foods'
        ]);

        ImageProduct::create([
            'code_product' => 'P-1',
            'name' => 'Product_636b3c319bad5.jpg'
        ]);
        ImageProduct::create([
            'code_product' => 'P-1',
            'name' => 'Product_636b3c31a9a47.jpg'
        ]);
        ImageProduct::create([
            'code_product' => 'P-1',
            'name' => 'Product_636b3c31c4480.png'
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Ferol Risol',
            'code_product' => 'P-2',
            'thumb_img' => 'Product_636b3c6db35fd.jpg',
            'slug' => 'ferol-risol',
            'price' => 3000,
            'stock' => 50,
            'description' => '<div>alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld v</div>',
            'detail' => '<div>alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld</div>',
            'category' => 'foods'
        ]);

        ImageProduct::create([
            'code_product' => 2,
            'name' => 'Product_636b3c6de2bd4.jpg'
        ]);
        ImageProduct::create([
            'code_product' => 2,
            'name' => 'Product_636b3c6e08090.jpg'
        ]);
        ImageProduct::create([
            'code_product' => 2,
            'name' => 'Product_636b3c6e28fa1.jpg'
        ]);

    }
}
