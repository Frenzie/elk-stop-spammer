<?php
//	MOD Stop Spammer - Translation by subcor
$txt['stopspammer_error'] = 'Hiba történt az Anti SPAM adatbázishoz való kapcsolódáskor.<br />
Kérem próbálja később, vagy vegye fel a kapcsolatot a webmesterrel';
$txt['stopspammer_count'] = 'Ezidáig blokkolt spammerek';
$txt['stopspammer_title'] = 'További tájékoztató keresése a `Stop Forum Spam`-ban';

$txt['stopspammer_enable'] = 'Stop Spammer MOD bekapcsolása/kikapcsolása';
$txt['stopspammer_show01'] = '"További információ" hivatkozás megjelenítése minden felhasználónak';
$txt['stopspammer_show01_sub'] = 'Egyetlen kattintással bármelyik felhasználót le lehet ellenőrizni';

$txt['stopspammer_faildb'] = 'Ha a kapcsolatfelvétel sikertelen az Anti SPAM adatbázissal...';
$txt['stopspammer_fail01'] = 'Hibaüzenet megjelenítése és regisztrációs megállítása';
$txt['stopspammer_fail02'] = 'Azonnali regisztráció engedélyezése';
$txt['stopspammer_fail03'] = 'Member Approval and show icon for check';
$txt['stopspammer_faildb1_sub'] = 'A szolgáltatója képes távoli kapcsolatot létesíteni a adatbázissal';
$txt['stopspammer_faildb2_sub'] = 'A szolgáltatója nem tudott távoli kapcsolatot létesíteni a adatbázissal, próbálkozzon később<br />
Ha a hiba továbbra is fennáll nézzen körül a támogatási topikban ';
$txt['stopspammer_not_translate'] = '<a href="http://www.simplemachines.org/community/index.php?topic=283309.new#post_issues"><span class="error"><b>Known Issues</b></span></a>';

$txt['stopspammer_leyd01'] = 'Nem spammer: Ez az adat nem szerepelt a adatbázisban, de ellenőrizheti';
$txt['stopspammer_leyd02'] = 'Gyanús: Ezt a felhasználót nem sikerült ellenőrizni. Újraellenőrzés';
$txt['stopspammer_leyd03'] = 'Spammerek: Nézze meg ezen spammerek részletes leírását a tevékenységükről';

$txt['stopspammer_profilecheck'] = 'Ezen felhasználó ellenőrzése';
$txt['stopspammer_limitexceded'] = 'Meghaladta az ellenőrzési korlátot (5000 API lekérdezés naponta).<br />
Várjon holnapig és próbálja újra.';

$txt['in_stop_forum_spam'] = 'Stop Forum Spam Web:';
$txt['spammers_checks'] = 'Ezen felhasználók ellenőrzése';
$txt['spammers_report'] = 'Ezen felhasználók bejelentése';
$txt['confirm_spammers_checks'] = 'Biztosan ellenőrizni kívánja a kijelölt felhasználókat?';
$txt['confirm_spammers_report'] = 'Biztosan jelenteni kívánja a kijelölt felhasználókat?\n\n
Vegye figyelembe, hogy ha bejelent egy felhasználót az SFS felé, akkor spammerként fog szerepelni az egész világon\n
és nem tud majd semmilyen SFS-hez kapcsolódó fórumokra regisztrálni.\n\n
Csak akkor jelentse, ha teljesen biztos affelől, hogy spammer az illető.\n
Amennyiben tévedés történt, kérem jelezze a mod készítőjének, hogy javítsa az SFS adatbázisában a hibát.';

$txt['stopspammer_api_key'] = 'Az API kulcsa';
$txt['stopspammer_api_key_sub'] = 'Ha a saját API kulcsát szeretné használni akkor először a <a href="http://www.stopforumspam.com/signup" target="_blank">www.stopforumspam.com</a> oldalon kell regisztrálnia. Amennyiben nincs, hagyja üresen és a mod az alapértelmezett API kulcsot fogja használni.';

$txt['stopspammer_check_sub1'] = '<br />Amennyiben a Stop Spammer MOD be van kapcsolva, ellenőrzésnél ezeket vizsgálja:';
$txt['stopspammer_check_name'] = 'Felhasználónevet';
$txt['stopspammer_check_mail'] = 'Email címet';
$txt['stopspammer_check_ip'] = 'IP címet';
$txt['stopspammer_check_sub2'] = 'Alapesetben a Stop Spammer MOD az ellenőrzéseknél a felhasználónevet, email címet és az IP címet veszi figyelembe. Ha a felhasználónevek miatt túl sok hamis eredményt kap, kikapcsolhatja ezt a lehetőséget. A másik két lehetőség (email és IP cím) kikapcsolását nem javasoljuk, amennyiben ön nem szakértő.';
