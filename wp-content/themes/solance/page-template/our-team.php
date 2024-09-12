<?php
    get_header();

    /** Template Name: Our Team */

    $heading = get_field('heading');
    $heading_text1 = $heading['text_1'];
    $heading_text2 = $heading['text_2'];
    

    $our_team = get_field('our_team');
    $background_image = get_field('background_image');
    
?>

<!-- HEADER -->
<div class="header-wrapper our-team-bg"  style="background-image: url(<?php echo $background_image['url']; ?>);">
    <div class="container">
        <div class="page-title"><?php echo get_the_title(); ?></div>
    </div>
</div>
<section class="container" data-aos="fade-up" data-aos-duration="2000">
    <h2 class="text-center header-title-wrapper">
        <?php echo $heading_text1; ?>
        <span class="solance-text"><?php echo $heading_text2; ?></span>
    </h2>
</section>
<section class="container" data-aos="fade-up" data-aos-duration="2000">
    <!-- Main grid of cards -->
    <div class="row">
        <!-- Card 1 -->
         <?php
            foreach ($our_team as $key => $value) {
                $title = $value['title'];
                $image = $value['image'];
                $position = $value['position'];
                $description = $value['description'];
         ?>
        <div class="col-12 col-md-12 col-lg-6 mb-4" data-aos="fade-up" data-aos-duration="2000">
            <div class="flex-wrapper">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center card-img-wrapper">
                    <img class="card-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
                </div>
                <div class="col-12 col-md-6 card-text-wrapper">
                    <div class="card-text">
                        <p class="txt-bold"><?php echo $title; ?></p>
                        <hr>
                        <p class="text-color-blue"><?php echo $position; ?></p>
                        <p class="fw-light font-14-px">
                            <?php echo $description; ?>
                        </p>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <?php
            } 
        ?>
        <?php /*?>
        <!-- Card 2 -->
        <div class="col-12 col-md-12 col-lg-6 mb-4">
            <!-- <div class="bg-black"> -->
            <div class="flex-wrapper">
                <div class="col-12 col-md-6  d-flex justify-content-center align-items-center card-img-wrapper">
                    <img class="card-img" src="assets/images/our-team-page/team-person-2.png" alt="">
                </div>
                <div class="col-12 col-md-6 card-text-wrapper">
                    <div class="card-text">
                        <p class="txt-bold">Krunal Davra</p>
                        <hr>
                        <p class="text-color-blue">Partner</p>
                        <p class="fw-light font-14-px">
                            Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy
                            text ever since the 1500s, when an a galley
                        </p>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <!-- Card 3 -->
        <div class="col-12 col-md-12 col-lg-6 mb-4">
            <!-- <div class="bg-black"> -->
            <div class="flex-wrapper">
                <div class="col-12 col-md-6  d-flex justify-content-center align-items-center card-img-wrapper">
                    <img class="card-img" src="assets/images/our-team-page/team-person-3.png" alt="">
                </div>
                <div class="col-12 col-md-6 card-text-wrapper">
                    <div class="card-text">
                        <p class="txt-bold">Sandip Rajpara</p>
                        <hr>
                        <p class="text-color-blue">Partner</p>
                        <p class="fw-light font-14-px">
                            Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy
                            text ever since the 1500s, when an a galley
                        </p>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <!-- Card 4 -->
        <div class="col-12 col-md-12 col-lg-6 mb-4">
            <!-- <div class="bg-black"> -->
            <div class="flex-wrapper">
                <div class="col-12 col-md-6  d-flex justify-content-center align-items-center card-img-wrapper">
                    <img class="card-img" src="assets/images/our-team-page/team-person-4.png" alt="">
                </div>
                <div class="col-12 col-md-6 card-text-wrapper">
                    <div class="card-text">
                        <p class="txt-bold">Naresh Antala</p>
                        <hr>
                        <p class="text-color-blue">Partner</p>
                        <p class="fw-light font-14-px">
                            Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy
                            text ever since the 1500s, when an a galley
                        </p>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <?php */?>
    </div>
</section>

<?php
    get_footer();
?>