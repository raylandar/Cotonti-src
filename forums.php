<?PHP

/* ====================
Seditio - Website engine
Copyright Neocrome
http://www.neocrome.net
[BEGIN_SED]
File=forums.php
Version=101
Updated=2006-mar-15
Type=Core
Author=Neocrome
Description=Forums loader
[END_SED]
==================== */

define('SED_CODE', TRUE);
define('SED_FORUMS', TRUE);
$location = 'Forums';
$z = 'forums';

require_once('./system/functions.php');
require_once('./datas/config.php');
require_once('./system/common.php');

sed_dieifdisabled($cfg['disable_forums']);

switch($m)
	{
	case 'topics':
	require_once('./system/core/forums/forums.topics.inc.php');
	break;

	case 'posts':
	require_once('./system/core/forums/forums.posts.inc.php');
	break;

	case 'editpost':
	require_once('./system/core/forums/forums.editpost.inc.php');
	break;

	case 'newtopic':
	require_once('./system/core/forums/forums.newtopic.inc.php');
	break;

	default:
	require_once('./system/core/forums/forums.inc.php');
	break;
	}

?>
