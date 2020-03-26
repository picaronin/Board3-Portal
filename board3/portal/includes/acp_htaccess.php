<?php
/**
*
* @package Board3 Portal v3.3.0
* @copyright (c) 2013 Board3 Group ( www.board3.de ) - MOD by Picaron 2020
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace board3\portal\includes;

class acp_htaccess
{
	/** @var string */
	protected $phpbb_root_path;

	/**
	* Constructor
	*
	* @param string $phpbb_root_path
	* @access public
	*/
	public function __construct
	(
		$phpbb_root_path
	)
	{
		$this->phpbb_root_path = $phpbb_root_path;
	}

	/**
	* Edit .htaccess
	* Add DirectoryIndex app.php index.php in last line
	*/
	public function edit_htaccess()
	{
		$result = '';
		$fn = fopen($this->phpbb_root_path . ".htaccess","r");
		while(!feof($fn))
		{
			$result .= fgets($fn);
		}
		fclose($fn);

		$pos = strpos($result, 'DirectoryIndex ');
		if ($pos === false) {
			file_put_contents($this->phpbb_root_path . '.htaccess', "\nDirectoryIndex app.php index.php\n", FILE_APPEND | LOCK_EX);
		}
		else
		{
			$pos = strpos($result, 'app.php ');
			if ($pos === false)
			{
				$content = str_replace('DirectoryIndex ', 'DirectoryIndex app.php ', $result);
				file_put_contents($this->phpbb_root_path . '.htaccess', $content, LOCK_EX);
			}
		}
	}

	/**
	* Restore .htaccess
	* Delete line DirectoryIndex app.php index.php
	*/
	public function revert_htaccess()
	{
		$result = '';
		$fn = fopen($this->phpbb_root_path . ".htaccess","r");
		while(!feof($fn))
		{
			$result .= fgets($fn);
		}
		fclose($fn);

		$pos = strpos($result, "\nDirectoryIndex app.php index.php\n");
		if ($pos === false)
		{
			$content = str_replace('app.php ', '', $result);
		}
		else
		{
			$content = str_replace("\nDirectoryIndex app.php index.php\n", '', $result);
		}

		file_put_contents($this->phpbb_root_path . '.htaccess', $content, LOCK_EX);
	}
}
