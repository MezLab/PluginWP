<?php
/*
 * Plugin Name
 *
 * @package           WPackage Unsocials
 * @author            Massimo Maestri
 * @copyright         2024 Free
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WPackage Unsocials
 * Plugin URI:        https://www.developer.unsocials.com/
 * Description:       Unsocials mette a disposizione un team di sviluppatori di Plugins Wordpress per semplificare le dinamiche del tuo sito web.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Massimo Maestri (MEZ)
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wpackage_unsocials
 * Domain Path:       /languages
 */




 define( 'PLUGIN_PATH', plugin_dir_path(__FILE__)); 
 define( 'PLUGIN_URL', plugin_dir_url(__FILE__) );
 define( 'PLUGIN_URL_APP', plugin_dir_url(__FILE__) . 'App/' );
 
 require 'Core/function.php';
 require 'Core/Options.php';
 require 'route.php';
 
 $plugin_options = new Options();
 
 wpmez_autoloader($plugin_options->classes());
 wpmez_autoloader($plugin_options->core());
 
