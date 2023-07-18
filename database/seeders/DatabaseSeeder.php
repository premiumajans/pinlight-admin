<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AboutSeeder::class,
            LanguageSeeder::class,
            CategorySeeder::class,
            PermissionsSeeder::class,
            SettingSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
