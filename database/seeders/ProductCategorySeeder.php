<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'type' => 'parent',
                'name' => 'Makeup Accessories',
                'slug' => 'makeup-accessories',
                'cover' => 'product_cat_9HHEwwkIMCGhPhq.jpg',
            ],
            [
                'type' => 'parent',
                'name' => 'Hair Care & Styling',
                'slug' => 'hair-care-styling',
                'cover' => 'product_cat_gd9TY4ISrSXoVV9.jpg',
            ],
            [
                'type' => 'parent',
                'name' => 'Skin Care Accessories',
                'slug' => 'skin-care-accessories',
                'cover' => 'product_cat_zrdIrGuT6dbvVa8.jpg',
            ],
        ]);
    }
}
