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

	// Add link to Stop Spammer settings (under registration settings) to add-on settings
	public static function general_mod_settings(&$config_vars)
	{
		global $txt; // need $txt 'cause loadLanguage only fills in the setting's name
		loadLanguage('StopSpammer');

		$add = array(
				'',
			array('title', 'stopspammer_settings'),
			'<a href="?action=admin;area=regcenter;sa=settings#stopspammer_enable">' . $txt['stopspammer_enable'] . '</a> [' . $txt['admin_search_section_settings'] . ']'
		);
		$config_vars = array_merge($config_vars, $add);
	}


/*
		<!--
		<operation>
			<search position="after"><![CDATA[
		'validation_code' => $validation_code,]]></search>
			<add><![CDATA[
		'is_spammer' => empty($regOptions['spammer']) ? 0 : $regOptions['spammer'],]]></add>
		</operation>
		--><!--
		<operation>
			<search position="after"><![CDATA[
		'validation_code' => substr(hash('sha256', $validation_code), 0, 10),]]></search>
			<add><![CDATA[
		'is_spammer' => empty($regOptions['spammer']) ? 0 : $regOptions['spammer'],]]></add>
		</operation>-->
*/

	// Err, needed for something, I forgot, lol
	public function register_check(&$regOptions, &$reg_errors)
	{
		$regOptions['is_spammer'] = empty($regOptions['spammer']) ? 0 : $regOptions['spammer'];
	}

/*
	<file name="SOURCEDIR/ManageMembers.php">
		<!--- Load our functions at the beginning of ViewMembers() for every sa we need --->
		<operation>
			<search position="before"><![CDATA[
	$_REQUEST['sa'] = isset($_REQUEST['sa']) && isset($subActions[$_REQUEST['sa']]) ? $_REQUEST['sa'] : 'all';
]]></search>
			<add><![CDATA[
	// Load Stop Spammer Functions
	if ('all' == $_REQUEST['sa'] || 'browse' == $_REQUEST['sa'] || 'query' == $_REQUEST['sa'] || 'approve' == $_REQUEST['sa'])
	{
		global $sourcedir;
		require_once($sourcedir . '/StopSpammer.php');
	}
]]></add>
		</operation>
*/

	public static function view_members_params(&$params)
	{
		
	}


/*




		<!--- Second List - List Member Waiting Aproval - BEGIN --->
		<operation>
			<search position="replace"><![CDATA[
					'sprintf' => array(
						'format' => '<a href="' . strtr($scripturl, array('%' => '%%')) . '?action=profile;u=%1$d">%2$s</a>',
						'params' => array(
							'id_member' => false,
							'member_name' => false,
						),
					),]]></search>
			<add><![CDATA[
					'function' => create_function('$rowData', '
						global $scripturl;
						$url = strtr($scripturl, array(\'%\' => \'%%\')) . \'?action=profile;u=\' . $rowData[\'id_member\'];
						return sprintfspamer($rowData, $url, \'member_name\', 2);
					'),]]></add>
		</operation>

		<operation>
			<search position="replace"><![CDATA[
					'sprintf' => array(
						'format' => '<a href="mailto:%1$s">%1$s</a>',
						'params' => array(
							'email_address' => true,
						),
					),
					'class' => 'windowbg',]]></search>
			<add><![CDATA[
					'function' => create_function('$rowData', '
						global $scripturl;
						$url = \'mailto:\' . $rowData[\'email_address\'];
						return sprintfspamer($rowData, $url, \'email_address\', 3);
					'),]]></add>
		</operation>

		<operation>
			<search position="replace"><![CDATA[
					'sprintf' => array(
						'format' => '<a href="' . strtr($scripturl, array('%' => '%%')) . '?action=trackip;searchip=%1$s">%1$s</a>',
						'params' => array(
							'member_ip' => false,
						),
					),]]></search>
			<add><![CDATA[
					'function' => create_function('$rowData', '
						global $scripturl;
						$url = strtr($scripturl, array(\'%\' => \'%%\')) . \'?action=trackip;searchip=\' . $rowData[\'member_ip\'];
						return sprintfspamer($rowData, $url, \'member_ip\', 1);
					'),]]></add>
		</operation>
		<!--- Second List - List Member Waiting Aproval - END --->

		<!--- Leyends, Info and  New Functions - BEGIN --->
		<!--- Check or report inside ViewMemberlist() (sa = 'all' or 'query') - BEGIN --->
		<operation>
			<search position="after"><![CDATA[
	// Are we performing a delete?]]></search>
			<add><![CDATA[
	// Are we performing a check or report?
	if ((isset($_POST['spammers_checks']) || isset($_POST['spammers_report'])) && !empty($_POST['delete']))
	{
		checkSession();

		// Clean the input.
		foreach ($_POST['delete'] as $key => $value)
		{
			$_POST['delete'][$key] = (int) $value;
			// Don't report yourself, idiot :P
			if ($value == $user_info['id'] || '1' == $value)
				unset($_POST['delete'][$key]);
		}

		$modSettings['registration_method'] = 2;

		// Check and/or Report This Members
		if (!empty($_POST['delete']))
			checkreportMembers($_POST['delete'], isset($_POST['spammers_report']));
	}
]]></add>
		</operation>
		<!--- Check or report inside ViewMemberlist() (sa = 'all' or 'query') - END --->

		<!--- Check or report inside AdminApprove() (sa = 'approve') - BEGIN --->
		<operation>
			<search position="after"><![CDATA[
	// We also need to the login languages here - for emails.]]></search>
			<add><![CDATA[
	// Are we performing a check or report?
	if ((isset($_POST['spammers_checks']) || isset($_POST['spammers_report'])) && !empty($_POST['todoAction']))
	{
		checkSession();

		// Clean the input.
		foreach ($_POST['todoAction'] as $key => $value)
		{
			$_POST['delete'][$key] = (int) $value;
			// Don't report yourself, idiot :P
			if ($value == $user_info['id'] || '1' == $value)
				unset($_POST['todoAction'][$key]);
		}

		$modSettings['registration_method'] = 2;

		// Check and/or Report This Members
		if (!empty($_POST['todoAction']))
			checkreportMembers($_POST['todoAction'], isset($_POST['spammers_report']));
	}
]]></add>
		</operation>
		<!--- Check or report inside AdminApprove() (sa = 'approve') - END --->

		<operation>
			<search position="after"><![CDATA[
			array(
				'position' => 'below_table_data',
				'value' => '<input type="submit" ]]></search>
			<add><![CDATA[
			!$modSettings['stopspammer_enable'] ? '' :
			array(
				'position' => 'below_table_data',
				'value' => '
					<div style="text-align: center">' . $modSettings['stopspammer_count'] . ' ' . $txt['stopspammer_count'] . '</div>',
				'class' => 'titlebg',
			),
			!$modSettings['stopspammer_enable'] ? '' :
			array(
				'position' => 'below_table_data',
				'value' => '
					<div style="margin: auto" class="leyend_stopspammer">
						<img src="' . $GLOBALS['settings']['default_images_url'] . '/icons/moreinfo.gif" alt="Icon MoreInfo" style="vertical-align: middle" /> ' . $txt['stopspammer_leyd01'] . '<br />
						<img src="' . $GLOBALS['settings']['default_images_url'] . '/icons/suspect.gif" alt="Icon Suspect" style="vertical-align: middle" /> ' . $txt['stopspammer_leyd02'] . '<br />
						<img src="' . $GLOBALS['settings']['default_images_url'] . '/icons/spammer.gif" alt="Icon Spammer" style="vertical-align: middle" /> ' . $txt['stopspammer_leyd03'] . '<br />
					</div>',
				'class' => 'titlebg',
			),
			!$modSettings['stopspammer_enable'] ? '' :
			array(
				'position' => 'below_table_data',
				'value' => '
					<label>' . $txt['in_stop_forum_spam'] . '</label>
					<input type="submit" name="spammers_checks" value="' . $txt['spammers_checks'] . '" onclick="return confirm(\'' . $txt['confirm_spammers_checks'] . '\');" />
					<input type="submit" name="spammers_report" value="' . $txt['spammers_report'] . '" onclick="return confirm(\'' . $txt['confirm_spammers_report'] . '\');" />',
				'class' => 'titlebg','titlebg',
				'style' => 'text-align: right;',
			),]]></add>
		</operation>

		<operation>
			<search position="after"><![CDATA[
			array(
				'position' => 'below_table_data',
				'value' => '
					<div class="floatleft">]]></search>
			<add><![CDATA[
			!$modSettings['stopspammer_enable'] ? '' :
			array(
				'position' => 'below_table_data',
				'value' => '
					<div style="text-align: center">' . $modSettings['stopspammer_count'] . ' ' . $txt['stopspammer_count'] . '</div>',
				'class' => 'titlebg',
			),
			!$modSettings['stopspammer_enable'] ? '' :
			array(
				'position' => 'below_table_data',
				'value' => '
					<div style="margin: auto" class="leyend_stopspammer">
						<img src="' . $GLOBALS['settings']['default_images_url'] . '/icons/moreinfo.gif" alt="Icon MoreInfo" style="vertical-align: middle" /> ' . $txt['stopspammer_leyd01'] . '<br />
						<img src="' . $GLOBALS['settings']['default_images_url'] . '/icons/suspect.gif" alt="Icon Suspect" style="vertical-align: middle" /> ' . $txt['stopspammer_leyd02'] . '<br />
						<img src="' . $GLOBALS['settings']['default_images_url'] . '/icons/spammer.gif" alt="Icon Spammer" style="vertical-align: middle" /> ' . $txt['stopspammer_leyd03'] . '<br />
					</div>',
				'class' => 'titlebg',
			),
			!$modSettings['stopspammer_enable'] ? '' :
			array(
				'position' => 'below_table_data',
				'value' => '
					<label>' . $txt['in_stop_forum_spam'] . '</label>
					<input type="submit" name="spammers_checks" value="' . $txt['spammers_checks'] . '" onclick="return confirm(\'' . $txt['confirm_spammers_checks'] . '\');" />
					<input type="submit" name="spammers_report" value="' . $txt['spammers_report'] . '" onclick="return confirm(\'' . $txt['confirm_spammers_report'] . '\');" />',
				'class' => 'titlebg','titlebg',
				'style' => 'text-align: right;',
			),]]></add>
		</operation>

		<operation>
			<search position="replace"><![CDATA[
	if ($context['sub_action'] == 'query' && !empty($_REQUEST['params']) && empty($_POST))]]></search>
			<add><![CDATA[
	if ($context['sub_action'] == 'query' && !empty($_REQUEST['params']) && (empty($_POST) || ((isset($_POST['spammers_checks']) || isset($_POST['spammers_report'])) && !empty($_POST['delete']))))]]></add>
		</operation>
		<!--- Leyends, Info and  New Functions - END --->
	</file>


*/

	public static function list_member_list(&$listOptions)
	{
		global $txt, $modSettings;
		loadLanguage('StopSpammer');
		// Helper functions
		require_once(SOURCEDIR .'/addons/StopSpammer/StopSpammer.php');

		// user_name
		// unset the sprintf default
		unset($listOptions['columns']['user_name']['data']['sprintf']);
		
		// replace with a function
		$listOptions['columns']['user_name']['data']['function'] = function($rowData)
		{
			global $scripturl;
			$url = strtr($scripturl, array('%' => '%%')) . '?action=profile;u=' . $rowData['id_member'];
			return sprintfspamer($rowData, $url, 'member_name', 2);
		};

/*
		// display_name
		// unset the sprintf default
		unset($listOptions['columns']['display_name']['data']['sprintf']);
		
		// replace with a function
		$listOptions['columns']['display_name']['data']['function'] = function($rowData)
		{
			global $scripturl;
			$url = strtr($scripturl, array('%' => '%%')) . '?action=profile;u=' . $rowData['id_member'];
			return sprintfspamer($rowData, $url, 'real_name', 0);
		};
*/

		// email
		// unset the sprintf default
		unset($listOptions['columns']['email']['data']['sprintf']);
		
		// replace with a function
		$listOptions['columns']['email']['data']['function'] = function($rowData)
		{
			global $scripturl;
			$url = 'mailto:' . $rowData['email_address'];
			return sprintfspamer($rowData, $url, 'email_address', 3);
		};

		// ip
		// unset the sprintf default
		unset($listOptions['columns']['ip']['data']['sprintf']);
		
		// replace with a function
		$listOptions['columns']['ip']['data']['function'] = function($rowData)
		{
			global $scripturl;
			$url = strtr($scripturl, array('%' => '%%')) . '?action=trackip;searchip=' . $rowData['member_ip'];
			return sprintfspamer($rowData, $url, 'member_ip', 1);
		};
	}

	// Add Stop Spammer settings under registration settings
	public static function modify_registration_settings(&$config_vars)
	{

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
		$config_vars = array_merge($config_vars, $add);
	}


	// Add "Check this member" under "Action" menu in individual profile view
	public static function profile_areas(&$profile_areas)
	{
		global $txt, $scripturl, $memID, $modSettings;
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
