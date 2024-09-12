<?php
    get_header();

    /** Template Name: Contact */
    
    $theme_path = get_template_directory_uri();

    $repete_contact_us = get_field('contact_us');
    if(isset( $repete_contact_us)){
        $address = $repete_contact_us['address'];
        $call_now = $repete_contact_us['call_now'];
        $email = $repete_contact_us['email'];
        $banner_image = $repete_contact_us['banner_image'];
    }

   /** Contact Us */
   $contact_us = get_field('contact_us','options');
   if(isset( $contact_us)){
       $contact_us_title = $contact_us['title'];
       $contact_us_title_text_1 = $contact_us_title['text_1'];
       $contact_us_title_text_2 = $contact_us_title['text_2'];
       $contact_us_content = $contact_us['content'];
       $form_code = $contact_us['form_code'];
       $map_url = $contact_us['map_url'];
       $contact_us_image = $contact_us['image'];
   }


?>

<!-- HEADER SECTION -->
<section class="header-wrapper contact-us-bg" style="background-image: url(<?php echo $banner_image['url']; ?>);">
    <div class="container">
        <!-- Page Title -->
        <h2 class="page-title">CONTACT</h2>
    </div>
</section>

<!-- MAIN CONTACT SECTION START -->
<section class="container section-wrapper">
    <div class="row d-flex justify-content-center">
        <!-- Address Section -->
        <div class="col-md-6 col-lg-4 card-wrapper address-card" data-aos="fade-up" data-aos-duration="2000">
            <div class="cust-card">
                <!-- Placeholder for icon -->
                <div class="cust-card-img">
                    <img src="<?php echo  $address['icon']; ?>" alt="">
                </div>
                <!-- Address Heading -->
                <h5><?php echo  $address['title']; ?></h5>
                <!-- Address Details -->
                <!-- <a href="https://www.google.com/maps/place/Solance+Industries/@22.7877066,72.3342636,18z/data=!4m10!1m2!2m1!1sPlot+No.+228,+Vireshwar+Industrial+Estate+Nr.+SKF+Bearing,+Bavla-Bagodara+N.H.8A+Vill:+Kerala,+Tal:+Bavla+Ahmedabad+Gujarat+-+382220+INDIA!3m6!1s0x395e95b858c1944d:0xbf9ebe6945fd1cbd!8m2!3d22.7890347!4d72.3365965!15sCooBUGxvdCBOby4gMjI4LCBWaXJlc2h3YXIgSW5kdXN0cmlhbCBFc3RhdGUgTnIuIFNLRiBCZWFyaW5nLCBCYXZsYS1CYWdvZGFyYSBOLkguOEEgVmlsbDogS2VyYWxhLCBUYWw6IEJhdmxhIEFobWVkYWJhZCBHdWphcmF0IC0gMzgyMjIwIElORElBWoMBIoABcGxvdCBubyAyMjggdmlyZXNod2FyIGluZHVzdHJpYWwgZXN0YXRlIG5yIHNrZiBiZWFyaW5nIGJhdmxhIGJhZ29kYXJhIG5oIDhhIHZpbGwga2VyYWxhIHRhbCBiYXZsYSBhaG1lZGFiYWQgZ3VqYXJhdCAzODIyMjAgaW5kaWGSARRiYXR0ZXJ5X21hbnVmYWN0dXJlcpoBJENoZERTVWhOTUc5blMwVkpRMEZuU1VOcWNGOUVRWGRCUlJBQuABAA!16s%2Fg%2F11bxb9fk1j?entry=ttu"
                        target="_blank" class="cust-link"> -->
                <a href="<?php echo $address['map_url']; ?>" target="_blank" class="cust-link">
                    <p><?php echo  $address['address']; ?></p>
                </a>
                <!-- </a> -->

            </div>
        </div>
        <!-- Call Now Section -->
        <div class="col-md-6 col-lg-4 card-wrapper call-card" data-aos="fade-up" data-aos-duration="2000">
            <div class="cust-card">
                <!-- Placeholder for icon -->
                <div class="cust-card-img">
                    <img src="<?php echo  $call_now['icon']; ?>" alt="">
                </div>
                <!-- Call Now Heading -->
                <h5><?php echo  $call_now['title']; ?></h5>
                <!-- Phone Number -->
                <a href="tel:+917226004444" class="cust-link">
                    <p><?php echo  $call_now['number']['title']; ?></p>
                </a>
            </div>
        </div>
        <!-- Email Us Section -->
        <div class="col-md-6 col-lg-4 card-wrapper email-card" data-aos="fade-up" data-aos-duration="2000">
            <div class="cust-card">
                <!-- Placeholder for icon -->
                <div class="cust-card-img">
                    <img src="<?php echo  $email['icon']; ?>" alt="">
                </div>
                <!-- Email Us Heading -->
                <h5><?php echo  $email['title']; ?></h5>
                <!-- Email Address -->
                <a href="mailto:info@solance.in" class="cust-link">
                    <p><?php echo  $email['email']['title']; ?></p>
                </a>
            </div>
        </div>
    </div>
</section>

<!---section six start-->
<section class="contact-us-section" data-aos="fade-up" data-aos-duration="2000">
    <img class="contact-bg1" src="<?php echo $theme_path; ?>/assets/images/contact-us-bg2.png" alt="" />
    <div class="container">
        <div class="row py-3 contact-center d-flex justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 col-12">
                <h1 class="d-flex"><?php echo $contact_us_title_text_1; ?> <span
                        class="fw-bold"><?php echo $contact_us_title_text_2; ?></span>
                </h1>
                <p class="py-3 contact-title"><?php echo $contact_us_content; ?></p>
                <div class="d-flex justify-content-center"><iframe src="<?php echo $map_url; ?>" width="457"
                        height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 col-12 right-form">
                <div class="form-container">
                    <?php
                    echo do_shortcode($form_code);
                ?>
                </div>

            </div>
        </div>
    </div>
    <img class="contact-bg2" src="<?php echo $contact_us_image['url']; ?>"
        alt="<?php echo $contact_us_image['title']; ?>" />
</section>
<!---section six end-->


<?php
    get_footer();
?>