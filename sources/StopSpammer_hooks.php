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

/*

	<file name="SOURCEDIR/Profile.php">
		<!-- Profile BEGIN -->
		<operation>
			<search position="before"><![CDATA[
				'deleteaccount' => array(
					'label' => $txt['deleteAccount'],
					'file' => 'Profile-Actions.php',
					'function' => 'deleteAccount',
					'sc' => 'post',
					'password' => true,
					'permission' => array(
						'own' => array('profile_remove_any', 'profile_remove_own'),
						'any' => array('profile_remove_any'),
					),
				),]]></search>
			<add><![CDATA[
				'checkmember' => array(
					'label' => $txt['stopspammer_profilecheck'],
					'custom_url' => $scripturl . '?action=admin;area=viewmembers;sa=query;params=' . base64_encode(serialize(array('mem_id' => $memID, 'types' => array('mem_id' => '=')))),
					'enabled' => $cur_profile['id_group'] != 1 && !in_array(1, explode(',', $cur_profile['additional_groups'])),
					'sc' => 'get',
					'permission' => array(
						'own' => array('profile_remove_any', 'profile_remove_own'),
						'any' => array('profile_remove_any', 'moderate_forum'),
					),
				),]]></add>
		</operation>
		<!-- Profile END -->
	</file>

*/

	public static function profile_areas(&$profile_areas )
	{
		loadLanguage('StopSpammer');


		$profile_areas['profile_action']['areas'] = elk_array_insert($profile_areas['profile_action']['areas'], 'activateaccount', array(
			'checkmember' => array(
				'label' => $txt['stopspammer_profilecheck'],
				'custom_url' => $scripturl . '?action=admin;area=viewmembers;sa=query;params=' . base64_encode(serialize(array('mem_id' => $memID, 'types' => array('mem_id' => '=')))),
				'enabled' => !empty($modSettings['stopspammer_enable']),
				'sc' => 'get',
				'permission' => array(
					'own' => array('profile_remove_any', 'profile_remove_own'),
					'any' => array('profile_remove_any', 'moderate_forum'),
				),
			)), 'after');
	}
}
?>
