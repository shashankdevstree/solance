<?php
    get_header();

    /** Template Name: About Us */

    $theme_path = get_template_directory_uri();
    /** Banner */
    $banner = get_field('banner');
    $background_image = $banner['background_image'];

    /** About */
    $about = get_field('about');
    $about_title = $about['title'];
    $about_text_1 = $about_title['text_1'];
    $about_text_2 = $about_title['text_2'];
    $about_image = $about['image'];
    $about_image_2 = $about['image_2'];
    $about_content = $about['content'];
    $about_button = $about['button'];

    /** Our Quality */
    $our_quality = get_field('our_quality');

    /** We Deliver */
    $we_deliver = get_field('we_deliver');
    $we_deliver_title = $we_deliver['title'];
    $we_deliver_text_1 = $we_deliver_title['text_1'];
    $we_deliver_text_2 = $we_deliver_title['text_2'];
    $we_deliver_image = $we_deliver['image'];
    $we_deliver_content = $we_deliver['content'];
    $we_deliver_counter = $we_deliver['counter'];

    /** About Solance */
    $about_solance_title = get_field('about_us_title');
    $about_solance_text_1 = $about_solance_title['text_1'];
    $about_solance_text_2 = $about_solance_title['text_2'];
    $about_solance = get_field('about_solance');

    /** Our Mission */
    $our_mission = get_field('our_mission');
    $our_vision = get_field('our_vision');
    $core_value = get_field('core_value');

    $solance_india = get_field('solance_india');
    $india_image_1 = $solance_india['image_1'];
    $india_image_2 = $solance_india['image_2'];
    $india_image_3 = $solance_india['image_3'];
    $india_title = $solance_india['title'];
    $india_text1 = $india_title['text_1'];
    $india_text2 = $india_title['text_2'];
    $india_content = $solance_india['content'];
    $india_list = $solance_india['list'];

    $solance_africa = get_field('solance_africa');
    $africa_image_1 = $solance_africa['image_1'];
    $africa_image_2 = $solance_africa['image_2'];
    $africa_image_3 = $solance_africa['image_3'];
    $africa_title = $solance_africa['title'];
    $africa_text1 = $africa_title['text_1'];
    $africa_text2 = $africa_title['text_2'];
    $africa_content = $solance_africa['content'];
    $africa_list = $solance_africa['list'];


    foreach($india_list as $key => $value){
        $list_text = $value['text'];
    }

    foreach($africa_list as $key => $value){
        $list_text = $value['text'];
    }
?>

<div class="header-wrapper about-header-bg header_text"
    style="    background: url(<?php echo $background_image['url']; ?>) no-repeat center center;    background-size: cover;">
    <div class="container">
        <div class="page-title"><?php echo get_the_title(); ?></div>
    </div>
</div>
<!-- <div>
      <div>two images</div>
      <div>
        <div>About <span>Solance</span></div>

        <p>
          Solance works only on one principle… Demand more. Customers are at
          the centre of our organization and we want you to ask for more, as we
          are ready to deliver more… more than your expectations.
        </p>

        <p>
          Based on the decision of the four-decade-old POLAR group, we have
          diversified our robust product portfolio into the manufacture of 2-
          wheeler battery (VRLA) with a whopping production capacity of 4
          million batteries per annum.
        </p>

        <p>
          Created built and supported by a young team of experienced
          technocrats, this operation delivers consistent quality, uninterrupted
          supply and products of path-breaking technology. There is no way to go
          but Solance.
        </p>

        <a href="">Contact Us</a>
      </div> -->
<section class="about_section" data-aos="fade-up" data-aos-duration="2000">
    <div class="about_section_layout  bg-white">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12 table-left img_container ">
                <img class="img-big" src="<?php echo $about_image['url']; ?>"
                    alt="<?php echo $about_image['title']; ?>" />
                <img class="img-small" src="<?php echo $about_image_2['url']; ?>"
                    alt="<?php echo $about_image_2['title']; ?>" />

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12 table-right">
                <div class="py-3 text-start">
                    <h3 class="heading-title fw-normal"><?php echo $about_text_1; ?> <span
                            class=" solance-text"><?php echo $about_text_2; ?></span>
                    </h3>
                </div>
                <div class="py-3 text-start">
                    <div class="text-Table-menu">
                        <?php echo $about_content; ?>
                    </div>

                </div>
                <div class="py-3 text-start btn-who-are">

                    <a class="btn-contact contact_us_btn" href="<?php echo $about_button['url']; ?>">
                    <i class="fa-solid fa-arrow-right-to-bracket px-2"></i>                        <span> <?php echo $about_button['title']; ?> </span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- 🇬​​​​​🇷​​​​​🇮​​​​​🇩​​​​​ 🇸​​​​​🇪​​​​​🇨​​​​​🇹​​​​​🇮​​​​​🇴​​​​​🇳​​​​​ -->
<!-- <section class="gird-layout"> -->
<?php
        $i = 1;
        foreach ($our_quality as $key => $value) {
            $title = $value['title'];
            $image = $value['image'];
            $icon = $value['icon'];
            $content = $value['content'];
    ?>
<!-- <div class="grid-card">
        <div class="abt-grid-img position-relative">
            <img class="w-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
            <div class="position-absolute top-0 end-0 text-bg-light z-3 fs-1 bg-transparent">
                <div class="outline-num">0<?php echo $i; ?></div>
            </div>
            <div class="position-absolute cust-push-above">
                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['title']; ?>">
            </div>
        </div>
        <div class="abt-grid-content">
            <div class="text-v3"><?php echo $title; ?></div>
            <div class="card_descrption">
                <p>
                    <?php echo $content; ?>
                </p>
            </div>
        </div>
    </div> -->
<?php
            $i++;
        }
        /*
    ?>
<!-- grid  -->
<div class="grid-card">
    <div class="abt-grid-img position-relative">
        <img class="w-100" src="<?php echo $theme_path; ?>/assets/images/about-2.png" alt="">
        <div class="position-absolute top-0 end-0 text-bg-light z-3 fs-1 bg-transparent">
            <!-- <img src="<?php echo $theme_path; ?>/assets/images/abt-02-child-btn.png" alt=""> -->
            <div class="outline-num">02</div>
        </div>
        <div class="position-absolute cust-push-above">
            <img src="<?php echo $theme_path; ?>/assets/images/abt-2-child.png" alt="">
        </div>
    </div>
    <div class="abt-grid-content">
        <div class="text-v3">Production Technologies</div>
        <div>
            We use engineering and manufacturing technology to make production
            faster, simpler and more efficient
        </div>
    </div>
</div>
<div class="grid-card">
    <div class="abt-grid-img position-relative">
        <img class="w-100" src="<?php echo $theme_path; ?>/assets/images/abt-3.png" alt="" class="z-0">
        <div class="position-absolute top-0 end-0 text-bg-light z-3 fs-1 bg-transparent">
            <!-- <img src="<?php echo $theme_path; ?>/assets/images/abt-03-child-btn.png" alt=""> -->
            <div class="outline-num">03</div>
        </div>
        <div class="position-absolute cust-push-above">
            <img src="<?php echo $theme_path; ?>/assets/images/abt-3-child.png" alt="">
        </div>
    </div>
    <div class="abt-grid-content">
        <div class="text-v3">Quality</div>
        <div>
            To ensure the safety and optimal performance of Solance Products, we
            put them through a rigorous quality
        </div>
    </div>
</div>
<div class="grid-card">
    <div class="abt-grid-img position-relative">
        <img class="w-100" src="<?php echo $theme_path; ?>/assets/images/abt-4.png" alt="">
        <div class="position-absolute top-0 end-0 text-bg-light z-3 fs-1 bg-transparent">
            <!-- <img src="<?php echo $theme_path; ?>/assets/images/abt-04-child-btn.png" alt=""> -->
            <div class="outline-num">04</div>
        </div>
        <div class="position-absolute cust-push-above">
            <img src="<?php echo $theme_path; ?>/assets/images/abt-4-child.png" alt="">
        </div>
    </div>
    <div class="abt-grid-content">
        <div class="text-v3">Training and Development</div>
        <div>
            For better working experience, we regularly conduct various training
            & development programs
        </div>
    </div>
</div>
<?php
        */
    ?>
<!-- </section> -->
<!-- 🇧​​​​​🇦​​​​​🇳​​​​​🇳​​​​​🇪​​​​​🇷​​​​​ 🇸​​​​​🇪​​​​​🇨​​​​​🇹​​​​​🇮​​​​​🇴​​​​​🇳​​​​​ -->
<section class="wrapper-flex-center banner-bg" data-aos="fade-up" data-aos-duration="2000"
    style="background-image: url(<?php echo $we_deliver_image['url']; ?>);">
    <div class="text-v2 text-center">
        <?php echo $we_deliver_text_1; ?>
        <span class="font-bold"> <?php echo $we_deliver_text_2; ?> </span>
    </div>
    <p class="banner-sec-text">
        <?php echo $we_deliver_content; ?>
    </p>
    <div class="d-flex main-counter">
        <?php
            foreach ($we_deliver_counter as $key => $value) {
                
            
        ?>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img class="img-consume" src="<?php echo $value['icon']; ?>" alt="" />
            <p class="counter" data-target="<?php echo $value['number']; ?>">+0</p>
            <span><?php echo $value['content']; ?></span>
        </div>
        <?php
            }
        ?>
        <!-- <div class="d-flex flex-column justify-content-center align-items-center">
            <img class="img-consume" src="<?php echo $theme_path; ?>/assets/images/dealer2.png" alt="" />
            <p class="counter" data-target="140">+0</p>
            <span>Dealer Pan India</span>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img class="img-consume" src="<?php echo $theme_path; ?>/assets/images/country2.png" alt="" />
            <p class="counter" data-target="2">+0</p>
            <span>Country</span>
        </div> -->
    </div>
</section>
<section class="ourMission-wrapper position-relative" data-aos="fade-up" data-aos-duration="2000">
    <!-- <div class="back-mission"></div> -->

    <div class="container">
        <div class="row justify-content-center">
            <?php
                $mission_title = $our_mission['title'];
                $mission_image = $our_mission['image'];
                $mission_icon = $our_mission['icon'];
                $mission_content = $our_mission['content'];
                $vision_title = $our_vision['title'];
                $vision_image = $our_vision['image'];
                $vision_icon = $our_vision['icon'];
                $vision_content = $our_vision['content'];
                $core_values_title = $core_value['title'];
                $core_values_image = $core_value['image'];
                $core_values_icon = $core_value['icon'];
                $core_values_content = $core_value['content'];
            ?>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-12 spc-our" data-aos="fade-up"
                data-aos-duration="2000">
                <img class="mission-img" src="<?php echo $mission_image; ?>" alt="">
                <div class="des-mission-main d-flex">
                    <div class="icn-mission"><img class="mission-icon-img" src="<?php echo $mission_icon; ?>" alt="">
                    </div>
                    <div class="mission-desc">
                        <h2><?php echo $mission_title['text_1']; ?>
                            <span><?php echo $mission_title['text_2']; ?></span>
                        </h2>
                        <p><?php echo $mission_content; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-12 spc-our" data-aos="fade-up"
                data-aos-duration="2000">
                <img class="mission-img" src="<?php echo $vision_image; ?>" alt="">
                <div class="des-mission-main d-flex">
                    <div class="icn-mission"><img class="mission-icon-img" src="<?php echo $vision_icon; ?>" alt="">
                    </div>
                    <div class="mission-desc">
                        <h2><?php echo $vision_title['text_1']; ?>
                            <span><?php echo $vision_title['text_2']; ?></span>
                        </h2>
                        <p><?php echo $vision_content; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-12 spc-our" data-aos="fade-up"
                data-aos-duration="2000">
                <img class="mission-img" src="<?php echo $core_values_image; ?>" alt="">
                <div class="des-mission-main d-flex">
                    <div class="icn-mission"><img class="mission-icon-img" src="<?php echo $core_values_icon; ?>"
                            alt="">
                    </div>
                    <div class="mission-desc">
                        <h2><?php echo $core_values_title['text_1']; ?>
                            <span><?php echo $core_values_title['text_2']; ?></span>
                        </h2>
                        <p><?php echo $core_values_content; ?></p>
                    </div>
                </div>
            </div>
            <!-- <div
                class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12 d-flex justify-content-center align-items-center spc-our">
            </div>
            <?php
                $vision_title = $our_vision['title'];
                $vision_image = $our_vision['image'];
                $vision_icon = $our_vision['icon'];
                $vision_content = $our_vision['content'];
            ?> -->
            <!--  <div
                class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12 d-flex justify-content-center align-items-center spc-our">
                <p class="vision-desc"><?php echo $vision_content; ?></p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12 spc-our">
                <h3><?php echo $vision_title['text_1']; ?> <span><?php echo $vision_title['text_2']; ?></span></h3>
                <div class="d-flex">
                    <div class="icon-main"><img class="mission-icon-img" src="<?php echo $vision_icon; ?>" alt=""></div>
                    <img class="mission-img" src="<?php echo $vision_image; ?>" alt="">
                </div>
            </div> -->
            <!-- <?php
                $core_values_title = $core_value['title'];
                $core_values_image = $core_value['image'];
                $core_values_icon = $core_value['icon'];
                $core_values_content = $core_value['content'];
            ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12 spc-our">
                <h2><?php echo $core_values_title['text_1']; ?> <span><?php echo $core_values_title['text_2']; ?></span>
                </h2>
                <div class="d-flex">
                    <img class="mission-img" src="<?php echo $core_values_image; ?>" alt="">
                    <div class="icon-main"><img class="mission-icon-img" src="<?php echo $core_values_icon; ?>" alt="">
                    </div>
                </div>
            </div>
            <div
                class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-12 d-flex justify-content-center align-items-center spc-our">
                <p class="value-desc"><?php echo $core_values_content; ?></p>
            </div> -->
        </div>
    </div>
</section>
<section class="position-relative">
    <img class="bg-india" src="<?php echo $theme_path; ?>/assets/images/bg-video 1 (1).png" alt="">
    <div class="container solance-india">
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-12">
                <div class="img-india">
                    <img src="<?php echo $india_image_1['url']; ?>" alt="">
                    <img src="<?php echo $india_image_2['url']; ?>" alt="">
                </div>
                <img class="img-big-india" src="<?php echo $india_image_3['url']; ?>" alt="">
            </div>
            <div
                class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-12 d-flex flex-column justify-content-center  desc-india">
                <h3 class="heading-title fw-normal"><?php echo $india_text1; ?> <span class=" solance-text"><?php echo $india_text2; ?> </span></h3>
                <div class="card-india">
                    <?php 
                        
                        foreach($india_list as $key => $value){
                            $list_text = $value['text'];
                       
                    ?>
                            <div> <img src="<?php echo $theme_path; ?>/assets/images/Solance Logo without Reg..svg" alt="">
                                <p><?php echo $list_text; ?></p>
                            </div>
                    <?php 
                         }
                    ?>
                    
                </div>

            </div>
        </div>
    </div>
</section>
<section class="position-relative africa-sec">
    <img class="bg-africa" src="<?php echo $theme_path; ?>/assets/images/3568_01 2.png" alt="">
    <div class="container solance-africa">
        <div class="row ">
            <div
                class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-12 d-flex flex-column justify-content-center  desc-africa">
                <h3 class="heading-title fw-normal"><?php echo $africa_text1; ?> <span class=" africa-solance-text"><?php echo $africa_text2; ?></span></h3>
                <?php echo $africa_content; ?>
                <!-- <p>We have installed most sophisticated machines to produce world class batteries</p>
                <p>Current Capacity is 50000 batteries per month and We will expand the capacity up to 100000
                    batteries per month to fulfill the domestic and export demand very soon.</p> -->
                <div class="card-africa">
                    <?php 
                        
                        foreach($africa_list as $key => $value){
                            $list_text = $value['text'];
                       
                    ?>
                    <div> <img src="<?php echo $theme_path; ?>/assets/images/Solance Logo without Reg. 8.svg" alt="">
                        <p><?php echo $list_text; ?></p>
                    </div>
                    <?php 
                         }
                    ?>
                    <!-- <div> <img src="<?php echo $theme_path; ?>/assets/images/Solance Logo without Reg. 8.svg" alt="">
                        <p>Land Area: 7 Hectors</p>
                    </div>
                    <div> <img src="<?php echo $theme_path; ?>/assets/images/Solance Logo without Reg. 8.svg" alt="">
                        <p>Construction Area: 25000 Sq. Meters</p>
                    </div>
                    <div> <img src="<?php echo $theme_path; ?>/assets/images/Solance Logo without Reg. 8.svg" alt="">
                        <p>Initial Installed Capacity: 50000 Batteries per Month</p>
                    </div>
                    <div> <img src="<?php echo $theme_path; ?>/assets/images/Solance Logo without Reg. 8.svg" alt="">
                        <p>Infrastructure: Capacity can be expanded up to 100000 per month
                        </p>
                    </div> -->

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-12 d-flex flex-column align-items-end">
                <div class="img-africa">
                    <img src="<?php echo $africa_image_1['url']; ?>" alt="">
                    <img src="<?php echo $africa_image_2['url']; ?>" alt="">
                </div>
                <img class="img-big-africa" src="<?php echo $africa_image_3['url']; ?>" alt="">
            </div>

        </div>
    </div>
</section>
<!-- 🇦​​​​​🇧​​​​​🇴​​​​​🇺​​​​​🇹​​​​​ 🇸​​​​​🇪​​​​​🇨​​​​​🇹​​​​​🇮​​​​​🇴​​​​​🇳​​​​​ -->
<!-- <section class="about-wrapper" data-aos="fade-up" data-aos-duration="2000">
    <div class="text-v2 text-center m-3">
        <?php echo $about_solance_text_1; ?>
        <span class="solance-text"><?php echo $about_solance_text_2; ?></span>
    </div>
    <div class="about-grid">
        <?php
            foreach ($about_solance as $key => $value) {
                $title = $value['title'];
                $content = $value['content'];
        ?>
        <div class="about-card">
            <div class="about-card-header"><?php echo $title; ?></div>
            <p class="about-card-body text-center">
                <?php echo $content; ?>
            </p>
        </div>
        <?php
            }
        ?> -->
<!-- <div class="about-card">
            <div class="about-card-header ">POLAR INDUSTRIES</div>
            <p class="about-card-body text-center">
                Manufacturing unit of high-quality Lead Oxide, Pure Lead & Lead Alloysand
                glory in the industry.
            </p>
        </div>
        <div class="about-card">
            <div class="about-card-header">TWOIQ LLP</div>
            <p class="about-card-body text-center">
                Twoiq is a fast-growing multi-skilled software service provider based in
                Ahmedabad, India. twoiq provides distinctive IT solutions and services which are unique in the
                market.
            </p>
        </div> -->
<!-- </div>
</section> -->
<?php
    get_footer();
?>