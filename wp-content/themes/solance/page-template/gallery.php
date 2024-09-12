<?php
    /** Template Name: Gallery */
    get_header();

    /** Gallery Section */
    $gallery = get_field('gallery','options');
    if(isset( $gallery)){

        $gallery_title = $gallery['title'];
        $gallery_text_1 = $gallery_title['text_1'];
        $gallery_text_2 = $gallery_title['text_2'];

    }    
?>

    <section class="gallery-sec" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <h3 class="heading-title fw-normal"><?php echo $gallery_text_1; ?> <span class="fw-bold"><?php echo $gallery_text_2; ?> </span> </h3>
            <?php the_content(); ?>
        </div>
    </section>

<?php
    get_footer();
?>