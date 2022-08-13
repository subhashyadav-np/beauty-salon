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
        DB::table('products')->insert([
            [
                'title' => 'Body Oil Lotions',
                'slug' => 'body-oil-lotions',
                'cat_id' => '3',
                'price' => '450',
                'discount' => '5',
                'cover' => 'product_Yfe8DqGogTsfDJO.jpg',
                'description' => 
                    "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis atque sit, qui distinctio est nostrum tempore officia autem saepe ratione laudantium voluptatem rem nobis fuga error. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis atque sit, qui distinctio est nostrum tempore officia autem saepe ratione laudantium voluptatem rem nobis fuga error. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis atque sit, qui distinctio est nostrum tempore officia autem saepe ratione laudantium voluptatem rem nobis fuga error.",
                'keywords' => 'body oil,oil,lotion',
                'meta_desc' => 
                    "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis"
            ],
            [
                'title' => 'Nourishing Shampoo',
                'slug' => 'nourishing-shampoo',
                'cat_id' => '2',
                'price' => '640',
                'discount' => '8',
                'cover' => 'product_UJCoIksYHXeJkuY.jpg',
                'description' => 
                    "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis atque sit, qui distinctio est nostrum tempore officia autem saepe ratione laudantium voluptatem rem nobis fuga error. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis atque sit, qui distinctio est nostrum tempore officia autem saepe ratione laudantium voluptatem rem nobis fuga error. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis atque sit, qui distinctio est nostrum tempore officia autem saepe ratione laudantium voluptatem rem nobis fuga error.",
                'keywords' => 'shampoo,hair care',
                'meta_desc' => 
                    "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis"
            ],
            [
                'title' => 'Lovely Lipstics',
                'slug' => 'lovely-lipstics',
                'cat_id' => '1',
                'price' => '240',
                'discount' => '6',
                'cover' => 'product_3NEU90VfQsZkDl4.jpg',
                'description' => 
                    "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis atque sit, qui distinctio est nostrum tempore officia autem saepe ratione laudantium voluptatem rem nobis fuga error. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis atque sit, qui distinctio est nostrum tempore officia autem saepe ratione laudantium voluptatem rem nobis fuga error. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis atque sit, qui distinctio est nostrum tempore officia autem saepe ratione laudantium voluptatem rem nobis fuga error.",
                'keywords' => 'lip care,lipstick',
                'meta_desc' => 
                    "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id exercitationem sint eligendi corporis"
            ],
        ]);
    }
}
