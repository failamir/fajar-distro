<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

							do_action( 'trendion_action_page_content_end_text' );
							
							// Widgets area below the content
							trendion_create_widgets_area( 'widgets_below_content' );
						
							do_action( 'trendion_action_page_content_end' );
							?>
						</div>
						<?php
						
						do_action( 'trendion_action_after_page_content' );

						// Show main sidebar
						get_sidebar();

						do_action( 'trendion_action_content_wrap_end' );
						?>
					</div>
					<?php

					do_action( 'trendion_action_after_content_wrap' );

					// Widgets area below the page and related posts below the page
					$trendion_body_style = trendion_get_theme_option( 'body_style' );
					$trendion_widgets_name = trendion_get_theme_option( 'widgets_below_page' );
					$trendion_show_widgets = ! trendion_is_off( $trendion_widgets_name ) && is_active_sidebar( $trendion_widgets_name );
					$trendion_show_related = trendion_is_single() && trendion_get_theme_option( 'related_position' ) == 'below_page';
					if ( $trendion_show_widgets || $trendion_show_related ) {
						if ( 'fullscreen' != $trendion_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $trendion_show_related ) {
							do_action( 'trendion_action_related_posts' );
						}

						// Widgets area below page content
						if ( $trendion_show_widgets ) {
							trendion_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $trendion_body_style ) {
							?>
							</div>
							<?php
						}
					}
					do_action( 'trendion_action_page_content_wrap_end' );
					?>
			</div>
			<?php
			do_action( 'trendion_action_after_page_content_wrap' );

			// Don't display the footer elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ( ! trendion_is_singular( 'post' ) && ! trendion_is_singular( 'attachment' ) ) || ! in_array ( trendion_get_value_gp( 'action' ), array( 'full_post_loading', 'prev_post_loading' ) ) ) {
				
				// Skip link anchor to fast access to the footer from keyboard
				?>
				<a id="footer_skip_link_anchor" class="trendion_skip_link_anchor" href="#"></a>
				<?php

				do_action( 'trendion_action_before_footer' );

				// Footer
				$trendion_footer_type = trendion_get_theme_option( 'footer_type' );
				if ( 'custom' == $trendion_footer_type && ! trendion_is_layouts_available() ) {
					$trendion_footer_type = 'default';
				}
				get_template_part( apply_filters( 'trendion_filter_get_template_part', "templates/footer-" . sanitize_file_name( $trendion_footer_type ) ) );

				do_action( 'trendion_action_after_footer' );

			}
			?>

			<?php do_action( 'trendion_action_page_wrap_end' ); ?>

		</div>

		<?php do_action( 'trendion_action_after_page_wrap' ); ?>

	</div>

	<?php do_action( 'trendion_action_after_body' ); ?>

	<?php wp_footer(); ?>

</body>
</html>