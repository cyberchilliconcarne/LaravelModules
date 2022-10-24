<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductTag;
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
        $categories = [
            'Shoes',
            'Shirts',
            'Pants',
            'Hats',
            'Jackets',
            'Underwear',
            'Dresses',
        ];

        collect($categories)->each(function ($category) {
            return ProductCategory::factory()->create([
                'name' => $category
            ]);
        });

        ProductTag::factory(20)->create();

        Product::factory(100)
            ->hasCategories(ProductCategory::all()->random())
            ->hasTags(ProductTag::all()->random(3))
            ->create();
    }
}
