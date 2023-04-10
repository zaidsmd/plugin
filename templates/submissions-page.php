<div class="wrap">
    <h2>Contact Form Submissions</h2>
    Here you can see all your clients messages
</div>
<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}