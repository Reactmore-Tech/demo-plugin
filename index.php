<?php

use Demo\Models\DemoModel;

defined('PLUGINPATH') or exit('No direct script access allowed');

/*
  Plugin Name: Demo
  Description: It's a demo plugin.
  Version: 1.0
  Requires at least: 1.0
  Author: Author Name
  Author URL: https://author_url.demo
 */


app_hooks()->add_filter('app_filter_staff_left_menu', function ($sidebar_menu) {

    $demo_submenu = array();
    $demo_submenu["item_demo_1"] = array("name" => trans('demo_lang.demo'), "url" => "admin/demo", "class" => "fas fa-plug");
    $demo_submenu["item_demo_2"] = array("name" => trans('demo_lang.demo_settings'), "url" => "admin/demo/demo-settings", "class" => "fas fa-plug", 'category' => 'demo');

    if (count($demo_submenu)) {
        $sidebar_menu["demo"] = array(
            "name" => trans('demo_lang.demo_plugin'), "url" => "javascript:void(0)", "class" => "fas fa-plug", "position" => 5, "submenu" => $demo_submenu
        );
    }

    return $sidebar_menu;
});

//add admin setting menu item
app_hooks()->add_filter('app_filter_admin_settings_menu', function ($settings_menu) {
    $settings_menu["plugins"][] = array("name" => trans('demo_lang.demo_settings'), "url" => "demo/demo-settings");
    return $settings_menu;
});

//add setting link to the plugin setting
app_hooks()->add_filter('app_filter_action_links_of_Demo', function () {
    $action_links_array = array(
        anchor(base_url("admin/demo"), trans('demo_lang.demo')),
        anchor(base_url("admin/demo/demo-settings"), trans('demo_lang.demo_settings')),
    );

    return $action_links_array;
});


app_hooks()->add_action('app_hook_data_insert', function ($data) {
    $model = new DemoModel;
    $model->createdDebug($data, 'insert');
});

app_hooks()->add_action('app_hook_data_update', function ($data) {
    $model = new DemoModel;
    $model->createdDebug($data, 'updated');
});

//install dependencies
register_installation_hook("Demo", function ($item_purchase_code) {
    $this_is_required = false;
    if ($this_is_required) {
        echo json_encode([
            'status' => 'error',
            'message' => trans("item_purchase_code_not_found"),
        ]);
        exit();
    }

    //run installation sql
    $db = db_connect('default');
    $sql_query = "CREATE TABLE IF NOT EXISTS `core_admin`.`demo` (
        `id` INT NOT NULL AUTO_INCREMENT , 
        `user_id` INT NOT NULL , 
        `event` VARCHAR(255) NULL DEFAULT NULL , 
        `data` MEDIUMTEXT NULL DEFAULT NULL , 
        `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        `updated_at` TIMESTAMP NULL DEFAULT NULL , 
        `deleted_at` TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $db->query($sql_query);

    $sql_query = "CREATE TABLE IF NOT EXISTS `core_admin`.`demo_settings` (
        `id` INT NOT NULL AUTO_INCREMENT , 
        `mode_debug` TINYINT(1) NOT NULL DEFAULT '0' , PRIMARY KEY (`id`), 
        INDEX `mode_debug_idx` (`mode_debug`)) ENGINE = InnoDB;";
    $db->query($sql_query);

    $sql_query = "INSERT INTO `demo_settings` (`id`, `mode_debug`) VALUES (NULL, '1')";
    $db->query($sql_query);
});

//update plugin
register_update_hook("Demo", function () {
    echo "Please follow this instructions to update:";
    echo "<br />";
    echo "Your logic to update...";
});

//uninstallation: remove data from database
register_uninstallation_hook("Demo", function () {
    $db = db_connect('default');
    $sql_query = "DROP TABLE IF EXISTS `demo`;";
    $db->query($sql_query);
    $sql_query = "DROP TABLE IF EXISTS `demo_settings`;";
    $db->query($sql_query);
});
