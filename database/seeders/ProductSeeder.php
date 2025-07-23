<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'name' => 'Denim Jacket',
            'description' => 'Stylish blue denim jacket',
            'price' => 1999.00,
            'image' => 'products/denim-jacket.jpg',
            'is_featured' => true,
            'is_trending' => false,
        ]);
    
        Product::create([
            'name' => 'Printed T-Shirt',
            'description' => 'Graphic tee with modern print',
            'price' => 799.00,
            'image' => 'products/printed-tee.jpg',
            'is_featured' => false,
            'is_trending' => true,
        ]);
    }    
}
