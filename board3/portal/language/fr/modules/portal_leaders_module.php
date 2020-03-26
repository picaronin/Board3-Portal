<?php
/**
*
* @package Board3 Portal v2.2 - Leaders
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
$lang = array_merge($lang, array(
	'NO_ADMINISTRATORS_P'	=> 'Aucun administrateur',
	'NO_MODERATORS_P'		=> 'Aucun modérateur',
	'NO_GROUPS_P'			=> 'Aucun groupe',

	// ACP
	'ACP_PORTAL_LEADERS'		=> 'Paramètres de l’équipe',
	'ACP_PORTAL_LEADERS_EXP'	=> 'Ici vous personnalisez le bloc de l’équipe.',
	'PORTAL_LEADERS_EXT'		=> 'Show Leaders/Team',
	'PORTAL_LEADERS_EXT_EXP'	=> 'Afficher UNIQUEMENT la liste de tous les administrateurs et modérateurs.',
	'PORTAL_LEADERS_GROUP'		=> 'Groupes d´utilisateurs à afficher',
	'PORTAL_LEADERS_GROUP_EXP'	=> 'Sélectionnez les groupes d´utilisateurs à afficher. Seuls les groupes sélectionnés seront affichés.<br>Pour sélectionner/désélectionner plusieurs groupes simultanément, appuyez sur CTRL et cliquez.',
));
