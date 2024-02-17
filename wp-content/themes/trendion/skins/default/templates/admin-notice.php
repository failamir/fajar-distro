<?php
/**
 * The template to display Admin notices
 *
 * @package TRENDION
 * @since TRENDION 1.0.1
 */

$trendion_theme_slug = get_option( 'template' );
$trendion_theme_obj  = wp_get_theme( $trendion_theme_slug );
?>
<div class="trendion_admin_notice trendion_welcome_notice notice notice-info is-dismissible" data-notice="admin">
	<?php
	// Theme image
	$trendion_theme_img = trendion_get_file_url( 'screenshot.jpg' );
	if ( '' != $trendion_theme_img ) {
		?>
		<div class="trendion_notice_image"><img src="<?php echo esc_url( $trendion_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'trendion' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="trendion_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'trendion' ),
				$trendion_theme_obj->get( 'Name' ) . ( TRENDION_THEME_FREE ? ' ' . __( 'Free', 'trendion' ) : '' ),
				$trendion_theme_obj->get( 'Version' )
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="trendion_notice_text">
		<p class="trendion_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $trendion_theme_obj->description ) );
			?>
		</p>
		<p class="trendion_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'trendion' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="trendion_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=trendion_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'trendion' );
			?>
		</a>
	</div>
</div>
