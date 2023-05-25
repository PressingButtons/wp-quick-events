<?php
/**
 * @package           WP Quick Events
 * @author            Steven Boyd
 * @copyright         2023 Steven Boyd
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin  wp-quick-events
 * Plugin Name:       WP Quick Events
 * Plugin URI:        https://github.com/pressingbuttons
 * Description:       Creates minimal date records to be used for showcasing events
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Steven Boyd
 * Author URI:        https://github.com/pressingbuttons
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://github.com/pressingbuttons
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2022 Automattic, Inc.
*/

if(!defined('ABSPATH')): die("Sorry, this file is not open for public access."); endif;

define('WPQEVENTS_VERSION', '1.0');
define('WPQEVENTS_MINIMUM_WP_VERSION', '5.0');
define('WPQEVENTS_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once( WPQEVENTS_PLUGIN_DIR . 'class-wpqevents-admin.php');
require_once( WPQEVENTS_PLUGIN_DIR . 'class-wpqe_metaboxes.php');
require_once( WPQEVENTS_PLUGIN_DIR . 'wpqe_shortcode.php');

register_activation_hook( __FILE__, array($wpqe_admin, 'activate'));  
register_deactivation_hook( __FILE__, array($wpqe_admin, 'deactivate'));  
