<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['name' => 'phone', 'link' => '+994552257555'],
            ['name' => 'home_phone', 'link' => '+994124363276'],
            ['name' => 'fax', 'link' => '+994124364381'],
            ['name' => 'facebook', 'link' => 'https://facebook.com/pinlight_vip_baku'],
            ['name' => 'instagram', 'link' => 'https://instagram.com/pinlight_vip_baku'],
            ['name' => 'youtube', 'link' => 'https://www.youtube.com/channel/UCxn8MoGUHPlGni6IbugpdNQ'],
            ['name' => 'email', 'link' => 'pinlight_aze@yahoo.com'],
            ['name' => 'address_az', 'link' => 'Bakı / Azərbaycan, Məmməd Araz. 31B'],
            ['name' => 'address_en', 'link' => 'Baku / Azerbaijan, Mammad Araz. 31B'],
            ['name' => 'address_ru', 'link' => 'Баку/Азербайджан, Мамед Араз. 31Б'],
        ];
        foreach ($settings as $key => $setting) {
            $set = new Setting();
            $set->name = $setting['name'];
            $set->link = $setting['link'];
            $set->status = 1;
            $set->save();
        }
    }
}
