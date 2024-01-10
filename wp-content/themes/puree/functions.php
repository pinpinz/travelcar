<?php
    if ( ! function_exists( 'bcm_setup' ) ) :
        function bcm_setup() {
            // META BOX - START
                require_once get_template_directory().'/inc/meta.php';
            // META BOX - END
            
            // WORDPRESS CORE - START
                add_theme_support( 'title-tag' );
                add_theme_support( 'custom-logo', array(
                    'height' => 100,
                    'width'  => 474,
                ));
            // WORDPRESS CORE - END

            // NAVIGATION MENU - START
                function custom_menu_navigation() {
                    register_nav_menus(
                    array(
                        'header-menu' => __( 'Header Menu' )
                    )
                    );
                }
                add_action( 'init', 'custom_menu_navigation' );
            // NAVIGATION MENU - START

            // REGISTER SCRIPTS - START
                function bcm_register_scripts(){
                    wp_enqueue_script('bcm-all', get_template_directory_uri().'/inc/asset/js/all.js', array(),'', true);
                    wp_localize_script( 'bcm-all', 'object_page', array( 'template_url' => get_stylesheet_directory_uri() ) ); // get url theme in js

                    wp_enqueue_script('bcm-tailwind','https://cdn.tailwindcss.com', array(), '', false);	
                     wp_enqueue_script('bcm-ionicons','https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js', array(), '', false);	
                    // wp_enqueue_script('bcm-bootstrap-js', get_template_directory_uri().'/inc/cdn/bootstrap/js/bootstrap.bundle.min.js', array(), '', true);	
                    wp_enqueue_script('bcm-ajax', get_template_directory_uri().'/inc/cdn/ajax/jquery.min.js', array(), '', false);
                    wp_enqueue_script('bcm-jquery', get_template_directory_uri().'/inc/cdn/jquery/jquery-3.6.0.js', array(), '', false);	
                    wp_enqueue_script('bcm-isotop','https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js', array(), '', false);	
                    wp_enqueue_script('bcm-fontfaceobserver', 'https://cdnjs.cloudflare.com/ajax/libs/fontfaceobserver/2.3.0/fontfaceobserver.js', array(), '', false);	
                    wp_enqueue_script('bcm-slick', get_template_directory_uri().'/inc/cdn/slick/slick.min.js', array(), '', false);	
                    wp_enqueue_script('bcm-gsap', get_template_directory_uri().'/inc/cdn/gsap/gsap.min.js', array(),'', true);  
                    wp_enqueue_script('bcm-gsap-ScrollTrigger', get_template_directory_uri().'/inc/cdn/gsap/ScrollTrigger.min.js', array(),'', true);  
                    if ( is_page( 'front-page' ) || is_page( 'home' ) ) {
                        wp_enqueue_script('bcm-pixi', get_template_directory_uri().'/inc/cdn/pixi/pixi.js', array(),'', true);  
                        wp_enqueue_script('bcm-front-page', get_template_directory_uri().'/inc/asset/js/front-page.js', array(),'', true);  
                    }   
                }
                add_action('wp_enqueue_scripts', 'bcm_register_scripts');
            // REGISTER SCRIPTS - END

            // REGISTER STYLES - START
                function bcm_register_styles(){
                    wp_enqueue_style('bcm-style', get_template_directory_uri().'/style.css', array(), '1', 'all');
                    wp_enqueue_style('bcm-font-arimo', get_template_directory_uri().'/inc/asset/font/font.css', array(), '', 'all');
                    wp_enqueue_style('bcm-all', get_template_directory_uri().'/inc/asset/css/all.css', array(), '', 'all');
                    wp_enqueue_style('bcm-slick', get_template_directory_uri().'/inc/cdn/slick/slick.css', array());
	                wp_enqueue_style('bcm-slick-theme', get_template_directory_uri().'/inc/cdn/slick/slick-theme.css', array());
                    // wp_enqueue_style('bcm-bootstrap-css', get_template_directory_uri().'/inc/cdn/bootstrap/css/bootstrap.min.css', array(), '', 'all');
                    if ( is_page( 'front-page' ) || is_page( 'home' ) ) {
                        wp_enqueue_style('bcm-front-page', get_template_directory_uri().'/inc/asset/css/front-page.css', array(), '', 'all'); 
                    }  
                }
                
                add_action('wp_enqueue_scripts', 'bcm_register_styles');
            // REGISTER STYLES - END
        }
    endif;
    add_action( 'after_setup_theme', 'bcm_setup' );

    // NAVBAR MENU - START
    function add_additional_class_on_li($classes, $item, $args) {
        if(isset($args->add_li_class)) {
            $classes[] = $args->add_li_class;
        }
        return $classes;
    }
    add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

    function add_menu_link_class( $atts, $item, $args ) {
        if (property_exists($args, 'add_link_class')) {
            $atts['class'] = $args->add_link_class;
        }
        
        return $atts;
    }
    add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );


    function add_menu_item_class_active_current_page( $classes, $item ) {
        $classes['class'] = "nav-link"; // Add class to every "<a>" tags
        if ( in_array('current_page_item', $item->classes) ) {
            $classes['class'] = 'nav-link active'; // Add class to current menu item's "<a>" tag
        }
        return $classes;
    }
    add_filter( 'nav_menu_link_attributes', 'add_menu_item_class_active_current_page', 10, 2 );
    // NAVBAR MENU - END

?>