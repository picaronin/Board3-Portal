<?php
/**
*
* @package Board3 Portal v2.2 [Italian]
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
	'PORTAL'					=> 'Portale',
	'VIEWING_PORTAL'			=> 'Pagina portale',
	'BACK'						=> 'Indietro',
	'B3P_WRONG_METHOD_CALL'		=> 'Chiamata non corretta al metodo %s',
	'B3P_INSTALL_ERROR'			=> 'Impossibile installare “Board3 Portal” 3.3.0.<br><br>- È richiesto phpBB 3.3.0 o successivo.',
	'B3P_PHP_ERROR'				=> 'Impossibile installare “Board3 Portal” 3.3.0.<br><br>- Richiede php 7.1.3 o successivo.',
	'B3P_OLD_VERSION'			=> 'Impossibile installare “Board3 Portal” 3.3.0.<br><br>È stata individuata una versione obsoleta dell´estensione “Board3 Portal”.<br><br>Prima di installare la nuova versione, è necessario disinstallare completamente la versione: %1$s.',
	'B3P_NO_HTACCESS'			=> 'Impossibile installare “Board3 Portal” 3.3.0.<br><br>- Il file “.htaccess” non si trova nella radice del sito Web.',
));
