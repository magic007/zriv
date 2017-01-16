<?php
/*  Copyright 2009  Tony @ MnM Designs  (email : tony@mnm-designs.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//###  SECURITY  ###//
if (!defined('ABSPATH')) die("'tsk-tsk' You should only access this page via WP-Admin!");


// Install
if( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ) {
	$sql = "CREATE TABLE IF NOT EXISTS `". $table_name ."` (
			`id` DOUBLE NOT NULL AUTO_INCREMENT ,
			`name` VARCHAR( 120 ) NOT NULL ,
			`useragent` VARCHAR( 225 ) NOT NULL ,
			`url` VARCHAR( 255 ) NOT NULL ,
			`search_str` VARCHAR( 120 ) NOT NULL ,
			`set_from` DATETIME NOT NULL ,
			`last_index_time` DATETIME NOT NULL ,
			`index_count` DOUBLE NOT NULL DEFAULT '0',
			`active` ENUM( 'y', 'n' ) NOT NULL DEFAULT 'y',
			PRIMARY KEY ( `id` ) 
			)";
	$wpdb->query( $sql );
	
	/*
	* Insert a few spider rows - the main ones only - the user can add more later
	*/
	$wpdb->query( "INSERT INTO `". $table_name ."` ( `name`, `url`, `search_str`, `set_from` )
						VALUES ( 'GoogleBot', 'http://www.googlebot.com/bot.html', 'googlebot', now() )" );						
	$wpdb->query( "INSERT INTO `". $table_name ."` ( `name`, `url`, `search_str`, `set_from` ) 
						VALUES ( 'Yahoo Slurp', 'http://help.yahoo.com/l/us/yahoo/search/webcrawler/index.html', 'slurp', now() )" );							
	$wpdb->query( "INSERT INTO `". $table_name ."` ( `name`, `url`, `search_str`, `set_from` )
						VALUES ( 'MSN Bot', 'http://search.msn.com/msnbot.htm', 'msnbot', now() )" );

	$sql = "CREATE TABLE IF NOT EXISTS `". $table_name ."_log` (
 			`id` int( 11 ) NOT NULL,
 			`ip` varchar( 20 ) NOT NULL,
			`host` varchar( 120 ) NOT NULL,
			`page` varchar( 255 ) NOT NULL,
			`datetime` datetime NOT NULL
			)";
	$wpdb->query( $sql );

	add_option( "mnmst_db_version", $mnmst_db_version );
	add_option( "mnmst_version",  $mnmst_version );
	add_option( "mnmst_max_rows_per_spider", 30 ); 
	add_option( "mnmst_slide_delay", 300 );
	add_option( "mnmst_pct_bar_color", "red" );
	add_option( "mnmst_log_state", 'c' );
}

// Upgrade
$installed_ver = get_option( "mnmst_db_version" );
if( $installed_ver != $mnmst_db_version ) {
	$sql = "CREATE TABLE IF NOT EXISTS `". $table_name ."` (
			`id` DOUBLE NOT NULL AUTO_INCREMENT ,
			`name` VARCHAR( 120 ) NOT NULL ,
			`useragent` VARCHAR( 225 ) NOT NULL ,
			`url` VARCHAR( 255 ) NOT NULL ,
			`search_str` VARCHAR( 120 ) NOT NULL ,
			`set_from` DATETIME NOT NULL ,
			`last_index_time` DATETIME NOT NULL ,
			`index_count` DOUBLE NOT NULL DEFAULT '0',
			`active` ENUM( 'y', 'n' ) NOT NULL DEFAULT 'y',
			PRIMARY KEY ( `id` ) 
			)";
	$wpdb->query( $sql );
	
	$sql = "CREATE TABLE IF NOT EXISTS `". $table_name ."_log` (
 			`id` int( 11 ) NOT NULL,
 			`ip` varchar( 20 ) NOT NULL,
			`host` varchar( 120 ) NOT NULL,
			`page` varchar( 255 ) NOT NULL,
			`datetime` datetime NOT NULL
			)";
	$wpdb->query( $sql );
	
	update_option( "mnmst_db_version", $mnmst_db_version );
}
?>