<?php
/*
Plugin Name: GTMetrix website performance
Plugin URI: http://www.WebsiteFreelancers.nl
Description: Widget to test website performance by gtmetrix
Author: WebsiteFreelancers.nl
Version: 1.0
Author URI: http://www.websitefreelancers.nl
*/

function vn_plugin_gtmetrix_wp_init() {
   // check for the required API functions
   if (!function_exists('register_sidebar_widget') || !function_exists('register_widget_control'))
      return;

   // this prints the widget
   function vn_plugin_gtmetix($args) {
      $html = '<h3 class="widgetTitle">Website Speed</h3><form target="_blank" method="get" action="http://gtmetrix.com/analyze.html" class="form">
      <fieldset class="fieldset"><legend>By <a href="http://gtmetrix.com/">GTmetrix</a></legend>
      <p>Enter your website URL to measure and analyse page speed:</p>
      <p><input value="http://" size="20" name="url" id="url"><br/><small>Note: opens a new window</small></p>
      <input type="submit" value="Check!" class="sendbutton" id="sendbutton1"></fieldset> </form>';
   echo $html;
   }

   // widget options
   function vn_plugin_gtmetrix_wp_control() {
   // Void, perhaps later
   }

   // Tell Dynamic Sidebar about our new widget and its control
   register_sidebar_widget(array (
      'GTMetrix',
      'widgets'
   ), 'vn_plugin_gtmetix');

}

// Delay plugin execution to ensure Dynamic Sidebar has a chance to load first
add_action('widgets_init', 'vn_plugin_gtmetrix_wp_init');


/**
 * Additional links on the plugin page
 */
function vn_plugin_gtmetrix_wp_RegisterPluginLinks($links, $file) {
   if ($file == 'gtmetrix-website-performance/gtmetrix-website-performance.php') {
      $links[] = '<a href="widgets.php">' . __('Settings') . '</a>';
      $links[] = '<a href="http://www.mijnpress.nl">' . __('Custom WordPress coding nodig?') . '</a>';
      $links[] = '<a href="http://hosting.ber-art.nl">' . __('Stabiele webhosting') . '</a>';
   }
   return $links;
}

add_filter('plugin_row_meta','vn_plugin_gtmetrix_wp_RegisterPluginLinks', 10, 2);
?>
