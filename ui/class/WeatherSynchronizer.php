<?php

class WeatherSynchronizer {

    const LAST_SYNCHRONIZATION_DATE = 'weather_board_last_synchronization';
    const LAST_SYNCHRONIZATION_ID = 'weather_board_last_synchronization_iteration';
    const ITERATION_LABEL = 'iteration';
    const WEATHER_API_KEY_OPTION = 'weather_api_key';
    const WEATHER_API_KEY_LABEL = 'weather-api-key';
    const POST_TYPE = 'measurement';

    public static function newUpdate() {

        $iteration = self::iteration();
        $iteration++;

        $cities = get_posts(['post_type' => 'location', 'numberposts' => -1]);

        if ($cities == null) {
            $cities = [];
        }

        
        foreach ($cities as $q) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q=" . $q->post_title . ",AU&appid=" . self::getApiKey(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {

                $city = json_decode($response);

                if ($city->cod == '200') {
                    // Create post object
                    $weather_post = [
                        'post_title' => sanitize_text_field($city->name) . ' ['.date("Y-m-d H:i:s").']',
                        'post_status' => 'publish',
                        'post_type' => self::POST_TYPE,
                        'meta_input' => array(
                            'location_ID' => $q->ID,
                            'lon' => sanitize_text_field($city->coord->lon),
                            'lat' => sanitize_text_field($city->coord->lat),
                            'temp_real' => floatval(self::FarenheitToCelsius($city->main->temp)),
                            'temp_feels' => sanitize_text_field(self::FarenheitToCelsius($city->main->feels_like)),
                            'temp_min' => sanitize_text_field(self::FarenheitToCelsius($city->main->temp_min)),
                            'temp_max' => sanitize_text_field(self::FarenheitToCelsius($city->main->temp_max)),
                            'pressure' => sanitize_text_field($city->main->pressure),
                            'humidity' => sanitize_text_field($city->main->humidity),
                            'visibility' => sanitize_text_field($city->visibility),
                            'city_id' => sanitize_text_field($city->id),
                            self::ITERATION_LABEL => $iteration
                        ),
                    ];

                    // Insert the post into the database
                    wp_insert_post($weather_post);
                }
            }
        }

        update_option(self::LAST_SYNCHRONIZATION_ID, $iteration);
        update_option(self::LAST_SYNCHRONIZATION_DATE, date("Y-m-d H:i:s"));
    }

    public static function synchronize() {

        // Scheduled Action Hook
        function check_weather_task() {
            WeatherSynchronizer::newUpdate();
        }

        add_action('check_weather_task', 'check_weather_task');

        // Schedule Cron Job Event
        function check_weather() {
            if (!wp_next_scheduled('check_weather_task')) {
                wp_schedule_event(current_time('timestamp'), 'hourly', 'check_weather_task');
            }
        }

        add_action('wp', 'check_weather');
    }

    public static function iteration() {
        $id = get_option(self::LAST_SYNCHRONIZATION_ID);

        if ($id == false) {
            $id = 0;
        }

        return $id;
    }

    public static function getLastSynchro() {
        return get_option(self::LAST_SYNCHRONIZATION_DATE);
    }

    public static function getApiKey() {
        return get_option(self::WEATHER_API_KEY_OPTION);
    }

    public static function FarenheitToCelsius($number) {
        $number -= 273.15;
        return $number;
    }

}
