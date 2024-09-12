<?php
get_header();

/** Product Details */

$theme_path = get_template_directory_uri();
$product_details = get_field('product_details');

if (isset($product_details)) {
    $current_post_id = get_the_ID();

    $feature_image = get_the_post_thumbnail_url(get_the_ID());

    $banner_image = get_field('banner_image');

    // Get the custom taxonomy terms of the current post
    $terms = wp_get_post_terms($current_post_id, 'product-category');
}
if ($terms) {
    $term_ids = array();
    $term_names = array();
    foreach ($terms as $term) {
        $term_ids[] = $term->term_id;
        $term_names[] = $term->name;
    }

    // WP_Query arguments
    $args = array(
        'post_type' => 'products', // Replace 'movie' with your custom post type
        'tax_query' => array(
            array(
                'taxonomy' => 'product-category', // Replace 'genre' with your custom taxonomy
                'field' => 'term_id',
                'terms' => $term_ids,
            ),
        ),
        'post__not_in' => array($current_post_id), // Exclude the current post
        'posts_per_page' => -1, // Number of related posts to display
        // 'ignore_sticky_posts' => 1
    );
    $termID = $term_ids[0];
    $category_banner_image = get_field('category_banner_image', 'term_' . $termID);
    // $category_banner_image = get_field('category_banner_image',$termID);
?>
<div class="header-wrapper products-page-bg"
    style="background-image: url(<?php echo $category_banner_image['url']; ?>);">
    <div class="container product_header_title">
        <h5 class="text-white fs-1"><?php echo $term_names[0]; ?> - <?php echo get_the_title(); ?></h5>
    </div>
</div>


<section class="container product_info_container" data-aos="fade-up" data-aos-duration="2000"
    style="position: relative; z-index: 1;">
    <div class="row gx-5">
        <div class="col col-sm-12  col-md-12  col-lg-6  col-xl-6 col-12  p-sm-0 m-sm-0 px-lg-3 my-lg-0 my-sm-3"
            data-aos="fade-up" data-aos-duration="2000">
            <div class="product-main-img-card">
                <div class="d-flex justify-content-center align-items-center p-5 
                                ">
                    <img class="single-product-img" src="<?php echo $feature_image; ?>" alt="">
                </div>
                <div class="product-main-card-footer"><?php echo get_the_title(); ?></div>
            </div>

        </div>
        <div class="col col-sm-12  col-md-12  col-lg-6  col-xl-6 col-12 border res-border" data-aos="fade-up"
            data-aos-duration="2000">
            <div class="row g-3  mt-1">
                <div class="col col-sm-6  col-md-6  col-lg-6  col-xl-6 col-6 btm-card">
                    <?php
                        foreach ($product_details as $key => $value) {
                            $value_label = $value['label'];
                            // $tc_apply = false;
                            // $tc_class = '';
                            $tc_apply = false;
                            $tc_class = '';
                            if($value_label == 'Warranty'){
                                $tc_apply = true;
                                $tc_class = 'tc_class';
                            }else{
                                $tc_apply = false;
                                $tc_class = '';
                            }
                        ?>
                    <div
                        class="product-des-text p-3 my-xl-4 my-lg-4 m-sm-0 m-xs-0  font-bold text-color-pri <?php echo $tc_class; ?>">
                        <div class="product-label"><?php echo $value['label']; ?></div>
                    </div>
                    <?php
                        }
                        ?>

                </div>
                <div class="col col-sm-6  col-md-6  col-lg-6  col-xl-6 col-6 btm-card" data-aos="fade-up"
                    data-aos-duration="2000">
                    <?php
                        $star_text = '';
                        foreach ($product_details as $key => $value) {
                            $position = strpos($value['details'], '*');
                            $value_label = $value['label'];
                            if ($position !== false) {
                                $star_text = "Found";
                            }
                            $tc_apply = false;
                            $tc_class = '';
                            if($value_label == 'Warranty'){
                                $tc_apply = true;
                                $tc_class = 'tc_class';
                            }else{
                                $tc_apply = false;
                                $tc_class = '';
                            }
                        ?>
                    <div
                        class="product-des-text p-3 my-xl-4 my-lg-4  m-sm-0 m-xs-0 font-bold text-dark <?php echo $tc_class; ?>">
                        <div class="product-label"><?php echo $value['details']; ?></div>
                        <?php
                                    if($tc_apply){
                                        $tc_link = get_field('t&c_apply_link');
                                        
                                        if(!isset($tc_link) || empty($tc_link['url'])){
                                            $tc_link = '#';
                                        }else{
                                            $tc_link =  $tc_link['url'];
                                        }
                                ?>
                        <a href="<?php echo $tc_link; ?>" target="_blank">T&C Apply</a>
                        <?php
                                    }
                                ?>
                    </div>
                    <?php
                        }
                        ?>

                </div>
            </div>

        </div>
    </div>
    <!-- <div class="product-content" data-aos="fade-up" data-aos-duration="2000">
        <?php echo get_field('product_content'); ?>
    </div> -->
</section>
<?php

}


?>
<?php
// The Query

$related_posts_query = new WP_Query($args);

if ($related_posts_query->have_posts()) {
?>
<div class="position-relative cust-slider-wrapper" data-aos="fade-up" data-aos-duration="2000">
    <img src="<?php echo $theme_path; ?>/assets/images/products-page/carosel-bg.svg" alt=""
        class=" position-absolute bottom-0 end-0 main-back-img">

    <section class="container">
        <h2 class="text-center h2-wrapper">
            Related
            <span class="solance-text">Products</span>
        </h2>

        <div class="your-class ">
            <?php
                while ($related_posts_query->have_posts()) {
                    $related_posts_query->the_post();
                    $id = get_the_id();

                    $image = get_the_post_thumbnail_url($id, 'large');

                ?>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
                <a href="<?php echo get_the_permalink(); ?>">
                    <div class="product-card  text-color-pri font-bold">
                        <div class="text-center p-1 product-card-img">
                            <img src="<?php echo $image; ?>" alt="" class="w-100">
                        </div>
                        <div class=" col text-color-pri font-bold product-card-modeltxt">
                            <span><?php echo get_the_title(); ?></span>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>">
                            <div class="view-product-btn">

                                View Product >>

                            </div>
                        </a>
                    </div>
                </a>
            </div>
            <?php
                }
                // echo '</ul>';
                // }


                ?>
            <!-- <div>your content</div>
                        <div>your content</div>
                        <div>your content</div>
                        <div>your content</div>
                        <div>your content</div>
                        <div>your content</div>
                        <div>your content</div>
                        <div>your content</div>
                        <div>your content</div>
                        <div>your content</div>
                        <div>your content</div> -->
        </div>

    </section>
</div>
<?php
    wp_reset_postdata();
}
$current_term = wp_get_post_terms($current_post_id, 'product-category');

if (!$current_term) {
    return;
}

// Get the current term ID
$current_term_id = $current_term->term_id;

// Get the parent term ID
$parent_term_id = $current_term[0]->parent;

// Get all child terms of the parent term in the custom taxonomy
$child_terms = get_terms(array(
    'taxonomy' => 'product-category', // Replace with your custom taxonomy
    'parent' => $parent_term_id,
    'hide_empty' => false
));
$parent_term_id;
$child_term_ids = array();
foreach ($child_terms as $key => $value) {
    array_push($child_term_ids, $value->term_id);
}
$value_to_remove = $current_post_id;

$key = array_search($term_ids[0], $child_term_ids);

if ($key !== false) {
    unset($child_term_ids[$key]);
}
$child_term_ids = array_values($child_term_ids);
$related_term_id = $child_term_ids[0];
$argss = array(
    'post_type' => 'products', // Replace 'movie' with your custom post type
    'tax_query' => array(
        array(
            'taxonomy' => 'product-category', // Replace 'genre' with your custom taxonomy
            'field' => 'term_id',
            'terms' => $related_term_id,
        ),
    ),
    'post__not_in' => array($current_post_id), // Exclude the current post
    'posts_per_page' => -1, // Number of related posts to display
    // 'ignore_sticky_posts' => 1
);
$category_related_posts_query = new WP_Query($argss);
if ($parent_term_id !== 0):
    if ($category_related_posts_query->have_posts()) {
    ?>
<div class="position-relative cust-slider-wrapper" data-aos="fade-up" data-aos-duration="2000">
    <!-- <img src="<?php echo $theme_path; ?>/assets/images/products-page/carosel-bg.svg" alt=""
        class="z-0 position-absolute bottom-0 end-0"> -->

    <section class="container">
        <?php
                $term = get_term($related_term_id);
                $term_name = $term->name;
                $term_name = strtolower($term_name);
                $term_name = ucwords($term_name);
                if (isset($term_name) && !empty($term_name)):
                ?>
        <h2 class="text-center h2-wrapper" data-aos="fade-up" data-aos-duration="2000">
            Related
            <span class="solance-text"><?php echo $term_name; ?> Products</span>
        </h2>
        <?php endif; ?>

        <div class="your-class" data-aos="fade-up" data-aos-duration="2000">
            <?php
                    while ($category_related_posts_query->have_posts()) {
                        $category_related_posts_query->the_post();
                        $id = get_the_id();

                        $image = get_the_post_thumbnail_url($id, 'large');

                    ?>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
                <a href="<?php echo get_the_permalink(); ?>">
                    <div class="product-card  text-color-pri font-bold">
                        <div class="text-center p-1 product-card-img">
                            <img src="<?php echo $image; ?>" alt="" class="w-100">
                        </div>
                        <div class=" col text-color-pri font-bold product-card-modeltxt">
                            <span><?php echo get_the_title(); ?></span>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>">
                            <div class="view-product-btn">

                                View Product >>

                            </div>
                        </a>
                    </div>
                </a>
            </div>
            <?php
                    }
                    // echo '</ul>';
                    // }


                    ?>
            <!-- <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div> -->
        </div>

    </section>
</div>
<?php
        wp_reset_postdata();
    }
endif;
?>
</div>
<?php
    $term_id = $current_term[0]->term_id;
    if (have_rows('category_listing', 'product-category_' . $term_id)):

        while (have_rows('category_listing', 'product-category_' . $term_id)) : the_row();

            if (get_row_layout() == 'text_button_layout'):
                $title = get_sub_field('title');
                $button = get_sub_field('button');
                $background_image = get_sub_field('background_image');

?>
<section>
    <div class="tech-card" data-aos="fade-up" data-aos-duration="2000">
        <img src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['title']; ?>">
        <div class="container-details">
            <div class="container d-flex justify-content-between align-items-center resp-product">
                <p><?php echo $title; ?></p>
                <a class="btn-contact product_pdf_download" data-toggle="modal" data-target="#downloadModal" target="_blank" href="javascript:void(0)" data-categoryid = "" data-productid = "<?php echo get_the_title(); ?>" data-src = "<?php echo $button['url']; ?>"><i
                        class="fa-solid fa-download px-2"></i>
                    <?php echo $button['title']; ?>
                </a>
            </div>

        </div>
    </div>
</section>
<?php
            endif;

        endwhile;

    endif;
?>


<!-- <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li> -->



<?php
get_footer();
?>