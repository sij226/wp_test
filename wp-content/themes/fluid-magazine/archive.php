<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid_Magazine
 */

$featured_ed = get_theme_mod( 'fluid_magazine_ed_featured_archive');

$fluid_magazine_counter_pos = 0;
$fluid_magazine_stat_counterpos = 0;
get_header(); ?>

		<?php
		if ( have_posts() ) : ?>

			<?php

			/* Start the Loop */

			while ( have_posts() ) : the_post();
				
				
				if($fluid_magazine_counter_pos % 4 == 0){
					$fluid_magazine_stat_counterpos++;	
				}

				if($fluid_magazine_counter_pos == 0){
					echo '<div class="featured-post"><div class="grid-sizer"></div>';
				}

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				if($fluid_magazine_counter_pos == 8){
					echo '</div>';
					echo '<div id="content" class="site-content">';
					echo '<div id="primary" class="content-area">';
                    /**
                     * Page Header
                     * 
                     * @see fluid_magazine_pg_header - 30
                    */
					do_action( 'fluid_magazine_page_header');
					
				}

				if( $fluid_magazine_counter_pos<8 ){
					get_template_part( 'template-parts/content-featured', get_post_format() );
				}	
				
				else{
					echo '<div class="category-list">';
						get_template_part( 'template-parts/content-archive', get_post_format() );
					echo '</div>';
				}


				$fluid_magazine_counter_pos++;


			endwhile;

			

		else :
				echo '<div id="content" class="site-content">';
                echo '<div id="primary" class="content-area">';
					/**
                     * Page Header
                     * 
                     * @see fluid_magazine_pg_header - 30
                    */
					do_action( 'fluid_magazine_page_header');
				echo '<div class="category-list">';
					get_template_part( 'template-parts/content', 'none' );
				echo '</div>';
		endif;

		echo '<div class="category-list">';
		fluid_magazine_pagination();
		echo '</div>';
		
		 ?>
		
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
