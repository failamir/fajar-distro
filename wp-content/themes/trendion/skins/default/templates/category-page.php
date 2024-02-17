<?php
/**
 * The template to display the category's image, description on the Category page
 *
 * @package TRENDION
 * @since TRENDION 1.71.0
 */
?>

<div class="category_page category"><?php
	
	$trendion_cat = get_queried_object();
	$trendion_cat_img = trendion_get_term_image_small($trendion_cat->term_id, $trendion_cat->taxonomy);
	$trendion_cat_icon = '';
	if ( empty($trendion_cat_img) && function_exists('trx_addons_get_term_icon') ) {
		$trendion_cat_icon = trx_addons_get_term_icon($trendion_cat->term_id, $trendion_cat->taxonomy);
		if ( empty($trendion_cat_icon) || trendion_is_off($trendion_cat_icon) ) {
			$trendion_cat_img = trendion_get_term_image($trendion_cat->term_id, $trendion_cat->taxonomy);
		}
	}
	?><div class="category_image"><?php
		if ( !empty($trendion_cat_icon) && !trendion_is_off($trendion_cat_icon) ) {
			?><span class="category_icon <?php echo esc_attr($trendion_cat_icon); ?>"></span><?php
		} else {
			$src = empty($trendion_cat_img)
						? trendion_get_no_image() 
						: trendion_add_thumb_size( $trendion_cat_img, trendion_get_thumb_size('masonry') );
			if ( $src ) {				
				$attr = trendion_getimagesize($src);
				?><img src="<?php echo esc_url($src); ?>" <?php if (!empty($attr[3])) trendion_show_layout($attr[3]); ?> alt="<?php esc_attr_e('Category image', 'trendion'); ?>"><?php
			}
		}
	?></div><!-- .category_image -->

	<h4 class="category_title"><span class="fn"><?php echo esc_html($trendion_cat->name); ?></span></h4>

	<?php
	$trendion_cat_desc = $trendion_cat->description;
	if ( ! empty( $trendion_cat_desc ) ) {
		?>
		<div class="category_desc"><?php echo wp_kses( wpautop( $trendion_cat_desc ), 'trendion_kses_content' ); ?></div>
		<?php
	}
	?>

</div><!-- .category_page -->
