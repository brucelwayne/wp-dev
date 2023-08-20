<?php

use Mallria\Dev\DB\Setting_Options;

defined('ABSPATH') || exit;

//$nonce =  wp_create_nonce($nonce_key);

if (!empty($_POST)) {
    if ($_POST['action'] === MALLRIA_DEV_SETTING_OPTIONS) {
        if (wp_verify_nonce($_POST['_wpnonce'], MALLRIA_DEV_SETTING_OPTIONS)) {
            $settings = get_option(MALLRIA_DEV_SETTING_OPTIONS, false);
            $data = array(
                'CURLOPT_SSL_VERIFYPEER' => !empty($_POST['CURLOPT_SSL_VERIFYPEER']),
                'CURLOPT_SSL_VERIFYHOST' => !empty($_POST['CURLOPT_SSL_VERIFYHOST']),
                'http_request_host_is_external' => $_POST['http_request_host_is_external'],
            );
            if ($settings === false) {//if this record does not exist in database
                add_option(MALLRIA_DEV_SETTING_OPTIONS, json_encode($data));
            } else {
                update_option(MALLRIA_DEV_SETTING_OPTIONS, json_encode($data));
            }
        }
    }
}

$mallria_dev_setting_options = Setting_Options::getSettingOptions();

?>


<div id="wpbody">
    <div id="wpbody-content">
        <div class="wrap nosubsub">
            <hr class="wp-header-end"/>
            <h1 class="wp-heading-inline">Settings</h1>
            <div class="form-wrap">
                <form method="post">
                    <table class="form-table" role="presentation">
                        <tbody>
                        <tr>
                            <th scope="row">
                                Verify Peer
                            </th>
                            <td>
                                <label>
                                    <input type="checkbox" name="CURLOPT_SSL_VERIFYPEER"
                                        <?php
                                        if (isset($mallria_dev_setting_options['CURLOPT_SSL_VERIFYPEER'])
                                            && $mallria_dev_setting_options['CURLOPT_SSL_VERIFYPEER'] === true):
                                            ?>
                                            checked
                                        <?php endif; ?>
                                    />
                                </label>
                                Disable CURLOPT_SSL_VERIFYPEER
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Verify Host
                            </th>
                            <td>
                                <label>
                                    <input type="checkbox" name="CURLOPT_SSL_VERIFYHOST"
                                        <?php
                                        if (isset($mallria_dev_setting_options['CURLOPT_SSL_VERIFYHOST'])
                                            && $mallria_dev_setting_options['CURLOPT_SSL_VERIFYHOST'] === true):
                                            ?>
                                            checked
                                        <?php endif; ?>
                                    />
                                </label>
                                Disable CURLOPT_SSL_VERIFYHOST
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                External Hosts
                            </th>
                            <td>
                                <label>
                                    <textarea name="http_request_host_is_external"
                                           placeholder="http_request_host_is_external"
                                           style="width: 600px;"
                                    ><?php echo empty($mallria_dev_setting_options['http_request_host_is_external']) ? '' : $mallria_dev_setting_options['http_request_host_is_external']; ?></textarea>
                                </label>
                                <p>
                                    Separate multiple hosts with commas
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                            </th>
                            <td>
                                <p class="submit">
                                    <input type="hidden" name="action" value="<?php echo MALLRIA_DEV_SETTING_OPTIONS; ?>"/>
                                    <?php wp_nonce_field(MALLRIA_DEV_SETTING_OPTIONS); ?>
                                    <button id="wp-cagify-review-cage-save-settings-button" type="submit"
                                            class="button button-primary">
                                        Save Settings
                                    </button>
                                    <span class="spinner" style="float:none;"></span>
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>