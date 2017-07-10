<?php
/**
 * Restaurant and Cafe  woocommerce hooks and functions.
 *
 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package Fluid_Magazine
 */

/**
 * Woocommerce related hooks
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb',                 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper',     10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar',                10 );

add_action( 'woocommerce_before_main_content',  'fluid_magazine_wc_wrapper',         10 );
add_action( 'woocommerce_after_main_content',   'fluid_magazine_wc_wrapper_end',     10 );
add_action( 'after_setup_theme',                'fluid_magazine_woocommerce_support' );
add_action( 'fluid_magazine_wo_sidebar', 'fluid_magazine_wc_sidebar_cb' );
add_action( 'widgets_init',                     'fluid_magazine_wc_widgets_init' );
add_filter( 'woocommerce_show_page_title' ,     'fluid_magazine_woo_hide_page_title' );

/**
 * Declare Woocommerce Support
*/
function fluid_magazine_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Woocommerce Sidebar
*/
function fluid_magazine_wc_widgets_init(){
    register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'fluid-magazine' ),
		'id'            => 'shop-sidebar',
		'description'   => esc_html__( 'Sidebar displaying only in woocommerce pages.', 'fluid-magazine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );    
}

/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
*/
function fluid_magazine_wc_wrapper(){    
    ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
    <?php
}

/**
 * After Content
 * Closes the wrapping divs
*/
function fluid_magazine_wc_wrapper_end(){
    ?>
        </main>
    </div>
    <?php
    if( is_active_sidebar( 'shop-sidebar' ) );
    do_action( 'fluid_magazine_wo_sidebar' );
}

/**
 * Callback function for Shop sidebar
*/
function fluid_magazine_wc_sidebar_cb(){
    if( is_active_sidebar( 'shop-sidebar' ) ){
        echo '<div class="sidebar"><aside id="secondary" class="widget-area" role="complementary">';
        dynamic_sidebar( 'shop-sidebar' );
        echo '</aside></div>'; 
    }
}


/**
 * fluid_magazine_woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function fluid_magazine_woo_hide_page_title() {
	
	return false;
	
}