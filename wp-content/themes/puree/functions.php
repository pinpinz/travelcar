<?php
    if ( ! function_exists( 'bcm_setup' ) ) :
        function bcm_setup() {
            // META BOX - START
                // require_once get_template_directory().'/inc/meta.php'; // tak disable masih ambigu buat apa. file tak delete
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
                    wp_enqueue_script('bcm-bundle', get_template_directory_uri().'/script/bundle.js', array(),'', true);
                    if ( is_page( 'front-page' ) || is_page( 'home' ) ) {
                       
                    }   
                }
                add_action('wp_enqueue_scripts', 'bcm_register_scripts');
            // REGISTER SCRIPTS - END

            // REGISTER STYLES - START
                function bcm_register_styles(){
                    wp_enqueue_style('bcm-style', get_template_directory_uri().'/style.css', array(), '1', 'all');
                    if ( is_page( 'front-page' ) || is_page( 'home' ) ) {
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