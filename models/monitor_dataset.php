<?php
/**
 * Data Collector Model for CakePHP-monitor-plugin
 * the configuration for processes which collect data to track/monitor
 *
 * @author Alan Blount <alan@zeroasterisk.com>
 * @link https://github.com/zeroasterisk/CakePHP-monitor-plugin
 * @copyright (c) 2011 Alan Blount
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 * @access public
 */
class MonitorDataset extends MonitorAppModel {
	/**
	* The name of this model
	* @var name
	*/
	public $name = 'MonitorDataset';
	/**
	* Belongs To Association
	*/
	public $hasMany = array(
		'MonitorDatasetLog' => array(
			'limit' => 100,
			'order' => 'created DESC',
			),
		'MonitorReportLog' => array(
			'limit' => 100,
			'order' => 'created DESC',
			),
		);
}
?>
