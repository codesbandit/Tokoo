<?php

namespace Database\Seeders\Themes\Main;

use Botble\Ecommerce\Models\ProductAttribute;
use Botble\Ecommerce\Models\ProductAttributeSet;
use Botble\Theme\Database\Seeders\ThemeSeeder;

class ProductAttributeSeeder extends ThemeSeeder
{
    public function run(): void
    {
        ProductAttributeSet::query()->truncate();

        ProductAttributeSet::query()->create([
            'title' => 'Warna',
            'slug' => 'warna',
            'display_layout' => 'visual',
            'is_searchable' => true,
            'is_use_in_product_listing' => true,
            'order' => 0,
        ]);

        ProductAttributeSet::query()->create([
            'title' => 'Ukuran',
            'slug' => 'ukuran',
            'display_layout' => 'text',
            'is_searchable' => true,
            'is_use_in_product_listing' => true,
            'order' => 1,
        ]);

        ProductAttributeSet::query()->create([
            'title' => 'Kapasitas',
            'slug' => 'kapasitas',
            'display_layout' => 'text',
            'is_searchable' => true,
            'is_use_in_product_listing' => true,
            'order' => 0,
        ]);

        ProductAttributeSet::query()->create([
            'title' => 'Memori',
            'slug' => 'memori',
            'display_layout' => 'text',
            'is_searchable' => true,
            'is_use_in_product_listing' => true,
            'order' => 1,
        ]);

        ProductAttribute::query()->truncate();

        $productAttributes = [
            [
                'attribute_set_id' => 1,
                'title' => 'Hijau',
                'slug' => 'hijau',
                'color' => '#5FB7D4',
                'is_default' => true,
                'order' => 1,
            ],
            [
                'attribute_set_id' => 1,
                'title' => 'Biru',
                'slug' => 'biru',
                'color' => '#333333',
                'is_default' => false,
                'order' => 2,
            ],
            [
                'attribute_set_id' => 1,
                'title' => 'Merah',
                'slug' => 'merah',
                'color' => '#DA323F',
                'is_default' => false,
                'order' => 3,
            ],
            [
                'attribute_set_id' => 1,
                'title' => 'Hitam',
                'slug' => 'hitam',
                'color' => '#2F366C',
                'is_default' => false,
                'order' => 4,
            ],
            [
                'attribute_set_id' => 1,
                'title' => 'Putih',
                'slug' => 'putih',
                'color' => '#FFFFFF',
                'is_default' => false,
                'order' => 5,
            ],
            [
                'attribute_set_id' => 2,
                'title' => 'Kecil',
                'slug' => 'kecil',
                'is_default' => true,
                'order' => 1,
            ],
            [
                'attribute_set_id' => 2,
                'title' => 'Sedang',
                'slug' => 'sedang',
                'is_default' => false,
                'order' => 2,
            ],
            [
                'attribute_set_id' => 2,
                'title' => 'Besar',
                'slug' => 'besar',
                'is_default' => false,
                'order' => 3,
            ],
            [
                'attribute_set_id' => 2,
                'title' => 'Extra Besar',
                'slug' => 'extra-besar',
                'is_default' => false,
                'order' => 4,
            ],

            [
                'attribute_set_id' => 3,
                'title' => '64GB',
                'slug' => '64gb',
                'is_default' => true,
                'order' => 1,
            ],
            [
                'attribute_set_id' => 3,
                'title' => '128GB',
                'slug' => '128gb',
                'is_default' => false,
                'order' => 2,
            ],
            [
                'attribute_set_id' => 3,
                'title' => '256GB',
                'slug' => '256gb',
                'is_default' => false,
                'order' => 3,
            ],
            [
                'attribute_set_id' => 3,
                'title' => '512GB',
                'slug' => '512gb',
                'is_default' => false,
                'order' => 4,
            ],
            [
                'attribute_set_id' => 3,
                'title' => '1TB',
                'slug' => '1tb',
                'is_default' => false,
                'order' => 5,
            ],
            [
                'attribute_set_id' => 4,
                'title' => '4GB',
                'slug' => '4gb',
                'is_default' => true,
                'order' => 1,
            ],
            [
                'attribute_set_id' => 4,
                'title' => '8GB',
                'slug' => '8gb',
                'is_default' => false,
                'order' => 2,
            ],
            [
                'attribute_set_id' => 4,
                'title' => '16GB',
                'slug' => '16gb',
                'is_default' => false,
                'order' => 3,
            ],
            [
                'attribute_set_id' => 4,
                'title' => '32GB',
                'slug' => '32gb',
                'is_default' => false,
                'order' => 4,
            ],
            [
                'attribute_set_id' => 4,
                'title' => '64GB',
                'slug' => '64gb-ram',
                'is_default' => false,
                'order' => 5,
            ],
        ];

        foreach ($productAttributes as $item) {
            ProductAttribute::query()->create($item);
        }
    }
}
