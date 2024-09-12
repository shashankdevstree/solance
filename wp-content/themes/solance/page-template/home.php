<?php
    get_header();

    /** Template Name: Home */

    /** Banner */
    $bottom_header = get_field('bottom_header','options');
    $logo = $bottom_header['logo'];
    $banner = get_field('banner');
    if(isset( $banner)){
        $banner_video = $banner['banner_video'];
        $banner_heading = $banner['heading'];
        $banner_content = $banner['content'];
        
    }
    $qualities = get_field('qualities');

    /** What we are */
    $what_we_are = get_field('what_we_are');
    if(isset( $what_we_are)){
        $what_we_are_title = $what_we_are['title'];
        $what_we_are_text_1 = $what_we_are_title['text_1'];
        $what_we_are_text_2 = $what_we_are_title['text_2'];
        $what_we_are_content = $what_we_are['content'];
        $what_we_are_image = $what_we_are['image'];
        $what_we_are_image_2 = $what_we_are['image_2'];
        $button_1 = $what_we_are['button_1'];
        $button_2 = $what_we_are['button_2'];
        $what_we_are_icons = $what_we_are['icons'];
        
    }

    /** Cosumer Battery */
    $consumer_battery = get_field('consumer_battery');
    if(isset( $consumer_battery)){

        $consumer_battery_title = $consumer_battery['title'];
        $consumer_battery_text_1 = $consumer_battery_title['text_1'];
        $consumer_battery_text_2 = $consumer_battery_title['text_2'];
        $consumer_battery_content = $consumer_battery['content'];
        $consumer_battery_image = $consumer_battery['image'];
        $consumer_battery_counter = $consumer_battery['counter'];

    }    
    /** Gallery Section */
    $gallery = get_field('gallery','options');
    if(isset( $gallery)){

        $gallery_title = $gallery['title'];
        $gallery_text_1 = $gallery_title['text_1'];
        $gallery_text_2 = $gallery_title['text_2'];

    }    

    /** Why choose us */
    $why_choose_us = get_field('why_choose_us');
    if(isset( $why_choose_us)){
        $why_choose_us_title = $why_choose_us['title'];
        $why_choose_us_text_1 = $why_choose_us_title['text_1'];
        $why_choose_us_text_2 = $why_choose_us_title['text_2'];
        $why_choose_us_image = $why_choose_us['image'];
        $why_choose_us_image_2 = $why_choose_us['image_2'];
        $our_quality = $why_choose_us['our_quality'];
    }

    /** Our Product */
    $our_product = get_field('our_product');
    if(isset( $our_product)){
        $heading_text_1 = $our_product['heading_text_1'];
        $heading_text_2 = $our_product['heading_text_2'];
        $products_category = $our_product['products_category'];
    }

    /** Latest News */
    $latest_news = get_field('latest_news');
    if(isset( $latest_news)){
        $latest_news_heading = $latest_news['heading'];
        $latest_news_heading_text_1 = $latest_news_heading['text_1'];
        $latest_news_heading_text_2 = $latest_news_heading['text_2'];
        $latest_news_content = $latest_news['content'];
        $latest_news_button = $latest_news['button'];
    }

    /** Contact Ua */
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

    $theme_path = get_template_directory_uri();
?>

<section class="home-banner-section">
    <img class="banner-imgg" alt="image" src="<?php echo $theme_path; ?>/assets/images/banner-bg-img.png" />
    <video class="banner-video" width="100%" autoplay loop muted>
        <source src="<?php echo $banner_video['url']; ?>" type="video/mp4">
    </video>
    <div class="home-banner">
        <div class=" home-banner-txt d-flex  justify-content-center align-items-center w-100">
            <h1 class="typing-demo"><?php echo $banner_heading['text_1']; ?>
                <span><?php echo $banner_heading['text_2']; ?></span>
            </h1>
        </div>
        <div class=" home-banner-txt d-flex  justify-content-center align-items-center w-100">
            <p><?php echo $banner_content; ?> </p>
        </div>
    </div>
</section>


<section class="home-doit-section">
    <div class="container ">
        <div class="scroll-content">

            <div class="row d-flex justify-content-between position-relative cnt-card ">

                <!-- <div class="main-do-title"><?php echo $heading_text_1; ?> <span> <?php echo $heading_text_2; ?></span> </div> -->
                <?php
           
            if(!empty($products_category)):
                $i = 0;
                foreach ($products_category as $key => $value) {

                    if($i <= 4){
       ?>
                    <a href="<?php echo $value['category_link']; ?>" class="do-card-product flex-column d-flex justify-content-center align-items-center">
                        <img src="<?php echo $value['product_icon']; ?>" alt="" />
                        <p><?php echo $value['category_title']; ?></p>
                    </a>
                <?php
                    $i++;
                    }
                }   
                
            endif;
        ?>


            </div>
        </div>

    </div>
    <!-- <div class="container px-4 text-center">
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3 border bg-light">Custom column padding</div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">Custom column padding</div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">Custom column padding</div>
                </div>
            </div>
        </div> -->
</section>
<!---section TWO start-->

<section class="who-we-section" data-aos="fade-up" data-aos-duration="2000">
    <img class="img-bg" src="<?php echo $theme_path; ?>/assets/images/who-we-are-bg.svg" alt="" />

    <div class="container  bg-white">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12 table-left">
                <img class="img-big" src="<?php echo $what_we_are_image['url']; ?>"
                    alt="<?php echo $what_we_are_image['title']; ?>" />
                <img class="img-small" src="<?php echo $what_we_are_image_2['url']; ?>"
                    alt="<?php echo $what_we_are_image_2['title']; ?>" />

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12 table-right">
                <div class="py-3 text-start">
                    <h3 class="heading-title fw-normal"><?php echo $what_we_are_text_1; ?> <span
                            class="fw-bold"><?php echo $what_we_are_text_2; ?> </span> </h3>
                </div>
                <div class="py-3 text-start">
                    <p class="text-Table-menu">
                        <?php echo $what_we_are_content; ?>
                    </p>
                </div>
                <div class="py-3 text-start btn-who-are">
                    <a href="<?php echo $button_1['url']; ?>" class="btn-more"><?php echo $button_1['title']; ?> <i
                            class="fa-solid fa-angles-right px-2"></i>
                    </a>
                    <a class="btn-contact" href="<?php echo $button_2['url']; ?>"><i
                            class="fa-solid fa-arrow-right-to-bracket px-2"></i> <?php echo $button_2['title']; ?>
                    </a>
                </div>
                <hr class=" cent-cont-hr">
                <div class="text-start cent-cont">
                    <?php
                        $i = 1;
                        foreach ($what_we_are_icons as $key => $value) {
                    ?>
                    <img class="px-3 img-who-are" src="<?php echo $value['url']; ?>" alt="" />
                    <?php if($i !== 4): ?>
                    <div class="vr"></div>
                    <?php endif; ?>
                    <?php
                            $i++;
                         }
                    ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!---section TWO end-->
<!-- <section class="gallery-sec">
   <div class="container">
        <h3 class="heading-title fw-normal"><?php echo $gallery_text_1; ?> <span class="fw-bold"><?php echo $gallery_text_2; ?> </span> </h3>
        <?php
            //echo do_shortcode('[smartslider3 slider="2"]');
        ?>
   </div>
</section> -->
<!---section three start-->
<section class="battery-section position-relative h-100" data-aos="fade-up" data-aos-duration="2000">
    <img class="position-absolute w-100" src="<?php echo $theme_path; ?>/assets/images/battery-background.png" alt="" />
    <img class="battery-bg " src="<?php echo $consumer_battery_image['url']; ?>"
        alt="<?php echo $consumer_battery_image['title']; ?>" />
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-12 battery-sec">
                <img class="py-1" src="<?php echo $logo['url']; ?>" alt="" />
                <div class="py-3 text-start">
                    <h3 class="heading-battery fw-normal"><?php echo $consumer_battery_text_1; ?> <span
                            class="fw-bold"><?php echo $consumer_battery_text_2; ?></span>
                    </h3>
                </div>
                <p><?php echo $consumer_battery_content; ?> </p>
                <div class="d-flex main-counter">
                    <?php
                        foreach ($consumer_battery_counter as $key => $value) {
                    ?>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-consume" src="<?php echo $value['icon']; ?>" alt="" />
                        <p class="counter" data-target="<?php echo $value['title']; ?>">+0</p>
                        <span><?php echo $value['content']; ?></span>
                    </div>
                    <?php
                        }
                    ?>

                </div>

            </div>

        </div>
    </div>
</section>
<!---section three end-->
<!---section four start-->
<section class="why-choose-section" data-aos="fade-up" data-aos-duration="2000">
    <img class="choose-img-bg" src="<?php echo $theme_path; ?>/assets/images/why-choose-bg.svg" alt="" />

    <div class="container  bg-white">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12">
                <div class="py-3 text-start">
                    <h3 class="heading-title fw-normal"><?php echo $why_choose_us_text_1; ?> <span
                            class="fw-bold"><?php echo $why_choose_us_text_2; ?></span> </h3>
                </div>
                <div class="py-3 text-start">
                    <div class="choose-cards-container">
                        <?php
                            foreach ($our_quality as $key => $value) {
                                $icon = $value['icon'];
                                $title = $value['title'];
                                $content = $value['content'];
                        ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 12 col-xl-12 col-12 p-0">
                            <div class="choose-card d-flex align-items-center">
                                <img class="banner-card-icon" alt="<?php echo $icon['title']; ?>"
                                    src="<?php echo $icon['url']; ?>" />
                                <div class="text-start">
                                    <h4><?php echo $title; ?></h4>
                                    <p><?php echo $content; ?> </p>
                                </div>
                            </div>
                        </div>
                        <?php
                             }
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-1 col-xl-1 col-12">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-12 table-left position-relative">
                <img class="img-big" src="<?php echo $why_choose_us_image['url']; ?>"
                    alt="<?php echo $why_choose_us_image['title']; ?>"" />
                <img class=" why-choose-img-small" src="<?php echo $why_choose_us_image_2['url']; ?>"
                    alt="<?php echo $why_choose_us_image_2['title']; ?>" />
            </div>
        </div>
    </div>
</section>
<!---section four end-->

<!---section five start-->
<?php
    $taxonomy = 'product-category'; // Replace with your taxonomy name
    

    // Get all terms of the taxonomy
    $term_ids = array(2,4,5,3); 
    $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'include' => $term_ids,
        'hide_empty' => false, 
    ));
   
?>
<section class="product-cards  align-items-center" data-aos="fade-up" data-aos-duration="2000">
    <img class="position-absolute w-100 img-bgg" src="<?php echo $theme_path; ?>/assets/images/Rectangle 63.png"
        alt="" />
    <h1 class="d-flex justify-content-center align-items-center py-5 prod-feature-title">Product Features </h1>
    <div class="container">
        <div class="row d-flex top-quality  justify-content-center">
            <?php
                    foreach ($qualities  as $key => $value) {
                        $icon = $value['icon'];
                        $title = $value['title'];
                        $content = $value['content'];
                ?>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="do-card d-flex">
                    <img class="banner-card-icon" alt="<?php echo $icon['title']; ?>"
                        src="<?php echo $icon['url']; ?>" />
                    <div class="text-start">
                        <h4><?php echo $title; ?></h4>
                        <p><?php echo $content; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php 
                    } 
                ?>


            <!-- </div> 
         <div class="row d-flex justify-content-center">
            
            <?php
                 foreach ($terms as $key => $value) {
                    $id = $value->term_id;
        
                    $category_name = $value->name;
                    $category_image = get_field('category_image','term_'.$id );
                 
                    $category_icon = get_field('category_icon','term_'.$id );
                
            ?>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 col-12">
                <div class="card-product text-center">
                    <div class="img-product">
                        <img src="<?php echo $category_image['url']; ?>" alt="" />
                    </div>
                    <div class="bottom-description text-center">
                        <img src="<?php echo $category_icon['url']; ?>" alt="" />
                        <div class="py-2 text-center">
                            <h3 class="heading-product fw-normal"><?php echo $category_name; ?>
                            </h3>
                        </div>
                        <a class="product-btn-more text-center" href="<?php echo get_term_link( $value ); ?>">Learn More <i
                                class="fa-solid fa-angles-right px-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php
                }
            ?> -->
            <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 col-12">
                <div class="card-product text-center">
                    <div class="img-product">
                        <img src="<?php echo $theme_path; ?>/assets/images/product-img2.svg" alt="" />
                    </div>
                    <div class="bottom-description text-center">
                        <img src="<?php echo $theme_path; ?>/assets/images/product-icon2.svg" alt="" />
                        <div class="py-2 text-center">
                            <h3 class="heading-product fw-normal">Automotive Batteries
                            </h3>
                        </div>
                        <a class="product-btn-more text-center" href="">Learn More <i
                                class="fa-solid fa-angles-right px-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 col-12">
                <div class="card-product text-center">
                    <div class="img-product">
                        <img src="<?php echo $theme_path; ?>/assets/images/product-img3.svg" alt="" />
                    </div>
                    <div class="bottom-description text-center">
                        <img src="<?php echo $theme_path; ?>/assets/images/product-icon3.svg" alt="" />
                        <div class="py-2 text-center">
                            <h3 class="heading-product fw-normal">UPS Batteries
                            </h3>
                        </div>
                        <a class="product-btn-more text-center" href="">Learn More <i
                                class="fa-solid fa-angles-right px-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 col-12">
                <div class="card-product text-center">
                    <div class="img-product">
                        <img src="<?php echo $theme_path; ?>/assets/images/product-img4.svg" alt="" />
                    </div>
                    <div class="bottom-description text-center">
                        <img src="<?php echo $theme_path; ?>/assets/images/product-icon4.svg" alt="" />
                        <div class="py-2 text-center">
                            <h3 class="heading-product fw-normal">Tall Tubular Batteries
                            </h3>
                        </div>
                        <a class="product-btn-more text-center" href="">Learn More <i
                                class="fa-solid fa-angles-right px-2"></i>
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!---section five end-->
<!---section five start-->
<section class="News-cards" data-aos="fade-up" data-aos-duration="2000">
    <div class="container">
        <div class="row py-3">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-12">
                <h1 class="d-flex py-3"><?php echo $latest_news_heading_text_1; ?> <span
                        class="fw-bold"><?php echo $latest_news_heading_text_2; ?></span>
                </h1>
                <p class="py-3"><?php echo $latest_news_content; ?></p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-12 view-btn">
                <a class="post-btn-contact" href="<?php echo $latest_news_button['url']; ?>"><i
                        class="fa-solid fa-arrow-right-to-bracket px-2"></i> <?php echo $latest_news_button['title']; ?>
                </a>
            </div>

        </div>

        <div class="row d-flex justify-content-center">
            <?php
                 $args = array(
                    'post_type' => 'post', 
                    'posts_per_page' => 3, 
                    'paged' => ( get_query_var('paged') ) ? get_query_var('paged') : 1 // Pagination
                );
            
                // Custom query
                $custom_query = new WP_Query( $args );
                $fullWidth = 'col-lg-12 col-xl-12';
                $single_image  = 'new-single';
                if(count($custom_query->posts) > 1){
                    $fullWidth = 'col-lg-4 col-xl-4';
                    $single_image  = '';
                }

                if ( $custom_query->have_posts() ) :
                    // Start the loop
                    while ( $custom_query->have_posts() ) : $custom_query->the_post();
                    $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'thumbnail' );
                  
            ?>
            <div class="col-xs-12 col-sm-12 col-md-12 <?php echo $fullWidth; ?> col-12">
                <div class="card-news">
                    <div class="position-relative">
                        <div class="date-square">
                            <p class="d-grid"><?php echo get_the_date('d'); ?>
                                <span><?php echo get_the_date('M'); ?></span>
                            </p>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>"> <img class="img-news <?php echo $single_image; ?>"
                                src="<?php echo $url; ?>" alt="" /></a>
                    </div>
                    <div class="news-description  p-4">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <h3><?php echo get_the_title(); ?> </h3>
                        </a>
                        <div class="d-flex desc-blogs">
                            <p><?php echo get_the_excerpt(); ?><a href="<?php echo get_the_permalink(); ?>">
                                    Read more
                                </a>
                            </p>
                        </div>

                        <hr>
                        <div class="d-flex">
                            <p class="px-3 desc-news fw-bold">BY <?php echo get_the_author(); ?></p>
                            <hr class="vr news-hr">
                            <p class="px-3 desc-news fw-bold">LATEST NEWS V2</p>
                            <hr class="vr news-hr">
                            <p class="px-3 desc-news fw-bold">
                                <?php comments_number('No Comments', 'One Comment', '% COMMENTS'); ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    endwhile;
                    endif;
            ?>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-12">
                <div class="card-news">
                    <div class="position-relative">
                        <div class="date-square">
                            <p class="d-grid">08 <span>May</span></p>
                        </div>
                        <img class="img-news" src="<?php echo $theme_path; ?>/assets/images/news-img2.jpeg" alt="" />
                    </div>
                    <div class="news-description  p-4">
                        <h3>The Industrial Sectors Are Performing
                            Well Maintaining Growth
                        </h3>
                        <p>Ut vitae metus nec ex hendrerit elementum. Vestibulum non
                            vestibulum quam. Fusce tristique feugiat tellus sit amet ...
                        </p>
                        <hr>
                        <div class="d-flex">
                            <p class="px-3 desc-news fw-bold">BY ADMIN</p>
                            <hr class="vr news-hr">
                            <p class="px-3 desc-news fw-bold">LATEST NEWS V2</p>
                            <hr class="vr news-hr">
                            <p class="px-3 desc-news fw-bold">0 COMMENTS</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-12">
                <div class="card-news">
                    <div class="position-relative">
                        <div class="date-square">
                            <p class="d-grid">08 <span>May</span></p>
                        </div>
                        <img class="img-news" src="<?php echo $theme_path; ?>/assets/images/news-img1.jpeg" alt="" />
                    </div>
                    <div class="news-description  p-4">
                        <h3>Reliant Manufacturing By Continued &
                            Support Business By Erdunt
                        </h3>
                        <p>Curabitur eros nisi, faucibus a lacus sed, dapibus mattis libero.
                            Nulla interdum dui eget enim elementum, ut ...
                        </p>
                        <hr>
                        <div class="d-flex">
                            <p class="px-2 desc-news fw-bold">BY ADMIN</p>
                            <hr class="vr news-hr">
                            <p class="px-2 desc-news fw-bold">LATEST NEWS V2</p>
                            <hr class="vr news-hr">
                            <p class="px-2 desc-news fw-bold">0 COMMENTS</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!---section five end-->
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
                <!-- <div class="form-container">
                    <div class="form-header">
                        <h2 class="form-title fw-bold">Get a Free Consultation</h2>
                    </div>
                    <form class="form-fields">
                        <input type="text" id="yourName" class="form-input in-field" placeholder="Your Name"
                            aria-label="Your Name" />
                        <div class="d-flex">
                            <input type="email" id="email" class="form-input w-50 in-field" placeholder="Email Address"
                                aria-label="Email Address" />
                            <input type="tel" id="phone" class="form-input w-50 in-field" placeholder="Phone"
                                aria-label="Phone" />
                        </div>
                        <textarea rows="4" type="something" id="something" class="form-input"
                            placeholder="Say Something..." aria-label="Say Something">
            </textarea>
                        <div class="d-flex justify-content-center py-4"> <a class="btn-contact-us text-center href="><i
                                    class=" fa-solid fa-arrow-right-to-bracket px-2"></i>
                                Send Message
                            </a></div>

                    </form>
                </div> -->
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