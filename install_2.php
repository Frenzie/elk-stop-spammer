<?php
/*
	<id>M-DVD:StopSpammer</id>
	<name>Stop Spammer</name>
	<version>2.3.8</version>
*/
global $smcFunc, $db_prefix;

db_extend('packages');

$smcFunc['db_add_column'](
			'{db_prefix}members',
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
			array(
				array ('stopspammer_count' ,'0'),
				array ('stopspammer_enable','0'),
				array ('stopspammer_show01','1'),
				array ('stopspammer_faildb','2'),
				array ('stopspammer_api_key',''),
				array ('stopspammer_check_name','0'),
				array ('stopspammer_check_mail','1'),
				array ('stopspammer_check_ip','1')
			),
			array()
		);

// This mod cannot be enabled without an API key
if (isset($modSettings['stopspammer_enable']) && 1 == intval($modSettings['stopspammer_enable']) && isset($modSettings['stopspammer_api_key']) && $modSettings['stopspammer_api_key'] == '')
{
	$smcFunc['db_query']('', '
		UPDATE {db_prefix}settings
		SET value = {string:value}
		WHERE variable = {string:variable}',
		array(
			'value' => '0',
			'variable' => 'stopspammer_enable',
		)
	);
}

?>
