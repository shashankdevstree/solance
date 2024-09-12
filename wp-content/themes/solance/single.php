<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package solance
 */

get_header();
$theme_path = get_template_directory_uri();
$banner = get_field('banner',12);
$banner_image = $banner['image'];
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			$title = get_the_title();
			$thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
		?>
			<!-- 🇭​​​​​🇪​​​​​🇦​​​​​🇩​​​​​🇪​​​​​🇷​​​​​ -->
			<div class="header-wrapper header-bg" style="background-image: url(<?php echo $banner_image['url']; ?>); " >
					<div class="container">
						<div class="text-white fs-1 heading_text">
							<h2>BLOGS</h2>
						</div>
					</div>
				</div>
				<!-- 🇧​​​​​🇱​​​​​🇴​​​​​🇬​​​​​ 🇩​​​​​🇪​​​​​🇹​​​​​🇦​​​​​🇮​​​​​🇱​​​​​-->
				<div class="container blog-wrapper" data-aos="fade-up" data-aos-duration="2000">
					<h5 class="solance-text font-bold">BY <?php echo get_the_author(); ?></h5>
					<p class="blog-title"><?php echo $title; ?></p>

					<div class="position-relative">
                                    <div class="big-date-square">
                                        <p class="d-grid"><?php echo get_the_date('d')?> <span><?php echo get_the_date('M')?></span></p>
                                    </div>
                                    				<img class="img-news w-100" src="<?php echo $thumbnail_url; ?>" alt="" class="w-100" />
                                </div>
					<div class="blog-detail-para">
						<?php echo get_field('blog_content',get_the_ID()); ?>
					</div>

				</div>
		<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
