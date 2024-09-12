<?php
get_header();

$term = get_queried_object();
$termID = $term->term_id;

$category_banner_image = get_field('category_banner_image', 'term_' . $termID);
$theme_path = get_template_directory_uri();

$term_name = strtolower($term->name);
?>

<section class="header-wrap header-bg" style="background-image: url(<?php echo $category_banner_image['url']; ?>);">
    <div class="container">
        <h1 class="text-white fs-1"><?php echo strtoupper($term_name) ?></h1>
    </div>
</section>

<?php

if (have_rows('category_listing', 'product-category_' . get_queried_object_id())):

    while (have_rows('category_listing', 'product-category_' . get_queried_object_id())) : the_row();

        if (get_row_layout() == 'product_category'):

            $heading = get_sub_field('heading');
            $heading_text_1 = $heading['text_1'];
            $heading_text_2 = $heading['text_2'];

            $category = get_sub_field('category');
            foreach ($category as $key => $value) {
                $sub_heading = $value['heading'];
                $sub_heading_text_1 = strtolower($sub_heading['text_1']);
                $sub_heading_text_1 = ucwords($sub_heading_text_1);
                $sub_heading_text_2 = strtolower($sub_heading['text_2']);
                $sub_heading_text_2 = ucwords($sub_heading_text_2);

                $category_lising = $value['category_lising'];
?>
<section>
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <h3 class="text-center py-5 heading-title fw-normal"><?php echo $sub_heading_text_1; ?> <span
                class="fw-bold"><?php echo $sub_heading_text_2; ?></span> </h3>
        <div class="main-card-container">
            <?php

                            $term_id = $category_lising[0]->term_id;
                            $taxonomy = 'product-category';

                            $args = array(
                                'post_type' => 'products',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => $taxonomy,
                                        'field'    => 'term_id',
                                        'terms'    => $term_id,
                                    ),
                                ),
                            );
                            $query = new WP_Query($args);
                            // print_r($query);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();

                                    $image = get_the_post_thumbnail_url($id, 'medium');

                            ?>
            <div class="product-card  text-color-pri font-bold" data-aos="fade-up" data-aos-duration="2000">
                <a href="<?php echo get_the_permalink(); ?>">
                    <div class="bat-card">
                        <div class="text-center p-1">
                            <img src="<?php echo $image; ?>" alt="">
                        </div>

                    </div>
                    <div class="bat-des">
                        <div class=" col text-color-pri font-bold product-card-modeltxt"><?php echo get_the_title(); ?>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>" class="view-product-btn">View Product >><i
                                class="fa-solid fa-angles-right p-1 menu-icon"></i></a>
                    </div>
                </a>
            </div>
            <?php
                                endwhile;
                                wp_reset_postdata();

                            endif;
                            ?>

        </div>
    </div>
</section>
<?php
            }
            ?>

<?php

        elseif (get_row_layout() == 'text_button_layout'):

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
                <a class="btn-contact product_pdf_download" data-toggle="modal" data-target="#downloadModal" target="_blank" href="javascript:void(0)" data-categoryid = "<?php echo $term->name; ?>" data-productid = "" data-src = "<?php echo $button['url']; ?>"><i
                        class="fa-solid fa-download px-2"></i>
                    <?php echo $button['title']; ?>
                </a>
            </div>

        </div>
    </div>
</section>

<?php
        elseif (get_row_layout() == 'title_with_content'):
            $title = get_sub_field('title');
            $content = get_sub_field('content');
        ?>
<section>
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="product-cards">
            <?php
                        if (!empty($title)) {
                        ?>
            <h1 class="text-center"><?php echo $title; ?></h1>
            <?php
                        }
                        ?>
            <div class="content-main">
                <?php echo $content; ?>

            </div>
        </div>
    </div>
</section>
<?php
        elseif (get_row_layout() == 'title_with_image'):
            $heading = get_sub_field('heading');
            $text_1 = strtolower($heading['text_1']);
            $text_1 = ucwords($text_1);
            $text_2 = strtolower($heading['text_2']);
            $text_2 = ucwords($text_2);
            $image = get_sub_field('image');
        ?>
<section>
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <?php if (!empty($text_1) && !empty($text_2)) { ?>
        <h3 class="text-center py-5 heading-title fw-normal"> <?php echo $text_1; ?> <span
                class="fw-bold"><?php echo $text_2; ?></span> </h3>
        <?php } ?>
        <div class="img-prod text-center">
            <img class="img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
        </div>
    </div>
</section>
<?php
        // Add more layouts as needed
        endif;

    endwhile;

endif;

$current_taxonomy = get_queried_object();
       
        $current_taxonomy_name = $current_taxonomy->name;
        $current_taxonomy = $current_taxonomy->slug;
        $current_taxonomy_id = get_queried_object_id();
        $taxonomy = 'product-category';
        $parent_terms = get_terms([
            'taxonomy'   => $taxonomy,
            'parent'     => 0,            
            'hide_empty' => false,        
        ]);
        
       
      
        ?>
<section class="doit-section">
    <div class="container">
        <div class="scroll-content">

            <div class="row d-flex justify-content-center position-relative cnt-card">
                <!-- <div class="main-do-title"><?php echo $heading_text_1; ?> <span> <?php echo $heading_text_2; ?></span> </div> -->
                <?php
                            if (!empty($parent_terms) && !is_wp_error($parent_terms)) {
                                foreach ($parent_terms as $term) {
                                    
                                    if ($current_taxonomy && $current_taxonomy_id == $term->term_id) {
                                        continue;
                                    }
                                    $term_id = $term->term_id;
                                    $category_icon = get_field('category_icon', 'term_' . $term_id);
                                    $term_name = strtolower($term->name);
                             
                        ?>
                <a href="<?php echo get_term_link($term_id);?>"
                    class="do-card-product flex-column d-flex justify-content-center align-items-center">
                    <img src="<?php echo $category_icon['url']; ?>" alt="" />
                    <p><?php echo ucwords($term_name); ?></p>
                </a>
                <?php
                               }
                            }
                        ?>
                <!-- <a href="#" class="do-card-product flex-column d-flex justify-content-center align-items-center">
                            <img src="<?php echo $theme_path; ?>/assets/images/prod_2.svg" alt="" />
                            <p>Automotive Batteries</p>
                        </a>
                        <a href="#" class="do-card-product flex-column d-flex justify-content-center align-items-center">
                            <img src="<?php echo $theme_path; ?>/assets/images/prod_3.svg" alt="" />
                            <p>Tall Tubular Batteries</p>
                        </a>
                        <a href="#" class="do-card-product flex-column d-flex justify-content-center align-items-center">
                            <img src="<?php echo $theme_path; ?>/assets/images/prod_4.svg" alt="" />
                            <p>UPS Batteries</p>
                        </a>
                        <a href="#" class="do-card-product flex-column d-flex justify-content-center align-items-center">
                            <img src="<?php echo $theme_path; ?>/assets/images/prod_5.svg" alt="" />
                            <p>Jambo Batteries</p>
                        </a> -->


            </div>
        </div>

    </div>
</section>
<?php
    $term_category = get_term($current_taxonomy_id);
    $term_name = $term_category->name;
  if($term_name == 'Automotive Batteries'){
?>
<!-- Bootstrap Modal for "Coming Soon" -->
<div  class="modal" id="comingSoonModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered custom-width" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header"> -->
                <!-- <h5 class="modal-title title-coming" id="downloadModalLabel">Coming Soon</h5> -->
                <button type="button" class="close closeWhite" data-dismiss="modal" aria-label="Close">
                    <span class="closeIcon" aria-hidden="true">&times;</span>
                </button>
            <!-- </div> -->
            <!-- <div class="modal-body"> -->
            
                <div class="">
                    <div class="">
                    <!-- <div class="col-sm-12"> -->
                    <img class="img-comming-soon" width="100%" src="<?php echo $theme_path; ?>/assets/images/imgComing.jpeg" alt="" />
                    </div>
                            
                    </div>  
                </div>
            
            <!-- </div> -->

        </div>
    </div>
</div>
<?php
  }
?>

<?php
get_footer();
?>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var comingSoonModal = new bootstrap.Modal(document.getElementById('comingSoonModal'), {});
    // comingSoonModal.show();
    setTimeout(function () {
        comingSoonModal.show();
    }, 3000);

  });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

