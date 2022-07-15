<div class="wrap" id="configuration-page">
    <h1 class="wp-heading-inline">
        <?php esc_html_e('Konfiguracja', 'weather'); ?>
    </h1>


    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <div class="postbox-container" width="25%">
                <div class="card" style="margin:2px">
                    <form method="POST" action="options.php">  
                        <?php settings_fields(WeatherSynchronizer::WEATHER_API_KEY_LABEL); ?>
                        <?php do_settings_sections(WeatherSynchronizer::WEATHER_API_KEY_LABEL); ?>
                        <table class="widefat importers striped" style="width:100%">
                            <thead><tr><th colspan="2"><?= __('Klucz Api OpenWeather', 'weather') ?></th></tr></thead>
                            <tbody>
                                <tr colspan='2' class="importer-item">
                                    <td class="import-system">
                                        <input type="text" name="<?= WeatherSynchronizer::WEATHER_API_KEY_OPTION ?>" class="regular-text ltr" value="<?= WeatherSynchronizer::getApiKey() ?>"/> 
                                    </td>
                                </tr>
                                <tr class="importer-item">
                                    <td colspan='2' class="import-system">
                                        <?php submit_button(__('Zapisz', 'weather'), 'primary', 'submit', false); ?> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form> 
                </div>
            </div>
            <div class="postbox-container" width="25%">
                <div class="card" style="margin:2px">
                    <form method="POST">  
                        <table class="widefat importers striped" style="width:100%">
                            <thead><tr><th colspan="2"><?=__('Ręczna synchronizacja', 'weather')?></th></tr></thead>
                            <tbody>
                                <tr class="importer-item">
                                    <td class="import-system"><?= __('Data ostatniej synchronizacji', 'weather') ?></td>
                                    <td class="desc"><?= WeatherSynchronizer::getLastSynchro() ?></td>
                                </tr>
                                <tr class="importer-item">
                                    <td colspan='2' class="import-system">
                                        <?php submit_button(__('Pobierz nowe wartości', 'weather'), 'primary', 'Weather[synchronise]', false); ?> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>