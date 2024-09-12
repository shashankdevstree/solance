<?php
    /** Template Name: Dealer Enquiry */
    get_header();

    $form_shortcode = get_field('form_shortcode');
    $banner_image = get_field('banner_image');
    $theme_path = get_template_directory_uri();

?>
<section class="header-wrapper privacy-bg"
    style="background-image: url(<?php echo $banner_image; ?>);">
    <div class="container">
        <!-- Page Title -->
        <h2 class="page-title">DEALER ENQUIRY</h2>
    </div>
</section>
<section class="dealer_enquiry">
    <img class="dealer-img-bg" src="<?php echo $theme_path; ?>/assets/images/bg-video 1.png" alt="" />
    <div class="container">
        <?php
                echo do_shortcode($form_shortcode);
            ?>
    </div>
</section>

<?php
    get_footer();
?>