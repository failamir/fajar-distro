<div class="front_page_section front_page_section_about<?php
	$trendion_scheme = trendion_get_theme_option( 'front_page_about_scheme' );
	if ( ! empty( $trendion_scheme ) && ! trendion_is_inherit( $trendion_scheme ) ) {
		echo ' scheme_' . esc_attr( $trendion_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( trendion_get_theme_option( 'front_page_about_paddings' ) );
	if ( trendion_get_theme_option( 'front_page_about_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$trendion_css      = '';
		$trendion_bg_image = trendion_get_theme_option( 'front_page_about_bg_image' );
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
	$trendion_anchor_icon = trendion_get_theme_option( 'front_page_about_anchor_icon' );
	$trendion_anchor_text = trendion_get_theme_option( 'front_page_about_anchor_text' );
if ( ( ! empty( $trendion_anchor_icon ) || ! empty( $trendion_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_about"'
									. ( ! empty( $trendion_anchor_icon ) ? ' icon="' . esc_attr( $trendion_anchor_icon ) . '"' : '' )
									. ( ! empty( $trendion_anchor_text ) ? ' title="' . esc_attr( $trendion_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_about_inner
	<?php
	if ( trendion_get_theme_option( 'front_page_about_fullheight' ) ) {
		echo ' trendion-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$trendion_css           = '';
			$trendion_bg_mask       = trendion_get_theme_option( 'front_page_about_bg_mask' );
			$trendion_bg_color_type = trendion_get_theme_option( 'front_page_about_bg_color_type' );
			if ( 'custom' == $trendion_bg_color_type ) {
				$trendion_bg_color = trendion_get_theme_option( 'front_page_about_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_about_content_wrap content_wrap">
			<?php
			// Caption
			$trendion_caption = trendion_get_theme_option( 'front_page_about_caption' );
			if ( ! empty( $trendion_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_about_caption front_page_block_<?php echo ! empty( $trendion_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $trendion_caption, 'trendion_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$trendion_description = trendion_get_theme_option( 'front_page_about_description' );
			if ( ! empty( $trendion_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_about_description front_page_block_<?php echo ! empty( $trendion_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $trendion_description ), 'trendion_kses_content' ); ?></div>
				<?php
			}

			// Content
			$trendion_content = trendion_get_theme_option( 'front_page_about_content' );
			if ( ! empty( $trendion_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_content front_page_section_about_content front_page_block_<?php echo ! empty( $trendion_content ) ? 'filled' : 'empty'; ?>">
					<?php
					$trendion_page_content_mask = '%%CONTENT%%';
					if ( strpos( $trendion_content, $trendion_page_content_mask ) !== false ) {
						$trendion_content = preg_replace(
							'/(\<p\>\s*)?' . $trendion_page_content_mask . '(\s*\<\/p\>)/i',
							sprintf(
								'<div class="front_page_section_about_source">%s</div>',
								apply_filters( 'the_content', get_the_content() )
							),
							$trendion_content
						);
					}
					trendion_show_layout( $trendion_content );
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
