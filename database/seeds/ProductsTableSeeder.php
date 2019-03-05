<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws \InvalidArgumentException
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // 20 random posts
        /** @var \Illuminate\Database\Eloquent\Collection $products */
        $products = factory(Product::class)->times(50)->create();

        $products->each(function (Product $product) use ($faker) {
            $i = mt_rand(1, 10);
            $imagePath = database_path()."/seeds/images/abstract-$i.jpg";

            $product->addMedia($imagePath)
                ->preservingOriginal()
                ->toMediaCollection('featured image');
            
            $product->save();
        });
    }
}
