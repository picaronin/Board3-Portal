<?php
/**
*
* @package Board3 Portal v3.3.0
* @copyright (c) 2013 Board3 Group ( www.board3.de ) - MOD by Picaron 2020
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace board3\portal;

/**
* Extension class Board3 Portal for custom enable/disable/purge actions
*/
class ext extends \phpbb\extension\base
{
	/**
	* Check whether or not the extension can be enabled.
	* The current phpBB version should meet or exceed
	* the minimum version required by this extension:
	*
	* Requires phpBB 3.3.0 due to usage of http_exception.
	*
	* @return bool
	* @access public
	*/
	public function is_enableable()
	{
		$config = $this->container->get('config');
		$lang = $this->container->get('language');
		$db = $this->container->get('dbal.conn');
		$htaccess = $this->container->getParameter('core.root_path') . '.htaccess';
		$lang->add_lang('portal', 'board3/portal');

		/**
		 * Check phpBB requirements
		 *
		 * Requires phpBB 3.3.0 or greater
		 *
		 * @return bool
		 */
		// Display a custom warning message if requirement fails.
		if (!phpbb_version_compare($config['version'], '3.3.0', '>='))
		{
			// Suppress the error in case of CLI usage
			@trigger_error($lang->lang('B3P_INSTALL_ERROR'), E_USER_WARNING);
		}

		/**
		 * Check PHP requirements
		 *
		 * Requires PHP 7.1.3 or greater
		 *
		 * @return bool
		 */
		// Display a custom warning message if requirement fails.
		if (!phpbb_version_compare(PHP_VERSION, '7.1.3', '>='))
		{
			// Suppress the error in case of CLI usage
			@trigger_error($lang->lang('B3P_PHP_ERROR'), E_USER_WARNING);
		}

		/**
		 * Check Board3 Portal requirements version
		 *
		 * Requires Board3 Portal greater of 2.1.0
		 *
		 * @return bool
		 */
		// Display a custom warning message if requirement fails.
		$sql = 'SELECT config_value FROM ' . CONFIG_TABLE . " WHERE config_name = 'board3_portal_version'";
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if (phpbb_version_compare($row['config_value'], '2.1.0', '<'))
			{
				// Suppress the error in case of CLI usage
				@trigger_error($lang->lang('B3P_OLD_VERSION', $row['config_value']), E_USER_WARNING);
			}

			if (phpbb_version_compare($row['config_value'], '3.3.0', '<'))
			{
				$sql = 'UPDATE ' . CONFIG_TABLE . " SET config_value = '3.3.0'
					WHERE config_name = 'board3_portal_version'";
				$db->sql_query($sql);
			}
		}
		$db->sql_freeresult($result);

		/**
		 * Check if exists .htaccess
		 *
		 * @return bool
		 */
		if(!file_exists($htaccess))
		{
			@trigger_error($lang->lang('B3P_NO_HTACCESS'), E_USER_WARNING);
		}

		return true;
	}
}
