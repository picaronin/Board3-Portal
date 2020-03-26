<?php
/**
*
* @package Board3 Portal v2.2
* @copyright (c) 2013 Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
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

// Common
$lang = array_merge($lang, array(
	'PORTAL'					=> 'Portal',
	'VIEWING_PORTAL'			=> 'Betrachtet das Portal',
	'BACK'						=> 'Zurück',
	'B3P_WRONG_METHOD_CALL'		=> 'Falscher Aufruf der Methode %s',
	'B3P_INSTALL_ERROR'			=> '“Board3 Portal” 3.3.0 kann nicht installiert werden.<br><br>- phpBB 3.3.0 oder höher ist erforderlich.',
	'B3P_PHP_ERROR'				=> '“Board3 Portal” 3.3.0 kann nicht installiert werden.<br><br>- Benötigt PHP 7.1.3 oder höher.',
	'B3P_OLD_VERSION'			=> '“Board3 Portal” 3.3.0 kann nicht installiert werden.<br><br>Eine veraltete Version der Erweiterung “Board3 Portal” wurde gefunden.<br><br>Vor der Installation der neuen Version wurde diese installiert ist erforderlich, um die Version vollständig zu deinstallieren: %1$s.',
	'B3P_NO_HTACCESS'			=> '“Board3 Portal” 3.3.0 kann nicht installiert werden.<br><br>- Die Datei “.htaccess” befindet sich nicht im Stammverzeichnis der Website.',
));
