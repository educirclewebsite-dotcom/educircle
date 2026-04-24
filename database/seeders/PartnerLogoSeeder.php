<?php

namespace Database\Seeders;

use App\Models\PartnerLogo;
use Illuminate\Database\Seeder;

class PartnerLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logos = [
            [
                'name' => 'ECA',
                'logo_path' => 'home_new/images/partners/eca.png',
                'alt_text' => 'ECA Logo',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Excelsia',
                'logo_path' => 'home_new/images/partners/excelsia.png',
                'alt_text' => 'Excelsia Logo',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Griffith',
                'logo_path' => 'home_new/images/partners/griffith.png',
                'alt_text' => 'Griffith Logo',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'La Trobe',
                'logo_path' => 'home_new/images/partners/latrobe.png',
                'alt_text' => 'La Trobe Logo',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Macquarie',
                'logo_path' => 'home_new/images/partners/macquarie.png',
                'alt_text' => 'Macquarie Logo',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Tasmania',
                'logo_path' => 'home_new/images/partners/tasmania.png',
                'alt_text' => 'University of Tasmania Logo',
                'display_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'USC',
                'logo_path' => 'home_new/images/partners/usc.png',
                'alt_text' => 'USC Logo',
                'display_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'UTS',
                'logo_path' => 'home_new/images/partners/uts.png',
                'alt_text' => 'UTS Logo',
                'display_order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'VU',
                'logo_path' => 'home_new/images/partners/vu.png',
                'alt_text' => 'Victoria University Logo',
                'display_order' => 9,
                'is_active' => true,
            ],
        ];

        foreach ($logos as $logo) {
            PartnerLogo::updateOrCreate(
                ['name' => $logo['name']],
                $logo
            );
        }
    }
}
