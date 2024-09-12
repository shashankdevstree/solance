<?php
    get_header();

     /** Template Name: Blogs */
    
    $theme_path = get_template_directory_uri();

    /** Banner */
    $banner = get_field('banner');
    $banner_title = get_the_title();
    $title = $banner['title'];
    $text_1 = $title['text_1'];
    $text_2 = $title['text_2'];
    $banner_image = $banner['image'];
?>

<div class="header-wrapper blogs_header-bg" style="background-image: url(<?php echo $banner_image['url']; ?>); ">
    <!-- <h2 class="text-white">BLOGS</h2> -->
    <div class="container">
        <div class="text-white fs-1 blog_heading_text">
            <h2>
                <?php echo $banner_title; ?>
                </h5>
        </div>
    </div>
</div>

<section class="container blog_header_title" data-aos="fade-up" data-aos-duration="2000">
    <h2 class="text-center header-title-wrapper">
        <?php echo $text_1; ?>
        <span class="solance-text"><?php echo $text_2; ?></span>
    </h2>
</section>
<!-- 🇧​​​​​🇱​​​​​🇴​​​​​🇬​​​​​🇸​​​​​ 🇬​​​​​🇷​​​​​🇮​​​​​🇩​​​​​ -->
<?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 9, 
            'paged' => $paged
        );
        $query = new WP_Query($args);
        $fullWidth = 'col-lg-12 col-xl-12';
        $single_image  = 'new-single';
        if(count($query->posts) > 1){
            $fullWidth = 'col-lg-4 col-xl-4';
            $single_image  = '';
        }
        if ($query->have_posts()) {
     ?>
<div class="container">
    <div class="row g-1 justify-content-center">
        <?php
                while ($query->have_posts()) {
                    $query->the_post();
                    // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'thumbnail' );
            ?>
        <div class="col-12 col-md-6 <?php echo $fullWidth; ?>" data-aos="fade-up" data-aos-duration="2000">
            <a href="<?php echo get_the_permalink(); ?>">
                <div class="blog_card">
                    <div class="border">


                        <div class="position-relative">
                            <div class="date-square">
                                <p class="d-grid"><?php echo get_the_date('d')?>
                                    <span><?php echo get_the_date('M')?></span>
                                </p>
                            </div>
                            <!-- <img class="img-news" src="http://localhost/solance/wp-content/themes/solance/assets/images/news-img1.jpeg" alt=""> -->
                            <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo get_the_title(); ?>"
                                class="w-100 img-news <?php echo $single_image; ?>">
                        </div>



                        <?php //echo get_the_date(); ?>
                    </div>
                    <div class="blog-text-wrapper border">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <h5 class="blog-card-title">
                                <?php echo get_the_title(); ?>
                            </h5>
                        </a>
                        <div class="d-flex desc-blogs">
                            <p>
                                <?php echo get_the_excerpt(); ?><a href="<?php echo get_the_permalink(); ?>">
                                    Read more
                                </a>
                            </p>
                        </div>

                        <hr>
                        <span class="text-uppercase blog-footer-text">By <?php echo get_the_author(); ?></span>
                    </div>
                </div>
            </a>
        </div>
        <?php
                }
                  // Pagination
                $big = 999999999; // need an unlikely integer
                $pagination_links = paginate_links(array(
                    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $query->max_num_pages,
                    'prev_text' => __('&laquo;'),
                    'next_text' => __('&raquo;'),
                    // 'type' => 'array',
                ));

                

            ?>


    </div>
    <div class="pagination pagination1 pagination3 pagination4 pagination7">

        <?php echo $pagination_links; ?>
    </div>
</div>
<?php
        } else {
            
            echo 'No posts found';
        }
    ?>

<?php
    get_footer();
?>