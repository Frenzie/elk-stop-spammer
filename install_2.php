<?php
/*
	<id>M-DVD:StopSpammer</id>
	<name>Stop Spammer</name>
	<version>1.0</version>
*/
global $smcFunc;

db_extend('packages');

$smcFunc['db_add_column'](
			'members',
			array (
				'name' => 'is_spammer',
				'type' => 'TINYINT',
				'size' => '3',
				'null' => '',			// NOT NULL
				'default' => '0',
				'auto' => ''
			),
			'',
			''
		);

$smcFunc['db_insert']('ignore',
			'{db_prefix}settings',
			array('variable' => 'string','value' => 'string'),
			array('stopspammer_count', '0'),
			array()
		);
?>