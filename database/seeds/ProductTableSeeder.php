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

        Storage::disk('local')->delete(Storage::allFiles());

        App\Category::create([
            'category' => 'homme'
        ]);
        App\Category::create([
            'category' => 'femme'
        ]);

        // create 80 products from factory
        factory(App\Product::class, 30)->create()->each(function ($product) {

            // Associate a category to a product
            $category = App\Category::find(rand(1, 2));
            // for every prooduct one category
            $product->category()->associate($category);
            $product->save(); // save the association in the DB 

            // Add images
            $link = str_random(12) . '.jpg'; // hash the link 
            $file = file_get_contents('https://picsum.photos/800/1200');
            Storage::disk('local')->put($link, $file);

            $product->image()->create([
                'link' => $link
            ]);

        });
    }
}
