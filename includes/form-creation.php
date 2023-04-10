<?php
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
add_shortcode("contact-form", "show_contact_form");
function show_contact_form()
{
    include MY_PLUGIN_PATH . '/templates/form.php';
}

function create_form_database()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'contact_form';
    $sql = 'CREATE TABLE IF NOT EXISTS ' . $table_name . ' (
                         id         int          NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        first_name varchar(30)  NOT NULL,
                        last_name  varchar(30)  NOT NULL,
                        email      varchar(256) NOT NULL,
                        subject    text,
                        message    text         NOT NULL
                    ); ' . $charset_collate;
    dbDelta($sql);
}

function drop_form_database()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form';
    $sql = 'DROP TABLE IF EXISTS ' . $table_name;
    $wpdb->query($sql);
}