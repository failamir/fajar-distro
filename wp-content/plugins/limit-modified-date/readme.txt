=== Limit Modified Date ===
Contributors: billerickson
Tags: date, time, formatting
Requires at least: 4.3
Tested up to: 5.5
Stable tag: 1.0.0

Prevent the "modified date" from changing when making minor changes to your content.

== Description ==

**Warning** This plugin is no longer supported, and does not always work with the Gutenberg block editor.

I recommend using [Change Last Modified Date](https://wordpress.org/plugins/change-last-modified-date/) instead.

= Summary =

Prevent the *modified date* from changing when making minor changes to your content.

This plugin adds a checkbox to the Publish box, "Don't update the modified date".  When checked, saving your post does not update the post modified date.

Minor changes like adding tags or fixing typos won't bump the modified date.

This plugin will *maintain* the previous modified date. It **does not** let you specify a custom modified date.

When you're ready to publish a major content change, you can uncheck this setting before saving the post.

= Customization =

Your theme will need to use `get_the_modified_date()` to display the modified date.

This plugin only applies to the `post` post type by default. You can customize which post types it appears on using the `limit_modified_date_post_types` filter.

`
add_filter( 'limit_modified_date_post_types', function( $post_types ) {
	$post_types[] = 'page';
	return  $post_types;
});
`

== Installation ==

1. Upload `limit-modified-date` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the *Plugins* menu in WordPress.
1. When editing a post, check "Don't update the modified date" and save your post.

== Screenshots ==

1. Published and modified date shown in theme
2. Checkbox in post editor

== Changelog ==

**Version 1.0.0**
* Initial release
