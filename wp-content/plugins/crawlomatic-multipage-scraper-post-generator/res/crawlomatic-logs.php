<?php
   function crawlomatic_logs()
   {
       global $wp_filesystem;
       if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') ){
           include_once(ABSPATH . 'wp-admin/includes/file.php');$creds = request_filesystem_credentials( site_url() );
           wp_filesystem($creds);
       }
       if(isset($_POST['crawlomatic_delete']))
       {
           if($wp_filesystem->exists(WP_CONTENT_DIR . '/crawlomatic_info.log'))
           {
               $wp_filesystem->delete(WP_CONTENT_DIR . '/crawlomatic_info.log');
           }
       }
       if(isset($_POST['crawlomatic_delete_rules']))
       {
           $running = array();
           update_option('crawlomatic_running_list', $running);
           update_option('crawlomatic_auto_running_list', $running);
           $flock_disabled = explode(',', ini_get('disable_functions'));
           if(!in_array('flock', $flock_disabled))
           {
               foreach (glob(get_temp_dir() . 'crawlomatic_*') as $filename) 
               {
                  $f = fopen($filename, 'w');
                  if($f !== false)
                  {
                     flock($f, LOCK_UN);
                     fclose($f);
                  }
                  $wp_filesystem->delete($filename);
               }
           }
       }
       if(isset($_POST['crawlomatic_restore_defaults']))
       {
           crawlomatic_activation_callback(true);
       }
       if(isset($_POST['crawlomatic_delete_all']))
       {
           crawlomatic_delete_all_posts();
       }
       if(isset($_POST['crawlomatic_delete_all_rules']))
       {
           crawlomatic_delete_all_rules();
       }
   ?>
<div class="wp-header-end"></div>
<div class="wrap gs_popuptype_holder seo_pops">
<div>
   <div>
      <h3>
         <?php echo esc_html__("System Info:", 'crawlomatic-multipage-scraper-post-generator');?> 
         <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
            <div class="bws_hidden_help_text cr_min_260px">
               <?php
                  echo esc_html__("Some general system information.", 'crawlomatic-multipage-scraper-post-generator');
                  ?>
            </div>
         </div>
      </h3>
      <hr/>
      <table class="cr_server_stat">
         <tr class="cdr-dw-tr">
            <td class="cdr-dw-td"><?php echo esc_html__("User Agent:", 'crawlomatic-multipage-scraper-post-generator');?></td>
            <td class="cdr-dw-td-value"><?php echo esc_html($_SERVER['HTTP_USER_AGENT']); ?></td>
         </tr>
         <tr class="cdr-dw-tr">
            <td class="cdr-dw-td"><?php echo esc_html__("Web Server:", 'crawlomatic-multipage-scraper-post-generator');?></td>
            <td class="cdr-dw-td-value"><?php echo esc_html($_SERVER['SERVER_SOFTWARE']); ?></td>
         </tr>
         <tr class="cdr-dw-tr">
            <td class="cdr-dw-td"><?php echo esc_html__("PHP Version:", 'crawlomatic-multipage-scraper-post-generator');?></td>
            <td class="cdr-dw-td-value"><?php echo esc_html(phpversion()); ?></td>
         </tr>
         <tr class="cdr-dw-tr">
            <td class="cdr-dw-td"><?php echo esc_html__("PHP Max POST Size:", 'crawlomatic-multipage-scraper-post-generator');?></td>
            <td class="cdr-dw-td-value"><?php echo esc_html(ini_get('post_max_size')); ?></td>
         </tr>
         <tr class="cdr-dw-tr">
            <td class="cdr-dw-td"><?php echo esc_html__("PHP Max Upload Size:", 'crawlomatic-multipage-scraper-post-generator');?></td>
            <td class="cdr-dw-td-value"><?php echo esc_html(ini_get('upload_max_filesize')); ?></td>
         </tr>
         <tr class="cdr-dw-tr">
            <td class="cdr-dw-td"><?php echo esc_html__("PHP Memory Limit:", 'crawlomatic-multipage-scraper-post-generator');?></td>
            <td class="cdr-dw-td-value"><?php echo esc_html(ini_get('memory_limit')); ?></td>
         </tr>
         <tr class="cdr-dw-tr">
            <td class="cdr-dw-td"><?php echo esc_html__("PHP DateTime Class:", 'crawlomatic-multipage-scraper-post-generator');?></td>
            <td class="cdr-dw-td-value"><?php echo (class_exists('DateTime') && class_exists('DateTimeZone')) ? '<span class="cdr-green">' . esc_html__('Available', 'crawlomatic-multipage-scraper-post-generator') . '</span>' : '<span class="cdr-red">' . esc_html__('Not available', 'crawlomatic-multipage-scraper-post-generator') . '</span> | <a href="http://php.net/manual/en/datetime.installation.php" target="_blank">more info&raquo;</a>'; ?> </td>
         </tr>
         <tr class="cdr-dw-tr">
            <td class="cdr-dw-td"><?php echo esc_html__("PHP Curl:", 'crawlomatic-multipage-scraper-post-generator');?></td>
            <td class="cdr-dw-td-value"><?php echo (function_exists('curl_version')) ? '<span class="cdr-green">' . esc_html__('Available', 'crawlomatic-multipage-scraper-post-generator') . '</span>' : '<span class="cdr-red">' . esc_html__('Not available', 'crawlomatic-multipage-scraper-post-generator') . '</span>'; ?> </td>
         </tr>
         <?php do_action('coderevolution_dashboard_widget_server') ?>
      </table>
   </div>
   <div>
      <br/>
      <hr class="cr_special_hr"/>
      <div>
         <h3>
            <?php echo esc_html__("Rules Currently Running:", 'crawlomatic-multipage-scraper-post-generator');?>
            <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
               <div class="bws_hidden_help_text cr_min_260px">
                  <?php
                     echo esc_html__("These rules are currently running on your server.", 'crawlomatic-multipage-scraper-post-generator');
                     ?>
               </div>
            </div>
         </h3>
         <div>
            <?php
               if (!get_option('crawlomatic_running_list')) {
                   $running = array();
               } else {
                   $running = get_option('crawlomatic_running_list');
               }
               if (!empty($running)) {
                   echo '<ul>';
                   foreach($running as $key => $thread)
                   {
                       echo '<li>ID - ' . esc_html($thread) . esc_html__(' - started at: ', 'crawlomatic-multipage-scraper-post-generator') . gmdate("Y-m-d H:i:s", $key) . '</li>';
                   }
                   echo '</ul>'; 
                   echo esc_html__('Current time: ', 'crawlomatic-multipage-scraper-post-generator') . gmdate("Y-m-d H:i:s", time());         
               }
               else
               {
                   echo esc_html__('No rules are running right now', 'crawlomatic-multipage-scraper-post-generator');
               }
               ?>
         </div>
         <hr/>
         <form method="post" onsubmit="return confirm('<?php echo esc_html__('Are you sure you want to clear the running list?', 'crawlomatic-multipage-scraper-post-generator');?>');">
            <input name="crawlomatic_delete_rules" type="submit" title="<?php echo esc_html__('Caution! This is for debugging purpose only!', 'crawlomatic-multipage-scraper-post-generator');?>" value="<?php echo esc_html__('Clear Running Rules List', 'crawlomatic-multipage-scraper-post-generator');?>">
         </form>
      </div>
      <div>
         <br/>
         <hr class="cr_special_hr"/>
         <div>
            <h3>
               <?php echo esc_html__('Backup Current Rules To File:', 'crawlomatic-multipage-scraper-post-generator');?>
               <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                  <div class="bws_hidden_help_text cr_min_260px">
                     <?php
                        echo esc_html__("Hit this button and you can backup the current rule settings to file. This is useful if you have many rules created and want to migrate settings to another server.", 'crawlomatic-multipage-scraper-post-generator');
                        ?>
                  </div>
               </div>
            </h3>
            <hr/>
            <form method="post" onsubmit="return confirm('Are you sure you want to download rule settings to file?');"><input name="crawlomatic_download_rules_to_file" type="submit" value="Download Rules To File"></form>
         </div>
         <br/>
         <hr class="cr_special_hr"/>
         <div>
            <h3>
               <?php echo esc_html__('Load Rules From File:', 'crawlomatic-multipage-scraper-post-generator');?>
               <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                  <div class="bws_hidden_help_text cr_min_260px">
                     <?php
                        echo esc_html__("Here you can upload a previously downloaded backup file and restore the rules from it.", 'crawlomatic-multipage-scraper-post-generator');
                        ?>
                  </div>
               </div>
            </h3>
            <hr/>
            <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to load rules list from file?');"><label for="crawlomatic-file-upload-rules">Select File To Upload:&nbsp;&nbsp;</label><input type="file" id="crawlomatic-file-upload-rules" name="crawlomatic-file-upload-rules" value=""/><br/><br/>
               <input name="crawlomatic_restore_rules" type="submit" value="Restore Rules From File">
            </form>
         </div>
         <br/>
         <hr class="cr_special_hr"/>
         <div>
            <h3>
               <?php echo esc_html__('Restore Plugin Default Settings', 'crawlomatic-multipage-scraper-post-generator');?> 
               <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                  <div class="bws_hidden_help_text cr_min_260px">
                     <?php
                        echo esc_html__('Hit this button and the plugin settings will be restored to their default values. Warning! All settings will be lost!', 'crawlomatic-multipage-scraper-post-generator');
                        ?>
                  </div>
               </div>
            </h3>
            <hr/>
            <form method="post" onsubmit="return confirm('<?php echo esc_html__('Are you sure you want to restore the default plugin settings?', 'crawlomatic-multipage-scraper-post-generator');?>');"><input name="crawlomatic_restore_defaults" type="submit" value="<?php echo esc_html__('Restore Plugin Default Settings', 'crawlomatic-multipage-scraper-post-generator');?>"></form>
         </div>
         <br/>
         <hr class="cr_special_hr"/>
         <div>
            <h3>
               <?php echo esc_html__('Delete All Posts Generated by this Plugin:', 'crawlomatic-multipage-scraper-post-generator');?> 
               <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                  <div class="bws_hidden_help_text cr_min_260px">
                     <?php
                        echo esc_html__('Hit this button and all posts generated by this plugin will be deleted!', 'crawlomatic-multipage-scraper-post-generator');
                        ?>
                  </div>
               </div>
            </h3>
            <hr/>
            <form method="post" onsubmit="return confirm('<?php echo esc_html__('Are you sure you want to delete all generated posts? This can take a while, please wait until it finishes.', 'crawlomatic-multipage-scraper-post-generator');?>');"><input name="crawlomatic_delete_all" type="submit" value="<?php echo esc_html__('Delete All Generated Posts', 'crawlomatic-multipage-scraper-post-generator');?>"></form>
         </div>
         <br/>
         <hr class="cr_special_hr"/>
         <div>
            <h3>
               <?php echo esc_html__('Delete All Rules from \'Web Crawl to Posts\' Section: ', 'crawlomatic-multipage-scraper-post-generator');?>
               <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                  <div class="bws_hidden_help_text cr_min_260px">
                     <?php
                        echo esc_html__("Hit this button and all rules will be deleted!", 'crawlomatic-multipage-scraper-post-generator');
                        ?>
                  </div>
               </div>
            </h3>
            <hr/>
            <form method="post" onsubmit="return confirm('Are you sure you want to delete all rules?');"><input name="crawlomatic_delete_all_rules" type="submit" value="Delete All Generated Rules"></form>
         </div>
         <br/>
         <hr class="cr_special_hr"/>
         <h3>
            <?php echo esc_html__('Activity Log:', 'crawlomatic-multipage-scraper-post-generator');?>
            <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
               <div class="bws_hidden_help_text cr_min_260px">
                  <?php
                     echo esc_html__('This is the main log of your plugin. Here will be listed every single instance of the rules you run or are automatically run by schedule jobs (if you enable logging, in the plugin configuration).', 'crawlomatic-multipage-scraper-post-generator');
                     ?>
               </div>
            </div>
         </h3>
         <div>
            <?php
               if($wp_filesystem->exists(WP_CONTENT_DIR . '/crawlomatic_info.log'))
               {
                    $log = $wp_filesystem->get_contents(WP_CONTENT_DIR . '/crawlomatic_info.log');
                   $log = esc_html($log);$log = str_replace('&lt;br/&gt;', '<br/>', $log);echo $log;
               }
               else
               {
                   echo esc_html__('Log empty', 'crawlomatic-multipage-scraper-post-generator');
               }
               ?>
         </div>
      </div>
      <hr/>
      <form method="post" onsubmit="return confirm('<?php echo esc_html__('Are you sure you want to delete all logs?', 'crawlomatic-multipage-scraper-post-generator');?>');">
         <input name="crawlomatic_delete" type="submit" value="<?php echo esc_html__('Delete Logs', 'crawlomatic-multipage-scraper-post-generator');?>">
      </form>
   </div>
</div>
<?php
   }
   ?>