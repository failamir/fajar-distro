<div class="front_page_section front_page_section_contacts<?php
	$trendion_scheme = trendion_get_theme_option( 'front_page_contacts_scheme' );
	if ( ! empty( $trendion_scheme ) && ! trendion_is_inherit( $trendion_scheme ) ) {
		echo ' scheme_' . esc_attr( $trendion_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( trendion_get_theme_option( 'front_page_contacts_paddings' ) );
	if ( trendion_get_theme_option( 'front_page_contacts_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$trendion_css      = '';
		$trendion_bg_image = trendion_get_theme_option( 'front_page_contacts_bg_image' );
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
	$trendion_anchor_icon = trendion_get_theme_option( 'front_page_contacts_anchor_icon' );
	$trendion_anchor_text = trendion_get_theme_option( 'front_page_contacts_anchor_text' );
if ( ( ! empty( $trendion_anchor_icon ) || ! empty( $trendion_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_contacts"'
									. ( ! empty( $trendion_anchor_icon ) ? ' icon="' . esc_attr( $trendion_anchor_icon ) . '"' : '' )
									. ( ! empty( $trendion_anchor_text ) ? ' title="' . esc_attr( $trendion_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_contacts_inner
	<?php
	if ( trendion_get_theme_option( 'front_page_contacts_fullheight' ) ) {
		echo ' trendion-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$trendion_css      = '';
			$trendion_bg_mask  = trendion_get_theme_option( 'front_page_contacts_bg_mask' );
			$trendion_bg_color_type = trendion_get_theme_option( 'front_page_contacts_bg_color_type' );
			if ( 'custom' == $trendion_bg_color_type ) {
				$trendion_bg_color = trendion_get_theme_option( 'front_page_contacts_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_contacts_content_wrap content_wrap">
			<?php

			// Title and description
			$trendion_caption     = trendion_get_theme_option( 'front_page_contacts_caption' );
			$trendion_description = trendion_get_theme_option( 'front_page_contacts_description' );
			if ( ! empty( $trendion_caption ) || ! empty( $trendion_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $trendion_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_contacts_caption front_page_block_<?php echo ! empty( $trendion_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( $trendion_caption, 'trendion_kses_content' );
					?>
					</h2>
					<?php
				}

				// Description
				if ( ! empty( $trendion_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_contacts_description front_page_block_<?php echo ! empty( $trendion_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( wpautop( $trendion_description ), 'trendion_kses_content' );
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$trendion_content = trendion_get_theme_option( 'front_page_contacts_content' );
			$trendion_layout  = trendion_get_theme_option( 'front_page_contacts_layout' );
			if ( 'columns' == $trendion_layout && ( ! empty( $trendion_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_columns front_page_section_contacts_columns columns_wrap">
					<div class="column-1_3">
				<?php
			}

			if ( ( ! empty( $trendion_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_content front_page_section_contacts_content front_page_block_<?php echo ! empty( $trendion_content ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $trendion_content, 'trendion_kses_content' );
					?>
				</div>
				<?php
			}

			if ( 'columns' == $trendion_layout && ( ! empty( $trendion_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div><div class="column-2_3">
				<?php
			}

			// Shortcode output
			$trendion_sc = trendion_get_theme_option( 'front_page_contacts_shortcode' );
			if ( ! empty( $trendion_sc ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_output front_page_section_contacts_output front_page_block_<?php echo ! empty( $trendion_sc ) ? 'filled' : 'empty'; ?>">
					<?php
					trendion_show_layout( do_shortcode( $trendion_sc ) );
					?>
				</div>
				<?php
			}

			if ( 'columns' == $trendion_layout && ( ! empty( $trendion_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>

		</div>
	</div>
</div>
