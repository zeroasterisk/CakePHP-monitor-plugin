<?php
/**
 * Configuration for CakePHP-monitor-plugin
 *
 * @author Alan Blount <alan@zeroasterisk.com>
 * @link https://github.com/zeroasterisk/CakePHP-monitor-plugin
 * @copyright (c) 2011 Alan Blount
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 * @access public
 */
$config = array('Monitor' => array(
	'debug' => false,
	# ^ true, creates a log of all monitor actions via $Object::log()
	'Auth' => false,
	# ^ true, uses the Auth component to control admin/web interface (WIP)
	'maximum_cron_runtime_in_seconds' => 600, // 10 min
	));
