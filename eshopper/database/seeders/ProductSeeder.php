<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();

        Tag::query()->truncate();

        Tag::factory(15)->create();

        // Size: S, M, L, XL, XXL
        foreach (['S', 'M', 'L', 'XL', 'XXL'] as $item) {
            ProductSize::query()->create([
                'name' => $item,
            ]);
        }

        // Color: blue, red, yeallow, XL, XXL
        foreach (['#000000', '#FF0000', '#FFFF00', '#0000FF', '#00FFFF'] as $item) {
            ProductColor::query()->create([
                'name' => $item,
            ]);
        }

        // Product
        for ($i = 0; $i < 1000; $i++) {
            $name = fake()->text(100);
            Product::query()->create([
                'catalogue_id' => rand(19, 25),
                'name' => $name,
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' =>  Str::random(8) . $i,
                'img_thumbnail' => 'https://canifa.com/img/1517/2000/resize/8/t/8ts24a001-sw001-1.webp',
                'price_regular' => fake()->numberBetween(10000, 200000),
                'sale' => fake()->numberBetween(5000, 50000),
                // 'description' => fake()->paragraph(),
                // 'content' => fake()->text(200),
                // 'material' => fake()->text(),
                // 'user_manual' => fake()->text(),
                // 'views' => fake()->text(),
                // 'is_active' => fake()->text(),
                // 'is_hot_deal' => fake()->text(),
                // 'is_good_deal' => fake()->text(),
                // 'is_new' => fake()->text(),
                // 'is_show_home' => fake()->text(),
            ]);
        }

        //Gallery
        for ($i = 1; $i < 1001; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1517/2000/resize/8/l/8lb23a001-sa014-1.webp',
                ],

                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1517/2000/resize/8/l/8lb23a001-sa014-thumb.webp',
                ]

            ]);
        }

        // Tag
        for ($i = 1; $i < 1001; $i++) {
            DB::table('product_tag')->insert([
                [
                    'product_id' => $i,
                    'tag_id' => rand(1, 8),
                ],
                [
                    'product_id' => $i,
                    'tag_id' => rand(9, 15),
                ],
            ]);
        }

        for ($productID = 1; $productID < 1001; $productID++) {
            $data = [];
            for ($sizeID = 1; $sizeID < 6; $sizeID++) {
                for ($colorID = 1; $colorID < 6; $colorID++) {
                    $data[] = [
                        'product_id' => $productID,
                        'product_size_id' => $sizeID,
                        'product_color_id' => $colorID,
                        'quantity' => 100,
                        'image' => 'https://canifa.com/img/1517/2000/resize/8/l/8lb23a001-sa014-thumb.webp',
                    ];
                }
            }
        }

        // ProductVariant::query()->insert($data);
        // Eloquen insert long time than query bulder
        DB::table('product_variants')->insert($data);
    }
}
