<?php

namespace Database\Seeders\Themes\Main;

use Botble\Ecommerce\Models\ProductCollection;
use Botble\Theme\Database\Seeders\ThemeSeeder;
use Illuminate\Support\Str;

class ProductCollectionSeeder extends ThemeSeeder
{
    public function run(): void
    {
        ProductCollection::query()->truncate();

        foreach ($this->getData() as $item) {
            ProductCollection::query()->create([
                'name' => $item,
                'slug' => Str::slug($item),
            ]);
        }
    }

    protected function getData(): array
    {
        return [
            'Gadget Pilihan Minggu Ini',
            'Elektronik Tren Terkini',
            'Peralatan Kerja Digital',
            'Teknologi Terdepan',
        ];
    }
}
