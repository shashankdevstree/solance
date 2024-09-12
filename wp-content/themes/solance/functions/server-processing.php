<?php
global $wpdb;

$table = $wpdb->prefix . 'servey_user_data'; 

$servey_user_data = $wpdb->prefix . 'servey_user_data';

// $comments = "
//     SELECT answer, user_id
//     FROM $servey_user_data
//     WHERE question_id = 17
// ";

// $comments_data = $wpdb->get_results($comments);
$columns = [
    // ['db' => 'id', 'dt' => 0],
    ['db' => 'comment', 'dt' => 1],
    ['db' => 'action', 'dt' => 2]
];

// $columns = array(
//     array( 'db' => 'id', 'dt' => 0 ),
//     array( 'db' => 'comment', 'dt' => 1 ),
//     array( 'db' => 'id', 'dt' => 2, 'formatter' => function( $d, $row ) {
//         return '<a href="view.php?id='. $d .'">View</a>';
//     })
// );

require( 'ssp.class.php' ); 

echo json_encode(
    SSP::simple( $_GET, $wpdb, $servey_user_data, 'id', $columns )
);
?>
