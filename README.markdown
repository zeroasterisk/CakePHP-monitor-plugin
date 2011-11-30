CakePHP Monitor Plugin

A CakePHP Plugin which makes it really easy to monitor your application's details

This plugin provides a framework for viewing and administering the data you're monitoring.

The work of figuring out what data to track will be yours, but you can implement via a method on any model. 

We will also be providing "hooks" for exporting data to external monitoring services.

There will also be a "dashboard" and pretty charts to look at real time status for all the things you monitor.

Concepts
===========================================================

Monitorable->getData() = You have to track various data in your application.
Monitorable->monitorData() = You have tracked data, here's how you'll set thresholds and know status
Monitorable->monitorData() = You have tracked data, here's how you'll set thresholds and know status


Implementation
===========================================================

    cd app/plugins
    git clone __repo_path__ monitor
    
Now Add the Tables
-----------------------------------------------------------

If you've got the *wonderful* "migration plugin":http://cakedc.com/downloads/view/cakephp_migrations_plugin it's very easy:

    cd app
    cake migration -p monitor run all

If you don't have the migration plugin and don't want to implement it, take a look at this handy "sql file":https://github.com/zeroasterisk/CakePHP-monitor-plugin/tree/master/config/schema/schema.sql 	

Now start Tracking data
-----------------------------------------------------------

Add the Monitorable behaviour to any model.

    public $actsAs = array('Monitor.Monitorable', /*....*/);
	TODO: list Monitorable methods

Now start Monitoring Tracked data
-----------------------------------------------------------

Add the Monitorable behaviour to any model.

    public $actsAs = array('Monitor.Monitorable', /*....*/);
	TODO: list Monitorable methods

Now implement a cron job to run
-----------------------------------------------------------

    cd app
    cake monitor run all

Configuration
-----------------------------------------------------------

You can setup the monitor configuration anywhere, but there's a handy, loadable config example file to get you started:

	cd app
	cp plugins/monitor/config/monitor.example.php config/monitor.php
	echo "configure::load('monitor');" >> config/core.php

Here are the parameters you can set:

    var $config = array(
    	TODO: list Monitor configurations
		);

Unit Tests
-----------------------------------------------------------

About
-----------------------------------------------------------

author Alan Blount <alan@zeroasterisk.com>
copyright (c) 2011 Alan Blount
license MIT License - http://www.opensource.org/licenses/mit-license.php
https://github.com/zeroasterisk/CakePHP-monitor-plugin
