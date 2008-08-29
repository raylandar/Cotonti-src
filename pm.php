<?PHP

/* ====================
Seditio - Website engine
Copyright Neocrome
http://www.neocrome.net
[BEGIN_SED]
File=pm.php
Version=101
Updated=2006-mar-15
Type=Core
Author=Neocrome
Description=Private messages
[END_SED]
==================== */

define('SED_CODE', TRUE);
define('SED_PM', TRUE);
$location = 'Private_Messages';
$z = 'pm';

require_once('./datas/config.php');
require_once($cfg['system_dir'].'/functions.php');
require_once($cfg['system_dir'].'/common.php');

sed_dieifdisabled($cfg['disable_pm']);

switch($m)
	{
	case 'send':
	require_once($cfg['system_dir'].'/core/pm/pm.send.inc.php');
	break;

	case 'edit':
	require_once($cfg['system_dir'].'/core/pm/pm.edit.inc.php');
	break;

	default:
	require_once($cfg['system_dir'].'/core/pm/pm.inc.php');
	break;
	}

?>
