<?php
/**
*
* @package Board3 Portal v2.2
* @copyright (c) 2013 Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace board3\portal\modules;

/**
* @package Main Menu
*/
class main_menu extends module_base
{
	/**
	* Allowed columns: Just sum up your options (Exp: left + right = 10)
	* top		1
	* left		2
	* center	4
	* right		8
	* bottom	16
	*/
	public $columns = 10;

	/**
	* Default modulename
	*/
	public $name = 'M_MENU';

	/**
	* Default module-image:
	* file must be in "{T_THEME_PATH}/images/portal/"
	*/
	public $image_src = 'portal_menu.png';

	/**
	* module-language file
	* file must be in "language/{$user->lang}/mods/portal/"
	*/
	public $language = 'portal_main_menu_module';

	/**
	* custom acp template
	* file must be in "adm/style/portal/"
	*/
	public $custom_acp_tpl = 'acp_portal_menu';

	/** @var bool Can include this module multiple times */
	protected $multiple_includes = true;

	/**
	* constants
	*/
	const LINK_CAT = 0;
	const LINK_INT = 1;
	const LINK_EXT = 2;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var string PHP file extension */
	protected $php_ext;

	/** @var string phpBB root path */
	protected $phpbb_root_path;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\log\log phpBB log */
	protected $log;

	/**
	* Construct a main menu object
	*
	* @param \phpbb\config\config $config phpBB config
	* @param \phpbb\db\driver\driver_interface $db phpBB db driver
	* @param \phpbb\request\request $request phpBB request
	* @param \phpbb\template\template $template phpBB template
	* @param string $phpbb_root_path phpBB root path
	* @param string $phpEx php file extension
	* @param \phpbb\user $user phpBB user object
	* @param \phpbb\log\log $log phpBB log
	*/
	public function __construct($config, $db, $request, $template, $phpbb_root_path, $phpEx, $user, $log)
	{
		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $phpEx;
		$this->user = $user;
		$this->log = $log;
	}

	/**
	* {@inheritdoc}
	*/
	public function get_template_side($module_id)
	{
		$portal_config = obtain_portal_config();

		$links = json_decode($portal_config['board3_menu_array_' . $module_id], true);

		$this->template->assign_block_vars('portal_menu', array('MODULE_ID' => $module_id));

		// get user's groups
		$groups_ary = get_user_groups();

		for ($i = 0; $i < sizeof($links); $i++)
		{
			if ($links[$i]['type'] == self::LINK_CAT)
			{
				$this->template->assign_block_vars('portal_menu.category', array(
					'CAT_TITLE'		=> (isset($this->user->lang[$links[$i]['title']])) ? $this->user->lang[$links[$i]['title']] : $links[$i]['title'],
				));
			}
			else
			{
				if ($links[$i]['type'] == self::LINK_INT)
				{
					$links[$i]['url'] = str_replace('&', '&amp;', $links[$i]['url']); // we need to do this in order to prevent XHTML validation errors
					$cur_url = append_sid($this->phpbb_root_path . $links[$i]['url']); // the user should know what kind of file it is
				}
				else
				{
					$cur_url = $links[$i]['url'];
				}

				$cur_permissions = explode(',', $links[$i]['permission']);
				$permission_check = array_intersect($groups_ary, $cur_permissions);

				if (!empty($permission_check) || $links[$i]['permission'] == '')
				{
					$this->template->assign_block_vars('portal_menu.category.links', array(
						'LINK_TITLE'		=> (isset($this->user->lang[$links[$i]['title']])) ? $this->user->lang[$links[$i]['title']] : $links[$i]['title'],
						'LINK_URL'			=> $cur_url,
						'NEW_WINDOW'		=> ($links[$i]['type'] != self::LINK_INT && $this->config['board3_menu_url_new_window_' . $module_id]) ? true : false,
					));
				}
			}
		}

		return 'main_menu_side.html';
	}

	/**
	* {@inheritdoc}
	*/
	public function get_template_acp($module_id)
	{
		return array(
			'title'	=> 'ACP_PORTAL_MENU',
			'vars'	=> array(
				'legend1'				=> 'ACP_PORTAL_MENU',
				'board3_menu_' . $module_id	=> array('lang' => 'ACP_PORTAL_MENU_MANAGE', 'validate' => 'string',	'type' => 'custom',	'explain' => true, 'method' => 'manage_links', 'submit' => 'update_links'),
				'board3_menu_url_new_window_' . $module_id => array('lang' => 'ACP_PORTAL_MENU_EXT_NEW_WINDOW', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => false),
			),
		);
	}

	/**
	* {@inheritdoc}
	*/
	public function install($module_id)
	{
		// get the correct group IDs from the database
		$in_ary = array('GUESTS', 'REGISTERED', 'REGISTERED_COPPA');
		$groups_ary = array();

		$sql = 'SELECT group_id, group_name FROM ' . GROUPS_TABLE . ' WHERE ' . $this->db->sql_in_set('group_name', $in_ary);
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$groups_ary[$row['group_name']] = $row['group_id'];
		}

		$links = array();

		$links_titles = array(
			'M_CONTENT',
			'INDEX',
			'SEARCH',
			'REGISTER',
			'MEMBERLIST',
			'THE_TEAM',
			'M_HELP',
			'FAQ',
			'M_BBCODE',
			'M_TERMS',
			'M_PRV',
		);

		$links_types = array(
			self::LINK_CAT,
			self::LINK_INT,
			self::LINK_INT,
			self::LINK_INT,
			self::LINK_INT,
			self::LINK_INT,
			self::LINK_CAT,
			self::LINK_INT,
			self::LINK_INT,
			self::LINK_INT,
			self::LINK_INT,
		);

		$links_urls = array(
			'',
			'index.' . $this->php_ext,
			'search.' . $this->php_ext,
			'ucp.' . $this->php_ext . '?mode=register',
			'memberlist.' . $this->php_ext,
			'memberlist.' . $this->php_ext . '?mode=leaders',
			'',
			'faq.' . $this->php_ext,
			'faq.' . $this->php_ext . '?mode=bbcode',
			'ucp.' . $this->php_ext . '?mode=terms',
			'ucp.' . $this->php_ext . '?mode=privacy',
		);

		$links_permissions = array(
			'',
			'',
			'',
			$groups_ary['GUESTS'],
			$groups_ary['REGISTERED'] . ',' . $groups_ary['REGISTERED_COPPA'],
			$groups_ary['REGISTERED'] . ',' . $groups_ary['REGISTERED_COPPA'],
			'',
			'',
			'',
			'',
			'',
		);

		foreach ($links_urls as $i => $url)
		{
			$links[] = array(
				'title' 		=> $links_titles[$i],
				'url'			=> $links_urls[$i],
				'type'			=> $links_types[$i],
				'permission'	=> $links_permissions[$i],
			);
		}

		$board3_menu_array = json_encode($links);
		set_portal_config('board3_menu_array_' . $module_id, $board3_menu_array);
		$this->config->set('board3_menu_' . $module_id, '');
		$this->config->set('board3_menu_url_new_window_' . $module_id, 0);

		return true;
	}

	/**
	* {@inheritdoc}
	*/
	public function uninstall($module_id, $db)
	{
		$del_config = array(
			'board3_menu_array_' . $module_id,
		);
		$sql = 'DELETE FROM ' . PORTAL_CONFIG_TABLE . '
			WHERE ' . $db->sql_in_set('config_name', $del_config);

		$db->sql_query($sql);

		$del_config = array(
			'board3_menu_' . $module_id,
			'board3_menu_url_new_window_' . $module_id,
		);
		$sql = 'DELETE FROM ' . CONFIG_TABLE . '
			WHERE ' . $db->sql_in_set('config_name', $del_config);
		return $db->sql_query($sql);
	}

	/**
	* Manage the menu links
	*
	* @param mixed $value Value of input
	* @param string $key Key name
	* @param int $module_id Module ID
	*
	* @return null
	*/
	public function manage_links($value, $key, $module_id)
	{
		$action = $this->request->variable('action', '');
		$action = ($this->request->is_set_post('add')) ? 'add' : $action;
		$action = ($this->request->is_set_post('save')) ? 'save' : $action;
		$link_id = $this->request->variable('id', 99999999); // 0 will trigger unwanted behavior, therefore we set a number we should never reach
		$portal_config = obtain_portal_config();

		$links = json_decode($portal_config['board3_menu_array_' . $module_id], true);

		$u_action = append_sid('index.' . $this->php_ext, 'i=-board3-portal-acp-portal_module&amp;mode=config&amp;module_id=' . $module_id);

		switch ($action)
		{
			// Save changes
			case 'save':
				if (!check_form_key('acp_portal'))
				{
					trigger_error($this->user->lang['FORM_INVALID']. adm_back_link($u_action), E_USER_WARNING);
				}

				$link_title = $this->request->variable('link_title', ' ', true);
				$link_is_cat = $this->request->variable('link_is_cat', false);
				$link_type = (!$link_is_cat) ? $this->request->variable('link_type', self::LINK_INT) : self::LINK_CAT;
				$link_url = ($link_is_cat) ? ' ' : $this->request->variable('link_url', ' ', true);
				$link_url = str_replace('&amp;', '&', $link_url);
				$link_permission = $this->request->variable('permission-setting-menu', array(0 => ''));
				$groups_ary = array();

				// get groups and check if the selected groups actually exist
				$sql = 'SELECT group_id
						FROM ' . GROUPS_TABLE . '
						ORDER BY group_id ASC';
				$result = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($result))
				{
					$groups_ary[] = $row['group_id'];
				}
				$this->db->sql_freeresult($result);

				$link_permissions = array_intersect($link_permission, $groups_ary);
				$link_permissions = implode(',', $link_permissions);

				// Check for errors
				if (!$link_title)
				{
					trigger_error($this->user->lang['NO_LINK_TITLE'] . adm_back_link($u_action), E_USER_WARNING);
				}

				if (!$link_is_cat && !$link_url)
				{
					trigger_error($this->user->lang['NO_LINK_URL'] . adm_back_link($u_action), E_USER_WARNING);
				}

				// overwrite already existing links and make sure we don't try to save a link outside of the normal array size of $links
				if (isset($link_id) && $link_id < sizeof($links))
				{
					$message = $this->user->lang['LINK_UPDATED'];

					$links[$link_id] = array(
						'title' 		=> $link_title,
						'url'			=> htmlspecialchars_decode($link_url),
						'type'			=> $link_type,
						'permission'	=> $link_permissions,
					);

					$this->log->add('admin', $this->user->data['user_id'], $this->user->data['user_ip'], 'LOG_PORTAL_LINK_UPDATED', false, array($link_title));
				}
				else
				{
					$message = $this->user->lang['LINK_ADDED'];

					if ($link_type != self::LINK_CAT && sizeof($links) < 1)
					{
						trigger_error($this->user->lang['ACP_PORTAL_MENU_CREATE_CAT'] . adm_back_link($u_action), E_USER_WARNING);
					}
					$links[] = array(
						'title' 		=> $link_title,
						'url'			=> htmlspecialchars_decode($link_url),
						'type'			=> $link_type,
						'permission'	=> $link_permissions,
					);
					$this->log->add('admin', $this->user->data['user_id'], $this->user->data['user_ip'], 'LOG_PORTAL_LINK_ADDED', false, array($link_title));
				}

				$board3_menu_array = json_encode($links);
				set_portal_config('board3_menu_array_' . $module_id, $board3_menu_array);

				trigger_error($message . adm_back_link($u_action));

			break;

			// Delete link
			case 'delete':

				if (!isset($link_id) && $link_id >= sizeof($links))
				{
					trigger_error($this->user->lang['MUST_SELECT_LINK'] . adm_back_link($u_action), E_USER_WARNING);
				}

				if (confirm_box(true))
				{
					$cur_link_title = $links[$link_id]['title'];
					// delete the selected link and reset the array numbering afterwards
					array_splice($links, $link_id, 1);
					$links = array_merge($links);

					$board3_menu_array = json_encode($links);
					set_portal_config('board3_menu_array_' . $module_id, $board3_menu_array);

					$this->log->add('admin', $this->user->data['user_id'], $this->user->data['user_ip'], 'LOG_PORTAL_LINK_REMOVED', false, array($cur_link_title));
				}
				else
				{
					confirm_box(false, $this->user->lang['CONFIRM_OPERATION'], build_hidden_fields(array(
						'link_id'	=> $link_id,
						'action'	=> 'delete',
					)));
				}

			break;

			// Move items up or down
			case 'move_up':
			case 'move_down':

				if (!isset($link_id) && $link_id >= sizeof($links))
				{
					trigger_error($this->user->lang['MUST_SELECT_LINK'] . adm_back_link($u_action), E_USER_WARNING);
				}

				// make sure we don't try to move a link where it can't be moved
				if (($link_id == 0 && $action == 'move_up') || ($link_id == (sizeof($links) - 1) && $action == 'move_down'))
				{
					break;
				}

				/*
				* on move_down, switch position with next order_id...
				* on move_up, switch position with previous order_id...
				* move up means a lower ID, move down means a higher ID
				*/
				$switch_order_id = ($action == 'move_down') ? $link_id + 1 : $link_id - 1;

				// back up the info of the link we want to move
				$cur_link = array(
					'title' 		=> $links[$link_id]['title'],
					'url'			=> $links[$link_id]['url'],
					'type'			=> $links[$link_id]['type'],
					'permission'	=> $links[$link_id]['permission'],
				);

				// move the info of the links we replace in the order
				$links[$link_id] = array(
					'title'			=> $links[$switch_order_id]['title'],
					'url'			=> $links[$switch_order_id]['url'],
					'type'			=> $links[$switch_order_id]['type'],
					'permission'	=> $links[$switch_order_id]['permission'],
				);

				// insert the info of the moved link
				$links[$switch_order_id] = $cur_link;

				$board3_menu_array = json_encode($links);
				set_portal_config('board3_menu_array_' . $module_id, $board3_menu_array);

			break;

			// Edit or add menu item
			case 'edit':
			case 'add':
				$this->template->assign_vars(array(
					'LINK_TITLE'	=> (isset($links[$link_id]['title']) && $action != 'add') ? $links[$link_id]['title'] : '',
					'LINK_URL'		=> (isset($links[$link_id]['url']) && $links[$link_id]['type'] != self::LINK_CAT && $action != 'add') ? str_replace('&', '&amp;', $links[$link_id]['url']) : '',

					'LINK_ID'		=> $link_id,

					'S_EDIT'				=> true,
					'S_LINK_IS_CAT'			=> (!isset($links[$link_id]['type']) || $links[$link_id]['type'] == self::LINK_CAT) ? true : false,
					'S_LINK_IS_INT'			=> (isset($links[$link_id]['type']) && $links[$link_id]['type'] == self::LINK_INT) ? true : false,
				));

				$groups_ary = (isset($links[$link_id]['permission'])) ? explode(',', $links[$link_id]['permission']) : array();

				// get group info from database and assign the block vars
				$sql = 'SELECT group_id, group_name 
						FROM ' . GROUPS_TABLE . '
						ORDER BY group_id ASC';
				$result = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($result))
				{
					$this->template->assign_block_vars('permission_setting_menu', array(
						'SELECTED'		=> (in_array($row['group_id'], $groups_ary)) ? true : false,
						'GROUP_NAME'	=> (isset($this->user->lang['G_' . $row['group_name']])) ? $this->user->lang['G_' . $row['group_name']] : $row['group_name'],
						'GROUP_ID'		=> $row['group_id'],
					));
				}
				$this->db->sql_freeresult($result);

				return;
		}

		for ($i = 0; $i < sizeof($links); $i++)
		{
			$this->template->assign_block_vars('links', array(
				'LINK_TITLE'	=> ($action != 'add') ? ((isset($this->user->lang[$links[$i]['title']])) ? $this->user->lang[$links[$i]['title']] : $links[$i]['title']) : '',
				'LINK_URL'		=> ($action != 'add') ? str_replace('&', '&amp;', $links[$i]['url']) : '',

				'U_EDIT'		=> $u_action . '&amp;action=edit&amp;id=' . $i,
				'U_DELETE'		=> $u_action . '&amp;action=delete&amp;id=' . $i,
				'U_MOVE_UP'		=> $u_action . '&amp;action=move_up&amp;id=' . $i,
				'U_MOVE_DOWN'	=> $u_action . '&amp;action=move_down&amp;id=' . $i,

				'S_LINK_IS_CAT'	=> ($links[$i]['type'] == self::LINK_CAT) ? true : false,
			));
		}
	}

	/**
	* Update links
	*
	* @param string $key Key name
	* @param int $module_id Module ID
	*
	* @return null
	*/
	public function update_links($key, $module_id)
	{
		$this->manage_links('', $key, $module_id);
	}
}
