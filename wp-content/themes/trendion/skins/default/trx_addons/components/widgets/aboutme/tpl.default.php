<?php
/**
 * The style "default" of the Widget "About Me"
 *
 * @package ThemeREX Addons
 * @since v1.6.10
 */

$args = get_query_var('trx_addons_args_widget_aboutme');
extract($args);
		
// Before widget (defined by themes)
trx_addons_show_layout($before_widget);
			
// Widget title if one was input (before and after defined by themes)
trx_addons_show_layout($title, $before_title, $after_title);
	
// Widget body
?><div class="sc_aboutme type_<?php echo esc_attr($args['type']); ?>"><?php
if (!empty($avatar) && $avatar!='#') {
	?><div class="aboutme_avatar"><?php trx_addons_show_layout($avatar); ?></div><?php
}
if (!empty($username) && $username!='#') {
	?><h5 class="aboutme_username"><?php echo esc_html($username); ?></h5><?php
}
if (!empty($description) && $description!='#') {
	?><div class="aboutme_description"><?php echo trim($description); ?></div>
	<?php
}
?></div><?php
	
// After widget (defined by themes)
trx_addons_show_layout($after_widget);
