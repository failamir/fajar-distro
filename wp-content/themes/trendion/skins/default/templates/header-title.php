<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

// Page (category, tag, archive, author) title

if ( trendion_need_page_title() ) {
	trendion_sc_layouts_showed( 'title', true );
	trendion_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								trendion_show_post_meta(
									apply_filters(
										'trendion_filter_post_meta_args', array(
											'components' => join( ',', trendion_array_get_keys_by_value( trendion_get_theme_option( 'meta_parts' ) ) ),
											'counters'   => join( ',', trendion_array_get_keys_by_value( trendion_get_theme_option( 'counters' ) ) ),
											'seo'        => trendion_is_on( trendion_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$trendion_blog_title           = trendion_get_blog_title();
							$trendion_blog_title_text      = '';
							$trendion_blog_title_class     = '';
							$trendion_blog_title_link      = '';
							$trendion_blog_title_link_text = '';
							if ( is_array( $trendion_blog_title ) ) {
								$trendion_blog_title_text      = $trendion_blog_title['text'];
								$trendion_blog_title_class     = ! empty( $trendion_blog_title['class'] ) ? ' ' . $trendion_blog_title['class'] : '';
								$trendion_blog_title_link      = ! empty( $trendion_blog_title['link'] ) ? $trendion_blog_title['link'] : '';
								$trendion_blog_title_link_text = ! empty( $trendion_blog_title['link_text'] ) ? $trendion_blog_title['link_text'] : '';
							} else {
								$trendion_blog_title_text = $trendion_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $trendion_blog_title_class ); ?>">
								<?php
								$trendion_top_icon = trendion_get_term_image_small();
								if ( ! empty( $trendion_top_icon ) ) {
									$trendion_attr = trendion_getimagesize( $trendion_top_icon );
									?>
									<img src="<?php echo esc_url( $trendion_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'trendion' ); ?>"
										<?php
										if ( ! empty( $trendion_attr[3] ) ) {
											trendion_show_layout( $trendion_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_data( $trendion_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $trendion_blog_title_link ) && ! empty( $trendion_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $trendion_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $trendion_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( ! is_paged() && ( is_category() || is_tag() || is_tax() ) ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						ob_start();
						do_action( 'trendion_action_breadcrumbs' );
						$trendion_breadcrumbs = ob_get_contents();
						ob_end_clean();
						trendion_show_layout( $trendion_breadcrumbs, '<div class="sc_layouts_title_breadcrumbs">', '</div>' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
