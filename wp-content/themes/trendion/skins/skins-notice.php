<?php
/**
 * The template to display Admin notices
 *
 * @package TRENDION
 * @since TRENDION 1.0.64
 */

$trendion_skins_url  = get_admin_url( null, 'admin.php?page=trx_addons_theme_panel#trx_addons_theme_panel_section_skins' );
$trendion_skins_args = get_query_var( 'trendion_skins_notice_args' );
?>
<div class="trendion_admin_notice trendion_skins_notice notice notice-info is-dismissible" data-notice="skins">
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
		<?php esc_html_e( 'New skins available', 'trendion' ); ?>
	</h3>
	<?php

	// Description
	$trendion_total      = $trendion_skins_args['update'];	// Store value to the separate variable to avoid warnings from ThemeCheck plugin!
	$trendion_skins_msg  = $trendion_total > 0
							// Translators: Add new skins number
							? '<strong>' . sprintf( _n( '%d new version', '%d new versions', $trendion_total, 'trendion' ), $trendion_total ) . '</strong>'
							: '';
	$trendion_total      = $trendion_skins_args['free'];
	$trendion_skins_msg .= $trendion_total > 0
							? ( ! empty( $trendion_skins_msg ) ? ' ' . esc_html__( 'and', 'trendion' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d free skin', '%d free skins', $trendion_total, 'trendion' ), $trendion_total ) . '</strong>'
							: '';
	$trendion_total      = $trendion_skins_args['pay'];
	$trendion_skins_msg .= $trendion_skins_args['pay'] > 0
							? ( ! empty( $trendion_skins_msg ) ? ' ' . esc_html__( 'and', 'trendion' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d paid skin', '%d paid skins', $trendion_total, 'trendion' ), $trendion_total ) . '</strong>'
							: '';
	?>
	<div class="trendion_notice_text">
		<p>
			<?php
			// Translators: Add new skins info
			echo wp_kses_data( sprintf( __( "We are pleased to announce that %s are available for your theme", 'trendion' ), $trendion_skins_msg ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="trendion_notice_buttons">
		<?php
		// Link to the theme dashboard page
		?>
		<a href="<?php echo esc_url( $trendion_skins_url ); ?>" class="button button-primary"><i class="dashicons dashicons-update"></i> 
			<?php
			// Translators: Add theme name
			esc_html_e( 'Go to Skins manager', 'trendion' );
			?>
		</a>
	</div>
</div>
