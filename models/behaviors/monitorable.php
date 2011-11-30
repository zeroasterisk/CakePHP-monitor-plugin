<?php
/**
 * Facilitates Monitor CakePHP plugin
 * exposes model helper methods for collecting data and creating monitors 
 *
 * @author Alan Blount <alan@zeroasterisk.com>
 * @link https://github.com/zeroasterisk/CakePHP-monitor-plugin
 * @copyright (c) 2011 Alan Blount
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 * @access public
 */
class MonitorableBehavior extends ModelBehavior{
	public $log = array();
	public $errors = array();
	
	# ===========================================================
	# Setup for shell script & crons
	/**
	* Checks to see if there is a currently running batch
	* @param object $Model
	* @return bool
	*/
	public function monitorCheck($Model=null) {
		$check = $Model->find('first', array('conditions' => array("{$Model->alias}.id" => 'monitorCheck')));
		if (empty($check)) {
			return $Model->monitorLog(__function__, "success: no check record");
		}
		if (isset($check[$Model->alias]['created'])) {
			if (strtotime($check[$Model->alias]['created']) < time() - MonitorUtil::getConfig('maximum_cron_runtime_in_seconds')) {
				$Model->monitorLog(__function__, "warning: check has expired... errors?  stall?  timeout?");
				return $Model->monitorCheckDelete();
			}
		}
		$Model->monitorLog(__function__, "success: check record exists");
		return false;
	}
	/**
	* Add check record (currently running)
	* @param object $Model
	* @return bool
	*/
	function monitorCheckSet($Model=null) {
		$checkData = array($Model->alias => array('id' => 'monitorCheck', 'created' => date('Y-m-d H:i:s')));
		$Model->create(false);
		if ($Model->save($checkData)) {
			return $Model->monitorLog(__function__, "success: saved");
		}
		$Model->monitorLog(__function__, "error: can not create/save check");
		return true;
	}
	/**
	* delete check record (currently running)
	* @param object $Model
	* @return bool
	*/
	function monitorCheckDelete($Model=null) {
		if ($Model->read("{$Model}.id", 'monitorCheck')) {
			if ($Model->delete('monitorCheck')) {
				$Model->monitorLog(__function__, "success: deleted");
			} else {
				$Model->monitorLog(__function__, "error: unable to delete check");
				return false;
			}
		}
		$Model->monitorLog(__function__, "info: no check to delete");
		return true;
	}
	# ===========================================================
	# Misc Utilities
	/**
	 * Basic utility for logging if in debug mode
	 * @param object $Model
	 * @param mixed $function
	 * @param mixed $message
	 * @param mixed $data
	 * @return bool
	 */
	public function monitorLog($Model=null, $function=null, $message=null, $data=null) {
		return MonitorUtil::log($Model->alias, $function, $message, $data);
	}
	
}
