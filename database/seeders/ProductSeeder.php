<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
            [
                'name'=>'Redmi note 7',
                'price'=>'340',
                'description'=>'smartphone with 8GB ram and 128gb storage',
                'category'=>'mobile',
                'gallery'=>'https://fdn2.gsmarena.com/vv/pics/xiaomi/xiaomi-redmi-note-7-4.jpg'
            ],
            [
                'name'=>'Inifinix hot 10',
                'price'=>'100',
                'description'=>'smartphone with 2GB ram and 12gb storage',
                'category'=>'mobile',
                'gallery'=>'https://fdn2.gsmarena.com/vv/pics/infinix/infinix-hot10-2.jpg'
            ],
            [
                'name'=>'Realme Narzo 20',
                'price'=>'300',
                'description'=>'smartphone with 16GB ram and 28gb storage',
                'category'=>'mobile',
                'gallery'=>'https://fdn2.gsmarena.com/vv/pics/realme/realme-narzo-20-2.jpg'
            ],
            [
                'name'=>'Iphone x',
                'price'=>'500',
                'description'=>'smartphone with 4GB ram and 100gb storage',
                'category'=>'mobile',
                'gallery'=>'https://fdn2.gsmarena.com/vv/pics/apple/apple-iphone-x-4.jpg'
            ],
            [
                'name'=>'Nokia 3310',
                'price'=>'50',
                'description'=>'smartphone with 1GB ram and 8gb storage',
                'category'=>'mobile',
                'gallery'=>'https://fdn2.gsmarena.com/vv/pics/nokia/nokia-3310-4g-5.jpg'
            ],
            [
                'name'=>'Sony xperia 10',
                'price'=>'400',
                'description'=>'smartphone with 3GB ram and 64gb storage',
                'category'=>'mobile',
                'gallery'=>'https://fdn2.gsmarena.com/vv/pics/sony/sony-xperia-10-iii-04.jpg'
            ]
            ]
            );
    }
}
