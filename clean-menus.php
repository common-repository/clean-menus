<?php
/*
 Plugin Name: Clean menus
 Description: Cleaning navigation menus by hiding all draft posts, pending review posts, future posts, private and trashed posts.
 Version: 1.0.5
 Author: Gesundheit Bewegt GmbH
 Author URI: http://gesundheit-bewegt.com
*/

if(!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

require_once 'CleanMenus.class.php';

new \LoMa\CleanMenus();