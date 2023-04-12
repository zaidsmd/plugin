<?php
/**
 * Plugin Name: Contact Form
 * Author: zaid samadi
 * Version: 1.0
 * Description:  just a simple contact form
 */


if (!defined('ABSPATH')) {
    echo "Its just me and you!";
}
if (!class_exists("ContactForm")) {
    class ContactForm
    {
        public function __construct()
        {
            define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));
            define('MY_PLUGIN_URL', plugin_dir_url( __FILE__ ));
            register_activation_hook(__FILE__, 'create_form_database');
            register_deactivation_hook(__FILE__,'drop_form_database');
        }

        public function initialize()
        {
            include_once MY_PLUGIN_PATH . "/includes/options-page.php";
            include_once MY_PLUGIN_PATH . "/includes/form-creation.php";
            include_once MY_PLUGIN_PATH . "/includes/utilities.php";
        }
    }
}

$contact_form = new ContactForm;
$contact_form->initialize();