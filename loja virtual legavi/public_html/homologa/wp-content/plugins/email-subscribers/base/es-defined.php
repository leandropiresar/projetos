<?php
$es_plugin_name='email-subscribers';
$es_plugin_folder_name = dirname(dirname(plugin_basename(__FILE__)));
$es_current_folder=dirname(dirname(__FILE__));

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
if(!defined('ES_TDOMAIN')) define('ES_TDOMAIN', $es_plugin_name);
if(!defined('ES_PLUGIN_NAME')) define('ES_PLUGIN_NAME', $es_plugin_name);
if(!defined('ES_PLUGIN_DISPLAY')) define('ES_PLUGIN_DISPLAY', "Email Subscribers");
if(!defined('ES_PLG_DIR')) define('ES_PLG_DIR', dirname($es_current_folder).DS);
if(!defined('ES_DIR')) define('ES_DIR', $es_current_folder.DS);
if(!defined('ES_URL')) define('ES_URL',plugins_url().'/'.strtolower('email-subscribers').'/');
define('ES_FILE',ES_DIR.'email-subscribers.php');
$admin_help_url = admin_url( 'admin.php?page=es-general-information' );
if(!defined('ES_FAV')) define('ES_FAV', $admin_help_url);
if(!defined('ES_ADMINURL')) define('ES_ADMINURL', get_option('siteurl') . '/wp-admin/admin.php');
define('ES_OFFICIAL', 'If you like <strong>Email Subscribers</strong> please leave us <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/email-subscribers?filter=5#postform">&#9733;&#9733;&#9733;&#9733;&#9733;</a> a rating. A huge thank you from StoreApps in advance!');

global $es_includes;
?>