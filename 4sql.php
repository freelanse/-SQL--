<?php
function block_sql_injections() {
    $queries = array("union", "select", "insert", "update", "delete", "drop", "--", "#", "/*", "*/");
    
    foreach ($queries as $query) {
        if (strpos(strtolower($_SERVER['REQUEST_URI']), $query) !== false) {
            wp_die('Запрещённый запрос обнаружен.');
        }
    }
}
add_action('init', 'block_sql_injections');
?>
