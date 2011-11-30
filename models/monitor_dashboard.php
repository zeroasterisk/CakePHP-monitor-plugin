<?php
/**
 * Data Report Log Model for CakePHP-monitor-plugin
 * the configurations for collections/slices of reports/histories
 *
 * @author Alan Blount <alan@zeroasterisk.com>
 * @link https://github.com/zeroasterisk/CakePHP-monitor-plugin
 * @copyright (c) 2011 Alan Blount
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 * @access public
 */
class MonitorDashboard extends MonitorAppModel {
	/**
	* The name of this model
	* @var name
	*/
	public $name = 'MonitorDashboard';
	/**
	* Belongs To Association
	*/
	public $hasAndBelongToMany = array('MonitorReport');
}
?>
