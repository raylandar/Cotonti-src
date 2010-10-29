<?php
/**
 * Administration panel - PHP Infos
 *
 * @package Cotonti
 * @version 0.1.0
 * @author Neocrome, Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2009
 * @license BSD
 */

(defined('COT_CODE') && defined('COT_ADMIN')) or die('Wrong URL.');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('admin', 'a');
cot_block($usr['auth_read']);

$t = new XTemplate(cot_skinfile('admin.infos'));

$adminpath[] = array(cot_url('admin', 'm=other'), $L['Other']);
$adminpath[] = array(cot_url('admin', 'm=infos'), $L['adm_infos']);
$adminhelp = $L['adm_help_versions'];

/* === Hook === */
foreach (cot_getextplugins('admin.infos.first') as $pl)
{
	include $pl;
}
/* ===== */

@error_reporting(0);

$t->assign(array(
	'ADMIN_INFOS_PHPVER' => (function_exists('phpversion')) ? phpversion() : $L['adm_help_config'],
	'ADMIN_INFOS_ZENDVER' => (function_exists('zend_version')) ? zend_version() : $L['adm_help_config'],
	'ADMIN_INFOS_INTERFACE' => (function_exists('php_sapi_name')) ? php_sapi_name() : $L['adm_help_config'],
	'ADMIN_INFOS_OS' => (function_exists('php_uname')) ? php_uname() : $L['adm_help_config'],
	'ADMIN_INFOS_DATE' => date('Y-m-d H:i'),
	'ADMIN_INFOS_GMDATE' => gmdate('Y-m-d H:i'),
	'ADMIN_INFOS_GMTTIME' => $usr['gmttime'],
	'ADMIN_INFOS_USRTIME' => date($cfg['dateformat'], $sys['now_offset'] + $usr['timezone'] * 3600),
	'ADMIN_INFOS_TIMETEXT' => $usr['timetext']
));

/* === Hook === */
foreach (cot_getextplugins('admin.infos.tags') as $pl)
{
	include $pl;
}
/* ===== */

$t->parse('MAIN');
if (COT_AJAX)
{
	$t->out('MAIN');
}
else
{
	$adminmain = $t->text('MAIN');
}

@error_reporting(7);

?>