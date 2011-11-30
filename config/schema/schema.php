<?php 
/* monitor schema generated on: 2011-11-30 15:23:48 : 1322684628*/
class monitorSchema extends CakeSchema {
	var $name = 'monitor';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $monitor_dashboards = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'name' => array('column' => 'name', 'unique' => 0), 'run' => array('column' => array('name', 'is_active'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	var $monitor_dataset_logs = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'monitor_dataset_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'value' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'monitor_dataset_id' => array('column' => 'monitor_dataset_id', 'unique' => 0), 'search' => array('column' => array('monitor_dataset_id', 'created'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	var $monitor_datasets = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'model' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'method' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'run_every_seconds' => array('type' => 'integer', 'null' => false, 'default' => '3600', 'key' => 'index', 'comment' => 'Required: Collect this data, every X seconds'),
		'hours' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => 'Optional: CSV list of allowed hours to run: 01,02,03,04...', 'charset' => 'utf8'),
		'is_active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'name' => array('column' => 'name', 'unique' => 0), 'run' => array('column' => array('run_every_seconds', 'is_active'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	var $monitor_report_logs = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'monitor_report_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'status' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 64, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'deviation' => array('type' => 'float', 'null' => true, 'default' => '0.75', 'comment' => 'if not MAD or SD = true, we calculate simple variation from the average: sample/ave > simple_average_limit'),
		'is_active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'monitor_report_id' => array('column' => 'monitor_report_id', 'unique' => 0), 'status' => array('column' => 'status', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	var $monitor_reports = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'monitor_dataset_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'strtotime_sample_range' => array('type' => 'string', 'null' => false, 'default' => '-24 hours', 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'strtotime_baseline_range' => array('type' => 'string', 'null' => false, 'default' => '-2 months', 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_median_absolute_deviation' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'is_standard_deviation' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'simple_average_limit' => array('type' => 'float', 'null' => true, 'default' => '0.75', 'comment' => 'if not MAD or SD = true, we calculate simple variation from the average: sample/ave > simple_average_limit'),
		'run_every_seconds' => array('type' => 'integer', 'null' => false, 'default' => '3600', 'key' => 'index', 'comment' => 'Required: Collect this data, every X seconds'),
		'hours' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => 'Optional: CSV list of allowed hours to run: 01,02,03,04...', 'charset' => 'utf8'),
		'is_active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'monitor_dataset_id' => array('column' => 'monitor_dataset_id', 'unique' => 0), 'name' => array('column' => 'name', 'unique' => 0), 'run' => array('column' => array('run_every_seconds', 'is_active'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
}
?>