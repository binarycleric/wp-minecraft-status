<?php
/*
Plugin Name: Minecraft Server Status
Plugin URI: https://github.com/binarycleric/wp-minecraft-status
Description: Display your minecraft server's status on your wordpress site.
Author: Jon Daniel
Version: 0.1
Author URI: http://jondaniel.net
License: GPL2
*/

define('SETTINGS_GROUP', 'minecraft-settings-group');
add_action('wp_ajax_server_status', 'server_status_callback');
add_action('wp_ajax_nopriv_server_status', 'server_status_callback');

wp_enqueue_style('minecraft-css',
                 plugins_url('stylesheets/minecraft.css', __FILE__)); 

wp_enqueue_script('minecraft-js', 
                  plugins_url('javascript/minecraft.js', __FILE__),
                  array('jquery'), 
                  null, 
                  true);

function server_status_callback() {
  $mc_host="minecraft.pittco.org"; 
  $mc_port=25565;

  $socket = @fsockopen($mc_host, $mc_port, $num, $error, 2);

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
