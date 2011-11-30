<?php
class M4ed66439e6d04f90be98714ae017215a extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
 public $migration = array(
 	 'up' => array(
 	 	 'create_table' => array(
 	 	 	 'monitor_datasets' => array(
 	 	 	 	 'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'primary'),
 	 	 	 	 'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
 	 	 	 	 'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
 	 	 	 	 'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'index'),
 	 	 	 	 'model' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
 	 	 	 	 'method' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
 	 	 	 	 'run_every_seconds' => array('type' => 'integer', 'null' => false, 'default' => 3600, 'length' => 11, 'name' => 'index', 'comment' => 'Required: Collect this data, every X seconds'),
 	 	 	 	 'hours' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => 'Optional: CSV list of allowed hours to run: 01,02,03,04...', 'charset' => 'utf8'),
 	 	 	 	 'is_active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
 	 	 	 	 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'name' => array('column' => 'name', 'unique' => 0), 'run' => array('column' => array('run_every_seconds', 'is_active'), 'unique' => 0)),
 	 	 	 	 'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
 	 	 	 	 ),
 	 	 	 'monitor_dataset_logs' => array(
 	 	 	 	 'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'primary'),
 	 	 	 	 'monitor_dataset_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'index'),
 	 	 	 	 'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
 	 	 	 	 'value' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'name' => 'index'),
 	 	 	 	 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'monitor_dataset_id' => array('column' => 'monitor_dataset_id', 'unique' => 0), 'search' => array('column' => array('monitor_dataset_id', 'created'), 'unique' => 0)),
 	 	 	 	 'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
 	 	 	 	 ),
 	 	 	 'monitor_reports' => array(
 	 	 	 	 'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'primary'),
 	 	 	 	 'monitor_dataset_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'index'),
 	 	 	 	 'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
 	 	 	 	 'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
 	 	 	 	 'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'index'),
 	 	 	 	 'strtotime_sample_range' => array('type' => 'string', 'null' => false, 'default' => '-24 hours', 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
 	 	 	 	 'strtotime_baseline_range' => array('type' => 'string', 'null' => false, 'default' => '-2 months', 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
 	 	 	 	 'is_median_absolute_deviation' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
 	 	 	 	 'is_standard_deviation' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
 	 	 	 	 'simple_average_limit' => array('type' => 'float', 'null' => true, 'default' => 0.75, 'comment' => 'if not MAD or SD = true, we calculate simple variation from the average: sample/ave > simple_average_limit'),
 	 	 	 	 'run_every_seconds' => array('type' => 'integer', 'null' => false, 'default' => 3600, 'length' => 11, 'name' => 'index', 'comment' => 'Required: Collect this data, every X seconds'),
 	 	 	 	 'hours' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => 'Optional: CSV list of allowed hours to run: 01,02,03,04...', 'charset' => 'utf8'),
 	 	 	 	 'is_active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
 	 	 	 	 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'monitor_dataset_id' => array('column' => 'monitor_dataset_id', 'unique' => 0), 'name' => array('column' => 'name', 'unique' => 0), 'run' => array('column' => array('run_every_seconds', 'is_active'), 'unique' => 0)),
 	 	 	 	 'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
 	 	 	 	 ),
 	 	 	 'monitor_report_logs' => array(
 	 	 	 	 'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'primary'),
 	 	 	 	 'monitor_report_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'index'),
 	 	 	 	 'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
 	 	 	 	 'status' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
 	 	 	 	 'deviation' => array('type' => 'float', 'null' => true, 'default' => 0.75, 'comment' => 'if not MAD or SD = true, we calculate simple variation from the average: sample/ave > simple_average_limit'),
 	 	 	 	 'is_active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
 	 	 	 	 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'monitor_report_id' => array('column' => 'monitor_report_id', 'unique' => 0), 'status' => array('column' => 'status', 'unique' => 0)),
 	 	 	 	 'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
 	 	 	 	 ),
 	 	 	 'monitor_dashboards' => array(
 	 	 	 	 'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'primary'),
 	 	 	 	 'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
 	 	 	 	 'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
 	 	 	 	 'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'name' => 'index'),
 	 	 	 	 'is_active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
 	 	 	 	 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'name' => array('column' => 'name', 'unique' => 0), 'run' => array('column' => array('name', 'is_active'), 'unique' => 0)),
 	 	 	 	 'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
 	 	 	 	 ),
 	 	 	 'monitor_dashboards_monitor_reports' => array(
 	 	 	 	 'monitor_dashboard_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
 	 	 	 	 'monitor_report_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
 	 	 	 	 'indexes' => array('monitor_dashboard_id' => array('column' => 'monitor_dashboard_id', 'unique' => 0)),
 	 	 	 	 'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
 	 	 	 	 ),
 	 	 	 ),
 	 	 ),
 	 'down' => array(
 	 	 'drop_table' => array(
 	 	 	 'monitor_datasets',
 	 	 	 'monitor_dataset_logs',
 	 	 	 'monitor_reports',
 	 	 	 'monitor_report_logs',
 	 	 	 'monitor_dashboards',
 	 	 	 'monitor_dashboards_monitor_reports',
 	 	 	 ),
 	 	 ),
 	 );
 
/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
?>