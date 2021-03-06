<?php
/**
 * Widget Social Networks
 *
 * @package Fluid_Magazine
 */

// register Fluid_Magazine_Social_Networks widget 
function fluid_magazine_register_social_networks_widget() {
    register_widget( 'Fluid_Magazine_Social_Networks' );
}
add_action( 'widgets_init', 'fluid_magazine_register_social_networks_widget' );

if ( ! class_exists( 'Fluid_Magazine_Social_Networks' ) ):   
 /**
 * Adds Fluid_Magazine_Social_Networks widget.
 */
class Fluid_Magazine_Social_Networks extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'fluid_magazine_social_networks', // Base ID
			esc_html__( 'RARA: Social Networks', 'fluid-magazine' ), // Name
			array( 'description' => esc_html__( 'A Social Networks Widget', 'fluid-magazine' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	   
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        $facebook   = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '' ;
        $instagram  = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '' ;
        $twitter    = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '' ;
        $pinterest  = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '' ;
        $linkedin   = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '' ;
        $youtube    = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '' ;
        
        if( $facebook || $instagram || $twitter || $pinterest || $linkedin || $youtube ){ 
        echo $args['before_widget'];
        if($title )
        echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
        ?>
            <ul class="social-networks">
				<?php if( $facebook ){ ?>
                <li><a href="<?php echo esc_url( $facebook ); ?>" title="<?php esc_attr_e( 'Facebook', 'fluid-magazine' ); ?>" class="fa fa-facebook"></a></li>
				<?php } if( $instagram ){ ?>
                <li><a href="<?php echo esc_url( $instagram ); ?>" title="<?php esc_attr_e( 'Instagram', 'fluid-magazine' ); ?>" class="fa fa-instagram"></a></li>
                <?php } if( $twitter ){ ?>
                <li><a href="<?php echo esc_url( $twitter ); ?>" title="<?php esc_attr_e( 'Twitter', 'fluid-magazine' ); ?>" class="fa fa-twitter"></a></li>
				<?php } if( $pinterest ){ ?>
                <li><a href="<?php echo esc_url( $pinterest ); ?>"  title="<?php esc_attr_e( 'Pinterest', 'fluid-magazine' ); ?>" class="fa fa-pinterest-p"></a></li>
				<?php } if( $linkedin ){ ?>
                <li><a href="<?php echo esc_url( $linkedin ); ?>" title="<?php esc_attr_e( 'Linkedin', 'fluid-magazine' ); ?>" class="fa fa-linkedin"></a></li>
				<?php } if( $youtube ){ ?>
                <li><a href="<?php echo esc_url( $youtube ); ?>" title="<?php esc_attr_e( 'YouTube', 'fluid-magazine' ); ?>" class="fa fa-youtube"></a></li>
                <?php } ?>
			</ul>
        <?php
        echo $args['after_widget'];
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        $facebook   = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '' ;
        $instagram  = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '' ;
        $twitter    = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '' ;
        $pinterest  = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '' ;
        $linkedin   = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '' ;
        $youtube    = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '' ;
        
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'fluid-magazine' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook', 'fluid-magazine' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram', 'fluid-magazine' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
		</p>
                
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter', 'fluid-magazine' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest', 'fluid-magazine' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn', 'fluid-magazine' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'YouTube', 'fluid-magazine' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
        $instance = array();
		
        $instance['title']      = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) :'';
        $instance['facebook']   = ! empty( $new_instance['facebook'] ) ? esc_url_raw( $new_instance['facebook'] ) : '';
        $instance['instagram']  = ! empty( $new_instance['instagram'] ) ? esc_url_raw( $new_instance['instagram'] ) : '';
        $instance['twitter']    = ! empty( $new_instance['twitter'] ) ? esc_url_raw( $new_instance['twitter'] ) : '';
        $instance['pinterest']  = ! empty( $new_instance['pinterest'] ) ? esc_url_raw( $new_instance['pinterest'] ) : '';
        $instance['linkedin']   = ! empty( $new_instance['linkedin'] ) ? esc_url_raw( $new_instance['linkedin'] ) : '';
        $instance['youtube']    = ! empty( $new_instance['youtube'] ) ? esc_url_raw( $new_instance['youtube'] ) : '';
		
        return $instance;
                
	}

} // class Fluid_Magazine_Social_Links 
endif;