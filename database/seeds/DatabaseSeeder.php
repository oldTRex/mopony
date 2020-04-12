<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 records of categories
        factory(App\Category::class, 10)->create()->each(function ($category) {
            // Seed the relation with 10 brands
            $brands = factory(App\Brand::class, 10)->create()->each(function ($brand) {
                // Seed the relation with  10  coupons
                $coupons = factory(App\Coupon::class, 10)->make();
                $brand->coupons()->saveMany($coupons);
            });
            $category->brands()->saveMany($brands);
        });
    }
}
