<?php
/**
*
* @package Board3 Portal v2.2 - Leaders [Italian]
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
$lang = array_merge($lang, array(
	'NO_ADMINISTRATORS_P'	=> 'Nessun amministratore',
	'NO_MODERATORS_P'		=> 'Nessun moderatore',
	'NO_GROUPS_P'			=> 'Nessun gruppo',

	// ACP
	'ACP_PORTAL_LEADERS'		=> 'Impostazioni staff',
	'ACP_PORTAL_LEADERS_EXP'	=> 'Qui è possibile personalizzare il blocco staff',
	'PORTAL_LEADERS_EXT'		=> 'Mostra leader/squadra',
	'PORTAL_LEADERS_EXT_EXP'	=> 'Mostra SOLO l´elenco di tutti gli amministratori e moderatori.',
	'PORTAL_LEADERS_GROUP'		=> 'Gruppi utenti da mostrare',
	'PORTAL_LEADERS_GROUP_EXP'	=> 'Seleziona i gruppi di utenti da visualizzare. Verranno visualizzati solo i gruppi selezionati.<br>Per selezionare/deselezionare più gruppi contemporaneamente, premere CTRL e fare clic.',
));
