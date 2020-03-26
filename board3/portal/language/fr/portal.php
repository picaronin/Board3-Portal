<?php
/**
*
* @package Board3 Portal v2.2
* @copyright (c) 2013 Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @translated into French by Galixte (http://www.galixte.com)
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
	'PORTAL'					=> 'Portail',
	'VIEWING_PORTAL'			=> 'Page du portail',
	'BACK'						=> 'Retour',
	'B3P_WRONG_METHOD_CALL'		=> 'Appel incorrect pour la procédure: %s',
	'B3P_INSTALL_ERROR'			=> '“Board3 Portal” 3.3.0 ne peut pas être installé.<br><br>- phpBB 3.3.0 ou version ultérieure est requis.',
	'B3P_PHP_ERROR'				=> '“Board3 Portal” 3.3.0 ne peut pas être installé.<br><br>- Nécessite php 7.1.3 ou une version ultérieure.',
	'B3P_OLD_VERSION'			=> 'Impossible d´installer “Board3 Portal” 3.3.0.<br><br>Une version obsolète de l´extension “Board3 Portal” a été localisée.<br><br>Avant d´installer la nouvelle version, il est nécessaire pour désinstaller complètement la version: %1$s.',
	'B3P_NO_HTACCESS'			=> '“Board3 Portal” 3.3.0 ne peut pas être installé.<br><br>- Le fichier “.htaccess” ne se trouve pas à la racine du site Web.',
));
