<?php
/**
*
* @package Board3 Portal v2.2
* @copyright (c) 2014 Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace board3\portal\includes;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class modules_helper
{
	/**
	* Auth object
	* @var \phpbb\auth\auth
	*/
	protected $auth;

	/**
	* phpBB config
	* @var \phpbb\config\config
	*/
	protected $config;

	/** @var \phpbb\config\db_text */
	protected $config_text;

	/** @var \phpbb\controller\helper Controller helper */
	protected $controller_helper;

	/**
	* phpBB request
	* @var \phpbb\request\request
	*/
	protected $request;

	/**
	* Constructor
	* NOTE: The parameters of this method must match in order and type with
	* the dependencies defined in the services.yml file for this service.
	* @param \phpbb\auth\auth $auth Auth object
	* @param \phpbb\config\config $config phpBB config
	* @param \phpbb\controller\helper $controller_helper Controller helper
	* @param \phpbb\request\request $request phpBB request
	*/
	public function __construct($auth, $config, $config_text, $controller_helper, $request)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->config_text = $config_text;
		$this->controller_helper = $controller_helper;
		$this->request = $request;
	}

	/**
	* Get an array of disallowed forums
	*
	* @param bool $disallow_access Whether the array for disallowing access
	*			should be filled
	* @return array Array of forums the user is not allowed to access
	*/
	public function get_disallowed_forums($disallow_access)
	{
		if ($disallow_access == true)
		{
			$disallow_access = array_unique(array_keys($this->auth->acl_getf('!f_read', true)));
		}
		else
		{
			$disallow_access = array();
		}

		return $disallow_access;
	}

	/**
	* Generate select box
	*
	* @param string	$key			Key of select box
	* @param array	$select_ary		Array of select box options
	* @param array	$selected_options	Array of selected options
	* @param bool $multiple Whether multiple options should be selectable
	*
	* @return string HTML code of select box
	* @access public
	*/
	public function generate_select_box($key, $select_ary, $selected_options, $multiple = false)
	{
		// Build options
		$options = '<select id="' . $key . '" name="' . $key;
		$options .= ($multiple) ? '[]" size="10" multiple="multiple">' : '">';
		foreach ($select_ary as $id => $option)
		{
			$options .= '<option value="' . $option['value'] . '"' . ((in_array($option['value'], $selected_options)) ? ' selected="selected"' : '') . (!empty($option['disabled']) ? ' disabled="disabled" class="disabled-option"' : '') . '>' . $option['title'] . '</option>';
		}
		$options .= '</select>';

		return $options;
	}

	/**
	* Generate forum select box
	*
	* @param string $value	Value of select box
	* @param string $key	Key of select box
	*
	* @return string HTML code of select box
	* @access public
	*/
	public function generate_forum_select($value, $key)
	{
		$forum_list = make_forum_select(false, false, true, true, true, false, true);

		$selected_options = $select_ary = array();
		if (isset($this->config[$key]) && strlen($this->config[$key]) > 0)
		{
			$selected_options = explode(',', $this->config[$key]);
		}

		// Build forum options
		foreach ($forum_list as $f_id => $f_row)
		{
			$select_ary[] = array(
				'value'		=> $f_id,
				'title'		=> $f_row['padding'] . $f_row['forum_name'],
				'disabled'	=> $f_row['disabled'],
			);
		}

		return $this->generate_select_box($key, $select_ary, $selected_options, true);
	}

	/**
	* Store selected forums
	*
	* @param string $key Key name
	*
	* @return null
	* @access public
	*/
	public function store_selected_forums($key)
	{
		// Get selected extensions
		$values = $this->request->variable($key, array(0 => ''));
		$news = implode(',', $values);
		$this->config->set($key, $news);
	}

	/**
	 * Wrapper method for controller_helper::route()
	 *
	 * @param string $route Route name
	 * @param array $params Route parameters
	 * @param bool $is_amp
	 * @param bool $session_id
	 * @param bool $reference_type
	 *
	 * @return string URL for route
	 */
	public function route($route, $params = array(), $is_amp = true, $session_id = false, $reference_type = UrlGeneratorInterface::ABSOLUTE_PATH)
	{
		return $this->controller_helper->route($route, $params, $is_amp, $session_id, $reference_type);
	}

	/**
	 * Display radio buttons for left/right choice
	 *
	 * @param int $value Selected value
	 * @param string $key Key of config variable
	 *
	 * @return string
	 */
	public function display_left_right($value, $key)
	{
		$radio_ary = array(0 => 'PORTAL_SHOW_ALL_LEFT', 1 => 'PORTAL_SHOW_ALL_RIGHT');

		return h_radio($key, $radio_ary, $value, $key);
	}

	/**
	 * Store left right choice
	 *
	 * @param string $key Config key
	 */
	public function store_left_right($key)
	{
		// Get selected side
		$value = $this->request->variable($key, 0);

		$this->config->set($key, $value);
	}

	/**
	 * Show available styles
	 *
	 * @return string Select with available styles
	 */
	public function display_fa_styles()
	{
		global $phpbb_container;
		$table_prefix = $phpbb_container->getParameter('core.table_prefix');
		$db = $phpbb_container->get('dbal.conn');
		$selected = explode(';', $this->config_text->get('board3_portal_fa_styles'));
		$options = '';
		$query = 'SELECT style_name
					FROM ' . $table_prefix . 'styles';
		$result = $db->sql_query($query);
		while ($row = $db->sql_fetchrow($result))
		{
			$options .= '<option value="' . $row['style_name'] . '"';
			foreach ($selected as $style)
			{
				if ($style == $row['style_name'])
				{
					$options .= ' selected';
					break;
				}
			}
			$options .= '>' . $row['style_name'] . '</option>';
		}
		$db->sql_freeresult($result);
		return '<select id="board3_fa_styles" name="board3_fa_styles[]" multiple size="10">' . $options . '</select>';
	}

	/**
	 * Save styles that have been set as Font Awesome styles
	 *
	 * @param string $key Key of the parameter
	 */
	public function store_fa_styles($key)
	{
		global $phpbb_container;
		$style_array = $this->request->variable($key, array(''));
		$styles = '';
		foreach ($style_array as $style)
		{
			$styles .= ($styles == '' ? '' : ';') . $style;
		}
		$this->config_text->set('board3_portal_fa_styles', $styles);
	}

	/**
	 * Show available Groups
	 *
	 * @return string Select with available styles
	 */
	public function board3_leaders_groups_select($value, $key)
	{
		global $phpbb_container;
		$db = $phpbb_container->get('dbal.conn');
		$user = $phpbb_container->get('user');
		$selected = explode(';', $this->config[$key]);
		$options = '';
		// get group info from database and assign the block vars
		$sql = 'SELECT group_id, group_name
				FROM ' . GROUPS_TABLE . '
				ORDER BY group_id ASC';
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$options .= '<option value="' . $row['group_id'] . '"';
			foreach ($selected as $group)
			{
				if ($group == $row['group_id'])
				{
					$options .= ' selected';
					break;
				}
			}
			$names = (isset($user->lang['G_' .$row['group_name']])) ? $user->lang['G_' .$row['group_name']] : $row['group_name'];
			$options .= '>' . $names . '</option>';
		}
		$db->sql_freeresult($result);
		return '<select id="board3_leaders_group" name="board3_leaders_group[]" multiple size="10">' . $options . '</select>';
	}

	/**
	 * Save Groups that have been set
	 *
	 * @param string $key Key of the parameter
	 */
	public function board3_leaders_groups_submit($key)
	{
		global $phpbb_container;
		$groups_array = $this->request->variable('board3_leaders_group', array(''));
		$groups = '';
		foreach ($groups_array as $group)
		{
			$groups .= ($groups == '' ? '' : ';') . $group;
		}
		$this->config->set($key, $groups);
	}
}
