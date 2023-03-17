<?php

namespace Demo\Config;

use CodeIgniter\Config\BaseConfig;
use Demo\Models\DemoSettingsModel;

class Demo extends BaseConfig {

    public $app_settings_array = array();

    public function __construct() {
        $demo_settings_model = new DemoSettingsModel();

        $settings = $demo_settings_model->getSettings();
        foreach ($settings as $setting_name => $setting_value) {
            $this->app_settings_array[$setting_name] = $setting_value;
        }
    }

}
