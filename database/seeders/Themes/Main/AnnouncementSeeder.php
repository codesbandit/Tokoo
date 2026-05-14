<?php

namespace Database\Seeders\Themes\Main;

use ArchiElite\Announcement\Enums\AnnouncePlacement;
use ArchiElite\Announcement\Enums\TextAlignment;
use ArchiElite\Announcement\Models\Announcement;
use Botble\Setting\Facades\Setting;
use Botble\Theme\Database\Seeders\ThemeSeeder;

class AnnouncementSeeder extends ThemeSeeder
{
    public function run(): void
    {
        Announcement::query()->truncate();

        $now = $this->now();

        foreach ($this->getData() as $key => $value) {
            Announcement::query()->create([
                'name' => sprintf('Announcement %s', $key + 1),
                'content' => $value,
                'start_date' => $now,
                'dismissible' => true,
            ]);
        }

        Setting::set($this->getSettings())->save();
    }

    protected function getData(): array
    {
        return [
            'Nikmati pengiriman gratis untuk semua pesanan di atas $99! Belanja sekarang dan hemat biaya pengiriman.',
            'Butuh bantuan? Tim customer support kami siap membantu Anda 24/7 untuk segala pertanyaan dan kendala.',
            'Belanja lebih tenang! Kami menyediakan layanan retur mudah hingga 30 hari untuk kenyamanan Anda.',
        ];
    }

    protected function getSettings(): array
    {
        return [
            'announcement_max_width' => '1390',
            'announcement_text_color' => '#fff',
            'announcement_background_color' => 'transparent',
            'announcement_placement' => AnnouncePlacement::THEME,
            'announcement_text_alignment' => TextAlignment::START,
            'announcement_dismissible' => false,
        ];
    }
}
