<?php
/**
 * CV: Slider
 *
 * Widget to display posts from selected categories in slider section.
 *
 * @package News Vibrant
 * @subpackage News Vibrant Blog
 * @since 1.0.0
 */

class News_Vibrant_Blog_Slider extends WP_widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'news_vibrant_blog_slider',
            'description' => esc_html__( 'Displays posts from selected categories in slider section.', 'news-vibrant-blog' )
        );
        parent::__construct( 'news_vibrant_blog_slider', esc_html__( 'CV: Slider', 'news-vibrant-blog' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        $news_vibrant_categories_lists = news_vibrant_categories_lists();

        $fields = array(

            'slider_cat_slugs' => array(
                'news_vibrant_widgets_name'         => 'slider_cat_slugs',
                'news_vibrant_widgets_title'        => esc_html__( 'Slider Categories', 'news-vibrant-blog' ),
                'news_vibrant_widgets_field_type'   => 'multicheckboxes',
                'news_vibrant_widgets_field_options' => $news_vibrant_categories_lists
            ),

            'slide_count' => array(
                'news_vibrant_widgets_name'         => 'slide_count',
                'news_vibrant_widgets_title'        => esc_html__( 'No. of. Slide', 'news-vibrant-blog' ),
                'news_vibrant_widgets_default'      => 5,
                'news_vibrant_widgets_min_value'    => 2,
                'news_vibrant_widgets_max_value'    => 10,
                'news_vibrant_widgets_step_value'   => 1,
                'news_vibrant_widgets_field_type'   => 'range'
            )
        );
        return $fields;
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
        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }

        $nv_slider_cat_slugs  = empty( $instance['slider_cat_slugs'] ) ? '' : $instance['slider_cat_slugs'];
        $nv_slide_count       = empty( $instance['slide_count'] ) ? 5 : $instance['slide_count'];

        echo $before_widget;
    ?>
    	<div class="nv-slider-wrapper nv-clearfix">
    		<?php                
                if( !empty( $nv_slider_cat_slugs ) ) {
                    $checked_cats = array();
                    foreach( $nv_slider_cat_slugs as $cat_key => $cat_value ){
                        $checked_cats[] = $cat_key;
                    }
                    $get_cats_slugs = implode( ",", $checked_cats );
                    $nv_slider_args = array(
                        'post_type'      => 'post',
                        'category_name'  => esc_attr( $get_cats_slugs ),
                        'posts_per_page' => absint( $nv_slide_count )
                    );
                }
                
                
                
                $nv_slider_query = new WP_Query( $nv_slider_args );
                if( $nv_slider_query->have_posts() ) {
                    echo '<ul class="nvSlider cS-hidden">';
                    while( $nv_slider_query->have_posts() ) {
                        $nv_slider_query->the_post();
                        if( has_post_thumbnail() ) {
            ?>
                            <li>
                                <div class="nv-single-slide-wrap">
                                    <div class="nv-slide-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( 'full' ); ?>
                                        </a>
                                    </div><!-- .nv-slide-thumb -->
                                    <div class="nv-slide-content-wrap">
                                        <h3 class="post-title large-size"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="post-content"><?php the_excerpt(); ?></div>
                                      <a class="post-btn" href="<?php the_permalink(); ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    </div> <!-- nv-slide-content-wrap -->
                                </div><!-- .single-slide-wrap -->
                            </li>
            <?php
                        }
                    }
                    echo '</ul>';
                }
                wp_reset_postdata();
    		?>
    	</div><!--- .nv-block-wrapper -->
    <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    news_vibrant_widgets_updated_field_value()     defined in nv-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$news_vibrant_widgets_name] = news_vibrant_widgets_updated_field_value( $widget_field, $new_instance[$news_vibrant_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    news_vibrant_widgets_show_widget_field()       defined in nv-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $news_vibrant_widgets_field_value = !empty( $instance[$news_vibrant_widgets_name] ) ? wp_kses_post( $instance[$news_vibrant_widgets_name] ) : '';
            news_vibrant_widgets_show_widget_field( $this, $widget_field, $news_vibrant_widgets_field_value );
        }
    }

}