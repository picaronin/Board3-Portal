<?php
/**
*
* [Dutch] translated by Dutch Translators (https://github.com/dutch-translators)
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
	'PORTAL'					=> 'Portaal',
	'VIEWING_PORTAL'			=> 'Portaalpagina',
	'BACK'						=> 'Terug',
	'B3P_WRONG_METHOD_CALL'		=> 'Onjuiste oproep naar methode %s',
	'B3P_INSTALL_ERROR'			=> '“Board3 Portal” 3.3.0 kan niet worden geïnstalleerd.<br><br>- phpBB 3.3.0 of hoger is vereist.',
	'B3P_PHP_ERROR'				=> '“Board3 Portal” 3.3.0 kan niet worden geïnstalleerd.<br><br>- Vereist php 7.1.3 of hoger.',
	'B3P_OLD_VERSION'			=> '“Board3 Portal” 3.3.0 kan niet worden geïnstalleerd.<br><br>Er is een verouderde versie van de extensie “Board3 Portal” gevonden.<br><br>Voordat de nieuwe versie werd geïnstalleerd, is nodig om de versie %1$s volledig te verwijderen.',
	'B3P_NO_HTACCESS'			=> '“Board3 Portal” 3.3.0 kan niet worden geïnstalleerd.<br><br>- Het “.htaccess” bestand staat niet in de root van de website.',
));
