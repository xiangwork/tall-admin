<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.enabled_setting')){
            Schema::defaultStringLength(190);
            Paginator::useBootstrap();

            if (Schema::hasTable("setting")){
                $settings = Setting::all();
                if (count($settings)){
                    $configSetting =$settings
                        ->keyBy('setting_key') // key every setting by its name
                        ->transform(function ($setting) {
                            return [
                                'name' => $setting->setting_name,
                                'value' => $setting->setting_value,
                            ]; // return only the value
                        })
                        ->toArray();
                    config(['setting' => $configSetting]);
                }
            }
        }
    }
}
