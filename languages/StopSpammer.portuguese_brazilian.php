<?php
//	MOD Stop Spammer - Translation by candidopt & FragaCampos
$txt['stopspammer_error'] = 'Erro com a BD Anti SPAM. Ligação falhada.<br />
Por favor, tente novamente mais tarde ou contacte o webmaster';
$txt['stopspammer_count'] = 'Spammers bloqueados até hoje';
$txt['stopspammer_title'] = 'Pesquisar por mais informação em `Stop Forum Spam`';

$txt['stopspammer_enable'] = 'Activar/Desactivar o MOD Stop Spammer';
$txt['stopspammer_show01'] = 'Mostrar o link "Mais Info" para todos os membros';
$txt['stopspammer_show01_sub'] = 'Pode verificar qualquer membro a qualquer altura com um simples clique';

$txt['stopspammer_faildb'] = 'Se a ligação à BD Anti Spam falhar...';
$txt['stopspammer_fail01'] = 'Mostrar erro e impedir o registo';
$txt['stopspammer_fail02'] = 'Permitir registo imediato';
$txt['stopspammer_fail03'] = 'Aprovar membro e mostrar o ícone amarelo para analisar mais tarde';
$txt['stopspammer_faildb1_sub'] = 'O seu servidor pode fazer ligações remotas à BD';
$txt['stopspammer_faildb2_sub'] = 'O seu servidor não conseguiu efectuar a ligação à BD. Tente novamente mais tarde.<br />
Se o erro persistir, visite o Tópico de Ajuda e pesquise ';
$txt['stopspammer_not_translate'] = '<a href="http://www.simplemachines.org/community/index.php?topic=283309.new#post_issues"><span class="error"><b>Problemas Conhecidos</b></span></a>';

$txt['stopspammer_leyd01'] = 'Não é spammer: Estes dados não estavam na BD, mas pode verificar.';
$txt['stopspammer_leyd02'] = 'Suspeito: Este membro não pôde ser verificado. Verifique agora.';
$txt['stopspammer_leyd03'] = 'Spammer: Veja mais informação da actividade deste spammer.';

$txt['stopspammer_profilecheck'] = 'Verificar este membro';
$txt['stopspammer_limitexceded'] = 'Excedeu o limite de verificações (5000 pesquisas por dia com chave API).<br />Tem de esperar até amanhã para verificar novamente.';

$txt['in_stop_forum_spam'] = 'Em Stop Forum Spam Web:';
$txt['spammers_checks'] = 'Verificar estes membros';
$txt['spammers_report'] = 'Denunciar estes membros';
$txt['confirm_spammers_checks'] = 'Tem a certeza que quer verificar os membros seleccionados?';
$txt['confirm_spammers_report'] = 'Tem a certeza que quer denunciar os membros seleccionados?\n\nNão se esqueça que quando denunciar um membro ao SFS ele fica marcado como spammer por todo o mundo\ne não será capaz de usar nenhum dos fóruns ligados ao SFS.\n\nFaça-o apenas se tiver a certeza de que ele é um spammer! Se por acaso tiver cometido um erro\nentre em contacto assim que possível com o autor do mod para corrigir o erro na BD do SFS.';

$txt['stopspammer_api_key'] = 'A sua chave API';
$txt['stopspammer_api_key_sub'] = 'Se quiser usar a sua própria chave API tem de ir primeiro a <a href="http://www.stopforumspam.com/signup" target="_blank">www.stopforumspam.com</a> para pedir uma e colocá-la aqui. Se não tiver uma chave API, deixe em branco e o mod usará a chave API padrão.';

$txt['stopspammer_check_sub1'] = '<br />Se o MOD Stop Spammer estiver activado, sempre que analisar um membro:';
$txt['stopspammer_check_name'] = 'Analisar o seu username';
$txt['stopspammer_check_mail'] = 'Analisar o seu e-mail';
$txt['stopspammer_check_ip'] = 'Analisar o seu IP';
$txt['stopspammer_check_sub2'] = 'Por defeito, sempre que analisar um membro com o MOD Stop Spammer, este irá analisar o username, email e IP. Se receber demasiados falsos positivos devido aos usernames, pode desactivar essa opção. Não se recomenda a desactivação das outras duas opções (verificar o email e IP) a não ser que saiba o que está a fazer.';
