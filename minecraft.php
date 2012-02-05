<?php
/*
Plugin Name: Minecraft Server Status
Plugin URI: https://github.com/binarycleric/wp-minecraft-status
Description: Display your minecraft server's status on your wordpress site.
Author: Jon Daniel
Version: 0.1
Author URI: http://jondaniel.net
*/

define('SETTINGS_GROUP', 'minecraft-settings-group');
add_action('wp_ajax_server_status', 'server_status_callback');
add_action('wp_ajax_nopriv_server_status', 'server_status_callback');

wp_enqueue_style('minecraft-css',
                 plugins_url('stylesheets/minecraft.css', __FILE__)); 


wp_enqueue_script('spin-js',
                  plugins_url('javascript/spin.min.js', __FILE__));

wp_enqueue_script('minecraft-js', 
                  plugins_url('javascript/minecraft.js', __FILE__),
                  array('jquery', 'spin-js'), 
                  null, 
                  true);

function server_status_callback() {
  $mc_host=$_POST['host'];
  $mc_port=$_POST['port'];

  $socket = @fsockopen($mc_host, $mc_port, $num, $error, 2);

  if($socket) {
    $color = "green";
    $status = "online";
  } else {
    $color = "red";
    $status = "offline";
  }

  @fclose($socket);

  require "partials/server-status.php";
  die(); 
}
