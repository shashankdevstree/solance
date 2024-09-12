<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package solance
 */

 $theme_path = get_template_directory_uri();
 $bottom_header = get_field('bottom_header','options');

 $logo = $bottom_header['logo'];

 $top_header = get_field('top_header','options');
 $phone_number = $top_header['phone_number'];
 $email = $top_header['email'];
 $facebook = $top_header['facebook'];
 $linkedin = $top_header['linkedin'];
 $instagram = $top_header['instagram'];
 $twitter = $top_header['twitter'];
 $top_footerr = get_field('top_footerr','options');
 $certificates = $top_footerr['certificates'];
 $column_11 = $top_footerr['column_11'];
 $column_21 = $top_footerr['column_21'];
 $column_31 = $top_footerr['column_31'];
 $column_41 = $top_footerr['column_41'];
 $copy_right_text = get_field('copy_right_text','options');
 $privacy_link = get_field('privacy_link','options');
 $terms_conditions_link = get_field('terms_conditions_link','options');

  /** Validation */
  $errors = [];
  if (isset($_POST['downloadsubmit'])) {
      
      if (empty($_POST['username'])) {
          $errors['username'] = "Please enter your name";
      }
  
      if (empty($_POST['usernumber'])) {
          $errors['usernumber'] = "Please enter your number.";
      }
  
      if (empty($_POST['usercompany'])) {
          $errors['usercompany'] = "Please enter your company name.";
      }
 
     if(!filter_var($_POST['useremail'], FILTER_VALIDATE_EMAIL) && !empty($_POST['useremail'])) {
         $errors['useremail'] = "Please enter a valid email address.";
     }
  }
?>


<!-- Button to open the modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#downloadModal">
    Download PDF
</button> -->

<!-- Modal -->
<div class="modal fade" id="downloadModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="downloadModalLabel">Download PDF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="pdf_close">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="download-pdf-form" id="download-pdf-form">
                    <input type="text" value="" hidden id="product_id" class="product_id" name="productid" placeholder="Product Id"> 
                    <input type="text" value="" hidden id="category_id" class="category_id" name="categoryid" placeholder="Category Id"> 
                    <div class="form-group groupname">
                        <input type="text" name="username" class="form-control" id="user_name" placeholder="Your Name*">
                        
                            <?php
                                if(!empty($errors['username'])){
                                    echo "<span class='err err_name'>".$errors['username']."  </span>";
                                }
                            ?>
                      
                    </div>
                    <div class="form-group groupnumber">
                        <input type="text" name="usernumber" class="form-control" id="user_number" placeholder="Your Number*">
                        
                            <?php
                                if(!empty($errors['usernumber'])){
                                    echo "<span class='err err_number'>".$errors['usernumber']."</span>";
                                }
                            ?>
                        
                    </div>
                    <div class="form-group groupemail">
                        <input type="email" name="useremail" class="form-control" id="user_email" placeholder="Your Email">
                      
                            <?php
                                if(!empty($errors['useremail'])){
                                    echo "<span class='err err_email'>".$errors['useremail']."</span>";
                                }
                            ?>
                        
                    </div>
                    <div class="form-group groupcompany">
                        <input type="text" name="usercompany" class="form-control" id="user_company" placeholder="Your Company*">
                        
                            <?php
                                if(!empty($errors['usercompany'])){
                                    echo "<span class='err err_company'>".$errors['usercompany']."</span>";
                                }
                            ?>
                        
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="downloadsubmit" class="btn btn-primary submit-btn download_submit" id="download_submit">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<footer class="footer-wrapper  footer-bg"
    style="background-image: url(<?php echo $theme_path;?>/assets/images/bg-footer-01.png);">
    <div class="container footer-container">

        <div class="row ">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-12">
                <a href="<?php echo home_url();?>"><img src="<?php echo $logo['url'];?>"
                        alt="<?php echo $logo['name'];?>"></a>
                <div class="my-3">
                    <p class="title-footer">
                        <?php echo $column_11['content']; ?>
                    </p>
                    <div class="d-flex gap-3">
                        <?php
                        foreach ($certificates as $key => $value) {
                            $iso_img = $value['iso_img'];
                    ?>
                        <div class="certificate-img">
                            <img src="<?php echo $iso_img['url'];?>" class="iso-certificate-img"
                                alt="<?php echo $iso_img['name'];?>">
                        </div>
                        <?php 
                        }
                    ?>
                        <!-- <div class="certificate-img">
                        <img src="<?php echo $iso_img['url'];?>" class="iso-certificate-img" alt="<?php echo $iso_img['name'];?>">
                    </div> -->
                    </div>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-12">
                <div class="fs-4 foot-title"><?php echo $column_21['title']; ?>
                    <div class="hr-footer-title"></div>
                </div>

                <div class="footer-li-container">
                    <?php
                            wp_nav_menu( array(
                                'theme_location' => 'product',
                                // 'menu_id'        => 'header-menu',
                                // 'container'      => 'nav',
                                // 'container_class'=> 'header-menu-container',
                                // 'menu_class'     => 'header-menu',
                            ) );
                        ?>
                    <!-- <ul>
                            <li>
                                <a>2 Wheeler Batteries</a>
                            </li>
                            <li>
                                <a>Automotive Batteries</a>
                            </li>
                            <li>
                                <a>UPS Batteries</a>
                            </li>
                            <li>
                                <a>Tall Tubular Batteries</a>
                            </li>
                        </ul> -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-12">
                <div class="fs-4 foot-title"><?php echo $column_31['title']; ?>
                    <div class="hr-footer-title"></div>

                </div>

                <div class="footer-li-container">
                    <ul>
                        <?php
                                $recent_posts = wp_get_recent_posts(array(
                                    'numberposts' => 5, 
                                    'post_status' => 'publish'
                                ));
                                foreach( $recent_posts as $post_item ):
                            ?>
                        <li>
                            <a
                                href="<?php echo get_permalink($post_item['ID']) ?>"><?php echo $post_item['post_title'] ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-12">
                <div class="fs-4 foot-title"><?php echo $column_41['title']; ?>
                    <div class="hr-footer-title"></div>
                </div>
                <div class="address-footer">
                    <div class="d-flex"><i class="fa-solid fa-location-dot social-icons fb-icon"></i>
                        <p class="px-2 text-white ">
                            <?php echo $column_41['address']; ?>
                        </p>
                    </div>

                    <div class="d-flex py-2 align-items-center"><i class="fa-solid fa-phone social-icons fb-icon"></i>
                        <a class="px-2 text-white d-flex align-items-center phone-footer"
                            href="<?php echo  $phone_number['url']; ?>"><?php echo  $phone_number['title']; ?></a>

                    </div>
                    <div class="d-flex py-2 align-items-center"><i
                            class="fa-solid fa-envelope social-icons fb-icon"></i>
                        <a class="px-2 text-white d-flex align-items-center email-footer"
                            href="<?php echo  $email['url']; ?>"><?php echo  $email['title']; ?></a>
                    </div>

                </div>
            </div>
        </div>

        <div class="nav-social-icons flex align-items-center justify-content-center">
            <a href="<?php echo $facebook; ?>" target="_blank"><i
                    class="fab fa-facebook-f fb-icons social-icons"></i></a>
            <a href="<?php echo $instagram; ?>" target="_blank"><i
                    class="fa-brands fa-instagram fb-icon social-icons"></i></a>
            <a href="<?php echo $linkedin; ?>" target="_blank"><i
                    class="fab fa-linkedin-in fb-icon social-icons"></i></a>
        </div>
        <hr>
        <div class="d-flex justify-content-between main-footer-policy"><?php echo $copy_right_text; ?> <div
                class="d-flex gap-4 link-policy"> <a
                    href="<?php echo $privacy_link['url']; ?>"><?php echo $privacy_link['title']; ?></a> <a
                    href="<?php echo $terms_conditions_link['url']; ?>"><?php echo $terms_conditions_link['title']; ?></a>
            </div>
        </div>

    </div>

</footer>

</div><!-- #page -->
<!-- <nav id="menu"> -->
<?php
                                    // wp_nav_menu( array(
                                    //     'theme_location' => 'primary',
                                    //     'menu_id'        => 'header-menu',
                                    //     'container'      => 'div',
                                    //     'container_class'=> 'header-menu-container',
                                    //     'menu_class'     => '',
                                    //     // 'walker' => new Walker_Nav_Menu_No_UL()
                                    // ) );
                                    ?>
<!-- <ul>
        <li><a href="/">Home</a></li>
        <li><a href="./about.html">About us</a></li>
        <li><span>Products</span>
            <ul>
                <li><span>2 Wheeler Batteries</span>
                    <ul>
                        <li><span>Platinum Line</span>
                            <ul>
                                <li><a href="">SLX 2.5L</a></li>
                                <li><a href="">SLX 2.5L</a></li>
                                <li><a href="">SLX 2.5L</a></li>
                            </ul>
                        </li>
                        <li><span>Gold Line</span>
                            <ul>
                                <li><a href="">SLX 2.5L</a></li>
                                <li><a href="">SLX 2.5L</a></li>
                                <li><a href="">SLX 2.5L</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><span>UPS Batteries</span>
                    <ul>
                        <li><a href="">SLV 4.5</a></li>
                        <li><a href="">SLV 4.5</a></li>
                        <li><a href="">SLV 4.5</a></li>
                        <li><a href="">SLV 4.5</a></li>
                        <li><a href="">SLV 4.5</a></li>
                        <li><a href="">SLV 4.5</a></li>
                        <li><a href="">SLV 4.5</a></li>
                        <li><a href="">SLV 4.5</a></li>
                        <li><a href="">SLV 4.5</a></li>
                    </ul>
                </li>
                <li><span>Automotive Batteries</span>
                    <ul>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                        <li><a href="">S34B19L/R</a></li>
                    </ul>
                </li>
                <li><span>Tall Tubular Batteries</span>
                    <ul>
                        <li><a href="">STT15000</a></li>
                        <li><a href="">STT15000</a></li>
                        <li><a href="">STT15000</a></li>
                        <li><a href="">STT15000</a></li>
                    </ul>
                </li>
                <li><span>Jumbo Series</span>
                    <ul>
                        <li><a href="">STT250</a></li>
                        <li><a href="">STT250</a></li>
                        <li><a href="">STT250</a></li>
                        <li><a href="">STT250</a></li>
                        <li><a href="">STT250</a></li>
                        <li><a href="">STT250</a></li>
                        <li><a href="">STT250</a></li>
                        <li><a href="">STT250</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="./blogs.html">Blogs</a></li>
        <li><a href="./our-Team.html">Our Team</a></li>
        <li><a href="./contact.html">Contact</a></li>
    </ul> -->
<!-- </nav> -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>



document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll(".counter");

    const startCounter = (counter) => {
        const target = +counter.getAttribute("data-target"); // Fetch target without '+'
        const count = +counter.innerText.replace('+', ''); // Current count without '+'

        const increment = target / 200; // Slower increment for a smooth count

        if (count < target) {
            counter.innerText = `+${Math.ceil(count + increment)}`; // Update counter with '+'
            setTimeout(() => startCounter(counter), 50); // Slow update frequency
        } else {
            counter.innerText = `+${target}`; // Final value with '+'
        }
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) { // If the section is visible
                startCounter(entry.target); // Start the counter
                observer.unobserve(entry.target); // Stop observing once started
            }
        });
    }, {
        threshold: 0.5
    }); // Trigger when 50% of the section is in view

    counters.forEach(counter => {
        observer.observe(counter); // Observe each counter
    });
});

jQuery(document).ready(function() {

    AOS.init();
    // Find the element with both classes owl-nav and disabled
    var element = jQuery('.owl-nav.disabled');

    // Remove the disabled class
    element.removeClass('disabled');

    var maxHeight = 0;
    // Loop through each element with class '.myElements'
    jQuery('.news-description > a > h3').each(function() {
        // Get the height of the current element
        var currentHeight = jQuery(this).height();

        // Compare and update the maxHeight if the current element's height is greater
        if (currentHeight > maxHeight) {
            maxHeight = currentHeight;
        }


    });

    jQuery(".news-description > a > h3").css('height', maxHeight)


    console.log(maxHeight);
    // jQuery('.owl-carousel').owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     nav: true,
    //     navText: [
    //         " <img src='http://170.187.248.145/solance/wp-content/themes/solance/assets/images/prev-btn.svg' alt='' class='btn-previous'>",
    //         "<img src='http://170.187.248.145/solance/wp-content/themes/solance/assets/images/next-btn.svg' alt='' class='z-3 btn-next'>"
    //     ],
    //     autoplay: true,
    //     responsive: {
    //         0: {
    //         items: 1
    //         },
    //         768: {
    //         items: 2
    //         },
    //         992: {
    //         items: 3
    //         },
    //         1200: {
    //         items: 5
    //         }
    //     }
    //     })
    // $(document).ready(function() {
    //     var $cntCard = $('.cnt-card');
    //     var $cards = $cntCard.children();
    //     var cardWidth = $cards.outerWidth(true);
    //     var totalWidth = cardWidth * $cards.length;

    //     $cntCard.append($cards.clone()); // Duplicate cards

    //     // Start animation
    //     function startScrolling() {
    //         $cntCard.animate({
    //                 scrollLeft: totalWidth
    //             },
    //             20000, // Duration of scroll
    //             'linear',
    //             function() {
    //                 $cntCard.scrollLeft(0); // Reset to start
    //                 startScrolling(); // Repeat animation
    //             }
    //         );
    //     }

    //     startScrolling(); // Initiate scrolling
    // });
    
   
    jQuery(".product_pdf_download").click(function (e) {
    var categoryid = jQuery(this).data("categoryid");
    var productid = jQuery(this).data("productid");
    console.log(categoryid);
    jQuery("#product_id").val(productid);
    jQuery("#category_id").val(categoryid);
  });

  jQuery('.pdf_close').click(function() {
    jQuery('.err').remove();
    jQuery('#download-pdf-form')[0].reset();
});

  jQuery("#download_submit").on("click", function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = {
      username: jQuery("#user_name").val(),
      usernumber: jQuery("#user_number").val(),
      usercompany: jQuery("#user_company").val(),
      useremail: jQuery("#user_email").val(),
      // downloadsubmit: true // Indicates the submit button was clicked
    };

    var productid = jQuery("#product_id").val();
    var pdfurl = jQuery(".product_pdf_download").data("src");
    var categoryid = jQuery("#category_id").val();
    // console.log(productid);
    var errors = [];

    if (formData.useremail !== "" && !validateEmail(formData.useremail)) {
        if (jQuery('.err_email').length > 0) {
            
            jQuery(".err_email").text("Please enter a valid email address.");
        }else{
            jQuery(".groupemail").append("<span class='err err_email'>Please enter a valid email address.</span>");
        }
      errors.push({
        field: "useremail",
        message: "Please enter a valid email address.",
      });
    }else{
        jQuery('.err_email').css('display','none');
    }

    // Client-side validation
    if (formData.username === "") {
        if (jQuery('.err_name').length) {
            
            jQuery(".err_name").text("Please enter your name.");
        }else{
            jQuery(".groupname").append("<span class='err err_name'>Please enter your name.</span>");
        }
      
      errors.push({ field: "username", message: "Please enter your name." });
    }else{
        jQuery('.err_name').css('display','none');
    }

    if (formData.usernumber === "") {
        if (jQuery('.err_number').length) {
            
            jQuery(".err_number").text("Please enter your number.");
        }else{
            jQuery(".groupnumber").append("<span class='err err_number'>Please enter your number.</span>");
        }
    //   jQuery(".err_number").text("Please enter your number.");
      errors.push({
        field: "usernumber",
        message: "Please enter your number.",
      });
    }else{
        jQuery('.err_number').css('display','none');
    }

    if (formData.usercompany === "") {
        if (jQuery('.err_company').length) {
            
            jQuery(".err_company").text("Please enter your company name.");
        }else{
            jQuery(".groupcompany").append("<span class='err err_company'>Please enter your company name.</span>");
        }
     
      errors.push({
        field: "usercompany",
        message: "Please enter your company name.",
      });
    }else{
        jQuery('.err_company').css('display','none');
    }

    // Clear previous error messages
    jQuery(".err_name, .err_number, .err_company, .err_email").text("");

    // Display errors if any

    // If no client-side errors, send the form data via AJAX to the server
    // console.log(errors);
    if (errors.length > 0) {
      errors.forEach(function (error) {
        if (error.field === "username") {
          jQuery(".err_name").text(error.message);
        } else if (error.field === "usernumber") {
          jQuery(".err_number").text(error.message);
        } else if (error.field === "usercompany") {
          jQuery(".err_company").text(error.message);
        } else if (error.field === "useremail") {
          jQuery(".err_email").text(error.message);
        }
      });
    } else {
      jQuery.ajax({
        action: "download_store_data_to_database",
        url: custom.ajaxurl,
        type: "post",
        dataType: "json",
        data: {
          action: "download_store_data_to_database",
          formData: formData,
          productid: productid,
          categoryid: categoryid,
          pdfurl: pdfurl,
          // nonce: nonce
        },
        success: function (response) {
          // Handle the server response
          // console.log(formData);
          // console.log(response);
          jQuery('.pdf_close').click();
          window.open(pdfurl);
        },
        error: function (xhr, status, error) {
          // Handle errors
          // console.error("Error");
        },
      });
    }
  });

  jQuery("#user_number").on("keypress", function (e) {
    // Allow only numeric (0-9) characters
    if (e.which < 48 || e.which > 57) {
      e.preventDefault();
    }
  });
  jQuery("#user_number").on("input", function () {
    // Limit input to 10 digits
    if (this.value.length > 10) {
      this.value = this.value.slice(0, 10);
    }
  });


});
function validateEmail(email) {
  var re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()[\]\.,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,})$/i;
  return re.test(String(email).toLowerCase());
}

</script>




<?php wp_footer(); ?>
</body>

</html>