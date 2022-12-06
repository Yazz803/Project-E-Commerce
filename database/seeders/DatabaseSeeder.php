<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\Checkout;
use App\Models\ImageProduct;
use App\Models\ImageService;
use App\Models\MethodPayment;
use App\Models\CategoryProduct;
use App\Models\CategoryService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $Products = ['Bolsu', 'Mie Ayam', 'Corndog', 'Sandwich', 'Bread', 'Cookies', 'Onde-Onde', 'Donut', 'Seblak', 'Rice Bowl', 'Risol', 'Jus Buah Naga', 'Jus Buah Mangga', 'Jus Buah Alpukat', 'Jus Buah Jeruk', 'Jus Buah Apel', 'Jus Buah Nanas', 'Jus Buah Melon', 'Jus Buah Kiwi', 'Jus Buah Sem'];
    private $category = ['foods', 'drinks'];
    private $thumb_img = ['bannermakanan2.jpg', 'bannerminuman2.jpg'];
    private $services = ['web developer', 'software engineer', 'ios developer', 'android developer', 'data analyst'];
    public function run()
    {
        // Product::factory(20)->create();
        for($i = 1; $i <= 20; $i++){
            Product::create([
                'name' => $this->Products[$i - 1],
                'slug' => str_replace(' ', '-', strtolower($this->Products[$i - 1])),
                'user_id' => 1,
                'price' => fake()->numerify('#####'),
                'stock' => mt_rand(1,100),
                'description' => fake()->sentence(60),
                'detail' => fake()->sentence(80),
                'thumb_img' => 'image_not_found.png',
                'code_product' => 'P-'. $i,
                // 'category' => $this->category[mt_rand(1,count($this->category)-1)],
                'category_product_id' => mt_rand(1,2),
            ]);

            for($j = 0; $j < 3; $j++){
                ImageProduct::create([
                    'code_product' => 'P-' . $i,
                    'name' => 'image_not_found.png',
                ]);
            }
        }

        for($k = 1; $k <= 5; $k++){
            Service::create([
                'name' => $this->services[$k - 1],
                'slug' => str_replace(' ', '-', strtolower($this->services[$k - 1])),
                'user_id' => 1,
                'price' => fake()->numerify('#######'),
                'description' => fake()->sentence(60),
                'detail' => fake()->sentence(80),
                'thumb_img' => 'image_not_found.png',
                'code_service' => 'S-'. $k,
                'tag' => 'pplg',
                'category_service_id' => 1,
            ]);

            for($l = 0; $l < 3; $l++){
                ImageService::create([
                    'code_service' => 'S-' . $k,
                    'name' => 'image_not_found.png',
                ]);
            }
        }
        // ImageProduct::factory(90)->create();
        // ImageService::factory(90)->create();
        // Checkout::factory(50)->create();
        
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

        User::factory()->create([
            'full_name' => 'Sutaro Putra Pratama',
            'username' => 'sutaro',
            'email' => 'sutaro@gmail.com',
            'role' => 'user',
            'password' => bcrypt('1234')
        ]);
        
        User::factory()->create([
            'full_name' => 'Khairul Rasyid Shiddiq',
            'username' => 'khairul',
            'email' => 'khairul@gmail.com',
            'role' => 'user',
            'password' => bcrypt('1234')
        ]);

        User::factory(50)->create();

        CategoryProduct::create([
            'name' => 'foods',
            'slug' => 'foods',
            'slogan' => 'Nikmati Sesukamu!',
            'thumb_img' => 'bannermakanan.jpg',
            'ttl_product' => 0
        ]);

        CategoryProduct::create([
            'name' => 'drinks',
            'slug' => 'drinks',
            'slogan' => 'Teguk yang bagus untuk saat-saat yang menyenangkan',
            'thumb_img' => 'bannerminuman.jpg',
            'ttl_product' => 0
        ]);

        CategoryProduct::create([
            'name' => 'kerajinan',
            'slug' => 'kerajinan',
            'slogan' => 'Buat semenarik mungkin',
            'thumb_img' => 'bgwkshop.jpg',
            'ttl_product' => 0
        ]);

        CategoryService::create([
            'name' => 'Programming',
            'slug' => 'programming',
            'slogan' => 'Wajib Ngulik',
            'thumb_img' => 'pplg.jpg',
            'ttl_service' => 0
        ]);

        CategoryService::create([
            'name' => 'Design Grafis',
            'slug' => 'design-grafis',
            'slogan' => 'Design grafis! bukan design gratis',
            'thumb_img' => 'design.jpg',
            'ttl_service' => 0
        ]);

        MethodPayment::create([
            'name' => 'Bank BRI',
            'description' => "<div>Pembayaran bisa dilakukan melalui salah satu cara dibawah ini:<br><br></div><ul><li><strong>Melalui ATM BRI</strong>, caranya:<ul><li>Masukan <strong>PIN</strong></li><li>Pilih menu <strong>-&gt; TRANSAKSI LAIN -&gt; PEMBAYARAN -&gt; LAINNYA -&gt; BRIVA -&gt;</strong> masukan nomor Virtual Account [<strong>nomor VA</strong>] <strong>-&gt;</strong> masukan jumlah pembayaran</li></ul></li><li><strong>Melalui ATM Bank lain</strong>, caranya:<ul><li>Masukan <strong>PIN</strong></li><li>Pilih menu <strong>-&gt; TRANSAKSI LAIN -&gt; TRANSFER -&gt; KE REKENING BANK LAIN -&gt;</strong> masukan kode Bank BRI '<strong>002</strong>' dan nomor Virtual Account [<strong>nomor VA sekolah</strong>] <strong>-&gt;</strong> masukan jumlah pembayaran</li></ul></li><li><strong>Melalui Teller Bank BRI menggunakan Slip Penyetoran (warna biru)</strong>, caranya:<ul><li>Pada bagian 'Disetor ke' silakan isi <strong>Nomor Rekening</strong> = [<strong>nomor VA</strong>], dan <strong>Nama</strong> = [<strong>nama sekolah]</strong></li></ul></li></ul><div><br>Bukti pembayaran harap di email ke alamat:&nbsp;<strong>muhammadyazidakbar@smkwikrama.sch.id</strong></div>",
            'no_rek' => '0712-2138-2310-1329'
        ]);

        // Product::create([
        //     'user_id' => 1,
        //     'name' => 'Bolsu Wikrama',
        //     'code_product' => 'P-1',
        //     'thumb_img' => 'Product_636b3c317433a.jpg',
        //     'slug' => 'bolsu-wikrama',
        //     'price' => 1000,
        //     'stock' => 99,
        //     'description' => '<div>alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld v</div>',
        //     'detail' => '<div>alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld</div>',
        //     'category' => 'foods'
        // ]);

        // ImageProduct::create([
        //     'code_product' => 'P-1',
        //     'name' => 'Product_636b3c319bad5.jpg'
        // ]);
        // ImageProduct::create([
        //     'code_product' => 'P-1',
        //     'name' => 'Product_636b3c31a9a47.jpg'
        // ]);
        // ImageProduct::create([
        //     'code_product' => 'P-1',
        //     'name' => 'Product_636b3c31c4480.png'
        // ]);

        // Product::create([
        //     'user_id' => 1,
        //     'name' => 'Ferol Risol',
        //     'code_product' => 'P-2',
        //     'thumb_img' => 'Product_636b3c6db35fd.jpg',
        //     'slug' => 'ferol-risol',
        //     'price' => 3000,
        //     'stock' => 50,
        //     'description' => '<div>alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld v</div>',
        //     'detail' => '<div>alsdnlksandlaksndlkasnld alsdnlksandlaksndlkasnld</div>',
        //     'category' => 'foods'
        // ]);

        // ImageProduct::create([
        //     'code_product' => 'P-2', 
        //     'name' => 'Product_636b3c6de2bd4.jpg'
        // ]);
        // ImageProduct::create([
        //     'code_product' => 'P-2',
        //     'name' => 'Product_636b3c6e08090.jpg'
        // ]);
        // ImageProduct::create([
        //     'code_product' => 'P-2',
        //     'name' => 'Product_636b3c6e28fa1.jpg'
        // ]);

        $this->command->info('Berhasil Menambah Data Dummy');

    }
}
