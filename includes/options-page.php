<?php

add_action('admin_menu','create_contact_form_page');
function create_contact_form_page() {
    add_menu_page('Instructions','Contact Form','manage_options','contact-form','contact_form_page','dashicons-format-aside',23);
    add_submenu_page('contact-form','Submissions','Submissions','manage_options','Submissions','submissions_page');
}

function contact_form_page(){
    include_once MY_PLUGIN_PATH."/templates/contact_form_page.php";
}
function submissions_page(){
    include_once MY_PLUGIN_PATH."/templates/submissions-page.php";
}