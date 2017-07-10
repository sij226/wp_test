<?php
/**
 * General Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_general( $wp_customize ) {

    /** Blog Post Section */    
    $wp_customize->add_section(
        'fluid_magazine_general_settings',
        array( 
            'title'     => __( 'General Setting', 'fluid-magazine' ),
            'priority'  => 100,
            'panel'     => 'wp_default_panel',
        )
    );
   
    /** Read More Text */
    $wp_customize->add_setting(
        'fluid_magazine_readmore_text',
        array(
            'default'           => __( 'Read More', 'fluid-magazine' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_readmore_text',
        array(
            'label'   => __( 'Read More Text', 'fluid-magazine' ),
            'section' => 'fluid_magazine_general_settings',
            'description' =>  __( 'Place enter read more text here.', 'fluid-magazine' ),
            'type'    => 'text',
        )
    );
    


}
add_action( 'customize_register', 'fluid_magazine_customize_register_general' );