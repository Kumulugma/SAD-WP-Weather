<?php

/*
  Plugin name: SAD - Odczyt danych klimatycznych
  Plugin URI:
  Description: System obsługujący pobieranie danych klimatycznych z określonych punktów.
  Author: Michał Biel
  Author URI: https://www.k3e.pl/
  Text Domain:
  Domain Path:
  Version: 0.0.2a
 */
require_once 'cpt/locations.php';
require_once 'cpt/measurements.php';
require_once 'ui/class/WeatherSynchronizer.php';

add_action('init', 'weather_plugin_init');

function weather_plugin_init() {
    do_action('weather_plugin_init');
    if (is_admin()) {
        if (current_user_can('manage_options')) {
            require_once 'ui/admin.php';
            Weather::run();
        }
    }
    WeatherSynchronizer::synchronize();
}

function weather_plugin_activate() {
    
}

register_activation_hook(__FILE__, 'weather_plugin_activate');

function weather_plugin_deactivate() {
    
}

register_deactivation_hook(__FILE__, 'weather_plugin_deactivate');
