<?php
/*
	<id>M-DVD:StopSpammer</id>
	<name>Stop Spammer</name>
	<version>2.3</version>
*/
global $db_prefix;

$result = db_query("DESCRIBE
			{$db_prefix}members is_spammer"
			,__FILE__,__LINE__);

if (!mysql_num_rows($result))
	db_query("ALTER TABLE
			{$db_prefix}members
			ADD `is_spammer`
			TINYINT( 3 )
			UNSIGNED DEFAULT '0' NOT NULL 
			AFTER `is_activated`"
			, __FILE__, __LINE__
			);

mysql_free_result($result);

db_query("INSERT IGNORE INTO
			{$db_prefix}settings
			(variable, value)
			VALUES	('stopspammer_count' ,'0'),
					('stopspammer_enable','1'),
					('stopspammer_show01','1'),
					('stopspammer_faildb','2')"
			, __FILE__, __LINE__
		);
?>