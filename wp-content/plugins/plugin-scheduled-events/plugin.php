<?php
/**
 * Plugin Name: View Scheduled Events
 * Plugin URI:  http://example.com/
 * Description: View cron tasks via the admin.
 * Author:      WROX
 * Author URI:  http://wrox.com
 */

require_once plugin_dir_path( __FILE__ ) . 'View.php';

$pdev_scheduled = new \PDEV\ScheduledEvents\View();

$pdev_scheduled->boot();
