<?php

/**
 *
 * @author  Frans de Jonge http://fransdejonge.com
 * @license GPLv3
 * @mod     Stop Spammer
 *
 */

if (!defined('ELK'))
	die('No access...');

class StopSpammer_integrate
{
	public static function modify_registration_settings(&$config_vars)
	{

/*
 * 
	<file name="SOURCEDIR/ManageRegistration.php">
		<operation>
			<search position="before"><![CDATA[
	require_once($sourcedir . '/ManageServer.php');
]]></search>
			<add><![CDATA[
	// Test if mod StopSpammer is OK
	require_once($sourcedir . '/StopSpammer.php');
	$txt['stopspammer_ok'] = stopspammer_test_mod_ok();
	$stopspammer_faildb_sub = $txt['stopspammer_faildb_sub'];
]]></add>
		</operation>

		<operation>
			<search position="before"><![CDATA[
			array('text', 'coppaPhone'),]]></search>
			<add><![CDATA[
		// Stop Spammer
		array('title', 'stopspammer_settings'),
		$txt['stopspammer_ok'],
		'',
			array('check', 'stopspammer_enable', 'subtext' => $txt['stopspammer_enable_sub']),
		array('desc', 'stopspammer_check_sub1'),
			array('check', 'stopspammer_check_name'),
			array('check', 'stopspammer_check_mail'),
			array('check', 'stopspammer_check_ip'),
		array('desc', 'stopspammer_check_sub2'),
			array('select', 'stopspammer_faildb', array($txt['stopspammer_fail01'], $txt['stopspammer_fail02'], $txt['stopspammer_fail03']), 'subtext' => $stopspammer_faildb_sub),
			array('check', 'stopspammer_show01', 'subtext' => $txt['stopspammer_show01_sub']),
			array('text', 'stopspammer_api_key'),
		array('desc', 'stopspammer_api_key_sub'),]]></add>
		</operation>
	</file>
*/

		global $txt; // need $txt 'cause loadLanguage only fills in the setting's name
		loadLanguage('StopSpammer');

		require_once(SOURCEDIR .'/addons/StopSpammer/StopSpammer.php');
		$txt['stopspammer_ok'] = stopspammer_test_mod_ok();
		$stopspammer_faildb_sub = $txt['stopspammer_faildb_sub'];


		// Add Stop Spammer settings to the form
		$add = array(
			'',
		array('title', 'stopspammer_settings'),
		$txt['stopspammer_ok'],
		'',
			array('check', 'stopspammer_enable', 'subtext' => $txt['stopspammer_enable_sub']),
		array('desc', 'stopspammer_check_sub1'),
			array('check', 'stopspammer_check_name'),
			array('check', 'stopspammer_check_mail'),
			array('check', 'stopspammer_check_ip'),
		array('desc', 'stopspammer_check_sub2'),
			array('select', 'stopspammer_faildb', array($txt['stopspammer_fail01'], $txt['stopspammer_fail02'], $txt['stopspammer_fail03']), 'subtext' => $stopspammer_faildb_sub),
			array('check', 'stopspammer_show01', 'subtext' => $txt['stopspammer_show01_sub']),
			array('text', 'stopspammer_api_key'),
		array('desc', 'stopspammer_api_key_sub'),
			);
		$config_vars = elk_array_insert($config_vars, 4, $add);
	}
}
?>
