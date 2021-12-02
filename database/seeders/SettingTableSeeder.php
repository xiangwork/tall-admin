<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                "setting_key" => "app_name",
                "setting_name" => "App Name",
                "setting_value" => "TALL ADMIN",
                "setting_input" => "text",
                "setting_order" => 1,
                "setting_removable" => false,
            ],
            [
                "setting_key" => "app_logo",
                "setting_name" => "App Logo",
                "setting_value" => "",
                "setting_input" => "file",
                "setting_order" => 2,
                "setting_removable" => false,
            ]
        ];
        Setting::insert($insert);
    }
}
