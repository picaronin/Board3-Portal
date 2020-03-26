<?php
/**
*
* @package Board3 Portal v2.2 - Recent
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
	'PORTAL_RECENT'				=> 'أحدث المواضيع',
	'PORTAL_RECENT_TOPIC'		=> 'أحدث المواضيع',
	'PORTAL_RECENT_ANN'			=> 'أحدث الإعلانات',
	'PORTAL_RECENT_HOT_TOPIC'	=> 'أحدث المواضيع النشطة ',

	// ACP
	'ACP_PORTAL_RECENT_SETTINGS'			=> 'إعدادات أحدث المواضيع',
	'ACP_PORTAL_RECENT_SETTINGS_EXP'	=> 'من هنا تستطيع تخصيص موديل أحدث المواضيع.',
	'PORTAL_MAX_TOPIC'						=> 'عدد المواضيع ',
	'PORTAL_MAX_TOPIC_EXP'				=> 'عدد المواضيع التي ستظهر في هذا الموديل. القيمة صفر تعني عدد غير محدود',
	'PORTAL_RECENT_TITLE_LIMIT'				=> 'عدد حروف العنوان ',
	'PORTAL_RECENT_TITLE_LIMIT_EXP'		=> 'عدد حروف عناوين المواضيع التي ستظهر في هذا الموديل. القيمة صفر تعني عدد غير محدود',
	'PORTAL_RECENT_FORUM'					=> 'المنتديات ',
	'PORTAL_RECENT_FORUM_EXP'			=> 'حدد المنتديات التي تريد إظهار آخر المواضيع منها. عدم التحديد يعني إظهار آخر المواضيع من جميع المنتديات. <br />تستطيع هنا كذلك تحديد المنتديات التي تريد استثنائها من المرفقات بشرط أن تختار "نعم" في الخيار أدناه ( استثناء المنتديات ). <br />تستطيع تحديد أو إلغاء التحديد لأكثر من منتدى بواسطة النقر مطولاً على زر الكنترول <samp>CTRL</samp> والتحديد بالماوس على المنتديات المطلوبة.',
	'PORTAL_EXCLUDE_FORUM'					=> 'استثناء المنتديات ',
	'PORTAL_EXCLUDE_FORUM_EXP'			=> 'اختار "نعم" إذا تريد استثناء آخر المواضيع من المنتديات التي حددتها في الخيار أعلاه ( المنتديات ). اختار "لا" لتعطيل هذا الخيار.',
));
