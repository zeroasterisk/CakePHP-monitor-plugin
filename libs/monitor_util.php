<?php
/**
 * Helper class to preform some basic tasks. 
 * Configuration handled here for simplicity 
 * 	allows cached single-request to any key, only loads config file if needed
 *
 * @author Alan Blount <alan@zeroasterisk.com>
 * @link https://github.com/zeroasterisk/CakePHP-monitor-plugin
 * @copyright (c) 2011 Alan Blount
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 * @access public
 */
class MonitorUtil extends Object {
	/**
	* Monitor configurations stored in
	* app/config/monitor.php
	* @var array
	*/
	static public $config = array();
	/**
	* Base config
	* @var array
	*/
	static public $_baseConfig = array(
		'version' => '1.0',
		'description' => 'CakePHP Monitor Plugin',
		# Other configuration should be set in app/config/monitor.php
		'debug' => false,
		'Auth' => false,
		);
	/**
	* Testing getting a configuration option.
	* @param string $key to search for
	* @return mixed $result of configuration key.
	* @access public
	*/
	static public function getConfig($key){
		if (isset(self::$config[$key])) {
			return self::$config[$key];
		}
		//try existing configure setting
		if (self::$config[$key] = Configure::read("Monitor.$key")) {
			return self::$config[$key];
		}
		//try load configuration file and try again.
		$loaded = Configure::load('monitor');
		$loaded_config = Configure::read('Monitor');
		if (!is_array($loaded_config)) {
			$loaded_config = array();
		}
		self::$config = array_merge(self::$_baseConfig, $loaded_config);
		if (isset(self::$config[$key])) {
			return self::$config[$key];
		}
		if (self::$config[$key] = Configure::read("Monitor.$key")) {
			return self::$config[$key];
		}
		unset(self::$config[$key]);
		return null;
	}
	/**
	* Set a configuration option... (locally only, doesn't change config)
	* @param string $key
	* @param mixed $value
	* @return bool
	* @access public
	*/
	static public function setConfig($key = null, $value = null) {
		if (strpos($key, '.')!==false) {
			self::$config = set::insert(self::$config, $key, $value);
		}
		self::$config[$key] = $value;
		return configure::write("Monitor.$key", $value);
	}
	/**
	 * Basic utility for logging if in debug mode
	 * @param object $Model
	 * @param mixed $function
	 * @param mixed $message
	 * @param mixed $data
	 * @return bool
	 */
	static function log($model=null, $function=null, $message=null, $data=null) {
		if (MonitorUtil::getConfig('debug')) {
			file_put_contents(LOG.'monitor.log', "{$model}::{$function} ".json_encode(compact('message', 'data')), FILE_APPEND);
		}
		return true;
	}
}
?>
