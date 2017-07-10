<?php
/**
 * Header Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_header( $wp_customize ) {
    
    /** Search Settings */
    
    $wp_customize->add_section(
        'fluid_magazine_search_settings',
        array(
            'title'       => __( 'Header Settings', 'fluid-magazine' ),
            'description' => __( 'Header Search Settings', 'fluid-magazine' ),
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
        )
    );
    /** Enable/Disable Search form */
    $wp_customize->add_setting(
        'fluid_magazine_ed_search',
        array(
            'default'           => '1',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_ed_search',
        array(
            'label'       => __( 'Enable Search Form', 'fluid-magazine' ),
            'description' => __( 'Check to enable Search Form in header.', 'fluid-magazine' ),
            'section'     => 'fluid_magazine_search_settings',
            'type'        => 'checkbox',
        )
    );

}
add_action( 'customize_register', 'fluid_magazine_customize_register_header' );