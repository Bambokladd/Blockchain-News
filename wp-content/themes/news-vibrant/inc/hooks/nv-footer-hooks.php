<?php
/**
 * Custom hooks functions are define about footer section.
 *
 * @package CodeVibrant
 * @subpackage News Vibrant
 * @since 1.0.0
 */

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Footer start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'news_vibrant_footer_start' ) ) :
	function news_vibrant_footer_start() {
		echo '<footer id="colophon" class="site-footer" role="contentinfo">';
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Footer widget section
 *
 * @since 1.0.0
 */
if( ! function_exists( 'news_vibrant_footer_widget_section' ) ) :
	function news_vibrant_footer_widget_section() {
		get_sidebar( 'footer' );
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Bottom footer start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'news_vibrant_bottom_footer_start' ) ) :
	function news_vibrant_bottom_footer_start() {
		echo '<div class="bottom-footer nv-clearfix">';
		echo '<div class="cv-container">';
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Bottom footer side info
 *
 * @since 1.0.0
 */
if( ! function_exists( 'news_vibrant_footer_site_info_section' ) ) :
	function news_vibrant_footer_site_info_section() {
?>
		<div class="site-info">
			<span class="nv-copyright-text">
				<?php 
					$news_vibrant_copyright_text = get_theme_mod( 'news_vibrant_copyright_text', __( 'news-vibrant', 'news-vibrant' ) );
					echo esc_html( $news_vibrant_copyright_text );
				?>
			</span>
			<span class="sep"> | </span>
			<?php
				$news_vibrant_author_url = 'http://codevibrant.com/';
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'news-vibrant' ), 'news-vibrant', '<a href="'. esc_url( $news_vibrant_author_url ).'" rel="designer" target="_blank">CodeVibrant</a>' );
			?>
		</div><!-- .site-info -->
<?php
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Bottom footer menu
 *
 * @since 1.0.0
 */
if( ! function_exists( 'news_vibrant_footer_menu_section' ) ) :
	function news_vibrant_footer_menu_section() {
?>
		<nav id="footer-navigation" class="footer-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'news_vibrant_footer_menu', 'menu_id' => 'footer-menu' ) );
			?>
		</nav><!-- #site-navigation -->
<?php
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Bottom footer end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'news_vibrant_bottom_footer_end' ) ) :
	function news_vibrant_bottom_footer_end() {
		echo '</div><!-- .cv-container -->';
		echo '</div> <!-- bottom-footer -->';
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Footer end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'news_vibrant_footer_end' ) ) :
	function news_vibrant_footer_end() {
		echo '</footer><!-- #colophon -->';
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Go to Top Icon
 *
 * @since 1.0.0
 */

if( ! function_exists( 'news_vibrant_go_top' ) ) :
	function news_vibrant_go_top() {
		echo '<div id="nv-scrollup" class="animated arrow-hide"><i class="fa fa-chevron-up"></i></div>';
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed functions for footer hook
 *
 * @since 1.0.0
 */
add_action( 'news_vibrant_footer', 'news_vibrant_footer_start', 5 );
add_action( 'news_vibrant_footer', 'news_vibrant_footer_widget_section', 10 );
add_action( 'news_vibrant_footer', 'news_vibrant_bottom_footer_start', 15 );
add_action( 'news_vibrant_footer', 'news_vibrant_footer_site_info_section', 20 );
add_action( 'news_vibrant_footer', 'news_vibrant_footer_menu_section', 25 );
add_action( 'news_vibrant_footer', 'news_vibrant_bottom_footer_end', 30 );
add_action( 'news_vibrant_footer', 'news_vibrant_footer_end', 35 );
add_action( 'news_vibrant_footer', 'news_vibrant_go_top', 40 );