<?php

// Callback function to render the main menu page content
function survey_callback() {
    ?>
<div class="survey-admin">
    <div class="container">
        <div class="items">
            <div class="item">
                <canvas id="item1"></canvas>
            </div>
            <div class="item">
                <canvas id="item2"></canvas>
            </div>
            <div class="item">
                <canvas id="item3"></canvas>
            </div>
            <div class="item">
                <canvas id="item4"></canvas>
            </div>
            <div class="item">
                <canvas id="item5"></canvas>
            </div>
            <div class="item">
                <canvas id="item6"></canvas>
            </div>
            <div class="item">
                <canvas id="item7"></canvas>
            </div>
            <div class="item">
                <canvas id="item8"></canvas>
            </div>
            <div class="item" style="width: 70%;">
                <canvas id="item10"></canvas>
            </div>
            <div class="item" style="width: 70%;">
                <canvas id="item9"></canvas>
            </div>
            <div class="item">
                <canvas id="item11"></canvas>
            </div>
        </div>
    </div>
</div>
<?php
 }
 
 // Callback function to render the "Comments" sub-menu page content
 function survey_comments_callback() {

    global $wpdb;
    $servey_user_data = $wpdb->prefix . 'servey_user_data';

    $comments = "
        SELECT answer, user_id
        FROM $servey_user_data
        WHERE question_id = 17
        ORDER BY user_id DESC
    ";
    
    $comments_data = $wpdb->get_results($comments);
   
    ?>
<div class="comment-sec">
    <div class="container">
        <div class="comment">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th class="id-col">No</th>
                        <th class="comment-col">Comments</th>
                        <th class="action-col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            $i = 1;
            foreach ($comments_data as $key => $value) {
                $comment = $value->answer;
                $user_id = $value->user_id;
                if(!empty($comment)):
        ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $comment; ?></td>
                        <td class="action-btn"><button id="<?php echo $user_id; ?>" class="btn btn-primary modal-toggle"
                                data-target="openModal1">View</button></td>
                    </tr>
                    <?php
                $i++;
                endif;
            }
        ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Comment</th>
            <th>Action</th>
        </tr>
    </thead>
</table> -->


<div id="openModal1" class="modal-wrapper">
    <div class="modal">
        <a href="#close" title="Close" class="close">X</a>
        <div class="modal-header">
            <h2>Customer Feedback</h2>
        </div>
        <div class="modal-content">
            
        </div>
    </div>
</div>

<?php
 }

 function open_comment_modal_popup() {
    $response = array();

    $user_id = $_POST['user_id'];
    
    global $wpdb;

    // Assuming your table name is 'wp_users' and the state field is 'state'
    $servey_user_data = $wpdb->prefix . 'servey_user_data';

    $user_data = "
        SELECT user_id, question_id, servey_id, answer, DATE_FORMAT(birthdate, '%d/%m/%Y') as birthdate, DATE_FORMAT(anniversary_date, '%d/%m/%Y') as anniversary_date
        FROM $servey_user_data
        WHERE user_id =  $user_id 
    ";
    $user_data_values = $wpdb->get_results($user_data);
    $output ='';
  
    $output .='<div class="table-wrap">
                <table class="table table-bordered table-hover display dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Question</th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tbody>';
                      
                                $question_16 = '';
                             foreach ($user_data_values as $key => $value) {
                                $user_id = $value->user_id;
                                $question_id = $value->question_id;
                                $answer = $value->answer;
                                $birthdate = $value->birthdate;
                                $anniversary_date = $value->anniversary_date;
                        
                                $servey_question_data = $wpdb->prefix . 'servey_question';
                                $question_data = "
                                    SELECT id, question
                                    FROM  $servey_question_data
                                    WHERE id =  $question_id 
                                ";
                                $question_values = $wpdb->get_results($question_data);
                                $question_value = $question_values[0]->question;

                                if($question_value == "Overall, how satisfied are you with your purchase?"){
                                    $question_16 = $question_value;
                                }
                                if($question_value == "Please let us know your comments"){
                                    $question_value = $question_16 . " ".$question_value;
                                }

                                // print_r( $question_values);
                                // die;
                                // $question_id = $question_data[0]->question;
                                
                            //     $answer = $value->answer;
                     
                                $output .='<tr>
                                    <th scope="row">'. $question_id.'</th>';
                                    $output .='<td>'.$question_value .'</td>';
                                    if($question_value == 'Your Birthdate'){
                                        $output .='<td>'.$birthdate.'</td>';
                                    }elseif ($question_value == 'Your Anniversary Date') {
                                       $output .='<td>'.$anniversary_date.'</td>';
                                    }else{
                                        $output .='<td>'.$answer.'</td>';
                                    }
                                    
                                     
                                $output .='</tr>';
                        
                            }
                       
                        
                    $output .='</tbody>
                </table>
            </div>';
  
    $response['user_data'] = $output;
    wp_send_json_success($response);

    // Always exit to avoid further execution
    wp_die();
}
add_action('wp_ajax_open_comment_modal_popup', 'open_comment_modal_popup'); 
add_action('wp_ajax_nopriv_open_comment_modal_popup', 'open_comment_modal_popup'); 

function survey_chart_admin() {
    $response = array();
    
    global $wpdb;

    // Assuming your table name is 'wp_users' and the state field is 'state'
    $servey_user_data = $wpdb->prefix . 'servey_user_data';

    $states = "
        SELECT answer, COUNT(*) AS state_count
        FROM $servey_user_data
        WHERE question_id = 14
        GROUP BY answer
        ORDER BY state_count DESC
        LIMIT 13
    ";

    $response['states'] = $wpdb->get_results($states);


    // Custom query to get the count of users per state
    $city = "
        SELECT answer, COUNT(*) AS city_count
        FROM $servey_user_data
        WHERE question_id = 15
        GROUP BY answer
        ORDER BY city_count DESC
        LIMIT 13
    ";
   
    $response['city'] = $wpdb->get_results($city);

    // Custom query to get the count of users per state
    $price_feedback = "
        SELECT answer, COUNT(*) AS price_feedback_count
        FROM $servey_user_data
        WHERE question_id = 3
        GROUP BY answer
        ORDER BY CAST(answer AS UNSIGNED) ASC
    ";
    
    $response['price_feedback'] = $wpdb->get_results($price_feedback);

     // Custom query to get the count of users per state
     $asthetics_feedback = "
        SELECT answer, COUNT(*) AS asthetics_feedback_count
        FROM $servey_user_data
        WHERE question_id = 4
        GROUP BY answer
        ORDER BY CAST(answer AS UNSIGNED) ASC
    ";
    
    $response['asthetics_feedback'] = $wpdb->get_results($asthetics_feedback);

    // Custom query to get the count of users per state
    $fitment_feedback = "
        SELECT answer, COUNT(*) AS fitment_feedback_count
        FROM $servey_user_data
        WHERE question_id = 5
        GROUP BY answer
        ORDER BY CAST(answer AS UNSIGNED) ASC
    ";

    $response['fitment_feedback'] = $wpdb->get_results($fitment_feedback);

    // Custom query to get the count of users per state
    $performance_feedback = "
        SELECT answer, COUNT(*) AS performance_feedback_count
        FROM $servey_user_data
        WHERE question_id = 6
        GROUP BY answer
        ORDER BY CAST(answer AS UNSIGNED) ASC
    ";

    $response['performance_feedback'] = $wpdb->get_results($performance_feedback);

    // Custom query to get the count of users per state
    $warrenty_feedback = "
        SELECT answer, COUNT(*) AS warrenty_feedback_count
        FROM $servey_user_data
        WHERE question_id = 7
        GROUP BY answer
        ORDER BY CAST(answer AS UNSIGNED) ASC
    ";

    $response['warrenty_feedback'] = $wpdb->get_results($warrenty_feedback);

    // Custom query to get the count of users per state
    $age_group = "
       SELECT 
            CASE 
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 0 AND 20 THEN '0-20'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 21 AND 40 THEN '21-40'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 41 AND 60 THEN '41-60'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) >= 61 THEN '61+'
            END AS age_group,
            COUNT(*) AS age_count
        FROM $servey_user_data
        WHERE birthdate IS NOT NULL
        GROUP BY age_group
        ORDER BY MIN(TIMESTAMPDIFF(YEAR, birthdate, CURDATE())) ASC  
    ";

    $response['age_group'] = $wpdb->get_results($age_group);

    // Custom query to get the count of users per state
    $product_sold = "
        SELECT answer, COUNT(*) AS product_sold_count
        FROM $servey_user_data
        WHERE question_id = 2
        GROUP BY answer
        ORDER BY CAST(answer AS UNSIGNED) ASC
    ";

    $response['product_sold'] = $wpdb->get_results($product_sold);

     // Custom query to get the count of users per state
    $lead_group = "
       SELECT answer, COUNT(*) AS count
        FROM (
            SELECT
                TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(answer, ',', n.digit+1), ',', -1)) AS answer
            FROM
                $servey_user_data 
            JOIN
                (SELECT 0 AS digit UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15) AS n
            ON
                n.digit < CHAR_LENGTH(answer) - CHAR_LENGTH(REPLACE(answer, ',', '')) + 1
            WHERE
                question_id = 8 AND answer IS NOT NULL
        ) AS recommendations_split
        GROUP BY answer
        ORDER BY count DESC
    ";

    $response['lead_group'] = $wpdb->get_results($lead_group);

    $current_year = date('Y');
     // Custom query to get the count of users per state
     $purchase_exp = "
        SELECT answer, COUNT(*) AS purchase_exp_count
        FROM $servey_user_data
        WHERE question_id = 1
        GROUP BY answer
        ORDER BY CAST(answer AS UNSIGNED) ASC
    ";
    $response['purchase_exp'] = $wpdb->get_results($purchase_exp);

    $servey_user_data = $wpdb->prefix . 'servey_user_data';
    $results_avg = $wpdb->prepare("
        SELECT 
            MONTH(created_at) as month,
            COUNT(*) as total_responses,
            SUM(CASE WHEN answer BETWEEN 0 AND 6 THEN 1 ELSE 0 END) as detractors,
            SUM(CASE WHEN answer BETWEEN 7 AND 8 THEN 1 ELSE 0 END) as passives,
            SUM(CASE WHEN answer BETWEEN 9 AND 10 THEN 1 ELSE 0 END) as promoters
        FROM $servey_user_data
        WHERE question_id = 1
        AND YEAR(created_at) = %d
        GROUP BY MONTH(created_at)
        ORDER BY MONTH(created_at)
    ", $current_year);

    $results_avg1 = $wpdb->get_results($results_avg);


    $purchase_exp_avg = [];

    foreach ($results_avg1 as $row) {
        $month = $row->month;
        $total_responses = $row->total_responses;
        $detractors = $row->detractors;
        $promoters = $row->promoters;

        $percent_promoters = ($promoters / $total_responses) * 100;
        $percent_detractors = ($detractors / $total_responses) * 100;
        $nps = $percent_promoters - $percent_detractors;
        if($month == 1){
            $month = "Jan";
        }elseif ($month == 2) {
            $month = "Feb";
        }elseif ($month == 3) {
            $month = "March";
        }elseif ($month == 4) {
            $month = "April";
        }elseif ($month == 5) {
            $month = "May";
        }elseif ($month == 6) {
            $month = "June";
        }elseif ($month == 7) {
            $month = "July";
        }elseif ($month == 8) {
            $month = "Aug";
        }elseif ($month == 9) {
            $month = "Sept";
        }elseif ($month == 10) {
            $month = "Oct";
        }elseif ($month == 11) {
            $month = "Nov";
        }elseif ($month == 12) {
            $month = "Dec";
        }
        $purchase_exp_avg[] = [
            'month' => $month,
            'detractors' => $detractors,
            'passives' => $row->passives,
            'promoters' => $promoters,
            'total_responses' => $total_responses,
            'nps' => $nps
        ];
    }

    $response['purchase_exp_avg'] = $purchase_exp_avg;

    wp_send_json_success($response);

    // Always exit to avoid further execution
    wp_die();
}
add_action('wp_ajax_survey_chart_admin', 'survey_chart_admin'); 
add_action('wp_ajax_nopriv_survey_chart_admin', 'survey_chart_admin'); 

// functions.php or your plugin file

function fetch_data() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'servey_user_data';
    $request = $_POST;
    // $current_year = date('Y');

    // Columns to fetch
    $columns = [
        'id',
        'comment',
        'user_id'
    ];

    // Initialize variables
    $limit = $request['length'];
    $offset = $request['start'];
    $order_by = $columns[$request['order'][0]['column']];
    $order = $request['order'][0]['dir'];
    $search_value = $request['search']['value'];

    // Search query
    $search_query = "";
    if (!empty($search_value)) {
        $search_query = "
            AND answer LIKE '%%%s%%'
        ";
    }

    // Query to get total records
    $total_records_query = "
        SELECT COUNT(*) 
        FROM $table_name
        WHERE question_id = 17
    ";
    $total_records = $wpdb->get_var($wpdb->prepare($total_records_query));

    // Query to get filtered records
    $data_query = "
        SELECT id, answer, user_id as action
        FROM $table_name
        WHERE question_id = 17 $search_query
        ORDER BY $order_by $order
        LIMIT %d
    ";
    $data_results = $wpdb->get_results($wpdb->prepare($data_query, $limit, $offset));

    // Prepare data for DataTables
    $data = [];
    $i = 0;
    foreach ($data_results as $index => $row) {
        if($row->answer !== ''){

            $data[] = [
                'id' => $i + 1,
                'comment' => $row->answer,
                'action' => '<a href="user.php?id=' . $row->action . '">View</a>'
            ];
            $i++;
        }
    }

    // JSON response
   
    $response = [
        "draw" => intval($request['draw']),
        "recordsTotal" => intval($total_records),
        "recordsFiltered" => intval($total_records),
        "data" => $data,
        // "search_data" => $search
    ];

    // $response['search_data'] = $request;
    wp_send_json($response);
}
add_action('wp_ajax_fetch_data', 'fetch_data');
add_action('wp_ajax_nopriv_fetch_data', 'fetch_data');


function download_store_data_to_database() {
    $response = array();

    global $wpdb;

    // Get the form data
    $formData = $_POST['formData'];
    $username = sanitize_text_field($formData['username']);
    $usernumber = sanitize_text_field($formData['usernumber']);
    $useremail = sanitize_email($formData['useremail']);
    $usercompany = sanitize_text_field($formData['usercompany']);
    $productid = sanitize_text_field($_POST['productid']);
    $categoryid = sanitize_text_field($_POST['categoryid']);
    $pdfurl = sanitize_text_field($_POST['pdfurl']);

    $productid = ($productid) ? $productid : Null;
    $categoryid = ($categoryid) ? $categoryid : Null;

    // Insert data into the wp_download_pdf table
    $table_name = $wpdb->prefix . 'download_pdf';
    $data = array(
        'user_name'    => $username,
        'user_number'  => $usernumber,
        'user_email'   => $useremail,
        'user_company' => $usercompany,
        'productid'   => $productid,
        'categoryid'  => $categoryid,
        'download_pdf' => $pdfurl,
    );

    $format = array('%s', '%s', '%s', '%s', '%s', '%s');

    $inserted = $wpdb->insert($table_name, $data, $format);

    if ($inserted) {
        $response['success'] = 'success';
        $response['data'] = $data;
        wp_send_json_success($response);
    } else {
        $response['success'] = 'Error';
        $response['data'] = $data;
        wp_send_json_error($response);
    }

    
    // $response['user_data'] = $output;
    wp_send_json_success($response);

    // Always exit to avoid further execution
    wp_die();
}
add_action('wp_ajax_download_store_data_to_database', 'download_store_data_to_database'); 
add_action('wp_ajax_nopriv_download_store_data_to_database', 'download_store_data_to_database'); 

function download_pdf_form_data_callback() {
    global $wpdb;
    $download_pdf = $wpdb->prefix . 'download_pdf';

    $download_data = "
        SELECT *
        FROM $download_pdf
        ORDER BY id DESC
    ";
    
    $download_pdf_data = $wpdb->get_results($download_data);
    // echo "<pre>";
    // print_r($download_pdf_data);
   
    ?>
    <div class="comment-sec">
        <div class="container">
            <div class="comment">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th class="id-col">No</th>
                            <th class="comment-col">Product Name</th>
                            <th class="action-col">Product Category</th>
                            <th class="action-col"> Name</th>
                            <th class="action-col"> Number</th>
                            <th class="action-col"> Email</th>
                            <th class="action-col"> Company Name</th>
                            <!-- <th class="action-col">Download PDF</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                $i = 1;
                // print_r($download_pdf_data);
                foreach ($download_pdf_data as $key => $value) {
                    $product_id = ($value->productid) ? $value->productid : '-';
                    $category_id = ($value->categoryid) ? $value->categoryid : '-';
                    $user_name = ($value->user_name) ? $value->user_name : '-';
                    $user_number = ($value->user_number) ? $value->user_number : '-';
                    $user_email = ($value->user_email) ? $value->user_email : '-';
                    $user_company = ($value->user_company) ? $value->user_company : '-';
                    $download_pdf = ($value->download_pdf) ? $value->download_pdf : '-';
                    // if(!empty($comment)):
            ?>
                        
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $product_id; ?></td>
                            <td><?php echo $category_id; ?></td>
                            <td><?php echo $user_name; ?></td>
                            <td><?php echo $user_number; ?></td>
                            <td><?php echo $user_email; ?></td>
                            <td><?php echo $user_company; ?></td>
                            <!-- <td><?php echo $download_pdf; ?></td> -->
                            <!-- <td><?php echo $i; ?></td>
                            <td><?php echo $comment; ?></td>
                            <td class="action-btn"><button id="<?php echo $user_id; ?>" class="btn btn-primary modal-toggle"
                                    data-target="openModal1">View</button></td> -->
                        </tr>
                        <?php
                    $i++;
                    // endif;
                }
            ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
}



?>