<?php

if (isset($_POST["first_name"])){
require_once '../../../../wp-load.php';
global $wpdb;
$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$table_name = $wpdb->prefix . "contact_form";
$wpdb->insert($table_name, array(
    "first_name" => $fname,
    "last_name" => $lname,
    "email" => $email,
    "subject" => $subject,
    "message" => $message,
));
echo json_encode("success");
}
exit();
