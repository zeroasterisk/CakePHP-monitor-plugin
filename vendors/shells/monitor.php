<?php
class MonitorShell extends Shell{
	var $uses = array('MonitorDataset', 'MonitorReport');
	# main
	function main() { 
		$this->out("{$this->name} Shell");
		$this->hr();
		$this->help();
	}
	# help
	function help(){
		$this->out("{$this->name} Help - env: ".configure::read('env')." - site: ".configure::read('site'));
		$this->out("  cake {$this->shell} help              List this help");
		$this->out("  cake {$this->shell} run all           Run 'all' cron jobs");
		$this->out("  cake {$this->shell} run datasets      Run 'all data dataset' cron jobs");
		$this->out("  cake {$this->shell} run dataset \$id   Run any specified dataset");
		$this->out("  cake {$this->shell} run reports       Run 'all report' cron jobs");
		$this->out("  cake {$this->shell} run report \$id    Run any specified report");
		$this->out();
		$this->out("  cake {$this->shell} status            Shows the current status of all the latest reports");
		$this->out("  cake {$this->shell} status 24hr       Shows the status of all the reports within the last 24hrs (strtotime var)");
		$this->out();
	}
	# -----------------------------------------------------------
	# run batch of jobs
	function run() {
		$control = array_shift($this->args);
		if ($control == 'all') {
			return $this->runAll();
		} elseif ($control == 'datasets') {
			return $this->runDatasets();
		} elseif ($control == 'dataset') {
			return $this->runDataset();
		} elseif ($control == 'reports') {
			return $this->runReports();
		} elseif ($control == 'report') {
			return $this->runReport();
		}
	}
	function runAll() {
	}
	function runDatasets() {
	}
	function runDataset($id=null) {
		if (empty($id)) {
			$id = array_shift($this->args);
		}
		if (empty($id)) {
			$this->out("Error, missing ID");
			$this->out();
			die();
		}
		if (!$this->MonitorReport->monitorCheck()) {
			$this->out("Process already running... are we getting backed up?");
			$this->out();
			die();
		}
		if (!$this->MonitorReport->monitorCheckSet()) {
			$this->out("Unable to set 'check' record... strange!");
			$this->out();
			die();
		}
		
		# TODO
	}
	function runReports() {
	}
	function runReport($id=null) {
		if (empty($id)) {
			$id = array_shift($this->args);
		}
		if (empty($id)) {
			$this->out("Error, missing ID");
			$this->out();
			die();
		}
		if (!$this->MonitorReport->monitorCheck()) {
			$this->out("Process already running... are we getting backed up?");
			$this->out();
			die();
		}
		if (!$this->MonitorReport->monitorCheckSet()) {
			$this->out("Unable to set 'check' record... strange!");
			$this->out();
			die();
		}
		
		# TODO
	}
}
?>
