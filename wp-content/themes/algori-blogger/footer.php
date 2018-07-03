<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Algori_Blogger
 */

?>

	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer black-wrapper">
		<div class="site-info">
			
			<div class="sub-footer">
			  <div class="container">
			  <?php
				if (has_nav_menu('menu-2')) {
						wp_nav_menu( array(
							'theme_location' => 'menu-2',
							'menu_class' => 'footer-menu pull-left',
							'menu_id'        => 'footer-menu',
						) );
					}
			  ?>
				<p class="pull-right">
					<?php
						/* translators: %s: Proudly powered by . */
						printf( esc_html__( ' %s', 'algori-blogger' ), 'Created by "Bambokladd" using: |' );
					?>
					
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'algori-blogger' ) ); ?>"><u><?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( ' %s', 'algori-blogger' ), 'WordPress' );
						//printf ( esc_html_e( 'WordPress', 'algori-blogger' ) )
					?></u></a>
					
					<span class="sep"> | </span>
					
				</p>
			  </div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
	
	
	
	</div><!-- body-wrapper --> 
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
