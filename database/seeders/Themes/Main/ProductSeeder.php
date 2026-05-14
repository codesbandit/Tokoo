<?php

namespace Database\Seeders\Themes\Main;

use Botble\Ecommerce\Database\Seeders\Traits\HasProductSeeder;
use Botble\Theme\Database\Seeders\ThemeSeeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends ThemeSeeder
{
    use HasProductSeeder;

    public function run(): void
    {
        $this->uploadFiles('products');
        $this->uploadFiles('video', 'main');

        $fake = $this->fake();

        $content = File::get(database_path("seeders/contents/product-content-{$this->getThemeName()}.html"));

        $images = $this->getFilesFromPath('products')
            ->map(fn ($item) => $this->filePath($item))
            ->all();

        // Check if Marketplace plugin is available
        $storeIds = null;
        if (class_exists('Botble\Marketplace\Models\Store')) {
            $storeIds = \Botble\Marketplace\Models\Store::query()->pluck('id');
        }

        $this->createProducts(array_map(function ($item) use ($fake, $images, $content, $storeIds) {
            $productData = [
                'name' => $item,
                'description' => $fake->randomElement($this->getDescriptions()),
                'content' => $content,
                'images' => $fake->randomElements($images, rand(3, 8)),
                'video_media' => $fake->randomElement([
                    [
                        [
                            ['key' => 'file', 'value' => $this->filePath(sprintf('video/video-%d.mp4', $videoId = rand(1, 2)), 'main')],
                            ['key' => 'url', 'value' => null],
                            ['key' => 'thumbnail', 'value' => $this->filePath(sprintf('video/%d.jpg', $videoId), 'main')],
                        ],
                    ],
                    [],
                    [
                        [
                            ['key' => 'file', 'value' => null],
                            ['key' => 'url', 'value' => 'https://www.youtube.com/watch?v=6JYIGclVQdw'],
                            ['key' => 'thumbnail', 'value' => $this->filePath(sprintf('video/%d.jpg', rand(1, 2)), 'main')],
                        ],
                    ],
                ]),
            ];

            // Add store_id only if Marketplace is available
            if ($storeIds && $storeIds->isNotEmpty()) {
                $productData['store_id'] = $fake->randomElement($storeIds->toArray());
            }

            return $productData;
        }, $this->getProducts()));
    }

    protected function getProducts(): array
    {
        return [
            'Lampu LED Pintar Philips Hue Warna-Warni A19',
            'Tablet Android Samsung Galaxy Tab S7+ 12.4 Inci',
            'Laptop Apple MacBook Pro 16 Inci',
            'Headphone Wireless Sony WH-1000XM4 Peredam Bising',
            'Drone DJI Mavic Air 2',
            'Kamera Aksi GoPro HERO9 Black',
            'Speaker Bluetooth Portabel Bose SoundLink Revolve+',
            'Thermostat Pintar Nest Generasi 3',
            'Bel Video Pintar Ring Video Doorbell Pro',
            'Smart Display Amazon Echo Show 10 Gen 3',
            'Smart TV Samsung Neo QLED 4K QN90A',
            'Smart TV LG OLED C1 Series 4K',
            'Smart TV Sony X950H 4K Ultra HD',
            'Smartwatch Apple Watch Series 7',
            'Fitness Tracker Fitbit Charge 5',
            'Jam Tangan GPS Garmin Fenix 7X Sapphire Solar',
            'Microsoft Surface Pro 8',
            'Laptop Lenovo ThinkPad X1 Carbon Gen 9',
            'Laptop HP Spectre x360 14 Inci Convertible',
            'Laptop Gaming Razer Blade 15 Advanced',
            'Laptop Gaming Alienware m15 R6',
            'Keyboard Gaming Mekanik Corsair K95 RGB Platinum XT',
            'Mouse Gaming Wireless Logitech G Pro X Superlight',
            'Headset Gaming Wireless SteelSeries Arctis Pro',
            'Stream Deck XL Elgato',
            'Konsol Nintendo Switch OLED',
            'Konsol PlayStation 5',
            'Konsol Xbox Series X',
            'Headset VR Oculus Quest 2',
            'Headset VR HTC Vive Cosmos Elite',
            'Monitor Gaming Melengkung Samsung Odyssey G9 49 Inci',
            'Monitor Gaming LG UltraGear 27GN950-B 4K',
            'Monitor Gaming Melengkung Acer Predator X38',
            'Monitor Gaming ASUS ROG Swift PG279QM 27 Inci',
            'Monitor Entertainment BenQ EW3280U 32 Inci 4K HDR',
            'Monitor Dell UltraSharp U2720Q 27 Inci 4K USB-C',
            'Monitor HP Z27k G3 4K USB-C',
            'Monitor LG 27UK850-W 27 Inci 4K UHD IPS',
            'Monitor Gaming Melengkung Samsung Odyssey G7 32 Inci',
            'Smart TV Sony X900H 4K Ultra HD',
            'Smart TV TCL 6-Series 4K UHD QLED Roku',
            'Smart TV OLED Vizio OLED65-H1 65 Inci 4K',
            'Smart Android TV Hisense U8G Quantum Series 4K',
            'Smart TV LG C1 Series 4K OLED',
            'Smart TV Samsung QN85A Neo QLED 4K',
            'Smart TV Sony A90J 4K OLED',
            'Apple TV 4K Generasi 2',
            'Roku Ultra 2020 Streaming Media Player',
            'Amazon Fire TV Stick 4K Max',
            'Google Chromecast dengan Google TV',
            'NVIDIA SHIELD TV Pro',
            'Soundbar Sonos Beam Gen 2',
            'Soundbar Pintar Bose Smart Soundbar 900',
            'Soundbar JBL Bar 9.1 dengan Dolby Atmos',
            'Soundbar Sennheiser Ambeo',
            'Sistem Home Theater Sony HT-A9',
        ];
    }

    protected function getDescriptions(): array
    {
        return [
            'Produk elektronik berkualitas tinggi dengan teknologi terkini yang dirancang untuk memenuhi kebutuhan digital Anda. Dilengkapi dengan fitur-fitur canggih dan desain modern yang elegan.',
            'Dapatkan pengalaman terbaik dengan produk yang telah teruji kualitasnya. Dengan desain ergonomis dan performa tinggi, produk ini akan menjadi teman setia dalam aktivitas sehari-hari Anda.',
            'Teknologi inovatif bertemu dengan desain yang memukau. Produk ini menawarkan kombinasi sempurna antara gaya dan fungsionalitas untuk meningkatkan produktivitas Anda.',
            'Kualitas premium dengan harga terjangkau. Produk ini dilengkapi dengan fitur-fitur modern yang akan memudahkan pekerjaan dan hiburan Anda sehari-hari.',
            'Dirancang khusus untuk pengguna yang menginginkan performa maksimal. Dengan material berkualitas tinggi dan teknologi terdepan, produk ini siap menemani aktivitas Anda.',
            'Pengalaman pengguna yang luar biasa dengan interface yang intuitif dan mudah digunakan. Produk ini cocok untuk semua kalangan, dari pemula hingga profesional.',
        ];
    }
}
