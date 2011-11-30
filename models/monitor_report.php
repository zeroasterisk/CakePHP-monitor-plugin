<?php
/**
 * Data Report Model for CakePHP-monitor-plugin
 * the configuration for reports (pass/fail) track/monitor
 *
 * @author Alan Blount <alan@zeroasterisk.com>
 * @link https://github.com/zeroasterisk/CakePHP-monitor-plugin
 * @copyright (c) 2011 Alan Blount
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 * @access public
 */
class MonitorReport extends MonitorAppModel {
	/**
	* The name of this model
	* @var name
	*/
	public $name = 'MonitorReport';
	/**
	* Belongs To Association
	*/
	public $hasMany = array(
		'MonitorReportLog' => array(
			'limit' => 100,
			'order' => 'created DESC',
			),
		);
}
?>
