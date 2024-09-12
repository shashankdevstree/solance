<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package solance
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script> -->


    <style>
    .header-sticky {
        position: fixed !important;
        z-index: 999 !important;
        width: 100% !important;
    }
    </style>
</head>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">

        <!-- 🇹​​​​​🇴​​​​​🇵​​​​​ 🇸​​​​​🇹​​​​​🇷​​​​​🇮​​​​​🇵​​​​​ -->
        <?php
	 	$theme_path = get_template_directory_uri();
        $top_header = get_field('top_header','options');
        $phone_number = $top_header['phone_number'];
        $email = $top_header['email'];
        $facebook = $top_header['facebook'];
        $linkedin = $top_header['linkedin'];
        $pinterest = $top_header['pinterest'];
        $twitter = $top_header['twitter'];

        $bottom_header = get_field('bottom_header','options');
        $logo = $bottom_header['logo'];
        $logo_with_background_color = $bottom_header['logo_with_background_color'];
        $dealer_enquiry_button = $bottom_header['dealer_enquiry_button'];
        
	 ?>
        <header>
            <div class="header-sticky" style="position: fixed;">
                <section class="top-strip">
                    <div class="container d-flex justify-content-between">
                        <div class="flex">
                            <a href="<?php echo $phone_number['url']; ?>"
                                class="d-flex align-items-center text-white active-header">
                                <span class="px-2">
                                    <i class="fa-solid fa-phone social-icons"></i>
                                </span>
                                <?php echo $phone_number['title']; ?>
                            </a>
                            <a href="<?php echo $email['url']; ?>"
                                class="d-flex align-items-center text-white active-header">
                                <span class="px-2">
                                    <i class="fa-solid fa-envelope social-icons"></i>
                                </span>
                                <?php echo $email['title']; ?>
                            </a>
                        </div>
                        <div>
                            <div>
                                <div class="nav-social-icons">
                                    <a href="<?php echo $facebook;?>" class="text-white"> <i
                                            class="fab fa-facebook-f fb-icon social-icons"></i></a>
                                    <a href="<?php echo $linkedin;?>" class="text-white"> <i
                                            class="fab fa-linkedin-in social-icons"></i></a>
                                    <a href="<?php echo $pinterest;?>" class="text-white"> <i
                                            class="fa-brands fa-pinterest social-icons"></i></a>
                                    <a href="<?php echo $twitter;?>" class="text-white"> <i
                                            class="fab fa-twitter social-icons"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- 🇳​​​​​🇦​​​​​🇻​​​​​🇧​​​​​🇦​​​​​🇷​​​​​ 🇸​​​​​🇪​​​​​🇨​​​​​🇹​​​​​🇮​​​​​🇴​​​​​🇳​​​​​ -->
                <div class="container">
                    <div class="position-relative">
                        <div class="nav-wrapper">
                            <div class="row head-nav">
                                <div class="logo col flex align-items-center" style="margin-left: -3px;">
                                    <a href="<?php echo home_url(); ?>"><img
                                            src="<?php echo $logo_with_background_color['url']; ?>"
                                            alt="<?php echo $logo_with_background_color['title']; ?>"></a>
                                </div>
                                <div class="clipped-element col"></div>
                            </div>
                            <div class="nav-links flex align-items-center">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_id'        => 'header-menu',
                                        'container'      => 'div',
                                        'container_class'=> 'header-menu-container',
                                        'menu_class'     => 'nav-links flex align-items-center',
                                        'walker' => new Walker_Nav_Menu_No_UL()
                                    ) );

                                    /*
                                ?>
                                <a href="./home.html" class="active-link">Home</a>
                                <a href="./about.html">About Us</a>
                                <div class="products-menu">
                                    <a href="./products.html">Products</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="brd-line menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
                                            <a class="nav-link" href="#">2 Wheeler Batteries</a>
                                            <ul class="sub-menu">
                                                <a href="#">Platinum Line</a>
                                                <li class="menu-item menu-item-object-solutions menu-item-707">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                                <li class="menu-item menu-item-object-solutions menu-item-708">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                                <li class="menu-item menu-item-object-solutions menu-item-709">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                                <li id="menu-item-710"
                                                    class="menu-item menu-item-object-solutions menu-item-710">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                                <li id="menu-item-711"
                                                    class="menu-item menu-item-object-solutions menu-item-711">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                                <li id="menu-item-712"
                                                    class="menu-item menu-item-object-solutions menu-item-712">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                                <a href="#">Gold Line</a>
                                                <li id="menu-item-713"
                                                    class="menu-item menu-item-object-solutions menu-item-713">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                                <li id="menu-item-714"
                                                    class="menu-item menu-item-object-solutions menu-item-714">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                                <li id="menu-item-713"
                                                    class="menu-item menu-item-object-solutions menu-item-713">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                                <li id="menu-item-714"
                                                    class="menu-item menu-item-object-solutions menu-item-714">
                                                    <a class="nav-link text-menu" href=""><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLX
                                                        2.5L</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-723"
                                            class="brd-line menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-723">
                                            <a class="nav-link" href="#">UPS Batteries</a>
                                            <ul class="sub-menu">
                                                <li id="menu-item-715"
                                                    class="menu-item menu-item-object-solutions menu-item-715">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hotels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLV
                                                        4.5</a>
                                                </li>
                                                <li id="menu-item-716"
                                                    class="menu-item menu-item-object-solutions menu-item-716">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/resorts/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLV
                                                        4.5</a>
                                                </li>
                                                <li id="menu-item-717"
                                                    class="menu-item menu-item-object-solutions menu-item-717">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hostels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLV
                                                        4.5</a>
                                                </li>
                                                <li id="menu-item-718"
                                                    class="menu-item menu-item-object-solutions menu-item-718">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/bbs/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLV
                                                        4.5</a>
                                                </li>
                                                <li id="menu-item-719"
                                                    class="menu-item menu-item-object-solutions menu-item-719">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/serviced-appartment/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLV
                                                        4.5</a>
                                                </li>
                                                <li id="menu-item-720"
                                                    class="menu-item menu-item-object-solutions menu-item-720">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/guest-houses/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLV
                                                        4.5</a>
                                                </li>
                                                <li id="menu-item-721"
                                                    class="menu-item menu-item-object-solutions menu-item-721">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/chain-of-properties/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLV
                                                        4.5</a>
                                                </li>
                                                <li id="menu-item-722"
                                                    class="menu-item menu-item-object-solutions menu-item-722">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/vacation-rentals/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>SLV
                                                        4.5</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-724"
                                            class="brd-line menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-723">
                                            <a class="nav-link" href="#">Automotive Batteries</a>
                                            <ul class="sub-menu">
                                                <li id="menu-item-715"
                                                    class="menu-item menu-item-object-solutions menu-item-715">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hotels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-716"
                                                    class="menu-item menu-item-object-solutions menu-item-716">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/resorts/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-717"
                                                    class="menu-item menu-item-object-solutions menu-item-717">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hostels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-718"
                                                    class="menu-item menu-item-object-solutions menu-item-718">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/bbs/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-719"
                                                    class="menu-item menu-item-object-solutions menu-item-719">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/serviced-appartment/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-715"
                                                    class="menu-item menu-item-object-solutions menu-item-715">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hotels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-716"
                                                    class="menu-item menu-item-object-solutions menu-item-716">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/resorts/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-717"
                                                    class="menu-item menu-item-object-solutions menu-item-717">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hostels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-718"
                                                    class="menu-item menu-item-object-solutions menu-item-718">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/bbs/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-719"
                                                    class="menu-item menu-item-object-solutions menu-item-719">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/serviced-appartment/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-720"
                                                    class="menu-item menu-item-object-solutions menu-item-720">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/guest-houses/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-721"
                                                    class="menu-item menu-item-object-solutions menu-item-721">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/chain-of-properties/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-722"
                                                    class="menu-item menu-item-object-solutions menu-item-722">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/vacation-rentals/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                                <li id="menu-item-722"
                                                    class="menu-item menu-item-object-solutions menu-item-722">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/vacation-rentals/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>S34B19L/R</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-725"
                                            class="brd-line menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-723">
                                            <a class="nav-link" href="#">Tall Tubular Batteries</a>
                                            <ul class="sub-menu">
                                                <li id="menu-item-715"
                                                    class="menu-item menu-item-object-solutions menu-item-715">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hotels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT15000</a>
                                                </li>
                                                <li id="menu-item-716"
                                                    class="menu-item menu-item-object-solutions menu-item-716">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/resorts/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT15000</a>
                                                </li>
                                                <li id="menu-item-717"
                                                    class="menu-item menu-item-object-solutions menu-item-717">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hostels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT15000</a>
                                                </li>
                                                <li id="menu-item-718"
                                                    class="menu-item menu-item-object-solutions menu-item-718">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/bbs/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT15000</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-726"
                                            class="brd-line menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-723">
                                            <a class="nav-link" href="#">Jumbo Series</a>
                                            <ul class="sub-menu">
                                                <li id="menu-item-715"
                                                    class="menu-item menu-item-object-solutions menu-item-715">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hotels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT250</a>
                                                </li>
                                                <li id="menu-item-716"
                                                    class="menu-item menu-item-object-solutions menu-item-716">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/resorts/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT250</a>
                                                </li>
                                                <li id="menu-item-717"
                                                    class="menu-item menu-item-object-solutions menu-item-717">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/hostels/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT250</a>
                                                </li>
                                                <li id="menu-item-718"
                                                    class="menu-item menu-item-object-solutions menu-item-718">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/bbs/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT250</a>
                                                </li>
                                                <li id="menu-item-719"
                                                    class="menu-item menu-item-object-solutions menu-item-719">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/serviced-appartment/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT250</a>
                                                </li>
                                                <li id="menu-item-720"
                                                    class="menu-item menu-item-object-solutions menu-item-720">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/guest-houses/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT250</a>
                                                </li>
                                                <li id="menu-item-721"
                                                    class="menu-item menu-item-object-solutions menu-item-721">
                                                    <a class="nav-link text-menu"
                                                        href="http://170.187.248.145/pos/solutions/chain-of-properties/"><i
                                                            class="fa-solid fa-angles-right px-2 menu-icon"></i>STT250</a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <a href="./blogs.html">Blogs</a>
                                <a href="./our-team.html">Our Team</a>
                                <a href="./contact.html">Contact</a>
                                <?php */?>
                            </div>
                            <div class="nav-end-items">
                                <a href="<?php echo  $dealer_enquiry_button['url']; ?>"
                                    class="dealer-nav-link d-flex align-items-center " href=""><i
                                        class="fa-solid fa-arrow-right-to-bracket px-2"></i><?php echo  $dealer_enquiry_button['title']; ?></a>
                            </div>
                        </div>
                        <div class="bor-header"></div>
                    </div>
                </div>

            </div>
            <!-- <div id="header">
                <div class="logo col mobile-menu-stiky">
                    <div class="d-flex justify-content-between">
                        <div> <a href="<?php echo home_url(); ?>"> <img class="mobile-menu-logo" src="<?php echo $theme_path; ?>/assets/images/logo.png" alt=""> </a></div>
                        <div>
                            <a href="#menu" id="menu-toggle">
                                <i class="fa-solid fa-bars fa-2xl" style="color: #ffffff;"></i>
                            </a>
                            <a href="#page" id="menu-toggle">
                                <i class="fa-solid fa-xmark fa-2xl" style="color: #ffffff; "></i>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div> -->
        </header>
        <!---header design end-->
        <!-- #masthead -->