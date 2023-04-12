<div class="wrap">
    <h2>Contact Form Submissions</h2>
    Here you can see all your clients messages
</div>
<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Submissions_table extends WP_List_Table
{
    //define data set for WP_List_Table => data
    private function get_data(): array|object|null
    {
        global $wpdb;
        $table = $wpdb->prefix . 'contact_form';
        return $wpdb->get_results(
            "SELECT * from `$table`",
            ARRAY_A
        );
    }

    //prepare items
    public function prepare_items()
    {
        $table_data = $this->get_data();
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $primary = 'name';
        $this->_column_headers = array($columns, $hidden, $sortable, $primary);
        $this->items = $table_data;

    }

    //get_columns
    public function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'first_name' => __('First Name'),
            'last_name' => __('Last Name'),
            'email' => __('Email'),
            'subject' => __('Subject'),
            'message' => __('Message')
        );
        return $columns;
    }

    //column_default
    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'id':
            case 'first_name':
            case 'last_name':
            case 'email':
            case 'subject':
            case 'message':
            default:
                return $item[$column_name];
        }
    }


}

$layout = new Submissions_table;
$layout->prepare_items();
$layout->get_columns();
$layout->display();
