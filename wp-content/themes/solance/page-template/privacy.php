<?php
    /** Template Name: Privacy */
    get_header();

    $banner_image = get_field('banner_image',get_the_ID());
   
?>
<section class="header-wrapper privacy-bg"
    style="background-image: url(<?php echo $banner_image; ?>);">
    <div class="container">
        <!-- Page Title -->
        <h2 class="page-title">PRIVACY POLICY</h2>
    </div>
</section>
<section class="privacy policy">
    <div class="container">
        <?php
                echo get_the_content();
            ?>
    </div>
</section>

<?php
    get_footer();
?>