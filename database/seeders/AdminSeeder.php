<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Admin '.env('app_name'),
            'email' => 'admin@'. \Str::lower(str_replace("https://","",env('APP_URL'))),
            'password' => '$2y$10$hcn0QuYc5NOiKrjaNMGNIeITHW3bzJ6UeTVWWg/1ZaFQ8eXX1Incm' //Password
        ]);
        $admin->givePermissionTo(Permission::all());
    }
}
