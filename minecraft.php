<?php
/*
Plugin Name: Minecraft Server Status
Plugin URI: http://github.com/binarycleric
Description: Display your minecraft server's status on your wordpress site.
Author: Jon Daniel
Version: 0.1
Author URI: http://jondaniel.net
License: None yet (IE, you can't use it)
*/

define('SETTINGS_GROUP', 'minecraft-settings-group');



add_action('wp_ajax_server_status', 'server_status_callback');

wp_enqueue_script('minecraft', 
                  plugins_url('javascript/minecraft.js', __FILE__),
                  array('jquery'), 
                  null, 
                  true);

function server_status_callback() {
  $mc_host="minecraft.pittco.org"; 
  $mc_port=25565;


  $mc_logo = plugins_url("images/minecraft-logo.png", __FILE__);

  $socket = @fsockopen($mc_host, $mc_port, $num, $error, 3);

  if($socket) {
    $color = "green";
    $status = "online";
    $bg_image = plugins_url("images/minecraft-creeper.png", __FILE__);
  } else {
    $color = "red";
    $status = "offline";
    $bg_image = plugins_url("images/minecraft-skeleton.png", __FILE__);
  }

  @fclose($socket);

  require "partials/server-status.php";
  die(); 
}
