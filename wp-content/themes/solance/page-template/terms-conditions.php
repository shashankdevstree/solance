<?php
    /** Template Name: Terms */
    get_header();
    $banner_image = get_field('banner_image',get_the_ID());
?>
<section class="header-wrapper privacy-bg"
    style="background-image: url(<?php echo  $banner_image; ?>);">
    <div class="container">
        <!-- Page Title -->
        <h2 class="page-title">TERMS & CONDITIONS</h2>
    </div>
</section>
<section class="terms policy">
    <div class="container">
        <?php
                echo get_the_content();
            ?>
    </div>
</section>

<?php
    get_footer();
?>