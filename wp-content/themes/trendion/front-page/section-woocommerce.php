<?php
$trendion_woocommerce_sc = trendion_get_theme_option( 'front_page_woocommerce_products' );
if ( ! empty( $trendion_woocommerce_sc ) ) {
	?><div class="front_page_section front_page_section_woocommerce<?php
		$trendion_scheme = trendion_get_theme_option( 'front_page_woocommerce_scheme' );
		if ( ! empty( $trendion_scheme ) && ! trendion_is_inherit( $trendion_scheme ) ) {
			echo ' scheme_' . esc_attr( $trendion_scheme );
		}
		echo ' front_page_section_paddings_' . esc_attr( trendion_get_theme_option( 'front_page_woocommerce_paddings' ) );
		if ( trendion_get_theme_option( 'front_page_woocommerce_stack' ) ) {
			echo ' sc_stack_section_on';
		}
	?>"
			<?php
			$trendion_css      = '';
			$trendion_bg_image = trendion_get_theme_option( 'front_page_woocommerce_bg_image' );
			if ( ! empty( $trendion_bg_image ) ) {
				$trendion_css .= 'background-image: url(' . esc_url( trendion_get_attachment_url( $trendion_bg_image ) ) . ');';
			}
			if ( ! empty( $trendion_css ) ) {
				echo ' style="' . esc_attr( $trendion_css ) . '"';
			}
			?>
	>
	<?php
		// Add anchor
		$trendion_anchor_icon = trendion_get_theme_option( 'front_page_woocommerce_anchor_icon' );
		$trendion_anchor_text = trendion_get_theme_option( 'front_page_woocommerce_anchor_text' );
		if ( ( ! empty( $trendion_anchor_icon ) || ! empty( $trendion_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
			echo do_shortcode(
				'[trx_sc_anchor id="front_page_section_woocommerce"'
											. ( ! empty( $trendion_anchor_icon ) ? ' icon="' . esc_attr( $trendion_anchor_icon ) . '"' : '' )
											. ( ! empty( $trendion_anchor_text ) ? ' title="' . esc_attr( $trendion_anchor_text ) . '"' : '' )
											. ']'
			);
		}
	?>
		<div class="front_page_section_inner front_page_section_woocommerce_inner
			<?php
			if ( trendion_get_theme_option( 'front_page_woocommerce_fullheight' ) ) {
				echo ' trendion-full-height sc_layouts_flex sc_layouts_columns_middle';
			}
			?>
				"
				<?php
				$trendion_css      = '';
				$trendion_bg_mask  = trendion_get_theme_option( 'front_page_woocommerce_bg_mask' );
				$trendion_bg_color_type = trendion_get_theme_option( 'front_page_woocommerce_bg_color_type' );
				if ( 'custom' == $trendion_bg_color_type ) {
					$trendion_bg_color = trendion_get_theme_option( 'front_page_woocommerce_bg_color' );
				} elseif ( 'scheme_bg_color' == $trendion_bg_color_type ) {
					$trendion_bg_color = trendion_get_scheme_color( 'bg_color', $trendion_scheme );
				} else {
					$trendion_bg_color = '';
				}
				if ( ! empty( $trendion_bg_color ) && $trendion_bg_mask > 0 ) {
					$trendion_css .= 'background-color: ' . esc_attr(
						1 == $trendion_bg_mask ? $trendion_bg_color : trendion_hex2rgba( $trendion_bg_color, $trendion_bg_mask )
					) . ';';
				}
				if ( ! empty( $trendion_css ) ) {
					echo ' style="' . esc_attr( $trendion_css ) . '"';
				}
				?>
		>
			<div class="front_page_section_content_wrap front_page_section_woocommerce_content_wrap content_wrap woocommerce">
				<?php
				// Content wrap with title and description
				$trendion_caption     = trendion_get_theme_option( 'front_page_woocommerce_caption' );
				$trendion_description = trendion_get_theme_option( 'front_page_woocommerce_description' );
				if ( ! empty( $trendion_caption ) || ! empty( $trendion_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					// Caption
					if ( ! empty( $trendion_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
						?>
						<h2 class="front_page_section_caption front_page_section_woocommerce_caption front_page_block_<?php echo ! empty( $trendion_caption ) ? 'filled' : 'empty'; ?>">
						<?php
							echo wp_kses( $trendion_caption, 'trendion_kses_content' );
						?>
						</h2>
						<?php
					}

					// Description (text)
					if ( ! empty( $trendion_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
						?>
						<div class="front_page_section_description front_page_section_woocommerce_description front_page_block_<?php echo ! empty( $trendion_description ) ? 'filled' : 'empty'; ?>">
						<?php
							echo wp_kses( wpautop( $trendion_description ), 'trendion_kses_content' );
						?>
						</div>
						<?php
					}
				}

				// Content (widgets)
				?>
				<div class="front_page_section_output front_page_section_woocommerce_output list_products shop_mode_thumbs">
					<?php
					if ( 'products' == $trendion_woocommerce_sc ) {
						$trendion_woocommerce_sc_ids      = trendion_get_theme_option( 'front_page_woocommerce_products_per_page' );
						$trendion_woocommerce_sc_per_page = count( explode( ',', $trendion_woocommerce_sc_ids ) );
					} else {
						$trendion_woocommerce_sc_per_page = max( 1, (int) trendion_get_theme_option( 'front_page_woocommerce_products_per_page' ) );
					}
					$trendion_woocommerce_sc_columns = max( 1, min( $trendion_woocommerce_sc_per_page, (int) trendion_get_theme_option( 'front_page_woocommerce_products_columns' ) ) );
					echo do_shortcode(
						"[{$trendion_woocommerce_sc}"
										. ( 'products' == $trendion_woocommerce_sc
												? ' ids="' . esc_attr( $trendion_woocommerce_sc_ids ) . '"'
												: '' )
										. ( 'product_category' == $trendion_woocommerce_sc
												? ' category="' . esc_attr( trendion_get_theme_option( 'front_page_woocommerce_products_categories' ) ) . '"'
												: '' )
										. ( 'best_selling_products' != $trendion_woocommerce_sc
												? ' orderby="' . esc_attr( trendion_get_theme_option( 'front_page_woocommerce_products_orderby' ) ) . '"'
													. ' order="' . esc_attr( trendion_get_theme_option( 'front_page_woocommerce_products_order' ) ) . '"'
												: '' )
										. ' per_page="' . esc_attr( $trendion_woocommerce_sc_per_page ) . '"'
										. ' columns="' . esc_attr( $trendion_woocommerce_sc_columns ) . '"'
						. ']'
					);
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
