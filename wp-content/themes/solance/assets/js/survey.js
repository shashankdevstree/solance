jQuery(document).ready(function ($) {

    // jQuery('.next.slick-arrow').addClass('slick-disabled');
    jQuery('.next.slick-arrow').addClass('disabled');

    jQuery('#mobile-number, .yourbirthdate, .anniversarydate').on('keypress', function(e) {
        // Allow only numeric (0-9) characters
        if (e.which < 48 || e.which > 57) {
            e.preventDefault();
        }
    });

    // jQuery( ".yourbirthdate" ).datepicker({  maxDate: new Date() });
    var today_date = new Date().toISOString().split("T")[0];
    $('.yourbirthdate').attr('max', today_date);
    $('.anniversarydate').attr('max', today_date);

    jQuery('#mobile-number').on('input', function() {
        // Limit input to 10 digits
        if (this.value.length > 10) {
            this.value = this.value.slice(0, 10);
        }
    });


    jQuery('#state').on('change', function() {
        var state = jQuery(this).val();
        var selectedOption = jQuery('#state').find('option:selected');

        var date_id = selectedOption.data('id');
        // console.log(date_id);
        if(state == ''){
            jQuery("#city").html('<option value="" selected="">Select City</option>');
        }
        if (date_id) {
            jQuery.ajax({
                type: 'POST',
                url: survey.ajaxurl,
                data: {
                    action: 'get_cities',
                    state_date_id: date_id
                },
                success: function(response) {
                 
                    if (response.success) {
                        var cities = response.data;
                        
                        // var cityDropdown = jQuery('#city');
                        jQuery("#city").html(cities);
                    } else {
                        console.log('No cities found for the selected state.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error: ' + status + ' - ' + error);
                }
            });
        } else {
            // jQuery('#city').empty().append('<option value="">Select City</option>').prop('disabled', true);
        }
    });

    $('#comment').keyup(function() {
        var text = $(this).val();
        var textLength = text.length;
        
        // Display the current character count
        $('#charCount').text(textLength + ' / 150');
        
        // Check if the length exceeds 150 characters
        if (textLength > 150) {
            $(this).val(text.substring(0, 150));
            $('#charCount').text('150 / 150');
        }
    });

    $('input[name="rating"], #batteryselect, input[name="osat"], input[name="mobilenumber"]').change(function() {
        // console.log("Hello");
        var valid = false;
        // If a radio button is selected, remove the error message
        if (jQuery("input[name='rating']:checked").val()) {
            jQuery(".err-rating").html(""); 
            valid = true;          
        }else{
            jQuery(".err-rating").html("<span class='err' style='color:red;'> Please select a purchase experience. </span>");
            valid = false; 
        }

        if (jQuery("input[name='osat']:checked").val()) {
            jQuery(".err-osat").html("");   
            valid = true;         
        }else{
            jQuery(".err-osat").html("<span class='err' style='color:red;'> Please select an overall satisfied rating. </span>");
            valid = false;
        }

        if (jQuery("#batteryselect").val() !== "") {
            jQuery(".err-batteryselect").html("");
            valid = true;   
        }else{
            jQuery(".err-batteryselect").html("<span class='err' style='color:red;'> Please select a battery option. </span>");
            valid = false;
        }

        

        var mobileNumber = jQuery('#mobile-number').val();
        // console.log(mobileNumber.length );
        if(jQuery("input[name='rating']:checked").val() && jQuery("input[name='osat']:checked").val() && jQuery("#batteryselect").val() !== ""){
            jQuery('.next.slick-arrow').removeClass('disabled');
            jQuery('form').removeClass('form-error');
            // jQuery(".main-err").html("");
        }else{
            jQuery('form').addClass('form-error');
            jQuery('.slick-initialized .slick-slide').css('min-height','350px');
            jQuery('.next.slick-arrow').addClass('disabled');
            // jQuery(".main-err").html("<span class='err mb-3 d-block' style='color:red;'> Please fill required <b> (*) </b> fields. </span>");
        }
        if(mobileNumber !== ''){

            if (mobileNumber.length < 10 ) {
                // console.log("Hello");
                // jQuery('#email-message').text('Valid email address').css('color', 'green');
                jQuery('.err-mobile').html("<span class='err' style='color:red;'> Mobile should be 10 digit. </span>");
                // valid = false;
            }else{
                jQuery(".err-mobile").html("");
            }
        }else{
            jQuery(".err-mobile").html("");
        }
    });

    jQuery("#survey-submit").on("click", function (e) {
        e.preventDefault();
        
        // Clear previous error messages
        jQuery(".error").text("");

        let valid = true;

        // Validate Rating
        if (!jQuery("input[name='rating']:checked").val()) {
            jQuery(".err-rating").html("<span class='err' style='color:red;'> Please select a purchase experience. </span>");
            valid = false;
        }else{
            jQuery(".err-rating").html("");
        }

        // Validate Battery
        if (jQuery("#batteryselect").val() === "") {
            jQuery(".err-batteryselect").html("<span class='err' style='color:red;'> Please select a battery option. </span>");
            valid = false;
        }else{
            jQuery(".err-batteryselect").html("");
        }

        // Validate Overall Performance
        if (!jQuery("input[name='osat']:checked").val()) {
            jQuery(".err-osat").html("<span class='err' style='color:red;'> Please select an overall satisfied rating. </span>");
            valid = false;
        }else{
            jQuery(".err-osat").html("");
        }

        var email = jQuery('#email').val();
        var emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

        // console.log(email);
        if(email !== ''){

            if (!emailRegex.test(email) ) {
      
                // jQuery('#email-message').text('Valid email address').css('color', 'green');
                jQuery('.err-email').html("<span class='err' style='color:red;'> Invalid email address </span>");
                valid = false;
            }else{
                jQuery(".err-email").html("");
            }
        }else{
            jQuery(".err-email").html("");
        }

        var mobileNumber = jQuery('#mobile-number').val();
        // console.log(mobileNumber.length );
        if(mobileNumber !== ''){

            if (mobileNumber.length < 10 ) {
                // console.log("Hello");
                // jQuery('#email-message').text('Valid email address').css('color', 'green');
                jQuery('.err-mobile').html("<span class='err' style='color:red;'> Mobile should be 10 digit. </span>");
                valid = false;
            }else{
                jQuery(".err-mobile").html("");
            }
        }else{
            jQuery(".err-mobile").html("");
        }
    

        if (valid) {
            // Submit the form via AJAX

            // jQuery(".next.slick-arrow").removeClass("slick-disabled");
            jQuery(".main-err").html("");
            var rating = '';
            var rating_q_id;
            var rating_q_type;
            if (jQuery("input[name='rating']:checked").val()) {
                rating = jQuery("input[name='rating']:checked").val();
            }
            rating_q_id = jQuery(".rating-id").data('id');
            
            rating_q_type = jQuery(".rating-id").data('type');
            
            var batteryselect;
            var batteryselect_q_type;
            var batteryselect_q_id;
            if (jQuery("#batteryselect").val() !== "") {
                batteryselect = jQuery("#batteryselect").val();
            }
            batteryselect_q_id = jQuery(".batteryselect-id").data('id');
            batteryselect_q_type = jQuery(".batteryselect-id").data('type');

            var price = '';
            var price_q_id;
            var price_q_type;
            if (jQuery("input[name='price']:checked").val()) {
                price = jQuery("input[name='price']:checked").val();
            }
            price_q_id = jQuery(".price-id").data('id');
            price_q_type = jQuery(".price-id").data('type');

            var aesthetics = '';
            var aesthetics_q_id;
            var aesthetics_q_type;
            if (jQuery("input[name='aesthetics']:checked").val()) {
                aesthetics = jQuery("input[name='aesthetics']:checked").val();
            }
            aesthetics_q_id = jQuery(".aesthetics-id").data('id');
            aesthetics_q_type = jQuery(".aesthetics-id").data('type');

            var fitment = '';
            var fitment_q_id;
            var fitment_q_type;
            if (jQuery("input[name='fitment']:checked").val()) {
                fitment = jQuery("input[name='fitment']:checked").val();
            }
            fitment_q_id = jQuery(".fitment-id").data('id');
            fitment_q_type = jQuery(".fitment-id").data('type');

            var performance = '';
            var performance_q_id;
            var performance_q_type;
            if (jQuery("input[name='performance']:checked").val()) {
                performance = jQuery("input[name='performance']:checked").val();
            }
            performance_q_id = jQuery(".performance-id").data('id');
            performance_q_type = jQuery(".performance-id").data('type');

            var warranty = '';
            var warranty_q_id;
            var warranty_q_type;
            if (jQuery("input[name='warranty']:checked").val()) {
                warranty = jQuery("input[name='warranty']:checked").val();
            }
            warranty_q_id = jQuery(".warranty-id").data('id');
            warranty_q_type = jQuery(".warranty-id").data('type');

            var leadinfo = '';
            var leadinfo_q_id;
            var leadinfo_q_type;
            var checkedValues = $('input[name="leadinfo"]:checked').map(function() {
                return this.value;
            }).get();
            if (checkedValues.length > 0) {
                leadinfo = checkedValues.join(', ');
            }
            leadinfo_q_id = jQuery(".lead-info .form-group:first label").data('id');
            leadinfo_q_type = jQuery(".lead-info .form-group:first label").data('type');

            var yourname = '';
            var yourname_q_id;
            var yourname_q_type;
            if (jQuery("input[name='yourname']").val()) {
                yourname = jQuery("input[name='yourname']").val();
            }
            yourname_q_id = jQuery(".yourname-id").data('id');
            yourname_q_type = jQuery(".yourname-id").data('type');

            var mobilenumber = '';
            var mobilenumber_q_id;
            var mobilenumber_q_type;
            if (jQuery("input[name='mobilenumber']").val()) {
                mobilenumber = jQuery("input[name='mobilenumber']").val();
            }
            mobilenumber_q_id = jQuery(".mobilenumber-id").data('id');
            mobilenumber_q_type = jQuery(".mobilenumber-id").data('type');

            var emailaddress = '';
            var emailaddress_q_id;
            var emailaddress_q_type;
            if (jQuery("input[name='emailaddress']").val()) {
                emailaddress = jQuery("input[name='emailaddress']").val();
            }
            emailaddress_q_id = jQuery(".emailaddress-id").data('id');
            emailaddress_q_type = jQuery(".emailaddress-id").data('type');

            var yourbirthdate = '';
            var yourbirthdate_q_id;
            var yourbirthdate_q_type;
            if (jQuery("input[name='yourbirthdate']").val()) {
                yourbirthdate = jQuery("input[name='yourbirthdate']").val();
            }
            yourbirthdate_q_id = jQuery(".yourbirthdate-id").data('id');
            yourbirthdate_q_type = jQuery(".yourbirthdate-id").data('type');

            var anniversarydate = '';
            var anniversarydate_q_id;
            var anniversarydate_q_type;
            if (jQuery("input[name='anniversarydate']").val()) {
                anniversarydate = jQuery("input[name='anniversarydate']").val();
            }
            anniversarydate_q_id = jQuery(".anniversarydate-id").data('id');
            anniversarydate_q_type = jQuery(".anniversarydate-id").data('type');

            var state = '';
            var state_q_id;
            var state_q_type;
            if (jQuery(".state-select").val()) {
                state = jQuery(".state-select").val();
            }
            state_q_id = jQuery(".state-select").data('id');
            state_q_type = jQuery(".state-select").data('type');

            var city = '';
            var city_q_id;
            var city_q_type;
            if (jQuery(".city-select").val()) {
                city = jQuery(".city-select").val();
            }
            city_q_id = jQuery(".city-select").data('id');
            city_q_type = jQuery(".city-select").data('type');

            var osat = '';
            var osat_q_id;
            var osat_q_type;
            if (jQuery("input[name='osat']:checked").val()) {
                osat = jQuery("input[name='osat']:checked").val();
            }
            osat_q_id = jQuery(".osat-id").data('id');
            osat_q_type = jQuery(".osat-id").data('type');

            var comment = '';
            var comment_q_id;
            var comment_q_type;
            if (jQuery("#comment").val()) {
                comment = jQuery("#comment").val();
            }
            comment_q_id = jQuery("#comment").data('id');
            comment_q_type = jQuery("#comment").data('type');

            var form_id = jQuery(".survey-form").data('form');

            // console.log("Question ID: "+rating_q_id + " = Question: "+ rating + " = Question type: "+rating_q_type)
            // console.log("Question ID: "+batteryselect_q_id + " = Question: "+ batteryselect + " = Question type: "+batteryselect_q_type)
            // console.log("Question ID: "+price_q_id + " = Question: "+ price + " = Question type: "+price_q_type)
            // console.log("Question ID: "+aesthetics_q_id + " = Question: "+ aesthetics + " = Question type: "+aesthetics_q_type)
            // console.log("Question ID: "+fitment_q_id + " = Question: "+ fitment + " = Question type: "+fitment_q_type)
            // console.log("Question ID: "+performance_q_id + " = Question: "+ performance + " = Question type: "+performance_q_type)
            // console.log("Question ID: "+warranty_q_id + " = Question: "+ warranty + " = Question type: "+warranty_q_type)
            // console.log("Question ID: "+leadinfo_q_id + " = Question: "+ leadinfo + " = Question type: "+leadinfo_q_type)
            // console.log("Question ID: "+yourname_q_id + " = Question: "+ yourname + " = Question type: "+yourname_q_type)
            // console.log("Question ID: "+emailaddress_q_id + " = Question: "+ emailaddress + " = Question type: "+emailaddress_q_type)
            // console.log("Question ID: "+mobilenumber_q_id + " = Question: "+ mobilenumber + " = Question type: "+mobilenumber_q_type)
            // console.log("Question ID: "+yourbirthdate_q_id + " = Question: "+ yourbirthdate + " = Question type: "+yourbirthdate_q_type)
            // console.log("Question ID: "+anniversarydate_q_id + " = Question: "+ anniversarydate + " = Question type: "+anniversarydate_q_type)
            // console.log("Question ID: "+state_q_id + " = Question: "+ state + " = Question type: "+state_q_type)
            // console.log("Question ID: "+city_q_id + " = Question: "+ city + " = Question type: "+city_q_type)
            // console.log("Question ID: "+osat_q_id + " = Question: "+ osat + " = Question type: "+osat_q_type)
            // console.log("Question ID: "+comment_q_id + " = Question: "+ comment + " = Question type: "+comment_q_type)
            
            jQuery("#survey-submit").text("Loading...");
            jQuery('#loading').show();
            jQuery.ajax({
                type: 'POST',
                url: survey.ajaxurl, 
                data: {
                    action: 'survey_submit_form_data', 
                    rating: rating,
                    rating_q_id: rating_q_id,
                    rating_q_type: rating_q_type,
                    batteryselect: batteryselect,
                    batteryselect_q_id: batteryselect_q_id,
                    batteryselect_q_type: batteryselect_q_type,
                    price: price,
                    price_q_id: price_q_id,
                    price_q_type: price_q_type,
                    aesthetics: aesthetics,
                    aesthetics_q_id: aesthetics_q_id,
                    aesthetics_q_type: aesthetics_q_type,
                    fitment: fitment,
                    fitment_q_id: fitment_q_id,
                    fitment_q_type: fitment_q_type,
                    performance: performance,
                    performance_q_id: performance_q_id,
                    performance_q_type: performance_q_type,
                    warranty: warranty,
                    warranty_q_id: warranty_q_id,
                    warranty_q_type: warranty_q_type,
                    leadinfo: leadinfo,
                    leadinfo_q_id: leadinfo_q_id,
                    leadinfo_q_type: leadinfo_q_type,
                    yourname: yourname,
                    yourname_q_id: yourname_q_id,
                    yourname_q_type: yourname_q_type,
                    mobilenumber: mobilenumber,
                    mobilenumber_q_id: mobilenumber_q_id,
                    mobilenumber_q_type: mobilenumber_q_type,
                    emailaddress: emailaddress,
                    emailaddress_q_id: emailaddress_q_id,
                    emailaddress_q_type: emailaddress_q_type,
                    yourbirthdate: yourbirthdate,
                    yourbirthdate_q_id: yourbirthdate_q_id,
                    yourbirthdate_q_type: yourbirthdate_q_type,
                    anniversarydate: anniversarydate,
                    anniversarydate_q_id: anniversarydate_q_id,
                    anniversarydate_q_type: anniversarydate_q_type,
                    state: state,
                    state_q_id: state_q_id,
                    state_q_type: state_q_type,
                    city: city,
                    city_q_id: city_q_id,
                    city_q_type: city_q_type,
                    osat: osat,
                    osat_q_id: osat_q_id,
                    osat_q_type: osat_q_type,
                    comment: comment,
                    comment_q_id: comment_q_id,
                    comment_q_type: comment_q_type,
                    form_id: form_id,
                    
                 
                },
                success: function(response) {
                    //  jQuery("#survey-1").submit();
                    var site_url = response.data.site_url;
                    window.location.href = site_url + '/thank-you';
                    jQuery("#survey-submit").text("Submit"); 
                    jQuery('#loading').hide();
                },
                error: function(xhr, status, error) {
                    // jQuery('#form-message').html('<span style="color: red;">' + xhr.responseText + '</span>');
                    jQuery("#survey-submit").text("Submit");
                    jQuery('#loading').hide();
                },
                complete: function() {
                    // Hide loader when AJAX request is complete (success or error)
                    jQuery("#survey-submit").text("Submit");
                    jQuery('#loading').hide();
                }
            });

           
    
        }else{
            // jQuery(".next.slick-arrow").addClass("slick-disabled");
            jQuery(".main-err").html("<span class='err mb-3 d-block' style='color:red;'> Please fill required fields. </span>");
        }
    });

    jQuery('label').on('click', function() {
        let checkboxId = $(this).attr('for');
        jQuery('#' + checkboxId).on('click');
    });
    jQuery('.flipBox_box > div:nth-child(6)').on('click', function() {
        // let checkboxId = $(this).attr('for');
        // console.log(jQuery(this).closest('.flipBox').find('label').attr('for'));
        // let checkboxId = jQuery(this).closest('.flipBox').find('label').attr('for');
        jQuery(this).closest('.flipBox').find('label').click();
    });
    jQuery('.flipBox_box > div:nth-child(5)').on('click', function() {
        // let checkboxId = $(this).attr('for');
        // console.log(jQuery(this).closest('.flipBox').find('label').attr('for'));
        // let checkboxId = jQuery(this).closest('.flipBox').find('label').attr('for');
        jQuery(this).closest('.flipBox').find('label').click();
    });
    
});

jQuery('.form-items').slick({
    dots: true,
    draggable: false,    
    swipe: false,        
    prevArrow: jQuery('.prev'),
    nextArrow: jQuery('.next'),
    infinite: false,
    speed: 500,
    fade: true,
    adaptiveHeight: true,
    cssEase: 'linear'
  });