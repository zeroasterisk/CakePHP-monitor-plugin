<?php
/**
 * Data Report Log Model for CakePHP-monitor-plugin
 * the history of every reports (pass/fail) track/monitor
 *
 * @author Alan Blount <alan@zeroasterisk.com>
 * @link https://github.com/zeroasterisk/CakePHP-monitor-plugin
 * @copyright (c) 2011 Alan Blount
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 * @access public
 */
class MonitorReportLog extends MonitorAppModel {
	/**
	* The name of this model
	* @var name
	*/
	public $name = 'MonitorReportLog';
	/**
	* Belongs To Association
	*/
	public $belongsTo = array('MonitorReport', 'MonitorDataset');
}
?>
