<?php

class Weather {

    public static function run() {

        add_action('admin_menu', 'weather_menu');

        function weather_menu() {
            add_menu_page(
                    __('Api pogody', 'weather'), //Title
                    __('Api pogody', 'weather'), //Name
                    'manage_options',
                    'weather',
                    'weather_content',
                    'dashicons-email-alt2',
                    5
            );

            /* Dostępne pozycje
              2 – Dashboard
              4 – Separator
              5 – Posts
              10 – Media
              15 – Links
              20 – Pages
              25 – Comments
              59 – Separator
              60 – Appearance
              65 – Plugins
              70 – Users
              75 – Tools
              80 – Settings
              99 – Separator
             */

            add_action('admin_init', 'weather_plugin_settings');
        }

        function weather_plugin_settings() {
            register_setting(WeatherSynchronizer::WEATHER_API_KEY_LABEL, WeatherSynchronizer::WEATHER_API_KEY_OPTION);
        }

        function weather_content() {
            include plugin_dir_path(__FILE__) . 'templates/index.php';
        }

        Weather::save();
    }

    public static function save() {
        if (isset($_POST['Weather'])) {
            if (isset($_POST['Weather']['synchronise'])) {
                WeatherSynchronizer::newUpdate();
            }
            wp_redirect('admin.php?page=' . $_GET['page']);
        }
    }

}
