<?php
/**
 * The template for displaying all pages.
 *
 * @package Neve
 * @since   1.0.0
 * 
 * 
 * template name: accueil
 */
$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-page' );

get_header();

?>
 <?php echo do_shortcode("[hfe_template id='996']"); ?>
<div class="<?php echo esc_attr( $container_class ); ?> single-page-container">
	<div class="row">
		
		<div class="nv-single-page-wrap col">
			<?php
			do_action( 'neve_page_header', 'single-page' );
			do_action( 'neve_before_content', 'single-page' );
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', 'page' );
				}
			} else {
				get_template_part( 'template-parts/content', 'none' );
			}
			do_action( 'neve_after_content', 'single-page' );
			?>
		</div>
		
	</div>
</div>

			
<?php get_footer(); ?>
