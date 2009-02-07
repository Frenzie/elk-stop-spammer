[b]MOD Stop Spammer v2.1
=================[/b]

[table][tr][td][table][tr][td][+][b]Autor:[/b][/td][td][b][url=http://custom.simplemachines.org/mods/index.php?action=profile;u=148997]M-DVD[/url][/b][/td][/tr]

[tr][td][+][b]Version:[/b][/td][td]2.1[/td][/tr]

[tr][td][+][b]Release:[/b][/td][td]06th December 2008[/td][/tr]

[tr][td][+][b]Languages:[/b][/td][td][img]http://www.simplemachines.org/site_images/lang/english.gif[/img] [img]http://www.simplemachines.org/site_images/lang/english_british.gif[/img] [img]http://www.simplemachines.org/site_images/lang/spanish.gif[/img] [img]http://www.simplemachines.org/site_images/lang/spanish_latin.gif[/img][/td][/tr]

[tr][td][+][b]Compatible With:[/b][/td][td]SMF 1.1.1 - 1.1.8
SMF 2 Beta 3 & 4 & RC1[/td][/tr][/table][/td]

[td][table][tr][td][center][url=http://www.simplemachines.org/community/index.php?action=post;topic=283309.0][img]http://www.simplemachines.org/community/Themes/smsite/images/star.gif[/img][img]http://www.simplemachines.org/community/Themes/smsite/images/star.gif[/img][img]http://www.simplemachines.org/community/Themes/smsite/images/star.gif[/img][img]http://www.simplemachines.org/community/Themes/smsite/images/star.gif[/img][img]http://www.simplemachines.org/community/Themes/smsite/images/star.gif[/img][/url][/center][/td][td][url=http://www.simplemachines.org/community/index.php?action=post;topic=283309.0][b][color=blue]Comment this Mod[/color][/b][/url][/td][/tr]

[tr][td][center][url=http://custom.simplemachines.org/mods/index.php?action=profile;u=148997][img]http://www.simplemachines.org/site_images/modtitlebar.png[/img][img]http://www.simplemachines.org/site_images/modtitlebar.png[/img][img]http://www.simplemachines.org/site_images/modtitlebar.png[/img][/url][/center][/td][td][url=http://custom.simplemachines.org/mods/index.php?action=profile;u=148997][b][color=red]My MODs[/color][/b][/url][/td][/tr]
[/table]
[/td][/tr][/table]

[list][li][b]Update v2.0: [url=http://www.simplemachines.org/community/index.php?topic=283309.msg1920829#msg1920829][color=green]Read More[/color][/url][/b][/li][/list]
[list][li][b][url=http://www.simplemachines.org/community/index.php?topic=283309.msg1920848#msg1920848][color=green]Read FAQ[/color][/url][/b][/li][/list]

[b]Features:[/b]

[list][li]With this MOD you can Block the Registry of Spammer in your Forum.[/li][/list]

[list][li]When registering a user, will compare their data (nickname, IP and mail) with the DB "Stop Forum Spam". If match any data, then the user is inactive 'Waiting for Approval'.
[b]Admin > Members > Awaiting Approval[/b][/li][/list]

[list][li]You can use the 'Inmediate Registration' enabled to all users (for not cause discomfort), but to Spammer detect it apply 'Register Approval' automatically.[/li][/list]

[list][li]Also you can check all data of many members (already registred) automatically with a simple click, selecting in the list...
[b]Admin > Members > View All Members[/b][/li][/list]

[list][li]And report new Spammers and increase the DB, [b]with a simple click[/b].[/li][/list]

[list][li]It keeps a record number of all Spammers Blocked to date, enable and disable this MODs [url=http://www.simplemachines.org/community/index.php?topic=283309.msg1920848#msg1920848][b]and more[/b][/url][/li][/list]

Thanks to 'Stop Forum Spam' for your DB and APIs.

Thanks to [url=http://www.simplemachines.org/community/index.php?action=profile;u=139580][b]WhatsTheRent[/b][/url] and [url=http://www.simplemachines.org/community/index.php?action=profile;u=130133][b]KahneFan[/b][/url] for idea.

Thanks to [url=http://www.simplemachines.org/community/index.php?action=profile;u=68708][b]snoopy_virtual[/b][/url] for his big help, ideas, test, report and fixed errors.
 
==========================

[b]Languages (normal & utf-8)[/b]

[list]
[li]English[/li]
[li]English_British[/li]
[li]Spanish_Es[/li]
[li]Spanish_Latin[/li][/list]

[php]$txt['stopspammer_error'] = 'Error with DB Anti SPAM. Connection Failed.<br />
Please try again later, or Contact with the WebMaster';
$txt['stopspammer_count'] = 'Spammers have been blocked to date';
$txt['stopspammer_title'] = 'Search more info in `Stop Forum Spam`';

$txt['stopspammer_enable'] = 'Enable/Disable MOD Stop Spammer';
$txt['stopspammer_show01'] = 'Show Link "More Info" for All Member';
$txt['stopspammer_show01_sub'] = 'You can check any member at any time with one simple click';

$txt['stopspammer_faildb'] = 'If the Connection Fail with DB Anti SPAM...';
$txt['stopspammer_fail01'] = 'Show Error and Stop Registration';
$txt['stopspammer_fail02'] = 'Allow Immediate Registration';
$txt['stopspammer_fail03'] = 'Member Approval and show icon for check';
$txt['stopspammer_faildb1_sub'] = 'Your host can make remote connection to the DB';
$txt['stopspammer_faildb2_sub'] = 'Your host couldn\'t make connection to the DB, Try again later<br />
If it continue see Topic of Support and search ';
$txt['stopspammer_not_translate'] = '<a href="http://www.simplemachines.org/community/index.php?topic=283309.new#post_issues"><span class="error"><b>Known Issues</b></span></a>';

$txt['stopspammer_leyd01'] = 'Not Spammer: This data wasn\'t in a DB. But you can check';
$txt['stopspammer_leyd02'] = 'Suspect: This member couldn\'t be checked. Check now';
$txt['stopspammer_leyd03'] = 'Spammers: See more info of activity of this spammers';

$txt['in_stop_forum_spam'] = 'In Stop Forum Spam Web:';
$txt['spammers_checks'] = 'Check these Members';
$txt['spammers_report'] = 'Report these Members';
$txt['confirm_spammers_checks'] = 'Are you sure you want to check the selected members?';
$txt['confirm_spammers_report'] = 'Are you sure you want to report the selected members?';[/php]

[url=http://www.simplemachines.org/community/index.php?action=post;topic=283309.0][color=navy][b]I welcome new translations here[/b][/color][/url]

==========================

[b]Caracteristicas:[/b]

[list][li]Con este MOD tu puedes Bloquear el Registro de los Spammer en tu Foro[/li][/list]

[list][li]Al registrarse un Usuario se comparan sus datos (nick, IP y mail) con la DB de la web 'Stop Forum Spam' y si coincide algun dato, el usuario quedara inactivo 'Esperando Aprobacion'.[/li][/list]

[list][li]Tu puedes tener el 'Registro Inmediato' activado para todos los usuarios (y no causarles molestias), pero a los Spammer que se detecten se les aplicara 'Aprobacion del Registro'.[/li][/list]

[list][li]Tambien puedes revisar todos los datos de muchos miembros (que ya esten registrados) automaticamente con un simple click, seleccionandolos en la lista.[/li][/list]

[list][li]Y tambien puedes reportar nuevos Spammers y aumentar la DB, [b]con un simple click[/b].[/li][/list]

[list][li]Tambien; lleva un registro numerico de todos los Spammer bloqueados hasta la fecha, activar y desactivar el MOD [url=http://www.simplemachines.org/community/index.php?topic=283309.msg1920848#msg1920848][b]y Mas[/b][/url][/li][/list]

Fin.
