<?php
/**
*
* @package Board3 Portal v2.2 - Leaders
* @copyright (c) 2013 Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
$lang = array_merge($lang, array(
	'NO_ADMINISTRATORS_P'	=> 'لا يوجد مدراء',
	'NO_MODERATORS_P'		=> 'لا يوجد مشرفين',
	'NO_GROUPS_P'			=> 'لا توجد مجموعات',

	// ACP
	'ACP_PORTAL_LEADERS'		=> 'إعدادات فريق الموقع',
	'ACP_PORTAL_LEADERS_EXP'	=> 'من هنا تستطيع تخصيص الموديل الخاص بفريق الموقع',
	'PORTAL_LEADERS_EXT'		=> 'إظهار القادة / الفريق',
	'PORTAL_LEADERS_EXT_EXP'	=> 'إظهار قائمة بجميع المشرفين والمشرفين فقط.',
	'PORTAL_LEADERS_GROUP'		=> 'مجموعات المستخدمين المراد عرضها',
	'PORTAL_LEADERS_GROUP_EXP'	=> 'حدد مجموعات المستخدمين المراد عرضها. سيتم عرض المجموعات المحددة فقط. <br> لتحديد / إلغاء تحديد مجموعات متعددة في وقت واحد ، اضغط على CTRL وانقر فوق.',
));
