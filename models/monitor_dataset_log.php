<?php
/**
 * Data Model for CakePHP-monitor-plugin
 * a history of the data collected by a dataset configuration
 *
 * @author Alan Blount <alan@zeroasterisk.com>
 * @link https://github.com/zeroasterisk/CakePHP-monitor-plugin
 * @copyright (c) 2011 Alan Blount
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 * @access public
 */
class MonitorDatasetLog extends MonitorAppModel {
	/**
	* The name of this model
	* @var name
	*/
	public $name = 'MonitorDatasetLog';
	/**
	* Belongs To Association
	*/
	public $belongsTo = array('MonitorDataCollector');
}
?>
