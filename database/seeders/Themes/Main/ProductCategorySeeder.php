<?php

namespace Database\Seeders\Themes\Main;

use Botble\Ecommerce\Database\Seeders\Traits\HasProductCategorySeeder;
use Botble\Ecommerce\Models\ProductCategory;
use Botble\Theme\Database\Seeders\ThemeSeeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends ThemeSeeder
{
    use HasProductCategorySeeder;

    public function run(): void
    {
        $this->uploadFiles('product-categories');

        ProductCategory::query()->truncate();
        DB::table('ec_product_category_product')->truncate();
        DB::table('ec_product_categorizables')->truncate();

        foreach ($this->getData() as $index => $item) {
            $this->createCategoryItem($index, $item);
        }
    }

    protected function getData(): array
    {
        return [
            [
                'name' => 'Produk Terbaru',
                'icon' => 'ti ti-home',
            ],
            [
                'name' => 'Elektronik',
                'icon' => 'ti ti-device-tv',
                'children' => [
                    [
                        'name' => 'Unggulan',
                        'image' => $this->filePath('product-categories/menu-1.jpg'),
                        'children' => [
                            ['name' => 'Barang Baru'],
                            ['name' => 'Terlaris'],
                            [
                                'name' => 'Handphone',
                                'image' => $this->filePath('product-categories/2.png'),
                                'is_featured' => true,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Komputer & Laptop',
                        'image' => $this->filePath('product-categories/menu-2.jpg'),
                        'is_featured' => true,
                        'children' => [
                            ['name' => 'Brand Terbaik'],
                            ['name' => 'Terlaris Minggu Ini'],
                            [
                                'name' => 'Pendingin CPU',
                                'image' => $this->filePath('product-categories/3.png'),
                                'is_featured' => true,
                            ],
                            [
                                'name' => 'Kipas Processor',
                                'image' => $this->filePath('product-categories/category-thumb-9.jpg'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Aksesoris',
                        'image' => $this->filePath('product-categories/menu-3.jpg'),
                        'children' => [
                            [
                                'name' => 'Headphone',
                                'image' => $this->filePath('product-categories/1.png'),
                                'is_featured' => true,
                            ],
                            [
                                'name' => 'Headphone Wireless',
                                'image' => $this->filePath('product-categories/category-thumb-1.jpg'),
                            ],
                            [
                                'name' => 'Earphone TWS',
                                'image' => $this->filePath('product-categories/category-thumb-6.jpg'),
                            ],
                            [
                                'name' => 'Jam Tangan Pintar',
                                'image' => $this->filePath('product-categories/4.png'),
                                'is_featured' => true,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Konsol Gaming',
                        'image' => $this->filePath('product-categories/category-thumb-8.jpg'),
                    ],
                    [
                        'name' => 'Playstation',
                        'image' => $this->filePath('product-categories/category-thumb-12.jpg'),
                    ],
                ],
            ],
            [
                'name' => 'Hadiah',
                'icon' => 'ti ti-gift',
            ],
            [
                'name' => 'Komputer',
                'icon' => 'ti ti-device-laptop',
                'children' => [
                    [
                        'name' => 'PC Desktop',
                        'icon' => 'ti ti-device-desktop',
                        'image' => $this->filePath('product-categories/category-thumb-5.jpg'),
                    ],
                    [
                        'name' => 'Laptop',
                        'icon' => 'ti ti-device-laptop',
                        'image' => $this->filePath('product-categories/category-thumb-3.jpg'),
                    ],
                    [
                        'name' => 'Tablet',
                        'icon' => 'ti ti-device-tablet',
                        'image' => $this->filePath('product-categories/category-thumb-4.jpg'),
                    ],
                    ['name' => 'Aksesoris', 'icon' => 'ti ti-keyboard'],
                ],
            ],
            [
                'name' => 'Smartphone & Tablet',
                'image' => $this->filePath('product-categories/category-thumb-10.jpg'),
                'icon' => 'ti ti-device-mobile',
            ],
            [
                'name' => 'TV, Video & Musik',
                'icon' => 'ti ti-device-tv',
            ],
            [
                'name' => 'Kamera',
                'icon' => 'ti ti-camera',
            ],
            [
                'name' => 'Peralatan Masak',
                'icon' => 'ti ti-grill-spatula',
            ],
            [
                'name' => 'Aksesoris',
                'icon' => 'ti ti-building-store',
                'children' => [
                    [
                        'name' => 'Dengan Bluetooth',
                        'image' => $this->filePath('product-categories/5.png'),
                        'is_featured' => true,
                    ],
                ],
            ],
            [
                'name' => 'Olahraga',
                'icon' => 'ti ti-ball-football',
            ],
            [
                'name' => 'Gadget Elektronik',
                'icon' => 'ti ti-cpu-2',
                'children' => [
                    ['name' => 'Mikroskop'],
                    ['name' => 'Remote Control'],
                    ['name' => 'Monitor'],
                    ['name' => 'Termometer'],
                    ['name' => 'Tas Ransel'],
                    [
                        'name' => 'Headphone',
                        'image' => $this->filePath('product-categories/category-thumb-1.jpg'),
                    ],
                ],
            ],
        ];
    }
}
