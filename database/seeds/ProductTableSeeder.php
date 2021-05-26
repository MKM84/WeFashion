<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Storage::disk('local')->delete(Storage::allFiles());

        App\Category::create([
            'gender' => 'homme'
        ]);
        App\Category::create([
            'gender' => 'femme'
        ]);

        // create 80 products from factory
        factory(App\Product::class, 30)->create()->each(function ($product) {

            // Associate a category to a product
            $category = App\Category::find(rand(1, 2));
            // for every prooduct one category
            $product->category()->associate($category);
            $product->save(); // save the association in the DB 

            // Add images
            $files = Storage::allFiles($category->gender == "homme" ? "hommes" : "femmes");
            $fileIndex = array_rand($files);
            $file = $files[$fileIndex];

            $product->image()->create([
                'link' => $file
            ]);

        });
    }
}
