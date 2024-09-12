<?php
    get_header();

    /** Template Name: Survey */

    /** Get data from database 
     * data-id = question-id
     * data-type = question-type
    */
    global $wpdb;

    $prefix = $wpdb->prefix;

    // Database tables
    $wp_states = $prefix . 'states';
    $states_query = "SELECT * FROM $wp_states ORDER BY `name` ASC";
    $states_results = $wpdb->get_results($states_query);


    // $wp_cities = $prefix . 'cities';
    // $cities_query = "SELECT * FROM $wp_cities `city` ASC";
    // $cities_results = $wpdb->get_results($cities_query);

    $wp_servey = $prefix . 'servey';
    $servey_query = "SELECT * FROM $wp_servey";
    $servey_results = $wpdb->get_results($servey_query);


    $wp_servey_question = $prefix . 'servey_question';
    $question_query = "SELECT * FROM $wp_servey_question";
    $question_results = $wpdb->get_results($question_query);

    $wp_servey_user_data = $prefix . 'servey_user_data';
    $user_query = "SELECT * FROM $wp_servey_user_data";
    $user_results = $wpdb->get_results($user_query);
    // print_r($question_results);

    // Questions list
    $q_0 = $question_results['0'];
    $q_1 = $question_results['1'];
    $q_2 = $question_results['2'];
    $q_3 = $question_results['3'];
    $q_4 = $question_results['4'];
    $q_5 = $question_results['5'];
    $q_6 = $question_results['6'];
    $q_7 = $question_results['7'];
    $q_8 = $question_results['8'];
    $q_9 = $question_results['9'];
    $q_10 = $question_results['10'];
    $q_11 = $question_results['11'];
    $q_12 = $question_results['12'];
    $q_13 = $question_results['13'];
    $q_14 = $question_results['14'];
    $q_15 = $question_results['15'];
    $q_16 = $question_results['16'];

    /** Validation */
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    
        // Validate Rating
        if (!isset($_POST['rating'])) {
            $errors['rating'] = "Please select a purchase experience.";
        }
    
        // Validate Battery
        if (empty($_POST['batteryselect'])) {
            $errors['batteryselect'] = "Please select a battery option.";
        }
    
        // Validate Overall Performance
        if (!isset($_POST['osat'])) {
            $errors['osat'] = "Please select an overall satisfied rating.";
        }
    }
?>
<section class="survey-sec">

    <div class="container">
        <h1 class="text-center txt-bold mb-4">Solance Battery Customer Feedback Survey</h1>
        <h5 class="text-center txt-bold mb-5 sub-heading">Please answer all questions to the best of your ability. Select the option that best describes your experience.</h5>
        <div class="errors">
         
        </div>
        <form class="survey-form" method="post" data-form="<?php echo $servey_results[0]->id; ?>" id="survey-<?php echo $servey_results[0]->id; ?>">
            <div class="ltr same-below-space">
                <div class="form-group">
                    <label for="rating" class="txt-bold rating-id" data-id="<?php echo $q_0->id; ?>" data-type="<?php echo $q_0->question_type; ?>"> 1)  <?php echo $q_0->question; ?> <span style="color: red;">*</span> </label>

                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"   data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating0" value="0" >
                    <label class="form-check-label" for="rating0">0</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating1" value="1" >
                    <label class="form-check-label" for="rating1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating2" value="2" >
                    <label class="form-check-label" for="rating2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating3" value="3" >
                    <label class="form-check-label" for="rating3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating4" value="4" >
                    <label class="form-check-label" for="rating4">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating5" value="5" >
                    <label class="form-check-label" for="rating5">5</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating6" value="6" >
                    <label class="form-check-label" for="rating6">6</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating7" value="7" >
                    <label class="form-check-label" for="rating7">7</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating8" value="8" >
                    <label class="form-check-label" for="rating8">8</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating9" value="9" >
                    <label class="form-check-label" for="rating9">9</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating"  data-type="<?php echo $q_0->question_type; ?>" data-id="<?php echo $q_0->id; ?>" id="rating10" value="10" >
                    <label class="form-check-label" for="rating10">10</label>
                </div>
                <div class="err-rating">
                    <?php
                        // Check for errors
                        if (!empty($errors)) {
            
                            echo "<span class='err' style='color:red;'>$errors[rating] </span><br>";
                        }
                    ?>
                </div>
            </div>
          
            <div class="form-group product-category ltr same-below-space">
                <label for="batteryselect" class="txt-bold form-group batteryselect-id" data-id="<?php echo $q_1->id; ?>" data-type="<?php echo $q_1->question_type; ?>">  2) <?php echo $q_1->question; ?> <span style="color: red;">*</span> </label> <br>
                <select class="form-select battery-select" name="batteryselect" id="batteryselect"  data-id="<?php echo $q_1->id; ?>" data-type="<?php echo $q_1->question_type; ?>">
                    <option value="">Select battery</option>
                    <option value="Motorcycle">Motorcycle</option>
                    <option value="Automotive">Automotive</option>
                    <option value="UPS">UPS</option>
                    <option value="Inverter">Inverter</option>
                    <option value="E-Rickshaw">E-Rickshaw</option>
                    <option value="E-Bike">E-Bike</option>
                </select>
                <div class="err-batteryselect">
                    <?php
                        // Check for errors
                        if (!empty($errors)) {
            
                            echo "<span class='err' style='color:red;'>$errors[batteryselect] </span><br>";
                        }
                    ?>
                </div>
            </div>
         
            <div class="product-feedback ltr same-below-space">
                <label for="" class="txt-bold txt-heading" > 3) What did you like the most about Solance batteries?</label>
                <div class="price">
                    <div class="form-group">
                        <label for="price" class="price-id" data-id="<?php echo $q_2->id; ?>" data-type="<?php echo $q_2->question_type; ?>"><label class="txt-bold"></label> Price</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="price" id="price0" value="0"  data-id="<?php echo $q_2->id; ?>" data-type="<?php echo $q_2->question_type; ?>">
                            <label class="form-check-label" for="price0">0</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="price" id="price1" value="1" data-id="<?php echo $q_2->id; ?>" data-type="<?php echo $q_2->question_type; ?>">
                            <label class="form-check-label" for="price1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="price" id="price2" value="2" data-id="<?php echo $q_2->id; ?>" data-type="<?php echo $q_2->question_type; ?>">
                            <label class="form-check-label" for="price2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="price" id="price3" value="3" data-id="<?php echo $q_2->id; ?>" data-type="<?php echo $q_2->question_type; ?>">
                            <label class="form-check-label" for="price3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="price" id="price4" value="4" data-id="<?php echo $q_2->id; ?>" data-type="<?php echo $q_2->question_type; ?>">
                            <label class="form-check-label" for="price4">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="price" id="price5" value="5" data-id="<?php echo $q_2->id; ?>" data-type="<?php echo $q_2->question_type; ?>">
                            <label class="form-check-label" for="price5">5</label>
                        </div>
                    </div>
                </div>

                <div class="aesthetics">
                    <div class="form-group">
                        <label for="aesthetics" class="aesthetics-id" data-id="<?php echo $q_3->id; ?>" data-type="<?php echo $q_3->question_type; ?>"><label class="txt-bold"></label> <?php echo $q_3->question; ?></label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aesthetics" id="aesthetics0" value="0"data-id="<?php echo $q_3->id; ?>" data-type="<?php echo $q_3->question_type; ?>">
                            <label class="form-check-label" for="aesthetics0">0</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aesthetics" id="aesthetics1" value="1"data-id="<?php echo $q_3->id; ?>" data-type="<?php echo $q_3->question_type; ?>">
                            <label class="form-check-label" for="aesthetic`s1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aesthetics" id="aesthetics2" value="2"data-id="<?php echo $q_3->id; ?>" data-type="<?php echo $q_3->question_type; ?>">
                            <label class="form-check-label" for="aesthetics2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aesthetics" id="aesthetics3" value="3"data-id="<?php echo $q_3->id; ?>" data-type="<?php echo $q_3->question_type; ?>">
                            <label class="form-check-label" for="aesthetics3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aesthetics" id="aesthetics4" value="4"data-id="<?php echo $q_3->id; ?>" data-type="<?php echo $q_3->question_type; ?>">
                            <label class="form-check-label" for="aesthetics4">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="aesthetics" id="aesthetics5" value="5"data-id="<?php echo $q_3->id; ?>" data-type="<?php echo $q_3->question_type; ?>">
                            <label class="form-check-label" for="aesthetics5">5</label>
                        </div>
                    </div>
                </div>

                <div class="fitment">
                    <div class="form-group">
                        <label for="fitment"  class="fitment-id" data-id="<?php echo $q_4->id; ?>" data-type="<?php echo $q_4->question_type; ?>"><label class="txt-bold"></label> <?php echo $q_4->question; ?></label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fitment" id="fitment0" value="0"   data-id="<?php echo $q_4->id; ?>" data-type="<?php echo $q_4->question_type; ?>">
                            <label class="form-check-label" for="fitment0">0</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fitment" id="fitment1" value="1"  data-id="<?php echo $q_4->id; ?>" data-type="<?php echo $q_4->question_type; ?>">
                            <label class="form-check-label" for="fitment1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fitment" id="fitment2" value="2"  data-id="<?php echo $q_4->id; ?>" data-type="<?php echo $q_4->question_type; ?>">
                            <label class="form-check-label" for="fitment2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fitment" id="fitment3" value="3"  data-id="<?php echo $q_4->id; ?>" data-type="<?php echo $q_4->question_type; ?>">
                            <label class="form-check-label" for="fitment3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fitment" id="fitment4" value="4"  data-id="<?php echo $q_4->id; ?>" data-type="<?php echo $q_4->question_type; ?>">
                            <label class="form-check-label" for="fitment4">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fitment" id="fitment5" value="5"  data-id="<?php echo $q_4->id; ?>" data-type="<?php echo $q_4->question_type; ?>">
                            <label class="form-check-label" for="fitment5">5</label>
                        </div>
                    </div>
                </div>

                <div class="performance">
                    <div class="form-group">
                        <label for="performance" class="performance-id" data-id="<?php echo $q_5->id; ?>" data-type="<?php echo $q_5->question_type; ?>"><label class="txt-bold"></label> <?php echo $q_5->question; ?></label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="performance" id="performance0" value="0"  data-id="<?php echo $q_5->id; ?>" data-type="<?php echo $q_5->question_type; ?>">
                            <label class="form-check-label" for="performance0">0</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="performance" id="performance1" value="1"  data-id="<?php echo $q_5->id; ?>" data-type="<?php echo $q_5->question_type; ?>">
                            <label class="form-check-label" for="performance1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="performance" id="performance2" value="2"  data-id="<?php echo $q_5->id; ?>" data-type="<?php echo $q_5->question_type; ?>">
                            <label class="form-check-label" for="performance2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="performance" id="performance3" value="3"  data-id="<?php echo $q_5->id; ?>" data-type="<?php echo $q_5->question_type; ?>">
                            <label class="form-check-label" for="performance3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="performance" id="performance4" value="4"  data-id="<?php echo $q_5->id; ?>" data-type="<?php echo $q_5->question_type; ?>">
                            <label class="form-check-label" for="performance4">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="performance" id="performance5" value="5">
                            <label class="form-check-label" for="performance5">5</label>
                        </div>
                    </div>
                </div>

                <div class="warranty">
                    <div class="form-group">
                        <label for="warranty" class="warranty-id"  data-id="<?php echo $q_6->id; ?>" data-type="<?php echo $q_6->question_type; ?>"><label class="txt-bold"></label> <?php echo $q_6->question; ?></label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="warranty" id="warranty0" value="0"  data-id="<?php echo $q_6->id; ?>" data-type="<?php echo $q_6->question_type; ?>">
                            <label class="form-check-label" for="warranty0">0</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="warranty" id="warranty1" value="1"  data-id="<?php echo $q_6->id; ?>" data-type="<?php echo $q_6->question_type; ?>">
                            <label class="form-check-label" for="warranty1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="warranty" id="warranty2" value="2"  data-id="<?php echo $q_6->id; ?>" data-type="<?php echo $q_6->question_type; ?>">
                            <label class="form-check-label" for="warranty2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="warranty" id="warranty3" value="3"  data-id="<?php echo $q_6->id; ?>" data-type="<?php echo $q_6->question_type; ?>">
                            <label class="form-check-label" for="warranty3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="warranty" id="warranty4" value="4"  data-id="<?php echo $q_6->id; ?>" data-type="<?php echo $q_6->question_type; ?>">
                            <label class="form-check-label" for="warranty4">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="warranty" id="warranty5" value="5"  data-id="<?php echo $q_6->id; ?>" data-type="<?php echo $q_6->question_type; ?>">
                            <label class="form-check-label" for="warranty5">5</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="lead-info ltr same-below-space">
                <div class="form-group">
                    <label for="leadinfo" class="txt-bold lead-info-id form-group" data-id="<?php echo $q_7->id; ?>" data-type="<?php echo $q_7->question_type; ?>"><label class="txt-bold">4)</label> <?php echo $q_7->question; ?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Online" name="leadinfo" data-id="<?php echo $q_7->id; ?>" data-type="<?php echo $q_7->question_type; ?>">
                    <label class="form-check-label" for="leadinfo">
                        Online
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="TV" name="leadinfo" data-id="<?php echo $q_7->id; ?>" data-type="<?php echo $q_7->question_type; ?>">
                    <label class="form-check-label" for="leadinfo">
                        TV
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Friends" name="leadinfo" data-id="<?php echo $q_7->id; ?>" data-type="<?php echo $q_7->question_type; ?>">
                    <label class="form-check-label" for="leadinfo">
                        Friends
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Newspaper" name="leadinfo" data-id="<?php echo $q_7->id; ?>" data-type="<?php echo $q_7->question_type; ?>">
                    <label class="form-check-label" for="leadinfo">
                        Newspaper
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Dealer Recommendation" name="leadinfo" data-id="<?php echo $q_7->id; ?>" data-type="<?php echo $q_7->question_type; ?>">
                    <label class="form-check-label" for="leadinfo">
                        Dealer Recommendation
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Other" name="leadinfo" data-id="<?php echo $q_7->id; ?>" data-type="<?php echo $q_7->question_type; ?>">
                    <label class="form-check-label" for="leadinfo">
                        Other
                    </label>
                    <br>
                    <!-- <input class="form-control mt-3" type="text" value="" id="leadinfo" data-id="<?php echo $q_7->id; ?>" data-type="<?php echo $q_7->question_type; ?>"> -->
                </div>
            </div>

            <div class="demographics ltr same-below-space">
                <label for="" class="txt-bold form-group"><label class="txt-bold">5)</label> Please tell us something about yourself </label>
                <div class="form-group same-below-space">
                    <label for="yourname" class="yourname-id" data-id="<?php echo $q_8->id; ?>" data-type="<?php echo $q_8->question_type; ?>"><?php echo $q_8->question; ?> </label>
                    <input type="text" class="form-control" name="yourname" placeholder="Your Name" data-id="<?php echo $q_8->id; ?>" data-type="<?php echo $q_8->question_type; ?>">
                </div>
                   
                <div class="contact-group">
                    <label for="" class="txt-bold">6) Your Contact Info</label>
                </div>
                <div class="form-group">
                    <label for="mobilenumber" class="mobilenumber-id" data-id="<?php echo $q_9->id; ?>" data-type="<?php echo $q_9->question_type; ?>"> <?php echo $q_9->question; ?></label>
                    <input type="text" class="form-control" name="mobilenumber" id="mobile-number" placeholder="Mobile Number" data-id="<?php echo $q_9->id; ?>" data-type="<?php echo $q_9->question_type; ?>">
                    <div class="err-mobile"> </div>
                </div>
                
                <div class="form-group">
                    <label for="emailaddress" class="emailaddress-id" data-id="<?php echo $q_10->id; ?>" data-type="<?php echo $q_10->question_type; ?>"> <?php echo $q_10->question; ?></label>
                    <input type="email" class="form-control" name="emailaddress" id="email" placeholder="Email Address" data-id="<?php echo $q_10->id; ?>" data-type="<?php echo $q_10->question_type; ?>">
                </div>
                <div class="err-email"></div>

                <div class="form-group">
                    <label for="yourbirthdate" class="yourbirthdate-id" data-id="<?php echo $q_11->id; ?>" data-type="<?php echo $q_11->question_type; ?>"><?php echo $q_11->question; ?></label>
                    <input type="date" class="form-control yourbirthdate" name="yourbirthdate" placeholder="Your Birthdate" data-id="<?php echo $q_11->id; ?>" data-type="<?php echo $q_11->question_type; ?>">
                </div>

                <div class="form-group">
                    <label for="anniversarydate" class="anniversarydate-id" data-id="<?php echo $q_12->id; ?>" data-type="<?php echo $q_12->question_type; ?>"> <?php echo $q_12->question; ?></label>
                    <input type="date" class="form-control anniversarydate" name="anniversarydate" placeholder="Your Anniversary Date"  data-id="<?php echo $q_12->id; ?>" data-type="<?php echo $q_12->question_type; ?>">
                </div>
                
                <div class="form-group">
                    <label for="state" data-id="<?php echo $q_13->id; ?>" data-type="<?php echo $q_13->question_type; ?>"> <?php echo $q_13->question; ?></label>
                    <select class="form-select state-select" class="form-control" name="state" id="state" data-id="<?php echo $q_13->id; ?>" data-type="<?php echo $q_13->question_type; ?>">
                        <option value="" selected>Select State</option>
                        <?php
                            foreach ($states_results as $key => $value) {
                               
                                $state_id = $value->id;
                                $state_name = $value->name;
                        ?>
                                <option value="<?php echo $state_name?>" data-id="<?php echo $state_id?>"><?php echo $state_name?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="city" data-id="<?php echo $q_14->id; ?>" data-type="<?php echo $q_14->question_type; ?>"><?php echo $q_14->question; ?></label>
                    <select class="form-select city-select" class="form-control" name="city" id="city" data-id="<?php echo $q_14->id; ?>" data-type="<?php echo $q_14->question_type; ?>">
                        <option value="" selected>Select City</option>
                        <?php
                            // foreach ($cities_results as $key => $value) {
                    
                            //     $city_id = $value->id;
                            //     $city_name = $value->city;
                        ?>
                                <!-- <option value="<?php echo $city_name; ?>" data-id="<?php echo $city_id ;?>"><?php echo $city_name; ?></option> -->
                        <?php
                            // }
                        ?>
                    </select>
                </div>
            </div>

            <div class="osat-btn ltr same-below-space">
                <div class="form-group">
                    <label for="osat" class="txt-bold osat-id" data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>"> <label class="txt-bold">7) </label>  <?php echo $q_15->question; ?> <span style="color: red;">*</span> </label>

                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat0" value="0"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat0">0</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat1" value="1"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat2" value="2"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat3" value="3"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat4" value="4"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat4">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat5" value="5"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat5">5</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat6" value="6"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat6">6</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat7" value="7"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat7">7</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat8" value="8"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat8">8</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat9" value="9"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat9">9</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="osat" id="osat10" value="10"  data-id="<?php echo $q_15->id; ?>" data-type="<?php echo $q_15->question_type; ?>">
                    <label class="form-check-label" for="osat10">10</label>
                </div>
                <div class="err-osat ltr same-below-space">
                        <?php
                            // Check for errors
                            if (!empty($errors)) {
                
                                echo "<span class='err' style='color:red;'>$errors[osat] </span><br>";
                            }
                        ?>
                </div>
                
            </div>
            
        
            <div class="comment ltr same-below-space">
                <label for="comment" class="comment-id txt-bold form-group" data-id="<?php echo $q_16->id; ?>" data-type="<?php echo $q_16->question_type; ?>"><label class="txt-bold">8) </label> <?php echo $q_16->question; ?></label>
                <textarea name="comment" rows="5" placeholder="<?php echo $q_16->question; ?>" class="form-control" id="comment" data-id="<?php echo $q_16->id; ?>" data-type="<?php echo $q_16->question_type; ?>"></textarea>
                <p id="charCount">0 / 150</p>
            </div>

            <div class="form-group text-center ">
                <button type="submit" name="survey-submit" style="background-color:#1a48a8;border-color: #1a48a8;" id="survey-submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
          
       
       
    </div>
</section>
<?php
    get_footer();
?>