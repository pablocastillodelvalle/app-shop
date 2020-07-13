<?php

use Illuminate\Database\Seeder;

use App\Category;
use App\Product;
use App\ProductImage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Models creación de datos método 1, totalmente aleatorio
        /* factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create(); */

        // Models creación de datos método 2, dirigido
        $categories = factory(Category::class, 5)->create();
        $categories->each(function($category){
            $products = factory(Product::class, 3)->make();
            $category->products()->saveMany($products);

            $products->each(function($p){
                $images = factory(ProductImage::class, 3)->make();
                $p->images()->saveMany($images);
            });
        });

        // Models creación de datos método 3, en manual laravel
        /* $user->posts()->createMany(
            factory(App\Post::class, 3)->make()->toArray()
        ); */
    }
}
