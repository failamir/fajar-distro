<div class="front_page_section front_page_section_blog<?php
	$trendion_scheme = trendion_get_theme_option( 'front_page_blog_scheme' );
	if ( ! empty( $trendion_scheme ) && ! trendion_is_inherit( $trendion_scheme ) ) {
		echo ' scheme_' . esc_attr( $trendion_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( trendion_get_theme_option( 'front_page_blog_paddings' ) );
	if ( trendion_get_theme_option( 'front_page_blog_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$trendion_css      = '';
		$trendion_bg_image = trendion_get_theme_option( 'front_page_blog_bg_image' );
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
	$trendion_anchor_icon = trendion_get_theme_option( 'front_page_blog_anchor_icon' );
	$trendion_anchor_text = trendion_get_theme_option( 'front_page_blog_anchor_text' );
if ( ( ! empty( $trendion_anchor_icon ) || ! empty( $trendion_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_blog"'
									. ( ! empty( $trendion_anchor_icon ) ? ' icon="' . esc_attr( $trendion_anchor_icon ) . '"' : '' )
									. ( ! empty( $trendion_anchor_text ) ? ' title="' . esc_attr( $trendion_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_blog_inner
	<?php
	if ( trendion_get_theme_option( 'front_page_blog_fullheight' ) ) {
		echo ' trendion-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$trendion_css      = '';
			$trendion_bg_mask  = trendion_get_theme_option( 'front_page_blog_bg_mask' );
			$trendion_bg_color_type = trendion_get_theme_option( 'front_page_blog_bg_color_type' );
			if ( 'custom' == $trendion_bg_color_type ) {
				$trendion_bg_color = trendion_get_theme_option( 'front_page_blog_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_blog_content_wrap content_wrap">
			<?php
			// Caption
			$trendion_caption = trendion_get_theme_option( 'front_page_blog_caption' );
			if ( ! empty( $trendion_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_blog_caption front_page_block_<?php echo ! empty( $trendion_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $trendion_caption, 'trendion_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$trendion_description = trendion_get_theme_option( 'front_page_blog_description' );
			if ( ! empty( $trendion_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_blog_description front_page_block_<?php echo ! empty( $trendion_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $trendion_description ), 'trendion_kses_content' ); ?></div>
				<?php
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_blog_output">
				<?php
				if ( is_active_sidebar( 'front_page_blog_widgets' ) ) {
					dynamic_sidebar( 'front_page_blog_widgets' );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					if ( ! trendion_exists_trx_addons() ) {
						trendion_customizer_need_trx_addons_message();
					} else {
						trendion_customizer_need_widgets_message( 'front_page_blog_caption', 'ThemeREX Addons - Blogger' );
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
