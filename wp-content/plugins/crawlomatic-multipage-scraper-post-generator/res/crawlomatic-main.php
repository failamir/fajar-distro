<?php
   function crawlomatic_admin_settings()
   {
   ?>
<div class="wp-header-end"></div>
<div class="wrap gs_popuptype_holder seo_pops">
   <div>
      <form id="myForm" method="post" action="<?php if(is_multisite() && is_network_admin()){echo '../options.php';}else{echo 'options.php';}?>">
         <div class="cr_autocomplete">
            <input type="password" id="PreventChromeAutocomplete" 
               name="PreventChromeAutocomplete" autocomplete="address-level4" />
         </div>
         <?php
            settings_fields('crawlomatic_option_group');
            do_settings_sections('crawlomatic_option_group');
            $crawlomatic_Main_Settings = get_option('crawlomatic_Main_Settings', false);
            if (isset($crawlomatic_Main_Settings['crawlomatic_enabled'])) {
                $crawlomatic_enabled = $crawlomatic_Main_Settings['crawlomatic_enabled'];
            } else {
                $crawlomatic_enabled = '';
            }
            if (isset($crawlomatic_Main_Settings['enable_metabox'])) {
                $enable_metabox = $crawlomatic_Main_Settings['enable_metabox'];
            } else {
                $enable_metabox = '';
            }
            if (isset($crawlomatic_Main_Settings['secret_word'])) {
                $secret_word = $crawlomatic_Main_Settings['secret_word'];
            } else {
                $secret_word = '';
            }
            if (isset($crawlomatic_Main_Settings['proxy_url'])) {
                $proxy_url = $crawlomatic_Main_Settings['proxy_url'];
            } else {
                $proxy_url = '';
            }
            if (isset($crawlomatic_Main_Settings['proxy_auth'])) {
                $proxy_auth = $crawlomatic_Main_Settings['proxy_auth'];
            } else {
                $proxy_auth = '';
            }
            if (isset($crawlomatic_Main_Settings['wordai_uniqueness'])) {
                $wordai_uniqueness = $crawlomatic_Main_Settings['wordai_uniqueness'];
            } else {
                $wordai_uniqueness = '';
            }
            if (isset($crawlomatic_Main_Settings['run_before'])) {
                $run_before = $crawlomatic_Main_Settings['run_before'];
            } else {
                $run_before = '';
            }
            if (isset($crawlomatic_Main_Settings['run_after'])) {
                $run_after = $crawlomatic_Main_Settings['run_after'];
            } else {
                $run_after = '';
            }
            if (isset($crawlomatic_Main_Settings['global_ban_words'])) {
                $global_ban_words = $crawlomatic_Main_Settings['global_ban_words'];
            } else {
                $global_ban_words = '';
            }
            if (isset($crawlomatic_Main_Settings['require_only_one'])) {
                $require_only_one = $crawlomatic_Main_Settings['require_only_one'];
            } else {
                $require_only_one = '';
            }
            if (isset($crawlomatic_Main_Settings['global_req_words'])) {
                $global_req_words = $crawlomatic_Main_Settings['global_req_words'];
            } else {
                $global_req_words = '';
            }
            if (isset($crawlomatic_Main_Settings['bing_auth'])) {
                $bing_auth = $crawlomatic_Main_Settings['bing_auth'];
            } else {
                $bing_auth = '';
            }
            if (isset($crawlomatic_Main_Settings['textrazor_key'])) {
                $textrazor_key = $crawlomatic_Main_Settings['textrazor_key'];
            } else {
                $textrazor_key = '';
            }
            if (isset($crawlomatic_Main_Settings['bing_region'])) {
                $bing_region = $crawlomatic_Main_Settings['bing_region'];
            } else {
                $bing_region = '';
            }
            if (isset($crawlomatic_Main_Settings['sentence_list'])) {
                $sentence_list = $crawlomatic_Main_Settings['sentence_list'];
            } else {
                $sentence_list = '';
            }
            if (isset($crawlomatic_Main_Settings['sentence_list2'])) {
                $sentence_list2 = $crawlomatic_Main_Settings['sentence_list2'];
            } else {
                $sentence_list2 = '';
            }
            if (isset($crawlomatic_Main_Settings['search_google'])) {
                $search_google = $crawlomatic_Main_Settings['search_google'];
            } else {
                $search_google = '';
            }
            if (isset($crawlomatic_Main_Settings['post_source_custom'])) {
                $post_source_custom = $crawlomatic_Main_Settings['post_source_custom'];
            } else {
                $post_source_custom = '';
            }
            if (isset($crawlomatic_Main_Settings['default_dl_ext'])) {
                $default_dl_ext = $crawlomatic_Main_Settings['default_dl_ext'];
            } else {
                $default_dl_ext = '';
            }
            if (isset($crawlomatic_Main_Settings['variable_list'])) {
                $variable_list = $crawlomatic_Main_Settings['variable_list'];
            } else {
                $variable_list = '';
            }
            if (isset($crawlomatic_Main_Settings['enable_detailed_logging'])) {
                $enable_detailed_logging = $crawlomatic_Main_Settings['enable_detailed_logging'];
            } else {
                $enable_detailed_logging = '';
            }
            if (isset($crawlomatic_Main_Settings['enable_logging'])) {
                $enable_logging = $crawlomatic_Main_Settings['enable_logging'];
            } else {
                $enable_logging = '';
            }
            if (isset($crawlomatic_Main_Settings['auto_clear_logs'])) {
                $auto_clear_logs = $crawlomatic_Main_Settings['auto_clear_logs'];
            } else {
                $auto_clear_logs = '';
            }
            if (isset($crawlomatic_Main_Settings['auto_update_posts'])) {
                $auto_update_posts = $crawlomatic_Main_Settings['auto_update_posts'];
            } else {
                $auto_update_posts = '';
            }
            if (isset($crawlomatic_Main_Settings['update_actions'])) {
                $update_actions = $crawlomatic_Main_Settings['update_actions'];
            } else {
                $update_actions = '';
            }
            if (isset($crawlomatic_Main_Settings['max_at_once'])) {
                $max_at_once = $crawlomatic_Main_Settings['max_at_once'];
            } else {
                $max_at_once = '';
            }
            if (isset($crawlomatic_Main_Settings['author_id'])) {
                $author_id = $crawlomatic_Main_Settings['author_id'];
            } else {
                $author_id = '';
            }
            if (isset($crawlomatic_Main_Settings['author_name'])) {
                $author_name = $crawlomatic_Main_Settings['author_name'];
            } else {
                $author_name = '';
            }
            if (isset($crawlomatic_Main_Settings['category_name'])) {
                $category_name = $crawlomatic_Main_Settings['category_name'];
            } else {
                $category_name = '';
            }
            if (isset($crawlomatic_Main_Settings['tag_name'])) {
                $tag_name = $crawlomatic_Main_Settings['tag_name'];
            } else {
                $tag_name = '';
            }
            if (isset($crawlomatic_Main_Settings['post_id'])) {
                $post_id = $crawlomatic_Main_Settings['post_id'];
            } else {
                $post_id = '';
            }
            if (isset($crawlomatic_Main_Settings['post_name'])) {
                $post_name = $crawlomatic_Main_Settings['post_name'];
            } else {
                $post_name = '';
            }
            if (isset($crawlomatic_Main_Settings['page_id'])) {
                $page_id = $crawlomatic_Main_Settings['page_id'];
            } else {
                $page_id = '';
            }
            if (isset($crawlomatic_Main_Settings['pagename'])) {
                $pagename = $crawlomatic_Main_Settings['pagename'];
            } else {
                $pagename = '';
            }
            if (isset($crawlomatic_Main_Settings['post_parent'])) {
                $post_parent = $crawlomatic_Main_Settings['post_parent'];
            } else {
                $post_parent = '';
            }
            if (isset($crawlomatic_Main_Settings['type_post'])) {
                $type_post = $crawlomatic_Main_Settings['type_post'];
            } else {
                $type_post = '';
            }
            if (isset($crawlomatic_Main_Settings['search_query'])) {
                $search_query = $crawlomatic_Main_Settings['search_query'];
            } else {
                $search_query = '';
            }
            if (isset($crawlomatic_Main_Settings['year'])) {
                $year = $crawlomatic_Main_Settings['year'];
            } else {
                $year = '';
            }
            if (isset($crawlomatic_Main_Settings['month'])) {
                $month = $crawlomatic_Main_Settings['month'];
            } else {
                $month = '';
            }
            if (isset($crawlomatic_Main_Settings['day'])) {
                $day = $crawlomatic_Main_Settings['day'];
            } else {
                $day = '';
            }
            if (isset($crawlomatic_Main_Settings['featured_image'])) {
                $featured_image = $crawlomatic_Main_Settings['featured_image'];
            } else {
                $featured_image = '';
            }
            if (isset($crawlomatic_Main_Settings['rule_timeout'])) {
                $rule_timeout = $crawlomatic_Main_Settings['rule_timeout'];
            } else {
                $rule_timeout = '';
            }
            if (isset($crawlomatic_Main_Settings['request_timeout'])) {
                $request_timeout = $crawlomatic_Main_Settings['request_timeout'];
            } else {
                $request_timeout = '';
            }
            if (isset($crawlomatic_Main_Settings['request_delay'])) {
                $request_delay = $crawlomatic_Main_Settings['request_delay'];
            } else {
                $request_delay = '';
            }
            if (isset($crawlomatic_Main_Settings['strip_links'])) {
                $strip_links = $crawlomatic_Main_Settings['strip_links'];
            } else {
                $strip_links = '';
            }
            if (isset($crawlomatic_Main_Settings['strip_content_links'])) {
                $strip_content_links = $crawlomatic_Main_Settings['strip_content_links'];
            } else {
                $strip_content_links = '';
            }
            if (isset($crawlomatic_Main_Settings['strip_internal_content_links'])) {
                $strip_internal_content_links = $crawlomatic_Main_Settings['strip_internal_content_links'];
            } else {
                $strip_internal_content_links = '';
            }
            if (isset($crawlomatic_Main_Settings['crawlomatic_timestamp'])) {
                $crawlomatic_timestamp = $crawlomatic_Main_Settings['crawlomatic_timestamp'];
            } else {
                $crawlomatic_timestamp = '';
            }if (isset($crawlomatic_Main_Settings['crawlomatic_post_img'])) {
                $crawlomatic_post_img = $crawlomatic_Main_Settings['crawlomatic_post_img'];
            } else {
                $crawlomatic_post_img = '';
            }if (isset($crawlomatic_Main_Settings['crawlomatic_extra_categories'])) {
                $crawlomatic_extra_categories = $crawlomatic_Main_Settings['crawlomatic_extra_categories'];
            } else {
                $crawlomatic_extra_categories = '';
            }if (isset($crawlomatic_Main_Settings['crawlomatic_extra_tags'])) {
                $crawlomatic_extra_tags = $crawlomatic_Main_Settings['crawlomatic_extra_tags'];
            } else {
                $crawlomatic_extra_tags = '';
            }if (isset($crawlomatic_Main_Settings['crawlomatic_item_title'])) {
                $crawlomatic_item_title = $crawlomatic_Main_Settings['crawlomatic_item_title'];
            } else {
                $crawlomatic_item_title = '';
            }if (isset($crawlomatic_Main_Settings['crawlomatic_comment_status'])) {
                $crawlomatic_comment_status = $crawlomatic_Main_Settings['crawlomatic_comment_status'];
            } else {
                $crawlomatic_comment_status = '';
            }if (isset($crawlomatic_Main_Settings['crawlomatic_enable_pingbacks'])) {
                $crawlomatic_enable_pingbacks = $crawlomatic_Main_Settings['crawlomatic_enable_pingbacks'];
            } else {
                $crawlomatic_enable_pingbacks = '';
            }if (isset($crawlomatic_Main_Settings['crawlomatic_post_date'])) {
                $crawlomatic_post_date = $crawlomatic_Main_Settings['crawlomatic_post_date'];
            } else {
                $crawlomatic_post_date = '';
            }
            if (isset($crawlomatic_Main_Settings['send_email'])) {
                $send_email = $crawlomatic_Main_Settings['send_email'];
            } else {
                $send_email = '';
            }
            if (isset($crawlomatic_Main_Settings['send_post_email'])) {
                $send_post_email = $crawlomatic_Main_Settings['send_post_email'];
            } else {
                $send_post_email = '';
            }
            if (isset($crawlomatic_Main_Settings['email_address'])) {
                $email_address = $crawlomatic_Main_Settings['email_address'];
            } else {
                $email_address = '';
            }
            if (isset($crawlomatic_Main_Settings['email_summary'])) {
                $email_summary = $crawlomatic_Main_Settings['email_summary'];
            } else {
                $email_summary = '';
            }
            if (isset($crawlomatic_Main_Settings['spin_text'])) {
                $spin_text = $crawlomatic_Main_Settings['spin_text'];
            } else {
                $spin_text = '';
            }
            if (isset($crawlomatic_Main_Settings['enable_robots'])) {
                $enable_robots = $crawlomatic_Main_Settings['enable_robots'];
            } else {
                $enable_robots = '';
            }
            if (isset($crawlomatic_Main_Settings['best_user'])) {
                $best_user = $crawlomatic_Main_Settings['best_user'];
            } else {
                $best_user = '';
            }
            if (isset($crawlomatic_Main_Settings['copy_images'])) {
                $copy_images = $crawlomatic_Main_Settings['copy_images'];
            } else {
                $copy_images = '';
            }
            if (isset($crawlomatic_Main_Settings['no_local_dup'])) {
                $no_local_dup = $crawlomatic_Main_Settings['no_local_dup'];
            } else {
                $no_local_dup = '';
            }
            if (isset($crawlomatic_Main_Settings['no_local_attach'])) {
                $no_local_attach = $crawlomatic_Main_Settings['no_local_attach'];
            } else {
                $no_local_attach = '';
            }
            if (isset($crawlomatic_Main_Settings['best_password'])) {
                $best_password = $crawlomatic_Main_Settings['best_password'];
            } else {
                $best_password = '';
            }
            if (isset($crawlomatic_Main_Settings['only_imported'])) {
                $only_imported = $crawlomatic_Main_Settings['only_imported'];
            } else {
                $only_imported = '';
            }
            if (isset($crawlomatic_Main_Settings['protected_terms'])) {
                $protected_terms = $crawlomatic_Main_Settings['protected_terms'];
            } else {
                $protected_terms = '';
            }
            if (isset($crawlomatic_Main_Settings['min_word_title'])) {
                $min_word_title = $crawlomatic_Main_Settings['min_word_title'];
            } else {
                $min_word_title = '';
            }
            if (isset($crawlomatic_Main_Settings['max_word_title'])) {
                $max_word_title = $crawlomatic_Main_Settings['max_word_title'];
            } else {
                $max_word_title = '';
            }
            if (isset($crawlomatic_Main_Settings['min_word_content'])) {
                $min_word_content = $crawlomatic_Main_Settings['min_word_content'];
            } else {
                $min_word_content = '';
            }
            if (isset($crawlomatic_Main_Settings['max_word_content'])) {
                $max_word_content = $crawlomatic_Main_Settings['max_word_content'];
            } else {
                $max_word_content = '';
            }
            if (isset($crawlomatic_Main_Settings['required_words'])) {
                $required_words = $crawlomatic_Main_Settings['required_words'];
            } else {
                $required_words = '';
            }
            if (isset($crawlomatic_Main_Settings['banned_words'])) {
                $banned_words = $crawlomatic_Main_Settings['banned_words'];
            } else {
                $banned_words = '';
            }
            if (isset($crawlomatic_Main_Settings['skip_old'])) {
                $skip_old = $crawlomatic_Main_Settings['skip_old'];
            } else {
                $skip_old = '';
            }
            if (isset($crawlomatic_Main_Settings['skip_day'])) {
                $skip_day = $crawlomatic_Main_Settings['skip_day'];
            } else {
                $skip_day = '';
            }
            if (isset($crawlomatic_Main_Settings['skip_month'])) {
                $skip_month = $crawlomatic_Main_Settings['skip_month'];
            } else {
                $skip_month = '';
            }
            if (isset($crawlomatic_Main_Settings['skip_year'])) {
                $skip_year = $crawlomatic_Main_Settings['skip_year'];
            } else {
                $skip_year = '';
            }
            if (isset($crawlomatic_Main_Settings['phantom_path'])) {
                $phantom_path = $crawlomatic_Main_Settings['phantom_path'];
            } else {
                $phantom_path = '';
            }
            if (isset($crawlomatic_Main_Settings['phantom_timeout'])) {
                $phantom_timeout = $crawlomatic_Main_Settings['phantom_timeout'];
            } else {
                $phantom_timeout = '';
            }
            if (isset($crawlomatic_Main_Settings['phantom_screen'])) {
                $phantom_screen = $crawlomatic_Main_Settings['phantom_screen'];
            } else {
                $phantom_screen = '';
            }
            if (isset($crawlomatic_Main_Settings['headless_screen'])) {
                $headless_screen = $crawlomatic_Main_Settings['headless_screen'];
            } else {
                $headless_screen = '';
            }
            if (isset($crawlomatic_Main_Settings['puppeteer_screen'])) {
                $puppeteer_screen = $crawlomatic_Main_Settings['puppeteer_screen'];
            } else {
                $puppeteer_screen = '';
            }
            if (isset($crawlomatic_Main_Settings['disable_fallback'])) {
                $disable_fallback = $crawlomatic_Main_Settings['disable_fallback'];
            } else {
                $disable_fallback = '';
            }
            if (isset($crawlomatic_Main_Settings['custom_html2'])) {
                $custom_html2 = $crawlomatic_Main_Settings['custom_html2'];
            } else {
                $custom_html2 = '';
            }
            if (isset($crawlomatic_Main_Settings['custom_html'])) {
                $custom_html = $crawlomatic_Main_Settings['custom_html'];
            } else {
                $custom_html = '';
            }
            if (isset($crawlomatic_Main_Settings['skip_no_img'])) {
                $skip_no_img = $crawlomatic_Main_Settings['skip_no_img'];
            } else {
                $skip_no_img = '';
            }
            if (isset($crawlomatic_Main_Settings['strip_by_id'])) {
                $strip_by_id = $crawlomatic_Main_Settings['strip_by_id'];
            } else {
                $strip_by_id = '';
            }
            if (isset($crawlomatic_Main_Settings['strip_by_class'])) {
                $strip_by_class = $crawlomatic_Main_Settings['strip_by_class'];
            } else {
                $strip_by_class = '';
            }
            if (isset($crawlomatic_Main_Settings['crawlomatic_featured_image_checking'])) {
                $crawlomatic_featured_image_checking = $crawlomatic_Main_Settings['crawlomatic_featured_image_checking'];
            } else {
                $crawlomatic_featured_image_checking = '';
            }
            if (isset($crawlomatic_Main_Settings['random_image_names'])) {
                $random_image_names = $crawlomatic_Main_Settings['random_image_names'];
            } else {
                $random_image_names = '';
            }
            if (isset($crawlomatic_Main_Settings['keep_srcset'])) {
                $keep_srcset = $crawlomatic_Main_Settings['keep_srcset'];
            } else {
                $keep_srcset = '';
            }
            if (isset($crawlomatic_Main_Settings['remove_img_content'])) {
                $remove_img_content = $crawlomatic_Main_Settings['remove_img_content'];
            } else {
                $remove_img_content = '';
            }
            if (isset($crawlomatic_Main_Settings['crawlomatic_clear_curl_charset'])) {
                $crawlomatic_clear_curl_charset = $crawlomatic_Main_Settings['crawlomatic_clear_curl_charset'];
            } else {
                $crawlomatic_clear_curl_charset = '';
            }
            if (isset($crawlomatic_Main_Settings['disable_excerpt'])) {
                $disable_excerpt = $crawlomatic_Main_Settings['disable_excerpt'];
            } else {
                $disable_excerpt = '';
            }
            if (isset($crawlomatic_Main_Settings['no_content_autodetect'])) {
                $no_content_autodetect = $crawlomatic_Main_Settings['no_content_autodetect'];
            } else {
                $no_content_autodetect = '';
            }
            if (isset($crawlomatic_Main_Settings['max_auto_links'])) {
                $max_auto_links = $crawlomatic_Main_Settings['max_auto_links'];
            } else {
                $max_auto_links = '';
            }
            if (isset($crawlomatic_Main_Settings['def_user'])) {
                $def_user = $crawlomatic_Main_Settings['def_user'];
            } else {
                $def_user = '';
            }
            if (isset($crawlomatic_Main_Settings['fix_html'])) {
                $fix_html = $crawlomatic_Main_Settings['fix_html'];
            } else {
                $fix_html = '';
            }
            if (isset($crawlomatic_Main_Settings['alt_read'])) {
                $alt_read = $crawlomatic_Main_Settings['alt_read'];
            } else {
                $alt_read = '';
            }
            if (isset($crawlomatic_Main_Settings['convert_cyrilic'])) {
                $convert_cyrilic = $crawlomatic_Main_Settings['convert_cyrilic'];
            } else {
                $convert_cyrilic = '';
            }
            if (isset($crawlomatic_Main_Settings['resize_height'])) {
                $resize_height = $crawlomatic_Main_Settings['resize_height'];
            } else {
                $resize_height = '';
            }
            if (isset($crawlomatic_Main_Settings['resize_width'])) {
                $resize_width = $crawlomatic_Main_Settings['resize_width'];
            } else {
                $resize_width = '';
            }
            if (isset($crawlomatic_Main_Settings['read_more_text'])) {
                $read_more_text = $crawlomatic_Main_Settings['read_more_text'];
            } else {
                $read_more_text = '';
            }
            if (isset($crawlomatic_Main_Settings['max_download'])) {
                $max_download = $crawlomatic_Main_Settings['max_download'];
            } else {
                $max_download = '';
            }
            if (isset($crawlomatic_Main_Settings['price_multiply'])) {
                $price_multiply = $crawlomatic_Main_Settings['price_multiply'];
            } else {
                $price_multiply = '';
            }
            if (isset($crawlomatic_Main_Settings['price_add'])) {
                $price_add = $crawlomatic_Main_Settings['price_add'];
            } else {
                $price_add = '';
            }
            if (isset($crawlomatic_Main_Settings['price_end'])) {
                $price_end = $crawlomatic_Main_Settings['price_end'];
            } else {
                $price_end = '';
            }
            if (isset($crawlomatic_Main_Settings['d_sep'])) {
                $d_sep = $crawlomatic_Main_Settings['d_sep'];
            } else {
                $d_sep = '';
            }
            if (isset($crawlomatic_Main_Settings['t_sep'])) {
                $t_sep = $crawlomatic_Main_Settings['t_sep'];
            } else {
                $t_sep = '';
            }
            if (isset($crawlomatic_Main_Settings['no_local_image'])) {
                $no_local_image = $crawlomatic_Main_Settings['no_local_image'];
            } else {
                $no_local_image = '';
            }
            if (isset($crawlomatic_Main_Settings['url_image'])) {
                $url_image = $crawlomatic_Main_Settings['url_image'];
            } else {
                $url_image = '';
            }
            if (isset($crawlomatic_Main_Settings['auto_delete_enabled'])) {
                $auto_delete_enabled = $crawlomatic_Main_Settings['auto_delete_enabled'];
            } else {
                $auto_delete_enabled = '';
            }
            if (isset($crawlomatic_Main_Settings['disable_backend_content'])) {
                $disable_backend_content = $crawlomatic_Main_Settings['disable_backend_content'];
            } else {
                $disable_backend_content = '';
            }
            if (isset($crawlomatic_Main_Settings['no_valid_link'])) {
                $no_valid_link = $crawlomatic_Main_Settings['no_valid_link'];
            } else {
                $no_valid_link = '';
            }
            if (isset($crawlomatic_Main_Settings['keep_filters'])) {
                $keep_filters = $crawlomatic_Main_Settings['keep_filters'];
            } else {
                $keep_filters = '';
            }
            if (isset($crawlomatic_Main_Settings['unchanged_urls'])) {
                $unchanged_urls = $crawlomatic_Main_Settings['unchanged_urls'];
            } else {
                $unchanged_urls = '';
            }
            if (isset($crawlomatic_Main_Settings['deepl_auth'])) {
                $deepl_auth = $crawlomatic_Main_Settings['deepl_auth'];
            } else {
                $deepl_auth = '';
            }
            if (isset($crawlomatic_Main_Settings['deppl_free'])) {
                $deppl_free = $crawlomatic_Main_Settings['deppl_free'];
            } else {
                $deppl_free = '';
            }
            if (isset($crawlomatic_Main_Settings['google_trans_auth'])) {
                $google_trans_auth = $crawlomatic_Main_Settings['google_trans_auth'];
            } else {
                $google_trans_auth = '';
            }
            if (isset($crawlomatic_Main_Settings['google_search_api'])) {
                $google_search_api = $crawlomatic_Main_Settings['google_search_api'];
            } else {
                $google_search_api = '';
            }
            if (isset($crawlomatic_Main_Settings['google_search_cx'])) {
                $google_search_cx = $crawlomatic_Main_Settings['google_search_cx'];
            } else {
                $google_search_cx = '';
            }
            if (isset($crawlomatic_Main_Settings['headlessbrowserapi_key'])) {
                $headlessbrowserapi_key = $crawlomatic_Main_Settings['headlessbrowserapi_key'];
            } else {
                $headlessbrowserapi_key = '';
            }
            if (isset($crawlomatic_Main_Settings['no_title_spin'])) {
                $no_title_spin = $crawlomatic_Main_Settings['no_title_spin'];
            } else {
                $no_title_spin = '';
            }
            if (isset($crawlomatic_Main_Settings['confidence_level'])) {
                $confidence_level = $crawlomatic_Main_Settings['confidence_level'];
            } else {
                $confidence_level = '';
            }
            if (isset($crawlomatic_Main_Settings['rule_delay'])) {
                $rule_delay = $crawlomatic_Main_Settings['rule_delay'];
            } else {
                $rule_delay = '';
            }
            if (isset($crawlomatic_Main_Settings['no_spin'])) {
                $no_spin = $crawlomatic_Main_Settings['no_spin'];
            } else {
                $no_spin = '';
            }
            if (isset($crawlomatic_Main_Settings['tldr_max'])) {
                $tldr_max = $crawlomatic_Main_Settings['tldr_max'];
            } else {
                $tldr_max = '';
            }
            if (isset($crawlomatic_Main_Settings['tldr_min'])) {
                $tldr_min = $crawlomatic_Main_Settings['tldr_min'];
            } else {
                $tldr_min = '';
            }
            if (isset($crawlomatic_Main_Settings['replace_url'])) {
                $replace_url = $crawlomatic_Main_Settings['replace_url'];
            } else {
                $replace_url = '';
            }
            if (isset($crawlomatic_Main_Settings['link_attributes_internal'])) {
                $link_attributes_internal = $crawlomatic_Main_Settings['link_attributes_internal'];
            } else {
                $link_attributes_internal = '';
            }
            if (isset($crawlomatic_Main_Settings['cat_separator'])) {
                $cat_separator = $crawlomatic_Main_Settings['cat_separator'];
            } else {
                $cat_separator = '';
            }
            if (isset($crawlomatic_Main_Settings['multi_separator'])) {
                $multi_separator = $crawlomatic_Main_Settings['multi_separator'];
            } else {
                $multi_separator = '';
            }
            if (isset($crawlomatic_Main_Settings['link_attributes_external'])) {
                $link_attributes_external = $crawlomatic_Main_Settings['link_attributes_external'];
            } else {
                $link_attributes_external = '';
            }
            if (isset($crawlomatic_Main_Settings['do_not_check_duplicates'])) {
                $do_not_check_duplicates = $crawlomatic_Main_Settings['do_not_check_duplicates'];
            } else {
                $do_not_check_duplicates = '';
            }
            if (isset($crawlomatic_Main_Settings['cleanup_not_printable'])) {
                $cleanup_not_printable = $crawlomatic_Main_Settings['cleanup_not_printable'];
            } else {
                $cleanup_not_printable = '';
            }
            if (isset($crawlomatic_Main_Settings['title_duplicates'])) {
                $title_duplicates = $crawlomatic_Main_Settings['title_duplicates'];
            } else {
                $title_duplicates = '';
            }
            if (isset($crawlomatic_Main_Settings['no_dup_titles'])) {
                $no_dup_titles = $crawlomatic_Main_Settings['no_dup_titles'];
            } else {
                $no_dup_titles = '';
            }
            if (isset($crawlomatic_Main_Settings['draft_first'])) {
                $draft_first = $crawlomatic_Main_Settings['draft_first'];
            } else {
                $draft_first = '';
            }
            if (isset($crawlomatic_Main_Settings['do_not_crawl_duplicates'])) {
                $do_not_crawl_duplicates = $crawlomatic_Main_Settings['do_not_crawl_duplicates'];
            } else {
                $do_not_crawl_duplicates = '';
            }
            if (isset($crawlomatic_Main_Settings['randomize_order'])) {
                $randomize_order = $crawlomatic_Main_Settings['randomize_order'];
            } else {
                $randomize_order = '';
            }
            if (isset($crawlomatic_Main_Settings['link_source'])) {
                $link_source = $crawlomatic_Main_Settings['link_source'];
            } else {
                $link_source = '';
            }
            if (isset($crawlomatic_Main_Settings['shortest_api'])) {
                $shortest_api = $crawlomatic_Main_Settings['shortest_api'];
            } else {
                $shortest_api = '';
            }
            if (isset($crawlomatic_Main_Settings['no_check'])) {
                $no_check = $crawlomatic_Main_Settings['no_check'];
            } else {
                $no_check = '';
            }
            if (isset($crawlomatic_Main_Settings['update_existing'])) {
                $update_existing = $crawlomatic_Main_Settings['update_existing'];
            } else {
                $update_existing = '';
            }
            if (isset($crawlomatic_Main_Settings['no_up_img'])) {
                $no_up_img = $crawlomatic_Main_Settings['no_up_img'];
            } else {
                $no_up_img = '';
            }
            if (isset($crawlomatic_Main_Settings['up_publish_date'])) {
                $up_publish_date = $crawlomatic_Main_Settings['up_publish_date'];
            } else {
                $up_publish_date = '';
            }
            if (isset($crawlomatic_Main_Settings['iframe_resize_width'])) {
                $iframe_resize_width = $crawlomatic_Main_Settings['iframe_resize_width'];
            } else {
                $iframe_resize_width = '';
            }
            if (isset($crawlomatic_Main_Settings['iframe_resize_height'])) {
                $iframe_resize_height = $crawlomatic_Main_Settings['iframe_resize_height'];
            } else {
                $iframe_resize_height = '';
            }
            if (isset($crawlomatic_Main_Settings['skip_image_names'])) {
                $skip_image_names = $crawlomatic_Main_Settings['skip_image_names'];
            } else {
                $skip_image_names = '';
            }
            if (isset($crawlomatic_Main_Settings['add_canonical'])) {
                $add_canonical = $crawlomatic_Main_Settings['add_canonical'];
            } else {
                $add_canonical = '';
            }
            if (isset($crawlomatic_Main_Settings['strip_scripts'])) {
                $strip_scripts = $crawlomatic_Main_Settings['strip_scripts'];
            } else {
                $strip_scripts = '';
            }
            if (isset($crawlomatic_Main_Settings['strip_html'])) {
                $strip_html = $crawlomatic_Main_Settings['strip_html'];
            } else {
                $strip_html = '';
            }
            if (isset($crawlomatic_Main_Settings['screenshot_width'])) {
                $screenshot_width = $crawlomatic_Main_Settings['screenshot_width'];
            } else {
                $screenshot_width = '';
            }
            if (isset($crawlomatic_Main_Settings['screenshot_height'])) {
                $screenshot_height = $crawlomatic_Main_Settings['screenshot_height'];
            } else {
                $screenshot_height = '';
            }
            if (isset($crawlomatic_Main_Settings['scrapeimg_height'])) {
                $scrapeimg_height = $crawlomatic_Main_Settings['scrapeimg_height'];
            } else {
                $scrapeimg_height = '';
            }
            if (isset($crawlomatic_Main_Settings['attr_text'])) {
                $attr_text = $crawlomatic_Main_Settings['attr_text'];
            } else {
                $attr_text = '';
            }
            if (isset($crawlomatic_Main_Settings['scrapeimg_width'])) {
                $scrapeimg_width = $crawlomatic_Main_Settings['scrapeimg_width'];
            } else {
                $scrapeimg_width = '';
            }
            if (isset($crawlomatic_Main_Settings['scrapeimg_cat'])) {
                $scrapeimg_cat = $crawlomatic_Main_Settings['scrapeimg_cat'];
            } else {
                $scrapeimg_cat = '';
            }
            if (isset($crawlomatic_Main_Settings['scrapeimg_order'])) {
                $scrapeimg_order = $crawlomatic_Main_Settings['scrapeimg_order'];
            } else {
                $scrapeimg_order = '';
            }
            if (isset($crawlomatic_Main_Settings['scrapeimg_orientation'])) {
                $scrapeimg_orientation = $crawlomatic_Main_Settings['scrapeimg_orientation'];
            } else {
                $scrapeimg_orientation = '';
            }
            if (isset($crawlomatic_Main_Settings['imgtype'])) {
                $imgtype = $crawlomatic_Main_Settings['imgtype'];
            } else {
                $imgtype = '';
            }
            if (isset($crawlomatic_Main_Settings['img_order'])) {
                $img_order = $crawlomatic_Main_Settings['img_order'];
            } else {
                $img_order = '';
            }
            if (isset($crawlomatic_Main_Settings['scrapeimgtype'])) {
                $scrapeimgtype = $crawlomatic_Main_Settings['scrapeimgtype'];
            } else {
                $scrapeimgtype = '';
            }
            if (isset($crawlomatic_Main_Settings['pixabay_scrape'])) {
                $pixabay_scrape = $crawlomatic_Main_Settings['pixabay_scrape'];
            } else {
                $pixabay_scrape = '';
            }
            if (isset($crawlomatic_Main_Settings['unsplash_api'])) {
                $unsplash_api = $crawlomatic_Main_Settings['unsplash_api'];
            } else {
                $unsplash_api = '';
            }
            if (isset($crawlomatic_Main_Settings['google_images'])) {
                $google_images = $crawlomatic_Main_Settings['google_images'];
            } else {
                $google_images = '';
            }
            if (isset($crawlomatic_Main_Settings['img_editor'])) {
                $img_editor = $crawlomatic_Main_Settings['img_editor'];
            } else {
                $img_editor = '';
            }
            if (isset($crawlomatic_Main_Settings['img_language'])) {
                $img_language = $crawlomatic_Main_Settings['img_language'];
            } else {
                $img_language = '';
            }
            if (isset($crawlomatic_Main_Settings['img_ss'])) {
                $img_ss = $crawlomatic_Main_Settings['img_ss'];
            } else {
                $img_ss = '';
            }
            if (isset($crawlomatic_Main_Settings['img_mwidth'])) {
                $img_mwidth = $crawlomatic_Main_Settings['img_mwidth'];
            } else {
                $img_mwidth = '';
            }
            if (isset($crawlomatic_Main_Settings['img_width'])) {
                $img_width = $crawlomatic_Main_Settings['img_width'];
            } else {
                $img_width = '';
            }
            if (isset($crawlomatic_Main_Settings['img_cat'])) {
                $img_cat = $crawlomatic_Main_Settings['img_cat'];
            } else {
                $img_cat = '';
            }
            if (isset($crawlomatic_Main_Settings['pixabay_api'])) {
                $pixabay_api = $crawlomatic_Main_Settings['pixabay_api'];
            } else {
                $pixabay_api = '';
            }
            if (isset($crawlomatic_Main_Settings['pexels_api'])) {
                $pexels_api = $crawlomatic_Main_Settings['pexels_api'];
            } else {
                $pexels_api = '';
            }
            if (isset($crawlomatic_Main_Settings['morguefile_secret'])) {
                $morguefile_secret = $crawlomatic_Main_Settings['morguefile_secret'];
            } else {
                $morguefile_secret = '';
            }
            if (isset($crawlomatic_Main_Settings['morguefile_api'])) {
                $morguefile_api = $crawlomatic_Main_Settings['morguefile_api'];
            } else {
                $morguefile_api = '';
            }
            if (isset($crawlomatic_Main_Settings['bimage'])) {
                $bimage = $crawlomatic_Main_Settings['bimage'];
            } else {
                $bimage = '';
            }
            if (isset($crawlomatic_Main_Settings['no_orig'])) {
                $no_orig = $crawlomatic_Main_Settings['no_orig'];
            } else {
                $no_orig = '';
            }
            if (isset($crawlomatic_Main_Settings['flickr_order'])) {
                $flickr_order = $crawlomatic_Main_Settings['flickr_order'];
            } else {
                $flickr_order = '';
            }
            if (isset($crawlomatic_Main_Settings['flickr_license'])) {
                $flickr_license = $crawlomatic_Main_Settings['flickr_license'];
            } else {
                $flickr_license = '';
            }
            if (isset($crawlomatic_Main_Settings['flickr_api'])) {
                $flickr_api = $crawlomatic_Main_Settings['flickr_api'];
            } else {
                $flickr_api = '';
            }
            $get_option_viewed = get_option('coderevolution_settings_viewed', 0);
            if ($get_option_viewed == 0) {
            ?>
         <div id="message" class="updated">
            <p class="cr_saved_notif"><strong>&nbsp;<?php echo sprintf( wp_kses( __( 'Did you see our new <a href="%s" target="_blank">recommendations page</a>? It will help you increase your passive earnings!', 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'admin.php?page=crawlomatic_recommendations' ) );?></strong></p>
         </div>
         <?php
            }
            if( isset($_GET['settings-updated']) ) 
            { 
            ?>
         <div id="message" class="updated">
            <p class="cr_saved_notif"><strong>&nbsp;<?php echo esc_html__('Settings saved.', 'crawlomatic-multipage-scraper-post-generator');?></strong></p>
         </div>
         <?php
            $get = get_option('coderevolution_settings_changed', 0);
            if($get == 1)
            {
                delete_option('coderevolution_settings_changed');
            ?>
         <div id="message" class="updated">
            <p class="cr_failed_notif"><strong>&nbsp;<?php echo esc_html__('Plugin registration failed!', 'crawlomatic-multipage-scraper-post-generator');?></strong></p>
         </div>
         <?php 
            }
            elseif($get == 2)
            {
                    delete_option('coderevolution_settings_changed');
            ?>
         <div id="message" class="updated">
            <p class="cr_saved_notif"><strong>&nbsp;<?php echo esc_html__('Plugin registration successful!', 'crawlomatic-multipage-scraper-post-generator');?></strong></p>
         </div>
         <?php 
            }
            elseif($get != 0)
            {
                    delete_option('coderevolution_settings_changed');
            ?>
         <div id="message" class="updated">
            <p class="cr_failed_notif"><strong>&nbsp;<?php echo esc_html($get);?></strong></p>
         </div>
         <?php 
            }
            }
            ?>
         <div>
            <div class="crawlomatic_class">
               <table class="widefat">
                  <tr>
                     <td>
                        <h1>
                           <span class="gs-sub-heading"><b>Crawlomatic Multipage Scraper Plugin - <?php echo esc_html__('Main Switch:', 'crawlomatic-multipage-scraper-post-generator');?></b>&nbsp;</span>
                           <span class="cr_07_font">v<?php echo crawlomatic_get_version();?>&nbsp;</span>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Enable or disable this plugin. This acts like a main switch.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                        </h1>
                     </td>
                     <td>
                        <div class="slideThree">	
                           <input class="input-checkbox" type="checkbox" id="crawlomatic_enabled" name="crawlomatic_Main_Settings[crawlomatic_enabled]"<?php
                              if ($crawlomatic_enabled == 'on')
                                  echo ' checked ';
                              ?>>
                           <label for="crawlomatic_enabled"></label>
                        </div>
                     </td>
                  </tr>
               </table>
            </div>
            <div><?php if($crawlomatic_enabled != 'on'){echo '<div class="crf_bord cr_color_red cr_auto_update">' . esc_html__('This feature of the plugin is disabled! Please enable it from the above switch.', 'crawlomatic-multipage-scraper-post-generator') . '</div>';}?>
               <table class="widefat">
                  <tr>
                     <td colspan="2">
                        <?php
                        if(!is_multisite() || is_main_site())
                        {
                           $plugin = plugin_basename(__FILE__);
                           $plugin_slug = explode('/', $plugin);
                           $plugin_slug = $plugin_slug[0]; 
                           $uoptions = get_option($plugin_slug . '_registration', array());
                           if(isset($uoptions['item_id']) && isset($uoptions['item_name']) && isset($uoptions['created_at']) && isset($uoptions['buyer']) && isset($uoptions['licence']) && isset($uoptions['supported_until']))
                           {
                           ?>
                        <h3><b><?php echo esc_html__("Plugin Registration Info - Automatic Updates Enabled:", 'crawlomatic-multipage-scraper-post-generator');?></b> </h3>
                        <ul>
                           <li><b><?php echo esc_html__("Item Name:", 'crawlomatic-multipage-scraper-post-generator');?></b> <?php echo esc_html($uoptions['item_name']);?></li>
                           <li>
                              <b><?php echo esc_html__("Item ID:", 'crawlomatic-multipage-scraper-post-generator');?></b> <?php echo esc_html($uoptions['item_id']);?>
                           </li>
                           <li>
                              <b><?php echo esc_html__("Created At:", 'crawlomatic-multipage-scraper-post-generator');?></b> <?php echo esc_html($uoptions['created_at']);?>
                           </li>
                           <li>
                              <b><?php echo esc_html__("Buyer Name:", 'crawlomatic-multipage-scraper-post-generator');?></b> <?php echo esc_html($uoptions['buyer']);?>
                           </li>
                           <li>
                              <b><?php echo esc_html__("License Type:", 'crawlomatic-multipage-scraper-post-generator');?></b> <?php echo esc_html($uoptions['licence']);?>
                           </li>
                           <li>
                              <b><?php echo esc_html__("Supported Until:", 'crawlomatic-multipage-scraper-post-generator');?></b> <?php echo esc_html($uoptions['supported_until']);?>
                           </li>
                           <li>
                              <input type="submit" onclick="unsaved = false;" class="button button-primary" name="<?php echo esc_html($plugin_slug);?>_revoke_license" value="<?php echo esc_html__("Revoke License", 'crawlomatic-multipage-scraper-post-generator');?>">
                           </li>
                        </ul>
                        <?php
                           }
                           else
                           {
                           ?>
                        <div class="notice notice-error is-dismissible"><p><?php echo esc_html__("This is a trial version of the plugin. Automatic updates for this plugin are disabled. Please activate the plugin from below, so you can benefit of automatic updates for it!", 'crawlomatic-multipage-scraper-post-generator');?></p></div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo sprintf( wp_kses( __( 'Please input your Envato purchase code, to enable automatic updates in the plugin. To get your purchase code, please follow <a href="%s" target="_blank">this tutorial</a>. Info submitted to the registration server consists of: purchase code, site URL, site name, admin email. All these data will be used strictly for registration purposes.', 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( '//coderevolution.ro/knowledge-base/faq/how-do-i-find-my-items-purchase-code-for-plugin-license-activation/' ) );
                                 ?>
                           </div>
                        </div>
                        <b><?php echo esc_html__("Register Envato Purchase Code To Enable Automatic Updates:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td><input type="text" name="<?php echo esc_html($plugin_slug);?>_register_code" value="" placeholder="<?php echo esc_html__("Envato Purchase Code", 'crawlomatic-multipage-scraper-post-generator');?>"></td>
                  </tr>
                  <tr>
                     <td></td>
                     <td><input type="submit" name="<?php echo esc_html($plugin_slug);?>_register" id="<?php echo esc_html($plugin_slug);?>_register" class="button button-primary" onclick="unsaved = false;" value="<?php echo esc_html__("Register Purchase Code", 'crawlomatic-multipage-scraper-post-generator');?>"/>
                        <?php
                           }
                        }
                           ?>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
               <tr><td colspan="2">
               <h3>
                  <ul>
                     <li><?php echo sprintf( wp_kses( __( 'Need help configuring this plugin? Please check out it\'s <a href="%s" target="_blank">video tutorial</a>.', 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://www.youtube.com/watch?v=F6vhRJgCR_M&list=PLEiGTaa0iBIgcqNzVBaoTCS4ws47vNMuQ' ) );?>
                     </li>
                     <li><?php echo sprintf( wp_kses( __( 'Having issues with the plugin? Please be sure to check out our <a href="%s" target="_blank">knowledge-base</a> before you contact <a href="%s" target="_blank">our support</a>!', 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( '//coderevolution.ro/knowledge-base' ), esc_url('//coderevolution.ro/support' ) );?></li>
                     <li><?php echo sprintf( wp_kses( __( 'Do you enjoy our plugin? Please give it a <a href="%s" target="_blank">rating</a>  on CodeCanyon, or check <a href="%s" target="_blank">our website</a>  for other cool plugins.', 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( '//codecanyon.net/downloads' ), esc_url( 'https://coderevolution.ro' ) );?></a></li>
                     <li><br/><br/><span class="cr_color_red"><?php echo esc_html__("Are you looking for a cool new theme that best fits this plugin?", 'crawlomatic-multipage-scraper-post-generator');?></span> <a onclick="revealRec()" class="cr_cursor_pointer"><?php echo esc_html__("Click here for our theme related recommendation", 'crawlomatic-multipage-scraper-post-generator');?></a>.
                        <br/><span id="diviIdrec"></span>
                     </li>
                  </ul>
               </h3>
</td>
               </tr>
                  <tr>
                     <td>
                        <h3><?php echo esc_html__("Getting started creating your rules:", 'crawlomatic-multipage-scraper-post-generator');?> </h3>
                     </td>
                  </tr>
                  <tr>
                     <td><a name="newest" href="admin.php?page=crawlomatic_items_panel"><?php echo esc_html__("Blog Posts Generator Using Multipage Scraper", 'crawlomatic-multipage-scraper-post-generator');?></a></td>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("You can start creating your rules which will automatically create posts by scraping the URLs you define in the importing rules.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Scraping Enhancements:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                    <td>
                       <div>
                          <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                             <div class="bws_hidden_help_text cr_min_260px">
                                <?php
                                   echo sprintf( wp_kses( __( "If you wish to use the HeadlessBrowserAPI to render JavaScript generated content for your scraped pages, enter your API key here. Get one <a href='%s' target='_blank'>here</a>. If you enter a value here, new options will become available in the 'Use PhantomJs/Puppeteer/Tor To Parse JavaScript On Pages' in importing rule settings.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://headlessbrowserapi.com/pricing/' ) );
                                   ?>
                             </div>
                          </div>
                          <b><a href="https://headlessbrowserapi.com/" target="_blank"><?php echo esc_html__("HeadlessBrowserAPI Key (Optional)", 'crawlomatic-multipage-scraper-post-generator');?>:</a></b>
                          <?php
                           $call_count = get_option('headless_calls', false);
                           if($headlessbrowserapi_key != '' && $call_count !== false)
                           {
                              echo esc_html__("Remaining API Calls For Today: ", 'crawlomatic-multipage-scraper-post-generator') . '<b>' . $call_count . '</b>';
                           }
                          ?>
                          <div class="cr_float_right bws_help_box bws_help_box_right dashicons cr_align_middle"><img class="cr_align_middle" src="<?php echo plugins_url('../images/new.png', __FILE__);?>" alt="new feature"/>
                          
                                                      <div class="bws_hidden_help_text cr_min_260px"><?php echo esc_html__("New feature added to this plugin: it is able to use HeadlessBrowserAPI to scrape with JavaScript rendered content any website from the internet. Also, the Tor node of the API will be able to scrape .onion sites from the Dark Net!", 'crawlomatic-multipage-scraper-post-generator');?>
                                                      </div>
                                                   </div>
                       </div>
                    </td>
                    <td>
                       <div>
                          <input type="password" autocomplete="off" id="headlessbrowserapi_key" placeholder="<?php echo esc_html__("API key", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[headlessbrowserapi_key]" value="<?php
                             echo esc_html($headlessbrowserapi_key);
                             ?>"/>
                       </div>
                    </td>
                 </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Other API Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "Insert your TextRazor API Key. Learn how to get one <a href='%s' target='_blank'>here</a>. This is used when extracting relevant keywords from longer texts. Adding an API key here can greatly improve royalty free image accuracy.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://www.textrazor.com/console' ) );
                                    ?>
                              </div>
                           </div>
                           <b><a href="https://www.textrazor.com/console" target="_blank"><?php echo esc_html__("TextRazor API Key List (Optional) (Used for Relevant Keyword Extraction From Text):", 'crawlomatic-multipage-scraper-post-generator');?></a></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="password" autocomplete="off" id="textrazor_key" name="crawlomatic_Main_Settings[textrazor_key]" value="<?php
                              echo esc_html($textrazor_key);
                              ?>" placeholder="<?php echo esc_html__("Please insert your TextRazor API Key", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "If you wish to use Microsoft for translation, you must enter first a Microsoft 'Access Key'. Learn how to get one <a href='%s' target='_blank'>here</a>. If you enter a value here, new options will become available in the 'Automatically Translate Content To' and 'Source Language' fields.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://coderevolution.ro/knowledge-base/faq/how-to-create-a-microsoft-translator-api-key-from-using-azure-control-panel/' ) );
                                    ?>
                              </div>
                           </div>
                           <b><a href="https://coderevolution.ro/knowledge-base/faq/how-to-create-a-microsoft-translator-api-key-from-using-azure-control-panel/" target="_blank"><?php echo esc_html__("Microsoft Translator Access Key (Optional)", 'crawlomatic-multipage-scraper-post-generator');?>:</a></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="password" autocomplete="off" id="bing_auth" placeholder="<?php echo esc_html__("Access key (optional)", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[bing_auth]" value="<?php
                              echo esc_html($bing_auth);
                              ?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "If you selected a specific region in your Azure Microsoft account, you must enter it here. Learn more <a href='%s' target='_blank'>here</a>. The default is global.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://coderevolution.ro/knowledge-base/faq/how-to-create-a-microsoft-translator-api-key-from-using-azure-control-panel/' ) );
                                    ?>
                              </div>
                           </div>
                           <b><a href="https://coderevolution.ro/knowledge-base/faq/how-to-create-a-microsoft-translator-api-key-from-using-azure-control-panel/" target="_blank"><?php echo esc_html__("Microsoft Translator Region Code (Optional)", 'crawlomatic-multipage-scraper-post-generator');?>:</a></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="bing_region" placeholder="<?php echo esc_html__("global", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[bing_region]" value="<?php
                              echo esc_html($bing_region);
                              ?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td>
                       <div>
                          <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                             <div class="bws_hidden_help_text cr_min_260px">
                                <?php
                                   echo sprintf( wp_kses( __( "If you wish to use DeepL for translation, you must enter first a DeepL 'Authentication Key'. Get one <a href='%s' target='_blank'>here</a>. If you enter a value here, new options will become available in the 'Automatically Translate Content To' and 'Source Language' fields.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://www.deepl.com/subscription.html' ) );
                                   ?>
                             </div>
                          </div>
                          <b><a href="https://www.deepl.com/subscription.html" target="_blank"><?php echo esc_html__("DeepL Translator Authentication Key (Optional)", 'crawlomatic-multipage-scraper-post-generator');?>:</a></b>
                       </div>
                    </td>
                    <td>
                       <div>
                          <input type="password" autocomplete="off" id="deepl_auth" placeholder="<?php echo esc_html__("Auth key (optional)", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[deepl_auth]" value="<?php
                             echo esc_html($deepl_auth);
                             ?>"/>
                       </div>
                    </td>
                 </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Check this checkbox if the above API key is a DeepL free plan key. If it is a PRO key, please uncheck this checkbox.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("The Above Is A DeepL Free API Key:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="deppl_free" name="crawlomatic_Main_Settings[deppl_free]"<?php
                        if ($deppl_free == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                 <tr>
                    <td>
                       <div>
                          <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                             <div class="bws_hidden_help_text cr_min_260px">
                                <?php
                                   echo sprintf( wp_kses( __( "If you wish to use the official version of the Google Translator API for translation, you must enter first a Google API Key. Get one <a href='%s' target='_blank'>here</a>.  Please enable the 'Cloud Translation API' in <a href='%s' target='_blank'>Google Cloud Console</a>. Translation will work even without even without entering an API key here, but in this case, an unofficial Google Translate API will be used.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://console.cloud.google.com/apis/credentials' ), esc_url( 'https://console.cloud.google.com/marketplace/browse?q=translate' ) );
                                   ?>
                             </div>
                          </div>
                          <b><a href="https://console.cloud.google.com/apis/credentials" target="_blank"><?php echo esc_html__("Google Translator API Key (Optional)", 'crawlomatic-multipage-scraper-post-generator');?>:</a></b>
                       </div>
                    </td>
                    <td>
                       <div>
                          <input type="password" autocomplete="off" id="google_trans_auth" placeholder="<?php echo esc_html__("API Key (optional)", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[google_trans_auth]" value="<?php
                             echo esc_html($google_trans_auth);
                             ?>"/>
                       </div>
                    </td>
                 </tr>
                 <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Google Search API Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                 <tr>
                    <td>
                       <div>
                          <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                             <div class="bws_hidden_help_text cr_min_260px">
                                <?php
                                   echo sprintf( wp_kses( __( "If you wish to use the Google Search feature of the plugin when scraping keywords, enter a Google Search API key here. Get one <a href='%s' target='_blank'>here</a>.  Please enable the 'Custom Search API' in <a href='%s' target='_blank'>Google Cloud Console</a>. Also, to search the entire web for results, please follow <a href='%s' target='_blank'>this tutorial</a>. The search engine feature will work even without entering an API key here, but in this case, the Bing API will be used.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://console.cloud.google.com/apis/credentials' ), esc_url( 'https://console.cloud.google.com/marketplace/browse?q=custom%20search%20api' ), esc_url( 'https://coderevolution.ro/knowledge-base/faq/how-to-create-a-google-custom-search-engine-that-searches-the-entire-web/' ) );
                                   ?>
                             </div>
                          </div>
                          <b><a href="https://console.cloud.google.com/apis/credentials" target="_blank"><?php echo esc_html__("Google Search API Key", 'crawlomatic-multipage-scraper-post-generator');?>:</a></b>
                       </div>
                    </td>
                    <td>
                       <div>
                          <input type="password" autocomplete="off" id="google_search_api" placeholder="<?php echo esc_html__("API Key (optional)", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[google_search_api]" value="<?php
                             echo esc_html($google_search_api);
                             ?>"/>
                       </div>
                    </td>
                 </tr>
                 <tr>
                    <td>
                       <div>
                          <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                             <div class="bws_hidden_help_text cr_min_260px">
                                <?php
                                   echo sprintf( wp_kses( __( "To get the Google API Search Engine ID (CX value), go to <a href='%s' target='_blank'>%s</a> 2. Select your search engine or Create one and go click on it. 3. You can find the CX id titled as \"Search engine ID\" 4. Public URL also has the cx id in the Query param as ?cx=**** here. Also, to search the entire web for results, please follow <a href='%s' target='_blank'>this tutorial</a>.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://cse.google.com/all' ), esc_url( 'https://cse.google.com/all' ), esc_url( 'https://coderevolution.ro/knowledge-base/faq/how-to-create-a-google-custom-search-engine-that-searches-the-entire-web/' ) );
                                   ?>
                             </div>
                          </div>
                          <b><a href="https://cse.google.com/all" target="_blank"><?php echo esc_html__("Google API Search Engine ID (CX Value)", 'crawlomatic-multipage-scraper-post-generator');?>:</a></b>
                       </div>
                    </td>
                    <td>
                       <div>
                          <input type="text" autocomplete="off" id="google_search_cx" placeholder="<?php echo esc_html__("API CX Value (optional)", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[google_search_cx]" value="<?php
                             echo esc_html($google_search_cx);
                             ?>"/>
                       </div>
                    </td>
                 </tr>
                 <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("General Plugin Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Add a time period between the plugin will run importing at a schedule. To disable this feature, leave this field blank. This works based on your current server timezone and time. Your current server time is: ", 'crawlomatic-multipage-scraper-post-generator') . date("h:i A");
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Automatically Run Rules Only Between These Hour Periods Each Day:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="time" id="run_after" name="crawlomatic_Main_Settings[run_after]" value="<?php echo esc_html($run_after);?>" placeholder="<?php echo esc_html__("Run Rules Only After This Hour", 'crawlomatic-multipage-scraper-post-generator');?>"> - 
                     <input type="time" id="run_before" name="crawlomatic_Main_Settings[run_before]" value="<?php echo esc_html($run_before);?>" placeholder="<?php echo esc_html__("Run Rules Only Before This Hour", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr><td>
                  <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                  <div class="bws_hidden_help_text cr_min_260px">
                  <?php
                     echo esc_html__("Check this to disable additional content created by the plugin for the backend of the site.", 'crawlomatic-multipage-scraper-post-generator');
                     ?>
                  </div>
                  </div>
                  <b><?php echo esc_html__("Disable Additional Back-End Content:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                  </td><td>
                  <input type="checkbox" id="disable_backend_content" name="crawlomatic_Main_Settings[disable_backend_content]"<?php
                     if ($disable_backend_content == 'on')
                         echo ' checked ';
                     ?>>
                  </div>
                  </td></tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option to enable the post auto deletion feature after a period of time (defined by the 'Automatically Delete Post' settings for each rule).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Enable Post Auto Deletion Feature:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="auto_delete_enabled" name="crawlomatic_Main_Settings[auto_delete_enabled]"<?php
                        if ($auto_delete_enabled == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option to disable validity checking for generated links. This will decrease the number of requests made to crawled sites.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Check Generated Links for Validity:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="no_valid_link" name="crawlomatic_Main_Settings[no_valid_link]"<?php
                        if ($no_valid_link == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option to keep filters used by WordPress to sanitize and filter post content at publish time.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Remove WordPress Post Content Filters When Publishing Posts:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="keep_filters" name="crawlomatic_Main_Settings[keep_filters]"<?php
                        if ($keep_filters == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option to keep URLs unchanged when scraping them.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Disable URL Sanitizations:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="unchanged_urls" name="crawlomatic_Main_Settings[unchanged_urls]"<?php
                        if ($unchanged_urls == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Check this to force the plugin to not crawl content that is disallowed for crawling by a robots meta tag. Meta tag values that will stop crawling are noindex, nofollow and none. Checks also robots.txt file if it allows crawling of selected pages.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php echo esc_html__("Respect Robots HTML Header & robots.txt For Crawled Pages:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                        <input type="checkbox" id="enable_robots" name="crawlomatic_Main_Settings[enable_robots]"<?php
                           if ($enable_robots == 'on')
                               echo ' checked ';
                           ?>>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option if you are experiencing malformed content in your post generation. Enabling this value may resolve such issues. If you do not have such issues with generated post content, please leave this checkbox disabled.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Clear Curl Decoding Value:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="crawlomatic_clear_curl_charset" name="crawlomatic_Main_Settings[crawlomatic_clear_curl_charset]"<?php
                        if ($crawlomatic_clear_curl_charset == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to skip checking for duplicate posts when publishing new posts (check this if you have 10000+ posts on your blog and you are experiencing slowdows when the plugin is running. If you check this, duplicate posts will be posted! So use it only when it is necesarry.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Check For Duplicate Posts:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="do_not_check_duplicates" name="crawlomatic_Main_Settings[do_not_check_duplicates]"<?php
                        if ($do_not_check_duplicates == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to remove not printable characters from posts - this might solve some post insertions issues to the database.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Remove Not Printable Characters from Posts:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="cleanup_not_printable" name="crawlomatic_Main_Settings[cleanup_not_printable]"<?php
                        if ($cleanup_not_printable == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Check this to force the plugin not check generated posts in rule settings. Improves performance if you have 100k posts generated using this plugin.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Check Duplicate Posts By Title Instead of Source URL:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="title_duplicates" name="crawlomatic_Main_Settings[title_duplicates]"<?php
                        if ($title_duplicates == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr><td>
                  <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                  <div class="bws_hidden_help_text cr_min_260px">
                  <?php
                     echo esc_html__("Check this to force the plugin to not post any duplicate post titles, in any circumstances!", 'crawlomatic-multipage-scraper-post-generator');
                     ?>
                  </div>
                  </div>
                  <b><?php echo esc_html__("Make Sure No Duplicate Post Titles Are Published:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                  </td><td>
                  <input type="checkbox" id="no_dup_titles" name="crawlomatic_Main_Settings[no_dup_titles]"<?php
                     if ($no_dup_titles == 'on')
                         echo ' checked ';
                     ?>>
                  </div>
                  </td></tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Check this to force the plugin to make draft posts before they would be fully published. This can help you you use other third party plugins with the automatically published posts.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php echo esc_html__("Draft Posts First, And Publish Them Afterwards:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                        <input type="checkbox" id="draft_first" name="crawlomatic_Main_Settings[draft_first]"<?php
                           if ($draft_first == 'on')
                               echo ' checked ';
                           ?>>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to make the plugin randomize imported article order.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Randomize Post Importing Order:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="randomize_order" name="crawlomatic_Main_Settings[randomize_order]"<?php
                        if ($randomize_order == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to make the plugin remember links that it already imported and not crawl any more a link that was already imported. This feature will not work when the 'Do Not Check For Duplicate Posts' checkbox is checked.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Remember Imported Links And Do Not Crawl Them Twice:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="do_not_crawl_duplicates" name="crawlomatic_Main_Settings[do_not_crawl_duplicates]"<?php
                        if ($do_not_crawl_duplicates == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select if you want to link generated post titles to source articles. This option will be overwritten if you set it also from rule settings.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Link Generated Post Titles To Source Articles:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="link_source" name="crawlomatic_Main_Settings[link_source]"<?php
                        if ($link_source == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Check this to force the plugin not check generated posts in rule settings. Improves performance if you have 100k posts generated using this plugin.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php echo esc_html__("Do Not Check Generated Posts In Rule Settings:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                        <input type="checkbox" id="no_check" name="crawlomatic_Main_Settings[no_check]"<?php
                           if ($no_check == 'on')
                               echo ' checked ';
                           ?>>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to add 'canonical' meta tags to generated posts, pointing to the original article. This is useful for SEO optimization.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Add 'Canonical' Meta Tag To Generated Posts:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="add_canonical" name="crawlomatic_Main_Settings[add_canonical]"<?php
                        if ($add_canonical == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select if you want to update the post when it is found as it is already posted (by title). If you uncheck this value, if duplicate post found, no action will be taken.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Update Post If It Is Already Posted (Global):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="update_existing" name="crawlomatic_Main_Settings[update_existing]"<?php
                        if ($update_existing == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select if you do not want to update images for already posted content.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Update Already Posted Featured Images:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="no_up_img" name="crawlomatic_Main_Settings[no_up_img]"<?php
                        if ($no_up_img == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select if you want to refresh post publish dates for posts which are updated.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Update Also Publish Date For Posts:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="up_publish_date" name="crawlomatic_Main_Settings[up_publish_date]"<?php
                        if ($up_publish_date == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to show an extended information metabox under every plugin generated post.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Show Extended Item Information Metabox in Post:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="enable_metabox" name="crawlomatic_Main_Settings[enable_metabox]"<?php
                        if ($enable_metabox == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select a secret word that will be used when you run the plugin manually/by cron. See details about this below.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Secret Word Used For Manual/Cron Running:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="secret_word" name="crawlomatic_Main_Settings[secret_word]" value="<?php echo esc_html($secret_word);?>" placeholder="<?php echo esc_html__("Input a secret word", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <div>
                           <br/><b><?php echo esc_html__("If you want to schedule the cron event manually in your server, you should schedule this address:", 'crawlomatic-multipage-scraper-post-generator');?> <span class="cr_red"><?php if($secret_word != '') { echo get_site_url() . '/?run_crawlomatic=' . urlencode($secret_word);} else { echo esc_html__('You must enter a secret word above, to use this feature.', 'crawlomatic-multipage-scraper-post-generator'); }?></span><br/><?php echo esc_html__("Example:", 'crawlomatic-multipage-scraper-post-generator');?> <span class="cr_red"><?php if($secret_word != '') { echo '15,45****wget -q -O /dev/null ' . get_site_url() . '/?run_crawlomatic=' . urlencode($secret_word);} else { echo esc_html__('You must enter a secret word above, to use this feature.', 'crawlomatic-multipage-scraper-post-generator'); }?></span></b>
                        </div>
                        <br/><br/>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Do you want to enable logging for rules?", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Enable Logging for Rules:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="enable_logging" name="crawlomatic_Main_Settings[enable_logging]" onclick="mainChanged()"<?php
                        if ($enable_logging == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="hideLog">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Do you want to enable detailed logging for rules? Note that this will dramatically increase the size of the log this plugin generates.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Enable Detailed Logging for Rules:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideLog">
                           <input type="checkbox" id="enable_detailed_logging" name="crawlomatic_Main_Settings[enable_detailed_logging]"<?php
                              if ($enable_detailed_logging == 'on')
                                  echo ' checked ';
                              ?>>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="hideLog">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to automatically clear logs after a period of time.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Automatically Clear Logs After:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideLog">
                           <select id="auto_clear_logs" name="crawlomatic_Main_Settings[auto_clear_logs]" >
                              <option value="No"<?php
                                 if ($auto_clear_logs == "No") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Disabled", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value="monthly"<?php
                                 if ($auto_clear_logs == "monthly") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Once a month", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value="weekly"<?php
                                 if ($auto_clear_logs == "weekly") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Once a week", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value="daily"<?php
                                 if ($auto_clear_logs == "daily") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Once a day", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value="twicedaily"<?php
                                 if ($auto_clear_logs == "twicedaily") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Twice a day", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value="hourly"<?php
                                 if ($auto_clear_logs == "hourly") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Once an hour", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           </select>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to search Google Archives when you don't have access to the direct CarreerJet webpage.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Search Google Archives When Direct Page Fetching Fails:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="search_google" name="crawlomatic_Main_Settings[search_google]"<?php
                        if ($search_google == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("If you want to use a custom string for the 'Post Source' meta data assigned to posts, please input it here. If you will leave this blank, the default 'Post Source' value will be assigned to posts.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Custom 'Post Source' Post Meta Data:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="post_source_custom" placeholder="<?php echo esc_html__("Input a custom post source string", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[post_source_custom]" value="<?php echo esc_html($post_source_custom);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("If you want to use a proxy to crawl webpages, input it's address here. Required format: IP Address/URL:port. You can input a comma separated list of proxies. If you are using HeadlessBrowserAPI, add 'disabled' into this field to disable automatic proxy rotation of the API.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Web Proxy Address List:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="proxy_url" placeholder="<?php echo esc_html__("Input web proxy url", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[proxy_url]" value="<?php echo esc_html($proxy_url);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("If you want to use a proxy to crawl webpages, and it requires authentification, input it's authentification details here. Required format: username:password. You can input a comma separated list of users/passwords. If a proxy does not have a user/password, please leave it blank in the list. Example: user1:pass1,user2:pass2,,user4:pass4.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Web Proxy Authentification:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="proxy_auth" placeholder="<?php echo esc_html__("Input web proxy auth", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[proxy_auth]" value="<?php echo esc_html($proxy_auth);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the timeout (in seconds) for every rule running. I recommend that you leave this field at it's default value (3600).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Timeout for Rule Running (seconds):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="rule_timeout" step="1" min="0" placeholder="<?php echo esc_html__("Input rule timeout in seconds", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[rule_timeout]" value="<?php echo esc_html($rule_timeout);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the timeout (in seconds) for every rule running. I recommend that you leave this field at it's default value (90).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Timeout for One Request (seconds):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="request_timeout" step="1" min="0" placeholder="<?php echo esc_html__("Input request timeout in seconds", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[request_timeout]" value="<?php echo esc_html($request_timeout);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the timeout (in milliseconds) between each subsequent call to the crawled website. Increase this value if the website has a anti-crawling mechanism active. Here you can also input a pair of values, separated by a comma (ex: 300,500). In this case, a random timeout will be selected, between the two values you specified. This is a global timeout, will be applied to all created importing rules, however, this will be overwritten by the \'Delay Between Multiple Requests\' from each importing rule settings", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Delay Between Multiple Requests - Global Settings - (milliseconds):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="request_delay" placeholder="<?php echo esc_html__("Input request delay", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[request_delay]" value="<?php echo esc_html($request_delay);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Define a number of seconds the plugin should wait between the rule running. Use this to not decrease the use of your server's resources. Leave blank to disable.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Delay Between Rule Running:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" min="0" step="1" name="crawlomatic_Main_Settings[rule_delay]" value="<?php echo esc_html($rule_delay);?>" placeholder="<?php echo esc_html__("delay (s)", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to receive a summary of the rule running in an email.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Send Rule Running Summary in Email:", 'crawlomatic-multipage-scraper-post-generator');?></b>                   
                     </td>
                     <td>
                     <input type="checkbox" id="send_email" name="crawlomatic_Main_Settings[send_email]" onchange="mainChanged()"<?php
                        if ($send_email == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Do you want to send each published post in email to the defined email address below?", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Send Each Post in Email:", 'crawlomatic-multipage-scraper-post-generator');?></b>                
                     </td>
                     <td>
                     <input type="checkbox" id="send_post_email" name="crawlomatic_Main_Settings[send_post_email]" onchange="mainChanged()"<?php
                        if ($send_post_email == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="hideMail">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Input the email adress where you want to send the report. You can input more email addresses, separated by commas.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Email Address:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideMail">
                           <input type="text" id="email_address" placeholder="<?php echo esc_html__("Input a valid email adress", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[email_address]" value="<?php echo esc_html($email_address);?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="hideMail">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select if you wish to get only a single daily summary email (instead of one email for each rule running).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Send Only A Daily Summary Email:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideMail">
                           <input type="checkbox" id="email_summary" name="crawlomatic_Main_Settings[email_summary]" <?php
                              if ($email_summary == 'on')
                                  echo ' checked ';
                              ?>>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Post Auto Updating Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                     <tr>
                        <td>
                           <div>
                              <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                                 <div class="bws_hidden_help_text cr_min_260px">
                                    <?php
                                       echo esc_html__("Do you want to enable automatical updating for generated posts? This will enable a feature of the plugin which will try to automatically update with fresh content all posts which were already published by the plugin. This process will run on a separate thread from rule running. If you want to disable automatic updating for specific posts, add to them the following custom post meta field 'crawlomatic_no_autoupdate' with the value 1.", 'crawlomatic-multipage-scraper-post-generator');
                                       ?>
                                 </div>
                              </div>
                              <b><?php echo esc_html__("Enable Generated Posts Automatical Updating (Experimental):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                           </div>
                        </td>
                        <td>
                           <div>
                              <select id="auto_update_posts" name="crawlomatic_Main_Settings[auto_update_posts]" onchange="mainChangedUpdate()">
                                 <option value="No"<?php
                                    if ($auto_update_posts == "No") {
                                        echo " selected";
                                    }
                                    ?>><?php echo esc_html__("Disabled", 'crawlomatic-multipage-scraper-post-generator');?></option>
                                 <option value="monthly"<?php
                                    if ($auto_update_posts == "monthly") {
                                        echo " selected";
                                    }
                                    ?>><?php echo esc_html__("Once a month", 'crawlomatic-multipage-scraper-post-generator');?></option>
                                 <option value="weekly"<?php
                                    if ($auto_update_posts == "weekly") {
                                        echo " selected";
                                    }
                                    ?>><?php echo esc_html__("Once a week", 'crawlomatic-multipage-scraper-post-generator');?></option>
                                 <option value="daily"<?php
                                    if ($auto_update_posts == "daily") {
                                        echo " selected";
                                    }
                                    ?>><?php echo esc_html__("Once a day", 'crawlomatic-multipage-scraper-post-generator');?></option>
                                 <option value="twicedaily"<?php
                                    if ($auto_update_posts == "twicedaily") {
                                        echo " selected";
                                    }
                                    ?>><?php echo esc_html__("Twice a day", 'crawlomatic-multipage-scraper-post-generator');?></option>
                                 <option value="hourly"<?php
                                    if ($auto_update_posts == "hourly") {
                                        echo " selected";
                                    }
                                    ?>><?php echo esc_html__("Once an hour", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              </select>
                           </div>
                        </td>
                     </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Select what you want to do when automatically updating posts. Please note that this feature will take effect only if you activate the automatic updating settings from above.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Post Automatic Updating Actions:', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[update_actions]" class="cr_width_full">
                           <option value="1" 
                              <?php
                                 if($update_actions == '1')
                                 {
                                     echo ' selected';
                                 }
                                 ?>
                              ><?php echo esc_html__("Set Posts Which Are Not Found Any More To Draft", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="2"
                              <?php
                                 if($update_actions == '2')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Update Post With New Data", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="3"
                              <?php
                                 if($update_actions == '3')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Set Posts Which Are Not Found Any More To Draft And Update Post With New Data", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr><tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the maximum number of posts to process in a single autoupdating run.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Maximum Posts To Auto Update At Each Run:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="max_at_once" name="crawlomatic_Main_Settings[max_at_once]" value="<?php echo esc_html($max_at_once);?>" placeholder="Max auto update count">
                     </div>
                     </td>
                  </tr><tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(int,int,int) - use author id [use minus (-) to exclude authors by ID ex. -1,-2,-3]", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Author IDs:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="author_id" name="crawlomatic_Main_Settings[author_id]" value="<?php echo esc_html($author_id);?>" placeholder="Author IDs">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(string) - use 'user_nicename' (NOT name)", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Author Names:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="author_name" name="crawlomatic_Main_Settings[author_name]" value="<?php echo esc_html($author_name);?>" placeholder="Author names">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(string,string,string) - use category slugs instead of names. ", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Category Names:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="category_name" name="crawlomatic_Main_Settings[category_name]" value="<?php echo esc_html($category_name);?>" placeholder="Category names">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(string,string,string) - use tag slugs instead of names. ", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Tag Names:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="tag_name" name="crawlomatic_Main_Settings[tag_name]" value="<?php echo esc_html($tag_name);?>" placeholder="Tag names">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Comma separated list of post IDs to edit.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Post IDs:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="post_id" name="crawlomatic_Main_Settings[post_id]" value="<?php echo esc_html($post_id);?>" placeholder="Post ID">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(string) - use post slug.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Post Name:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="post_name" name="crawlomatic_Main_Settings[post_name]" value="<?php echo esc_html($post_name);?>" placeholder="Post name">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(int) - use page id.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Page ID:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="page_id" name="crawlomatic_Main_Settings[page_id]" value="<?php echo esc_html($page_id);?>" placeholder="Page ID">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(string) - use page slug.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Page Name:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="pagename" name="crawlomatic_Main_Settings[pagename]" value="<?php echo esc_html($pagename);?>" placeholder="Page name">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(int) - use page id. Return just the child Pages.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Post Parent:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="post_parent" name="crawlomatic_Main_Settings[post_parent]" value="<?php echo esc_html($post_parent);?>" placeholder="Post parent ID">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(string,string) - The post types to return. Valid values are: post, page, revision, attachment, other-custom-post-types", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Post Type:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="type_post" name="crawlomatic_Main_Settings[type_post]" value="<?php echo esc_html($type_post);?>" placeholder="Post type">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "(string) - Passes along the query string variable from a search. For example usage see: <a href='%s' target='_blank'>this link</a>.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'http://www.wprecipes.com/how-to-display-the-number-of-results-in-wordpress-search' ) );
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Search Query:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="search_query" name="crawlomatic_Main_Settings[search_query]" value="<?php echo esc_html($search_query);?>" placeholder="Search query">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(int) - 4 digit year (e.g. 2011).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Year Query:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="number" min="0" step="1" id="year" name="crawlomatic_Main_Settings[year]" value="<?php echo esc_html($year);?>" placeholder="Year">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(int) - Month number (from 1 to 12).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Month Query:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="number" min="1" max="12" step="1" id="month" name="crawlomatic_Main_Settings[month]" value="<?php echo esc_html($month);?>" placeholder="Month">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("(int) - Day of the month (from 1 to 31).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Day Query:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="number" min="1" max="31" step="1" id="day" name="crawlomatic_Main_Settings[day]" value="<?php echo esc_html($day);?>" placeholder="Day">
                     </div>
                     </td>
                  </tr>
                  <tr class="hideUpdate">
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select which posts should be processed - posts with or without featured images.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Filter By Featured Image Status:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <select id="featured_image" name="crawlomatic_Main_Settings[featured_image]" >
                     <option value="any"<?php
                        if ($featured_image == "any") {
                            echo " selected";
                        }
                        ?>><?php echo esc_html__("Any", 'crawlomatic-multipage-scraper-post-generator');?></option>
                     <option value="with"<?php
                        if ($featured_image == "with") {
                            echo " selected";
                        }
                        ?>><?php echo esc_html__("With Featured Images", 'crawlomatic-multipage-scraper-post-generator');?></option>
                     <option value="without"<?php
                        if ($featured_image == "without") {
                            echo " selected";
                        }
                        ?>><?php echo esc_html__("Without Featured Images", 'crawlomatic-multipage-scraper-post-generator');?></option>
                     </select> 
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Image Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option if your want to save images found in post content locally. Note that this option may be heavy on your hosting free space.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Copy Images From Content Locally (Global):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="copy_images" name="crawlomatic_Main_Settings[copy_images]"<?php
                        if ($copy_images == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option if your want to save images found in post content locally. Note that this option may be heavy on your hosting free space.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Don't Copy Image Again If Locally Copied Image Already Exists:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="no_local_dup" name="crawlomatic_Main_Settings[no_local_dup]"<?php
                        if ($no_local_dup == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option if your don't want to create WordPress attachments for locally copied images.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Generate Attachments For Locally Copied Images:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="no_local_attach" name="crawlomatic_Main_Settings[no_local_attach]"<?php
                        if ($no_local_attach == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option if your want to set the featured image from the remote image location. This settings can save disk space, but beware that if the remote image gets deleted, your featured image will also be broken.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Copy Featured Image Locally:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="no_local_image" name="crawlomatic_Main_Settings[no_local_image]"<?php
                        if ($no_local_image == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
              <tr>
                 <td>
                    <div>
                       <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                          <div class="bws_hidden_help_text cr_min_260px">
                             <?php
                                echo esc_html__("Click this option to enable integration with the 'Featured Image from URL' plugin - https://wordpress.org/plugins/featured-image-from-url/. To enable this option, you need to deactivate the 'Do Not Copy Featured Image Locally' checkbox from above.", 'crawlomatic-multipage-scraper-post-generator');
                                ?>
                          </div>
                       </div>
                       <b><?php echo esc_html__("Enable 'Featured Image from URL' Integration:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                 </td>
                 <td>
                 <input type="checkbox" id="url_image" name="crawlomatic_Main_Settings[url_image]"<?php
                    if ($url_image == 'on')
                        echo ' checked ';
                    ?>>
                 </div>
                 </td>
              </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option if your want to check images if they are not corrupt. If you have issues with featured image generation, uncheck this option.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Verify Featured Images If Not Corrupt:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="crawlomatic_featured_image_checking" name="crawlomatic_Main_Settings[crawlomatic_featured_image_checking]"<?php
                        if ($crawlomatic_featured_image_checking == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option if your want to randomize locally copied image names. This will have effect only if you check the 'Copy Images From Content Locally' checkbox also.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Randomize Local Image Names:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="random_image_names" name="crawlomatic_Main_Settings[random_image_names]"<?php
                        if ($random_image_names == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Click this option if don't want to automatically remove srcset & sizes attributes from lazy loaded images.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Remove srcset & sizes Image Tags:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="keep_srcset" name="crawlomatic_Main_Settings[keep_srcset]"<?php
                        if ($keep_srcset == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select if you wish to remove the featured image from the post content.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Remove Featured Image From Post Content:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="remove_img_content" name="crawlomatic_Main_Settings[remove_img_content]"<?php
                        if ($remove_img_content == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Resize the image that was assigned to be the featured image to the width specified in this text field (in pixels). If you want to disable this feature, leave this field blank. This feature only works if you leave 'Do Not Copy Featured Image Locally' checkbox unchecked.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Featured Image Resize Width:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" min="1" step="1" name="crawlomatic_Main_Settings[resize_width]" value="<?php echo esc_html($resize_width);?>" placeholder="<?php echo esc_html__("Please insert the desire width for featured images", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Resize the image that was assigned to be the featured image to the height specified in this text field (in pixels). If you want to disable this feature, leave this field blank. This feature only works if you leave 'Do Not Copy Featured Image Locally' checkbox unchecked.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Featured Image Resize Height:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" min="1" step="1" name="crawlomatic_Main_Settings[resize_height]" value="<?php echo esc_html($resize_height);?>" placeholder="<?php echo esc_html__("Please insert the desire height for featured images", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Resize the iframes that were imported from the custom content. If you want to disable this feature, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Iframe Resize Width:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" min="1" step="1" name="crawlomatic_Main_Settings[iframe_resize_width]" value="<?php echo esc_html($iframe_resize_width);?>" placeholder="<?php echo esc_html__("Please insert the desire width for iframes", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Resize the iframes that were imported from the custom content. If you want to disable this feature, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Iframe Resize Height:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" min="1" step="1" name="crawlomatic_Main_Settings[iframe_resize_height]" value="<?php echo esc_html($iframe_resize_height);?>" placeholder="<?php echo esc_html__("Please insert the desire height for iframes", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Royalty Free Featured Image Importing Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                  </td></tr>
                  <tr>
                     <td colspan="2">
                        <hr class="cr_dotted"/>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "Insert your Pexels App ID. Learn how to get an API key <a href='%s' target='_blank'>here</a>. If you enter an API Key and an API Secret, you will enable search for images using the Pexels API.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( "https://www.pexels.com/api/" ));
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Pexels App ID:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" name="crawlomatic_Main_Settings[pexels_api]" value="<?php
                              echo esc_html($pexels_api);
                              ?>" placeholder="<?php echo esc_html__("Please insert your Pexels API key", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <hr class="cr_dotted"/>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo sprintf( wp_kses( __( "Insert your Flickr App ID. Learn how to get an API key <a href='%s' target='_blank'>here</a>. If you enter an API Key and an API Secret, you will enable search for images using the Flickr API.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( "https://www.flickr.com/services/apps/create/apply" ));
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Flickr App ID: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="text" name="crawlomatic_Main_Settings[flickr_api]" placeholder="<?php echo esc_html__("Please insert your Flickr APP ID", 'crawlomatic-multipage-scraper-post-generator');?>" value="<?php if(isset($flickr_api)){echo esc_html($flickr_api);}?>" class="cr_width_full" />
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("The license id for photos to be searched.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Photo License: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[flickr_license]" class="cr_width_full">
                           <option value="-1" 
                              <?php
                                 if($flickr_license == '-1')
                                 {
                                     echo ' selected';
                                 }
                                 ?>
                              ><?php echo esc_html__("Do Not Search By Photo Licenses", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="0"
                              <?php
                                 if($flickr_license == '0')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("All Rights Reserved", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="1"
                              <?php
                                 if($flickr_license == '1')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Attribution-NonCommercial-ShareAlike License", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="2"
                              <?php
                                 if($flickr_license == '2')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Attribution-NonCommercial License", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="3"
                              <?php
                                 if($flickr_license == '3')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Attribution-NonCommercial-NoDerivs License", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="4"
                              <?php
                                 if($flickr_license == '4')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Attribution License", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="5"
                              <?php
                                 if($flickr_license == '5')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Attribution-ShareAlike License", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="6"
                              <?php
                                 if($flickr_license == '6')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Attribution-NoDerivs License", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="7"
                              <?php
                                 if($flickr_license == '7')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("No known copyright restrictions", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="8"
                              <?php
                                 if($flickr_license == '8')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("United States Government Work", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("The order in which to sort returned photos. Deafults to date-posted-desc (unless you are doing a radial geo query, in which case the default sorting is by ascending distance from the point specified).", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Search Results Order: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[flickr_order]" class="cr_width_full">
                           <option value="date-posted-desc"
                              <?php
                                 if($flickr_order == 'date-posted-desc')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Date Posted Descendant", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="date-posted-asc"
                              <?php
                                 if($flickr_order == 'date-posted-asc')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Date Posted Ascendent", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="date-taken-asc"
                              <?php
                                 if($flickr_order == 'date-taken-asc')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Date Taken Ascendent", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="date-taken-desc"
                              <?php
                                 if($flickr_order == 'date-taken-desc')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Date Taken Descendant", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="interestingness-desc"
                              <?php
                                 if($flickr_order == 'interestingness-desc')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Interestingness Descendant", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="interestingness-asc"
                              <?php
                                 if($flickr_order == 'interestingness-asc')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Interestingness Ascendant", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="relevance"
                              <?php
                                 if($flickr_order == 'relevance')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Relevance", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                  <tr>
                     <td colspan="2">
                        <hr class="cr_dotted"/>
                     </td>
                  </tr>
                  </td></tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "Insert your Pixabay App ID. Learn how to get one <a href='%s' target='_blank'>here</a>. If you enter an API Key here, you will enable search for images using the Pixabay API.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( "https://pixabay.com/api/docs/" ) );
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Pixabay App ID:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" name="crawlomatic_Main_Settings[pixabay_api]" value="<?php
                              echo esc_html($pixabay_api);
                              ?>" placeholder="<?php echo esc_html__("Please insert your Pixabay API key", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Filter results by image type.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Image Types To Search:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <select class="cr_width_full" name="crawlomatic_Main_Settings[imgtype]" >
                              <option value='all'<?php
                                 if ($imgtype == 'all')
                                     echo ' selected';
                                 ?>><?php echo esc_html__("All", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='photo'<?php
                                 if ($imgtype == 'photo')
                                     echo ' selected';
                                 ?>><?php echo esc_html__("Photo", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='illustration'<?php
                                 if ($imgtype == 'illustration')
                                     echo ' selected';
                                 ?>><?php echo esc_html__("Illustration", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='vector'<?php
                                 if ($imgtype == 'vector')
                                     echo ' selected';
                                 ?>><?php echo esc_html__("Vector", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           </select>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Order results by a predefined rule.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Results Order: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[img_order]" class="cr_width_full">
                           <option value="popular"<?php
                              if ($img_order == "popular") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Popular", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="latest"<?php
                              if ($img_order == "latest") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Latest", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Filter results by image category.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Image Category: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[img_cat]" class="cr_width_full">
                           <option value="all"<?php
                              if ($img_cat == "all") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("All", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="fashion"<?php
                              if ($img_cat == "fashion") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Fashion", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="nature"<?php
                              if ($img_cat == "nature") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Nature", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="backgrounds"<?php
                              if ($img_cat == "backgrounds") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Backgrounds", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="science"<?php
                              if ($img_cat == "science") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Science", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="education"<?php
                              if ($img_cat == "education") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Education", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="people"<?php
                              if ($img_cat == "people") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("People", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="feelings"<?php
                              if ($img_cat == "feelings") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Feelings", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="religion"<?php
                              if ($img_cat == "religion") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Religion", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="health"<?php
                              if ($img_cat == "health") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Health", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="places"<?php
                              if ($img_cat == "places") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Places", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="animals"<?php
                              if ($img_cat == "animals") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Animals", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="industry"<?php
                              if ($img_cat == "industry") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Industry", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="food"<?php
                              if ($img_cat == "food") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Food", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="computer"<?php
                              if ($img_cat == "computer") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Computer", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="sports"<?php
                              if ($img_cat == "sports") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Sports", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="transportation"<?php
                              if ($img_cat == "transportation") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Transportation", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="travel"<?php
                              if ($img_cat == "travel") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Travel", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="buildings"<?php
                              if ($img_cat == "buildings") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Buildings", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="business"<?php
                              if ($img_cat == "business") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Business", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="music"<?php
                              if ($img_cat == "music") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Music", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Minimum image width.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Image Min Width: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="number" min="1" step="1" name="crawlomatic_Main_Settings[img_width]" value="<?php echo esc_html($img_width);?>" placeholder="<?php echo esc_html__("Please insert image min width", 'crawlomatic-multipage-scraper-post-generator');?>" class="cr_width_full">     
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Maximum image width.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Image Max Width: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="number" min="1" step="1" name="crawlomatic_Main_Settings[img_mwidth]" value="<?php echo esc_html($img_mwidth);?>" placeholder="<?php echo esc_html__("Please insert image max width", 'crawlomatic-multipage-scraper-post-generator');?>" class="cr_width_full">     
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("A flag indicating that only images suitable for all ages should be returned.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Safe Search: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="checkbox" name="crawlomatic_Main_Settings[img_ss]"<?php
                           if ($img_ss == 'on') {
                               echo ' checked="checked"';
                           }
                           ?> >
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Select images that have received an Editor's Choice award.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Editor\'s Choice: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="checkbox" name="crawlomatic_Main_Settings[img_editor]"<?php
                           if ($img_editor == 'on') {
                               echo ' checked="checked"';
                           }
                           ?> >
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Specify default language for regional content.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Filter Language: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[img_language]" class="cr_width_full">
                           <option value="any"<?php
                              if ($img_language == "any") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Any", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="en"<?php
                              if ($img_language == "en") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("English", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="cs"<?php
                              if ($img_language == "cs") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Czech", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="da"<?php
                              if ($img_language == "da") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Danish", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="de"<?php
                              if ($img_language == "de") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("German", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="es"<?php
                              if ($img_language == "es") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Spanish", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="fr"<?php
                              if ($img_language == "fr") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("French", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="id"<?php
                              if ($img_language == "id") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Indonesian", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="it"<?php
                              if ($img_language == "it") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Italian", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="hu"<?php
                              if ($img_language == "hu") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Hungarian", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="nl"<?php
                              if ($img_language == "nl") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Dutch", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="no"<?php
                              if ($img_language == "no") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Norvegian", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="pl"<?php
                              if ($img_language == "pl") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Polish", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="pt"<?php
                              if ($img_language == "pt") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Portuguese", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="ro"<?php
                              if ($img_language == "ro") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Romanian", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="sk"<?php
                              if ($img_language == "sk") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Slovak", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="fi"<?php
                              if ($img_language == "fi") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Finish", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="sv"<?php
                              if ($img_language == "sv") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Swedish", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="tr"<?php
                              if ($img_language == "tr") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Turkish", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="vi"<?php
                              if ($img_language == "vi") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Vietnamese", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="th"<?php
                              if ($img_language == "th") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Thai", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="bg"<?php
                              if ($img_language == "bg") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Bulgarian", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="ru"<?php
                              if ($img_language == "ru") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Russian", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="el"<?php
                              if ($img_language == "el") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Greek", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="ja"<?php
                              if ($img_language == "ja") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Japanese", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="ko"<?php
                              if ($img_language == "ko") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Korean", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="zh"<?php
                              if ($img_language == "zh") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Chinese", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr>
                 <tr>
                    <td colspan="2">
                       <hr class="cr_dotted"/>
                    </td>
                 </tr>
                 <tr>
                    <td>
                       <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                          <div class="bws_hidden_help_text cr_min_260px">
                             <?php
                                echo esc_html__("Select if you want to enable usage of the Google Images Search with the Creative Commons filter enabled, for getting images.", 'crawlomatic-multipage-scraper-post-generator');
                                ?>
                          </div>
                       </div>
                       <b><?php esc_html_e('Enable Google Images Search Usage: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                    </td>
                    <td>
                       <input type="checkbox" name="crawlomatic_Main_Settings[google_images]"<?php
                          if ($google_images == 'on') {
                              echo ' checked="checked"';
                          }
                          ?> >
                    </td>
                 </tr>
                  <tr>
                     <td colspan="2">
                        <hr class="cr_dotted"/>
                     </td>
                  </tr>
                 <tr>
                    <td>
                       <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                          <div class="bws_hidden_help_text cr_min_260px">
                             <?php
                                echo esc_html__("Select if you want to enable usage of the Unsplash API for getting images.", 'crawlomatic-multipage-scraper-post-generator');
                                ?>
                          </div>
                       </div>
                       <b><?php esc_html_e('Enable Unsplash API Usage: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                    </td>
                    <td>
                       <input type="checkbox" name="crawlomatic_Main_Settings[unsplash_api]"<?php
                          if ($unsplash_api == 'on') {
                              echo ' checked="checked"';
                          }
                          ?> >
                    </td>
                 </tr>
                  <tr>
                     <td colspan="2">
                        <hr class="cr_dotted"/>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Select if you want to enable direct scraping of Pixabay website. This will generate different results from the API.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Enable Pixabay Direct Website Scraping: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="checkbox" name="crawlomatic_Main_Settings[pixabay_scrape]"<?php
                           if ($pixabay_scrape == 'on') {
                               echo ' checked="checked"';
                           }
                           ?> >
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Filter results by image type.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Image Types To Search: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[scrapeimgtype]" class="cr_width_full">
                           <option value="all"<?php
                              if ($scrapeimgtype == "all") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("All", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="photo"<?php
                              if ($scrapeimgtype == "photo") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Photo", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="illustration"<?php
                              if ($scrapeimgtype == "illustration") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Illustration", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="vector"<?php
                              if ($scrapeimgtype == "vector") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Vector", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Filter results by image orientation.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Image Orientation: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[scrapeimg_orientation]" class="cr_width_full">
                           <option value="all"<?php
                              if ($scrapeimg_orientation == "all") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("All", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="horizontal"<?php
                              if ($scrapeimg_orientation == "horizontal") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Horizontal", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="vertical"<?php
                              if ($scrapeimg_orientation == "vertical") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Vertical", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Order results by a predefined rule.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Results Order: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[scrapeimg_order]" class="cr_width_full">
                           <option value="any"<?php
                              if ($scrapeimg_order == "any") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Any", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="popular"<?php
                              if ($scrapeimg_order == "popular") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Popular", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="latest"<?php
                              if ($scrapeimg_order == "latest") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Latest", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Filter results by image category.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Image Category: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[scrapeimg_cat]" class="cr_width_full">
                           <option value="all"<?php
                              if ($scrapeimg_cat == "all") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("All", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="fashion"<?php
                              if ($scrapeimg_cat == "fashion") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Fashion", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="nature"<?php
                              if ($scrapeimg_cat == "nature") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Nature", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="backgrounds"<?php
                              if ($scrapeimg_cat == "backgrounds") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Backgrounds", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="science"<?php
                              if ($scrapeimg_cat == "science") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Science", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="education"<?php
                              if ($scrapeimg_cat == "education") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Education", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="people"<?php
                              if ($scrapeimg_cat == "people") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("People", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="feelings"<?php
                              if ($scrapeimg_cat == "feelings") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Feelings", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="religion"<?php
                              if ($scrapeimg_cat == "religion") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Religion", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="health"<?php
                              if ($scrapeimg_cat == "health") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Health", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="places"<?php
                              if ($scrapeimg_cat == "places") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Places", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="animals"<?php
                              if ($scrapeimg_cat == "animals") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Animals", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="industry"<?php
                              if ($scrapeimg_cat == "industry") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Industry", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="food"<?php
                              if ($scrapeimg_cat == "food") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Food", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="computer"<?php
                              if ($scrapeimg_cat == "computer") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Computer", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="sports"<?php
                              if ($scrapeimg_cat == "sports") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Sports", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="transportation"<?php
                              if ($scrapeimg_cat == "transportation") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Transportation", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="travel"<?php
                              if ($scrapeimg_cat == "travel") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Travel", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="buildings"<?php
                              if ($scrapeimg_cat == "buildings") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Buildings", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="business"<?php
                              if ($scrapeimg_cat == "business") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Business", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="music"<?php
                              if ($scrapeimg_cat == "music") {
                                  echo " selected";
                              }
                              ?>><?php echo esc_html__("Music", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Minimum image width.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Image Min Width: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="number" min="1" step="1" name="crawlomatic_Main_Settings[scrapeimg_width]" value="<?php echo esc_html($scrapeimg_width);?>" placeholder="<?php echo esc_html__("Please insert image min width", 'crawlomatic-multipage-scraper-post-generator');?>" class="cr_width_full">     
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Maximum image height.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Image Min Height: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="number" min="1" step="1" name="crawlomatic_Main_Settings[scrapeimg_height]" value="<?php echo esc_html($scrapeimg_height);?>" placeholder="<?php echo esc_html__("Please insert image min height", 'crawlomatic-multipage-scraper-post-generator');?>" class="cr_width_full">     
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <hr class="cr_dotted"/>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Please set a the image attribution shortcode value. You can use this value, using the %%image_attribution%% shortcode, in 'Prepend Content With' and 'Append Content With' settings fields. You can use the following shortcodes, in this settings field: %%image_source_name%%, %%image_source_website%%, %%image_source_url%%. These will be updated automatically for the respective image source, from where the imported image is from. This will replace the %%royalty_free_image_attribution%% shortcode, in 'Generated Post Content' settings field.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Royalty Free Image Attribution Text (%%royalty_free_image_attribution%%): ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="text" name="crawlomatic_Main_Settings[attr_text]" value="<?php echo esc_html(stripslashes($attr_text));?>" placeholder="<?php echo esc_html__("Please insert image attribution text pattern", 'crawlomatic-multipage-scraper-post-generator');?>" class="cr_width_full">     
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Do you want to enable broad search for royalty free images?", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Enable broad image search: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="checkbox" name="crawlomatic_Main_Settings[bimage]" <?php
                           if ($bimage == 'on') {
                               echo 'checked="checked"';
                           }
                           ?> />
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Do you want to not use article's original image if no royalty free image found for the post?", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Do Not Use Original Image If No Free Image Found: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <input type="checkbox" name="crawlomatic_Main_Settings[no_orig]" <?php
                           if ($no_orig == 'on') {
                               echo 'checked="checked"';
                           }
                           ?> />
                     </td>
                  </tr>
                  <hr/>
                  </td>
                  <td>
                     <hr/>
                  </td>
                  <td>
                     <hr/>
                  </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Posting Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <?php
                        if($shortest_api == '')
                        {
                            echo '<td colspan="2"><span><b>To enable outgoing link monetization, <a href="http://join-shortest.com/ref/ff421f2b06?user-type=new" target="_blank">sign up for a Shorte.st account here</a></b>. To get your API token after you have signed up, click <a href="https://shorte.st/tools/api?user-type=new" target="_blank">here</a>.</span><br/></td></tr><tr>';
                        }
                        ?>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "If you wish to shorten outgoing links using shorte.st, please enter your API token here. To sign up for a new account, click <a href='%s' target='_blank'>here</a>. To get your API token after you have signed up, click <a href='%s' target='_blank'>here</a>. To disable URL shortening, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( "http://join-shortest.com/ref/ff421f2b06?user-type=new" ), esc_url( 'https://shorte.st/tools/api?user-type=new'));
                                    ?>
                              </div>
                           </div>
                           <b><a href="http://join-shortest.com/ref/ff421f2b06?user-type=new" target="_blank"><?php echo esc_html__("Shorte.st API Token", 'crawlomatic-multipage-scraper-post-generator');?></a>:</b>
                     </td>
                     <td>
                     <input type="text" name="crawlomatic_Main_Settings[shortest_api]" value="<?php
                        echo esc_html($shortest_api);
                        ?>" placeholder="<?php echo esc_html__("Shorte.st API token", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Disable excerpt automatic generation for resulting blog posts.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Disable Automatic Excerpt Generation:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="disable_excerpt" name="crawlomatic_Main_Settings[disable_excerpt]"<?php
                        if ($disable_excerpt == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Disable content auto detection if defined content query string not found. This will result in blank content posts if you defined a query string to import content (and it is not found).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Try To Autodetect Content If Query String Not Found:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="no_content_autodetect" name="crawlomatic_Main_Settings[no_content_autodetect]"<?php
                        if ($no_content_autodetect == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select the maximum number of links the plugin will auto detect from the content (if link auto detection is enabled).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Maximum Links To Auto Detect:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="number" min="1" step="1" id="max_auto_links" name="crawlomatic_Main_Settings[max_auto_links]" placeholder="<?php echo esc_html__("5", 'crawlomatic-multipage-scraper-post-generator');?>" value="<?php echo esc_html($max_auto_links);?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select the user ID you wish to assign to posts that do not have a user ID extracted from feeds. Default is 1 - admin", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Default Post Author User ID:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="number" min="1" step="1" id="def_user" name="crawlomatic_Main_Settings[def_user]" placeholder="<?php echo esc_html__("1", 'crawlomatic-multipage-scraper-post-generator');?>" value="<?php echo esc_html($def_user);?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Try to fix imported HTML content (if it is corrupted on the source site).", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Try To Fix Imported HTML:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="fix_html" name="crawlomatic_Main_Settings[fix_html]"<?php
                        if ($fix_html == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Use alternate readability version to automatically extract text from articles.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Use Alternate Readability:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="alt_read" name="crawlomatic_Main_Settings[alt_read]"<?php
                        if ($alt_read == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select if you want to convert cyrilic characters to latin characters from posts.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Convert Cyrilic Characters to Latin Characters:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="convert_cyrilic" name="crawlomatic_Main_Settings[convert_cyrilic]"<?php
                        if ($convert_cyrilic == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to strip links from the generated post content.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Strip Links From Generated Post Content:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="strip_links" name="crawlomatic_Main_Settings[strip_links]"<?php
                        if ($strip_links == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to strip links from the imported post content (keep links that were added afterwards.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Strip Links Only From Imported Content:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="strip_content_links" name="crawlomatic_Main_Settings[strip_content_links]"<?php
                        if ($strip_content_links == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to strip internal links only from the imported post content (keep links that were added afterwards.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Strip Website Internal Links Only:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="strip_internal_content_links" name="crawlomatic_Main_Settings[strip_internal_content_links]"<?php
                        if ($strip_internal_content_links == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to strip JavaScript from the crawled post content.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Strip JavaScript From Crawled Content:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="strip_scripts" name="crawlomatic_Main_Settings[strip_scripts]"<?php
                        if ($strip_scripts == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you wish to strip HTML from crawled content.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Strip HTML From Content:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="strip_html" name="crawlomatic_Main_Settings[strip_html]"<?php
                        if ($strip_html == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Input the width of the screenshot that will be generated for crawled pages. This will affect the content generated by the %%item_show_screenshot%% shortcode. The default is 600.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Page Screenshot Width:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="screenshot_width" name="crawlomatic_Main_Settings[screenshot_width]" value="<?php echo esc_html($screenshot_width);?>" placeholder="<?php echo esc_html__("600", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Input the height of the screenshot that will be generated for crawled pages. This will affect the content generated by the %%item_show_screenshot%% shortcode. The default is 450.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Page Screenshot Height:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="screenshot_height" name="crawlomatic_Main_Settings[screenshot_height]" value="<?php echo esc_html($screenshot_height);?>" placeholder="<?php echo esc_html__("450", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Input the separator character for category assignation from crawled content.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Crawled Category Separator:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="cat_separator" name="crawlomatic_Main_Settings[cat_separator]" value="<?php echo esc_attr($cat_separator);?>" placeholder="<?php echo esc_html__(",", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Input a separator for multiple content extracted from multiple HTML entities that match the same class defined for crawling. Default is a new line.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Multiple Crawled Content Separator:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="multi_separator" name="crawlomatic_Main_Settings[multi_separator]" value="<?php echo esc_attr($multi_separator);?>" placeholder="<?php echo esc_html__("Content separator", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Input the attributes you want to set for each internal link from content.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Add Attributes to Internal Links:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="link_attributes_internal" name="crawlomatic_Main_Settings[link_attributes_internal]" value="<?php echo htmlentities($link_attributes_internal);?>" placeholder="<?php echo esc_html__("Link attributes", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Input the attributes you want to set for each external link from content.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Add Attributes to External Links:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="link_attributes_external" name="crawlomatic_Main_Settings[link_attributes_external]" value="<?php echo htmlentities($link_attributes_external);?>" placeholder="<?php echo esc_html__("Link attributes", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Do you want to replace all URLs from generated posts content with this predefined URL? You can also add here the %%original_url%% shortcode followed by the query attributes to add to all links from imported content. Example: %%original_url%%?ref=affiliate", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Replace All URLs from Content With This URL:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="text" id="replace_url" name="crawlomatic_Main_Settings[replace_url]" value="<?php echo esc_html($replace_url);?>" placeholder="<?php echo esc_html__("Replacement link", 'crawlomatic-multipage-scraper-post-generator');?>">               
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Insert the desired text to be show for the 'Read More' buttons. Exemple: for the %%item_read_more_button%% shortcode or for the excerpt.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("'Read More' Button Text:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div >
                           <input type="text" name="crawlomatic_Main_Settings[read_more_text]" value="<?php echo esc_html($read_more_text);?>" placeholder="<?php echo esc_html__("Please insert the text to be show for the 'Read More' links", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the maximum number of files to download from each scraped post. To disable this feature and to download all scraped files, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Maximum Number Of Files To Download From Each Scraped Post:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" min="0" step="1" name="crawlomatic_Main_Settings[max_download]" value="<?php echo esc_attr($max_download);?>" placeholder="<?php echo esc_html__("Maximum number of files from each post", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("If the downloaded files using the plugin don't have an extension, this feature will allow you to set a default file extension to them. This applies only for files downloaded for the %%downloaded_file%% shortcode", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Default File Extension for Downloaded Files:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="default_dl_ext" placeholder="<?php echo esc_html__("Default file extension", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[default_dl_ext]" value="<?php echo esc_html($default_dl_ext);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Price Related Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Multiply the price by this number. The increased price will be available in the %%item_price%% and %%item_regular_price%% shortcodes. The original price will be available in the %%item_original_price%% and %%item_original_regular_price%% shortcodes. To disable this feature, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Multiply Imported Item Price By:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="number" min="0" step="0.01" id="price_multiply" name="crawlomatic_Main_Settings[price_multiply]" value="<?php echo esc_html($price_multiply);?>" placeholder="<?php echo esc_html__("Enter a multiply amount for imported item price", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Multiply the price by this number. The increased price will be available in the %%item_price%% and %%item_regular_price%% shortcodes. The original price will be available in the %%item_original_price%% and %%item_original_regular_price%% shortcodes. To disable this feature, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Add To Imported Item Price:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="number" min="0" step="0.01" id="price_add" name="crawlomatic_Main_Settings[price_add]" value="<?php echo esc_html($price_add);?>" placeholder="<?php echo esc_html__("Enter a number that will be added to imported item price", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Always end product prices with these decimals. Example: if you set this to 0.99, all product prices will end with .99 -> from 32.50, it will be increased to 32.99. The increased price will be available in the %%item_price%% and %%item_regular_price%% shortcodes. The original price will be available in the %%item_original_price%% and %%item_original_regular_price%% shortcodes. To disable this feature, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Always End The Item Price With These Decimals:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="number" min="0" step="0.01" max="0.99" id="price_end" name="crawlomatic_Main_Settings[price_end]" value="<?php echo esc_html($price_end);?>" placeholder="<?php echo esc_html__("Price decimal ending to use", 'crawlomatic-multipage-scraper-post-generator');?>">
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the thousands separator for price. This must be the same as it is set in WooCommerce settings.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Price Thousands Separator:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" name="crawlomatic_Main_Settings[t_sep]" value="<?php echo esc_html($t_sep);?>" placeholder="<?php echo esc_html__(".", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the decimal separator for price. This must be the same as it is set in WooCommerce settings.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Price Decimal Separator:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" name="crawlomatic_Main_Settings[d_sep]" value="<?php echo esc_html($d_sep);?>" placeholder="<?php echo esc_html__(",", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Text Spinning Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div id="tldrspin">
                           <p><?php echo esc_html__("Don't have an 'TLDRThis' account yet? Click here to get one:", 'crawlomatic-multipage-scraper-post-generator');?> <b><a href="https://rapidapi.com/tldrthishq-tldrthishq-default/api/tldrthis/" target="_blank"><?php echo esc_html__("get a new account now!", 'crawlomatic-multipage-scraper-post-generator');?></a></b></p>
                        </div>
                        <div id="bestspin">
                           <p><?php echo esc_html__("Don't have an 'The Best Spinner' account yet? Click here to get one:", 'crawlomatic-multipage-scraper-post-generator');?> <b><a href="https://paykstrt.com/10313/38910" target="_blank"><?php echo esc_html__("get a new account now!", 'crawlomatic-multipage-scraper-post-generator');?></a></b></p>
                        </div>
                        <div id="wordai">
                           <p><?php echo esc_html__("Don't have an 'WordAI' account yet? Click here to get one:", 'crawlomatic-multipage-scraper-post-generator');?> <b><a href="https://wordai.com/?ref=h17f4" target="_blank"><?php echo esc_html__("get a new account now!", 'crawlomatic-multipage-scraper-post-generator');?></a></b></p>
                        </div>
                        <div id="spinrewriter">
                           <p><?php echo esc_html__("Don't have an 'SpinRewriter' account yet? Click here to get one:", 'crawlomatic-multipage-scraper-post-generator');?> <b><a href="https://www.spinrewriter.com/?ref=24b18" target="_blank"><?php echo esc_html__("get a new account now!", 'crawlomatic-multipage-scraper-post-generator');?></a></b></p>
                        </div>
                        <div id="turkcespin">
                           <p><?php echo esc_html__("Don't have an 'TurkceSpin' account yet (only for Turkish language)? Click here to get one:", 'crawlomatic-multipage-scraper-post-generator');?> <b><a href="http://turkcespin.com/" target="_blank"><?php echo esc_html__("get a new account now!", 'crawlomatic-multipage-scraper-post-generator');?></a></b></p>
                        </div>
                        <div id="spinnerchief">
                           <p><?php echo esc_html__("Don't have an 'SpinnerChief' account yet? Click here to get one:", 'crawlomatic-multipage-scraper-post-generator');?> <b><a href="http://www.whitehatbox.com/Agents/SSS?code=iscpuQScOZMi3vGFhPVBnAP5FyC6mPaOEshvgU4BbyoH8ftVRbM3uQ==" target="_blank"><?php echo esc_html__("get a new account now!", 'crawlomatic-multipage-scraper-post-generator');?></a></b></p>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Do you want to randomize text by changing words of a text with synonyms using one of the listed methods? Note that this is an experimental feature and can in some instances drastically increase the rule running time!", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Spin Text Using Word Synonyms (for automatically generated posts only):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <select id="spin_text" name="crawlomatic_Main_Settings[spin_text]" onchange="mainChanged()">
                     <option value="disabled"
                        <?php
                           if ($spin_text == 'disabled') {
                               echo ' selected';
                           }
                           ?>
                        ><?php echo esc_html__("Disabled", 'crawlomatic-multipage-scraper-post-generator');?></option>
                     <option value="best"
                        <?php
                           if ($spin_text == 'best') {
                               echo ' selected';
                           }
                           ?>
                        >The Best Spinner - <?php echo esc_html__("High Quality - Paid", 'crawlomatic-multipage-scraper-post-generator');?></option>
                     <option value="wordai"
                        <?php
                           if($spin_text == 'wordai')
                                   {
                                       echo ' selected';
                                   }
                           ?>
                        >Wordai - <?php echo esc_html__("High Quality - Paid", 'crawlomatic-multipage-scraper-post-generator');?></option>
                     <option value="spinrewriter"
                        <?php
                           if($spin_text == 'spinrewriter')
                                   {
                                       echo ' selected';
                                   }
                           ?>
                        >SpinRewriter - <?php echo esc_html__("High Quality - Paid", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        <option value="turkcespin"
                        <?php
                           if($spin_text == 'turkcespin')
                                   {
                                       echo ' selected';
                                   }
                           ?>
                        >TurkceSpin - <?php echo esc_html__("High Quality - Paid", 'crawlomatic-multipage-scraper-post-generator');?></option>
						<option value="spinnerchief"
                        <?php
                           if($spin_text == 'spinnerchief')
                                   {
                                       echo ' selected';
                                   }
                           ?>
                        >SpinnerChief - <?php echo esc_html__("High Quality - Paid", 'crawlomatic-multipage-scraper-post-generator');?></option>
                     <option value="builtin"
                        <?php
                           if ($spin_text == 'builtin') {
                               echo ' selected';
                           }
                           ?>
                        ><?php echo esc_html__("Built-in - Medium Quality - Free", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        <option value="tldr"
                        <?php
                           if ($spin_text == 'tldr') {
                               echo ' selected';
                           }
                           ?>
                        ><?php echo esc_html__("TLDRThis - Text Summarizer - Paid", 'crawlomatic-multipage-scraper-post-generator');?></option> 
                     </select>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Do you want to not spin or translate post title (only content)?", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Spin or Translate Post Title:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="checkbox" id="no_title_spin" name="crawlomatic_Main_Settings[no_title_spin]"<?php
                              if ($no_title_spin == 'on')
                                  echo ' checked ';
                              ?>>
                        </div>
                     </td>
                  </tr>
                  <tr class="hideSpinRewriter">
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Select the confidence level for used synonyms in SpinRewriter.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('Synonym Confidence Level: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                        <select name="crawlomatic_Main_Settings[confidence_level]" class="cr_width_full">
                           <option value="high"
                              <?php
                                 if($confidence_level == 'high')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("High", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="medium"
                              <?php
                                 if($confidence_level == 'medium')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Medium", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value="low"
                              <?php
                                 if($confidence_level == 'low')
                                 {
                                     echo ' selected';
                                 }
                                 ?>><?php echo esc_html__("Low", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select>
                     </td>
                  </tr>
                  <tr class="hideTLDR">
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Set the minimum content length for TLDRThis summarizer.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('TLDRThis Minimum Content Length: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                     <input type="number" id="tldr_min" step="1" min="100" max="300" placeholder="<?php echo esc_html__("Minimum length", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[tldr_min]" value="<?php echo esc_html($tldr_min);?>"/>
                     </td>
                  </tr>
                  <tr class="hideTLDR">
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Set the maximum content length for TLDRThis summarizer.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php esc_html_e('TLDRThis Maximum Content Length: ', 'crawlomatic-multipage-scraper-post-generator'); ?></b>
                     </td>
                     <td>
                     <input type="number" id="tldr_max" step="1" min="100" max="300" placeholder="<?php echo esc_html__("Maximum length", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[tldr_max]" value="<?php echo esc_html($tldr_max);?>"/>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="hideBuiltIn">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Input the words that you do not want to be spinned. You can input more words, separated by commas. Ex: dog, cat, cow", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Do Not Spin These Words:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideBuiltIn">
                           <input type="text" name="crawlomatic_Main_Settings[no_spin]" value="<?php echo esc_html($no_spin);?>" placeholder="<?php echo esc_html__("Select the words that should not be spinned", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
               <tr class="hideWord">
                  <td>
                     <div>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Set WordAI spinning uniqueness. Depend on how conservative vs adventurous you want your rewrite to be.", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php echo esc_html__("WordAI Spinning Uniqueness:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </div>
                  </td>
                  <td>
                     <div>
                        <select class="cr_width_80" name="crawlomatic_Main_Settings[wordai_uniqueness]" >
                           <option value='1'<?php
                              if ($wordai_uniqueness == '1')
                                 echo ' selected';
                              ?>><?php echo esc_html__("More Conservative", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value='2'<?php
                              if ($wordai_uniqueness == '2')
                                 echo ' selected';
                              ?>><?php echo esc_html__("Regular", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           <option value='3'<?php
                              if ($wordai_uniqueness == '3')
                                 echo ' selected';
                              ?>><?php echo esc_html__("More Adventurous", 'crawlomatic-multipage-scraper-post-generator');?></option>
                        </select> 
                     </div>
                  </td>
               </tr>
                  <tr>
                     <td>
                        <div class="hideBest">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Insert your user name on premium spinner service.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Premium Spinner Service User Name/Email:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideBest">
                           <input type="text" name="crawlomatic_Main_Settings[best_user]" value="<?php
                              echo esc_html($best_user);
                              ?>" placeholder="<?php echo esc_html__("Please insert your premium text spinner service user name", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="hideBest2">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Insert your password for the selected premium spinner service.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Premium Spinner Service Password/API Key:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideBest2">
                           <input type="password" autocomplete="off" name="crawlomatic_Main_Settings[best_password]" value="<?php
                              echo esc_html($best_password);
                              ?>" placeholder="<?php echo esc_html__("Please insert your premium text spinner service password", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to spin and translate only imported content, or the entire content from the 'Generated Post Content' settings field.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Spin And Translate Only Imported Content:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="only_imported" name="crawlomatic_Main_Settings[only_imported]"<?php
                        if ($only_imported == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="hideBest">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Insert your words, separated by comma, that you not want to be spinned. This is supported by 'The Best Spinner', 'SpinRewriter' and 'WordAI' spinners.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Protected Terms For Spinning:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideBest">
                           <input type="text" name="crawlomatic_Main_Settings[protected_terms]" value="<?php echo esc_html($protected_terms);?>" placeholder="<?php echo esc_html__("Please insert your 'The Best Spinner' protected terms", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Posting Restrictions Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the minimum word count for post titles. Items that have less than this count will not be published. To disable this feature, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Minimum Title Word Count (Skip Post Otherwise):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="min_word_title" step="1" placeholder="<?php echo esc_html__("Input the minimum word count for the title", 'crawlomatic-multipage-scraper-post-generator');?>" min="0" name="crawlomatic_Main_Settings[min_word_title]" value="<?php echo esc_html($min_word_title);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the maximum word count for post titles. Items that have more than this count will not be published. To disable this feature, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Maximum Title Word Count (Skip Post Otherwise):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="max_word_title" step="1" min="0" placeholder="<?php echo esc_html__("Input the maximum word count for the title", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[max_word_title]" value="<?php echo esc_html($max_word_title);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the minimum word count for post content. Items that have less than this count will not be published. To disable this feature, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Minimum Content Word Count (Skip Post Otherwise):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="min_word_content" step="1" min="0" placeholder="<?php echo esc_html__("Input the minimum word count for the content", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[min_word_content]" value="<?php echo esc_html($min_word_content);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the maximum word count for post content. Items that have more than this count will not be published. To disable this feature, leave this field blank.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Maximum Content Word Count (Skip Post Otherwise):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="max_word_content" step="1" min="0" placeholder="<?php echo esc_html__("Input the maximum word count for the content", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[max_word_content]" value="<?php echo esc_html($max_word_content);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the required words list that will apply to all plugin rules.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Global Required Words List:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <textarea rows="3" cols="70" name="crawlomatic_Main_Settings[global_req_words]" placeholder="<?php echo esc_html__("Please insert the global required words list", 'crawlomatic-multipage-scraper-post-generator');?>"><?php echo esc_textarea($global_req_words);?></textarea>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to require only one word from the 'Required Words List' for the post to be accepted.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Require Only One Word From The 'Required Words List':", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="require_only_one" name="crawlomatic_Main_Settings[require_only_one]"<?php
                        if ($require_only_one == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the banned words list that will apply to all plugin rules.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Global Banned Words List:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <textarea rows="3" cols="70" name="crawlomatic_Main_Settings[global_ban_words]" placeholder="<?php echo esc_html__("Please insert the global banned words list", 'crawlomatic-multipage-scraper-post-generator');?>"><?php echo esc_textarea($global_ban_words);?></textarea>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Do you want to skip posts that have these words in their featured image names? To disable this feature, leave this field blank. You can also use wildcards in the expressions.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Skip Posts With These Words In Their Featured Image Names:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" name="crawlomatic_Main_Settings[skip_image_names]" value="<?php echo esc_html($skip_image_names);?>" placeholder="<?php echo esc_html__("Select the words of images to skip", 'crawlomatic-multipage-scraper-post-generator');?>">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to skip posts that do not have images.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Skip Posts That Do Not Have Images:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="skip_no_img" name="crawlomatic_Main_Settings[skip_no_img]"<?php
                        if ($skip_no_img == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to skip posts that are older than a selected date. For this to work, you have to specify a HTML class or ID which contains the date in the crawled article.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Skip Posts Older Than a Selected Date:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="skip_old" name="crawlomatic_Main_Settings[skip_old]" onchange="mainChanged()"<?php
                        if ($skip_old == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class='hideOld'>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select the date prior which you want to skip posts.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Select the Date for Old Posts:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div class='hideOld'>
                           <?php echo esc_html__("Day:", 'crawlomatic-multipage-scraper-post-generator');?>
                           <select class="cr_width_80" name="crawlomatic_Main_Settings[skip_day]" >
                              <option value='01'<?php if($skip_day == '01')echo ' selected';?>>01</option>
                              <option value='02'<?php if($skip_day == '02')echo ' selected';?>>02</option>
                              <option value='03'<?php if($skip_day == '03')echo ' selected';?>>03</option>
                              <option value='04'<?php if($skip_day == '04')echo ' selected';?>>04</option>
                              <option value='05'<?php if($skip_day == '05')echo ' selected';?>>05</option>
                              <option value='06'<?php if($skip_day == '06')echo ' selected';?>>06</option>
                              <option value='07'<?php if($skip_day == '07')echo ' selected';?>>07</option>
                              <option value='08'<?php if($skip_day == '08')echo ' selected';?>>08</option>
                              <option value='09'<?php if($skip_day == '09')echo ' selected';?>>09</option>
                              <option value='10'<?php if($skip_day == '10')echo ' selected';?>>10</option>
                              <option value='11'<?php if($skip_day == '11')echo ' selected';?>>11</option>
                              <option value='12'<?php if($skip_day == '12')echo ' selected';?>>12</option>
                              <option value='13'<?php if($skip_day == '13')echo ' selected';?>>13</option>
                              <option value='14'<?php if($skip_day == '14')echo ' selected';?>>14</option>
                              <option value='15'<?php if($skip_day == '15')echo ' selected';?>>15</option>
                              <option value='16'<?php if($skip_day == '16')echo ' selected';?>>16</option>
                              <option value='17'<?php if($skip_day == '17')echo ' selected';?>>17</option>
                              <option value='18'<?php if($skip_day == '18')echo ' selected';?>>18</option>
                              <option value='19'<?php if($skip_day == '19')echo ' selected';?>>19</option>
                              <option value='20'<?php if($skip_day == '20')echo ' selected';?>>20</option>
                              <option value='21'<?php if($skip_day == '21')echo ' selected';?>>21</option>
                              <option value='22'<?php if($skip_day == '22')echo ' selected';?>>22</option>
                              <option value='23'<?php if($skip_day == '23')echo ' selected';?>>23</option>
                              <option value='24'<?php if($skip_day == '24')echo ' selected';?>>24</option>
                              <option value='25'<?php if($skip_day == '25')echo ' selected';?>>25</option>
                              <option value='26'<?php if($skip_day == '26')echo ' selected';?>>26</option>
                              <option value='27'<?php if($skip_day == '27')echo ' selected';?>>27</option>
                              <option value='28'<?php if($skip_day == '28')echo ' selected';?>>28</option>
                              <option value='29'<?php if($skip_day == '29')echo ' selected';?>>29</option>
                              <option value='30'<?php if($skip_day == '30')echo ' selected';?>>30</option>
                              <option value='31'<?php if($skip_day == '31')echo ' selected';?>>31</option>
                           </select>
                           <?php echo esc_html__("Month:", 'crawlomatic-multipage-scraper-post-generator');?>
                           <select class="cr_width_80" name="crawlomatic_Main_Settings[skip_month]" >
                              <option value='01'<?php if($skip_month == '01')echo ' selected';?>><?php echo esc_html__("January", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='02'<?php if($skip_month == '02')echo ' selected';?>><?php echo esc_html__("February", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='03'<?php if($skip_month == '03')echo ' selected';?>><?php echo esc_html__("March", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='04'<?php if($skip_month == '04')echo ' selected';?>><?php echo esc_html__("April", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='05'<?php if($skip_month == '05')echo ' selected';?>><?php echo esc_html__("May", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='06'<?php if($skip_month == '06')echo ' selected';?>><?php echo esc_html__("June", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='07'<?php if($skip_month == '07')echo ' selected';?>><?php echo esc_html__("July", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='08'<?php if($skip_month == '08')echo ' selected';?>><?php echo esc_html__("August", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='09'<?php if($skip_month == '09')echo ' selected';?>><?php echo esc_html__("September", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='10'<?php if($skip_month == '10')echo ' selected';?>><?php echo esc_html__("October", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='11'<?php if($skip_month == '11')echo ' selected';?>><?php echo esc_html__("November", 'crawlomatic-multipage-scraper-post-generator');?></option>
                              <option value='12'<?php if($skip_month == '12')echo ' selected';?>><?php echo esc_html__("December", 'crawlomatic-multipage-scraper-post-generator');?></option>
                           </select>
                           <?php echo esc_html__("Year:", 'crawlomatic-multipage-scraper-post-generator');?><input class="cr_width_70" value="<?php echo esc_html($skip_year);?>" placeholder="<?php echo esc_html__("year", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[skip_year]" type="text" pattern="^\d{4}$">
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Headless Browser Settings:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "Set the path on your local server of the phantomjs executable. If you leave this field blank, the default 'phantomjs' call will be used. <a href='%s' target='_blank'>How to install PhantomJs?</a>", 'crawlomatic-multipage-scraper-post-generator'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( "//coderevolution.ro/knowledge-base/faq/how-to-install-phantomjs/" ));
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("PhantomJS Path On Server:", 'crawlomatic-multipage-scraper-post-generator');?></b>
<?php
if($phantom_path != '')
{
   $phchecked = get_transient('crawlomatic_phantom_check');
   if($phchecked === false)
   {
      $phantom = crawlomatic_testPhantom();
      if($phantom === 0)
      {
         echo '<br/><span class="cr_red12"><b>' . esc_html__('INFO: PhantomJS not found - please install it on your server or configure the path to it in plugin\'s \'Main Settings\'!', 'crawlomatic-multipage-scraper-post-generator') . '</b> <a href=\'//coderevolution.ro/knowledge-base/faq/how-to-install-phantomjs/\' target=\'_blank\'>' . esc_html__('How to install PhantomJs?', 'crawlomatic-multipage-scraper-post-generator') . '</a></span>';
      }
      elseif($phantom === -1)
      {
         echo '<br/><span class="cr_red12"><b>' . esc_html__('INFO: PhantomJS cannot run - shell exec is not enabled on your server. Please enable it and retry using this feature of the plugin.', 'crawlomatic-multipage-scraper-post-generator') . '</b></span>';
      }
      elseif($phantom === -2)
      {
         echo '<br/><span class="cr_red12"><b>' . esc_html__('INFO: PhantomJS cannot run - shell exec is not allowed to run on your server (in disable_functions list in php.ini). Please enable it and retry using this feature of the plugin.', 'crawlomatic-multipage-scraper-post-generator') . '</b></span>';
      }
      elseif($phantom === 1)
      {
         echo '<br/><span class="cr_green12"><b>' . esc_html__('INFO: PhantomJS Test Successful', 'crawlomatic-multipage-scraper-post-generator') . '</b></span>';
         set_transient('crawlomatic_phantom_check', '1', 2592000);
      }
   }
   else
   {
      echo '<br/><span class="cr_green12"><b>' . esc_html__('INFO: PhantomJS OK', 'crawlomatic-multipage-scraper-post-generator') . '</b></span>';   
   }
}
?>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="phantom_path" placeholder="<?php echo esc_html__("Path to phantomjs", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[phantom_path]" value="<?php echo esc_html($phantom_path);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the timeout (in milliseconds) for every headless browser running. I recommend that you leave this field at it's default value (30000). If you leave this field blank, the default value will be used.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Timeout for Headless Browser Execution:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="phantom_timeout" step="1" min="1" placeholder="<?php echo esc_html__("Input headless browser timeout in milliseconds", 'crawlomatic-multipage-scraper-post-generator');?>" name="crawlomatic_Main_Settings[phantom_timeout]" value="<?php echo esc_html($phantom_timeout);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to use HeadlessBrowserAPI to generate the screenshot for the page, using the %%item_show_screenshot%% and %%item_screenshot_url%% shortcodes.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Use HeadlessBrowserAPI to Generate Screenshots (%%item_show_screenshot%%):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="headless_screen" name="crawlomatic_Main_Settings[headless_screen]"<?php
                        if ($headless_screen == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to use phantomjs to generate the screenshot for the page, using the %%item_show_screenshot%% and %%item_screenshot_url%% shortcodes.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Use PhantomJs to Generate Screenshots (%%item_show_screenshot%%):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="phantom_screen" name="crawlomatic_Main_Settings[phantom_screen]"<?php
                        if ($phantom_screen == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to use puppeteer to generate the screenshot for the page, using the %%item_show_screenshot%% and %%item_screenshot_url%% shortcodes. You must have installed puppeteer and nodejs on your server, for this to work. Also, you have to set the NODE_PATH environment variable to the path where nodejs installed puppeteer (ex: %AppData%\npm\node_modules - for Windows, for Linux: medium.com/@tomahock/passing-system-environment-variables-to-php-fpm-when-using-nginx-a70045370fad)", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Use Puppeteer to Generate Screenshots (%%item_show_screenshot%%):", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="puppeteer_screen" name="crawlomatic_Main_Settings[puppeteer_screen]"<?php
                        if ($puppeteer_screen == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to disable fallback to regular WordPress based scraping methods if the headless browser scraping methods fail.", 'crawlomatic-multipage-scraper-post-generator');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Disable Fallback If Headless Browser Scraping Fails:", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="disable_fallback" name="crawlomatic_Main_Settings[disable_fallback]"<?php
                        if ($disable_fallback == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
                  <tr>
                     <td>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Post Meta Options:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                           <div class="bws_hidden_help_text cr_min_260px">
                              <?php
                                 echo esc_html__("Skip saving this post meta for posts?", 'crawlomatic-multipage-scraper-post-generator');
                                 ?>
                           </div>
                        </div>
                        <b><?php echo esc_html__("Skip Saving 'crawlomatic_enable_pingbacks' Post Meta", 'crawlomatic-multipage-scraper-post-generator');?></b>
                     </td>
                     <td>
                        <input type="checkbox" id="crawlomatic_enable_pingbacks" name="crawlomatic_Main_Settings[crawlomatic_enable_pingbacks]"<?php
                           if ($crawlomatic_enable_pingbacks == 'on')
                               echo ' checked ';
                           ?>>
            </div>
            </td></tr><tr><td>
            <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
            <div class="bws_hidden_help_text cr_min_260px">
            <?php
               echo esc_html__("Skip saving this post meta for posts?", 'crawlomatic-multipage-scraper-post-generator');
               ?>
            </div>
            </div>
            <b><?php echo esc_html__("Skip Saving 'crawlomatic_comment_status' Post Meta", 'crawlomatic-multipage-scraper-post-generator');?></b>
            </td><td>
            <input type="checkbox" id="crawlomatic_comment_status" name="crawlomatic_Main_Settings[crawlomatic_comment_status]"<?php
               if ($crawlomatic_comment_status == 'on')
                   echo ' checked ';
               ?>>
         </div>
         </td></tr><tr><td>
         <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
         <div class="bws_hidden_help_text cr_min_260px">
         <?php
            echo esc_html__("Skip saving this post meta for posts?", 'crawlomatic-multipage-scraper-post-generator');
            ?>
         </div>
         </div>
         <b><?php echo esc_html__("Skip Saving 'crawlomatic_item_title' Post Meta", 'crawlomatic-multipage-scraper-post-generator');?></b>
         </td><td>
         <input type="checkbox" id="crawlomatic_item_title" name="crawlomatic_Main_Settings[crawlomatic_item_title]"<?php
            if ($crawlomatic_item_title == 'on')
                echo ' checked ';
            ?>>
   </div>
   </td></tr><tr><td>
   <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
   <div class="bws_hidden_help_text cr_min_260px">
   <?php
      echo esc_html__("Skip saving this post meta for posts?", 'crawlomatic-multipage-scraper-post-generator');
      ?>
   </div>
   </div>
   <b><?php echo esc_html__("Skip Saving 'crawlomatic_extra_categories' Post Meta", 'crawlomatic-multipage-scraper-post-generator');?></b>
   </td><td>
   <input type="checkbox" id="crawlomatic_extra_categories" name="crawlomatic_Main_Settings[crawlomatic_extra_categories]"<?php
      if ($crawlomatic_extra_categories == 'on')
          echo ' checked ';
      ?>>
   </td></tr><tr><td>
   <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
   <div class="bws_hidden_help_text cr_min_260px">
   <?php
      echo esc_html__("Skip saving this post meta for posts?", 'crawlomatic-multipage-scraper-post-generator');
      ?>
   </div>
   </div>
   <b><?php echo esc_html__("Skip Saving 'crawlomatic_extra_tags' Post Meta", 'crawlomatic-multipage-scraper-post-generator');?></b>
   </td><td>
   <input type="checkbox" id="crawlomatic_extra_tags" name="crawlomatic_Main_Settings[crawlomatic_extra_tags]"<?php
      if ($crawlomatic_extra_tags == 'on')
          echo ' checked ';
      ?>>
</div>
</td></tr><tr><td>
<div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Skip saving this post meta for posts?", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div>
<b><?php echo esc_html__("Skip Saving 'crawlomatic_post_img' Post Meta", 'crawlomatic-multipage-scraper-post-generator');?></b>
</td><td>
<input type="checkbox" id="crawlomatic_post_img" name="crawlomatic_Main_Settings[crawlomatic_post_img]"<?php
   if ($crawlomatic_post_img == 'on')
       echo ' checked ';
   ?>>
</div></td></tr><tr><td>
<div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Skip saving this post meta for posts?", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div>
<b><?php echo esc_html__("Skip Saving 'crawlomatic_timestamp' Post Meta", 'crawlomatic-multipage-scraper-post-generator');?></b>
</td><td>
<input type="checkbox" id="crawlomatic_timestamp" name="crawlomatic_Main_Settings[crawlomatic_timestamp]"<?php
   if ($crawlomatic_timestamp == 'on')
       echo ' checked ';
   ?>>
</div></td></tr><tr><td>
<div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Skip saving this post meta for posts?", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div>
<b><?php echo esc_html__("Skip Saving 'crawlomatic_post_date' Post Meta", 'crawlomatic-multipage-scraper-post-generator');?></b>
</td><td>
<input type="checkbox" id="crawlomatic_post_date" name="crawlomatic_Main_Settings[crawlomatic_post_date]"<?php
   if ($crawlomatic_post_date == 'on')
       echo ' checked ';
   ?>>
</div></td></tr><tr><td>
<hr/></td><td><hr/></td></tr><tr><td>
<h3><?php echo esc_html__("Random Sentence Generator Settings:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
</td></tr>
<tr><td>
<div>
<div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Insert some sentences from which you want to get one at random. You can also use variables defined below. %something ==> is a variable. Each sentence must be separated by a new line.", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div>
<b><?php echo esc_html__("First List of Possible Sentences (%%random_sentence%%):", 'crawlomatic-multipage-scraper-post-generator');?></b>
</td><td>
<textarea rows="8" cols="70" name="crawlomatic_Main_Settings[sentence_list]" placeholder="<?php echo esc_html__("Please insert the first list of sentences", 'crawlomatic-multipage-scraper-post-generator');?>"><?php echo esc_textarea($sentence_list);?></textarea>
</div>
</td></tr><tr><td>
<div>
<div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Insert some sentences from which you want to get one at random. You can also use variables defined below. %something ==> is a variable. Each sentence must be separated by a new line.", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div>
<b><?php echo esc_html__("Second List of Possible Sentences (%%random_sentence2%%):", 'crawlomatic-multipage-scraper-post-generator');?></b>
</td><td>
<textarea rows="8" cols="70" name="crawlomatic_Main_Settings[sentence_list2]" placeholder="<?php echo esc_html__("Please insert the second list of sentences", 'crawlomatic-multipage-scraper-post-generator');?>"><?php echo esc_textarea($sentence_list2);?></textarea>
</div>
</td></tr><tr><td>
<div>
<div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Insert some variables you wish to be exchanged for different instances of one sentence. Please format this list as follows:<br/>
   Variablename => Variables (seperated by semicolon)<br/>Example:<br/>adjective => clever;interesting;smart;huge;astonishing;unbelievable;nice;adorable;beautiful;elegant;fancy;glamorous;magnificent;helpful;awesome<br/>", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div>
<b><?php echo esc_html__("List of Possible Variables:", 'crawlomatic-multipage-scraper-post-generator');?></b>
</td><td>
<textarea rows="8" cols="70" name="crawlomatic_Main_Settings[variable_list]" placeholder="<?php echo esc_html__("Please insert the list of variables", 'crawlomatic-multipage-scraper-post-generator');?>"><?php echo esc_textarea($variable_list);?></textarea>
</div></td></tr>
<tr><td><hr/></td><td><hr/></td></tr><tr><td>
<h3><?php echo esc_html__("Custom HTML Code/ Ad Code:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
</td></tr>
<tr><td>
<div>
<div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Insert a custom HTML code that will replace the %%custom_html%% variable. This can be anything, even an Ad code.", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div>
<b><?php echo esc_html__("Custom HTML Code #1:", 'crawlomatic-multipage-scraper-post-generator');?></b>
</td><td>
<textarea rows="3" cols="70" name="crawlomatic_Main_Settings[custom_html]" placeholder="<?php echo esc_html__("Custom HTML #1", 'crawlomatic-multipage-scraper-post-generator');?>"><?php echo esc_textarea($custom_html);?></textarea>
</div>
</td></tr><tr><td>
<div>
<div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Insert a custom HTML code that will replace the %%custom_html2%% variable. This can be anything, even an Ad code.", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div>
<b><?php echo esc_html__("Custom HTML Code #2:", 'crawlomatic-multipage-scraper-post-generator');?></b>
</td><td>
<textarea rows="3" cols="70" name="crawlomatic_Main_Settings[custom_html2]" placeholder="<?php echo esc_html__("Custom HTML #2", 'crawlomatic-multipage-scraper-post-generator');?>"><?php echo esc_textarea($custom_html2);?></textarea>
</div>
</td></tr></table>
<hr/>
<h3><?php echo esc_html__("Affiliate Keyword Replacer Tool Settings:", 'crawlomatic-multipage-scraper-post-generator');?></h3>
<div class="table-responsive">
<table class="responsive table cr_main_table">
<thead>
<tr>
<th><?php echo esc_html__("ID", 'crawlomatic-multipage-scraper-post-generator');?><div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("This is the ID of the rule.", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div></th>
<th class="cr_max_width_40"><?php echo esc_html__("Del", 'crawlomatic-multipage-scraper-post-generator');?><div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Do you want to delete this rule?", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div></th>
<th><?php echo esc_html__("Search Keyword", 'crawlomatic-multipage-scraper-post-generator');?><div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("This keyword will be replaced with a link you define.", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div></th>
<th><?php echo esc_html__("Replacement Keyword", 'crawlomatic-multipage-scraper-post-generator');?><div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("This keyword will replace the search keyword you define. Leave this field blank if you only want to add an URL to the specified keyword.", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div></th>
<th><?php echo esc_html__("Link to Add", 'crawlomatic-multipage-scraper-post-generator');?><div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Define the link you want to appear the defined keyword. Leave this field blank if you only want to replace the specified keyword without linking from it.", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div></th>
<th><?php echo esc_html__("Target Content", 'crawlomatic-multipage-scraper-post-generator');?><div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
<div class="bws_hidden_help_text cr_min_260px">
<?php
   echo esc_html__("Select if you want to make this rule target post title, content or both.", 'crawlomatic-multipage-scraper-post-generator');
   ?>
</div>
</div></th>
</tr>
<tr><td><hr/></td><td><hr/></td><td><hr/></td><td><hr/></td><td><hr/></td><td><hr/></td></tr>
</thead>
<tbody>
<?php echo crawlomatic_expand_keyword_rules(); ?>
<tr><td><hr/></td><td><hr/></td><td><hr/></td><td><hr/></td><td><hr/></td><td><hr/></td></tr>
<tr>
<td class="cr_short_td">-</td>
<td class="cr_shrt_td2"><span class="cr_gray20">X</span></td>
<td class="cr_rule_line"><input type="text" name="crawlomatic_keyword_list[keyword][]"  placeholder="<?php echo esc_html__("Please insert the keyword to be replaced", 'crawlomatic-multipage-scraper-post-generator');?>" value="" class="cr_width_100" /></td>
<td class="cr_rule_line"><input type="text" name="crawlomatic_keyword_list[replace][]"  placeholder="<?php echo esc_html__("Please insert the keyword to replace the search keyword", 'crawlomatic-multipage-scraper-post-generator');?>" value="" class="cr_width_100" /></td>
<td class="cr_rule_line"><input type="url" validator="url" name="crawlomatic_keyword_list[link][]" placeholder="<?php echo esc_html__("Please insert the link to be added to the keyword", 'crawlomatic-multipage-scraper-post-generator');?>" value="" class="cr_width_100" /></td>
<td class="cr_xoq"><select id="crawlomatic_keyword_target" name="crawlomatic_keyword_list[target][]" class="cr_width_full">
<option value="content" selected><?php echo esc_html__("Content", 'crawlomatic-multipage-scraper-post-generator');?></option>
<option value="title"><?php echo esc_html__("Title", 'crawlomatic-multipage-scraper-post-generator');?></option>
<option value="both"><?php echo esc_html__("Content and Title", 'crawlomatic-multipage-scraper-post-generator');?></option></select></td>
</tr>
</tbody>
</table>
</div>
</td></tr>
</table>
</div>
</div>
</div>
<hr/>
<div><p class="submit"><input type="submit" name="btnSubmit" id="btnSubmit" class="button button-primary" onclick="unsaved = false;" value="<?php echo esc_html__("Save Settings", 'crawlomatic-multipage-scraper-post-generator');?>"/></p></div>
</form>
<p>
   <?php echo esc_html__("Available shortcodes:", 'crawlomatic-multipage-scraper-post-generator');?> <ol><li><strong>[crawlomatic-scraper]</strong> <?php echo esc_html__("to dynamically scrape content from any site - documentation ", 'crawlomatic-multipage-scraper-post-generator');?> <a href="https://coderevolution.ro/knowledge-base/faq/crawlomatics-crawlomatic-scraper-shortcode-documentation/" target="_blank"><?php echo esc_html__("here", 'crawlomatic-multipage-scraper-post-generator');?></a></li><li><strong>[crawlomatic-list-posts]</strong> <?php echo esc_html__("to include a list that contains only posts imported by this plugin", 'crawlomatic-multipage-scraper-post-generator');?></li><li><strong>[crawlomatic-display-posts]</strong> <?php echo esc_html__("to include a WordPress like post listing. Usage:", 'crawlomatic-multipage-scraper-post-generator');?> [crawlomatic-display-posts type='any/post/page/...' title_color='#ffffff' excerpt_color='#ffffff' read_more_text="Read More" link_to_source='yes' order='ASC/DESC' orderby='title/ID/author/name/date/rand/comment_count' title_font_size='19px', excerpt_font_size='19px' posts_per_page=number_of_posts_to_show category='posts_category' ruleid='ID_of_crawlomatic_rule'].</li></ol>
   <br/><?php echo esc_html__("Example:", 'crawlomatic-multipage-scraper-post-generator');?> <b>[crawlomatic-list-posts type='any' order='ASC' orderby='date' posts_per_page=50 category= '' ruleid='0']</b>
   <br/><?php echo esc_html__("Example 2:", 'crawlomatic-multipage-scraper-post-generator');?> <b>[crawlomatic-display-posts include_excerpt='true' image_size='thumbnail' wrapper='div']</b>
   <br/><?php echo esc_html__("Example 3:", 'crawlomatic-multipage-scraper-post-generator');?> <b>[crawlomatic-scraper url="https://www.yahoo.com/" query="ol.trendingnow_trend-list" output="text"]</b> <?php echo esc_html__("Please check plugin's documentation for more info.", 'crawlomatic-multipage-scraper-post-generator');?>
</p>
</div>
<?php
   }
   if (isset($_POST['crawlomatic_keyword_list'])) {
   	add_action('admin_init', 'crawlomatic_save_keyword_rules');
   }
   function crawlomatic_save_keyword_rules($data2) {
               $data2 = $_POST['crawlomatic_keyword_list'];
   			$rules = array();
               if(isset($data2['keyword'][0]))
               {
                   for($i = 0; $i < sizeof($data2['keyword']); ++$i) {
                       if(isset($data2['keyword'][$i]) && $data2['keyword'][$i] != '')
                       {
                           $index = trim( sanitize_text_field($data2['keyword'][$i]));
                           $rules[$index] = array(trim( sanitize_text_field( $data2['link'][$i] ) ), trim( sanitize_text_field( $data2['replace'][$i] ) ), trim( sanitize_text_field( $data2['target'][$i] ) ));
                       }
                   }
               }
               update_option('crawlomatic_keyword_list', $rules);
   		}
   function crawlomatic_expand_keyword_rules() {
   			$rules = get_option('crawlomatic_keyword_list');
   			$output = '';
               $cont = 0;
   			if (!empty($rules)) {
   				foreach ($rules as $request => $value) {  
   					$output .= '<tr>
                           <td class="cr_short_td">' . esc_html($cont) . '</td>
                           <td class="cr_shrt_td2"><span class="wpcrawlomatic-delete">X</span></td>
                           <td class="cr_rule_line"><input type="text" placeholder="' . esc_html__('Input the keyword to be replaced. This field is required', 'crawlomatic-multipage-scraper-post-generator') . '" name="crawlomatic_keyword_list[keyword][]" value="'.stripslashes($request).'" required class="cr_width_full"></td>
                           <td class="cr_rule_line"><input type="text" placeholder="' . esc_html__('Input the replacement word', 'crawlomatic-multipage-scraper-post-generator') . '" name="crawlomatic_keyword_list[replace][]" value="'.stripslashes($value[1]).'" class="cr_width_full"></td>
                           <td class="cr_rule_line"><input type="url" validator="url" placeholder="' . esc_html__('Input the URL to be added', 'crawlomatic-multipage-scraper-post-generator') . '" name="crawlomatic_keyword_list[link][]" value="'.stripslashes($value[0]).'" class="cr_width_full"></td>';
                           if(isset($value[2]))
                           {
                               $target = $value[2];
                           }
                           else
                           {
                               $target = 'content';
                           }
                           $output .= '<td class="cr_xoq"><select id="crawlomatic_keyword_target" name="crawlomatic_keyword_list[target][]" class="cr_width_full">
                                     <option value="content"';
                           if ($target == "content") {
                               $output .= " selected";
                           }
                           $output .= '>' . esc_html__('Content', 'crawlomatic-multipage-scraper-post-generator') . '</option>
                           <option value="title"';
                           if ($target == "title") {
                               $output .=  " selected";
                           }
                           $output .= '>' . esc_html__('Title', 'crawlomatic-multipage-scraper-post-generator') . '</option>
                           <option value="both"';
                           if ($target == "both") {
                               $output .=  " selected";
                           }
                           $output .= '>' . esc_html__('Content and Title', 'crawlomatic-multipage-scraper-post-generator') . '</option>
                       </select></td>
   					</tr>';
                       $cont++;
   				}
   			}
   			return $output;
   		}
   ?>