<?php
/**
*
* @package Board3 Portal v3.3.0
* @copyright (c) 2013 Board3 Group ( www.board3.de ) - MOD by Picaron 2020
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace board3\portal\migrations;

class v330 extends \phpbb\db\migration\migration
{
	/**
	* Portal config table
	* @var $portal_config
	*/
	private $portal_config = array();

	public function effectively_installed()
	{
		return $this->db_tools->sql_table_exists($this->table_prefix . 'portal_modules');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v330\v330');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('board3_portal_version', '3.3.0')),
			array('config.add', array('board3_enable', 1)),
			array('config.add', array('board3_left_column', 1)),
			array('config.add', array('board3_right_column', 1)),
			array('config.add', array('board3_forum_index', 1)),
			array('config.add', array('board3_left_column_width', 250)),
			array('config.add', array('board3_right_column_width', 250)),
			array('config.add', array('board3_display_jumpbox', 1)),
			array('config.add', array('board3_show_all_pages', 0)),
			array('config.add', array('board3_show_all_side', 0)),
			array('config.add', array('board3_menu_1', '')),
			array('config.add', array('board3_menu_url_new_window_1', '')),
			array('config.add', array('board3_birthdays_ahead_3', 30)),
			array('config.add', array('board3_clock_src_4', '')),
			array('config.add', array('board3_attachments_number_6', 8)),
			array('config.add', array('board3_attach_max_length_6', 15)),
			array('config.add', array('board3_attachments_forum_ids_6', '')),
			array('config.add', array('board3_attachments_forum_exclude_6', '')),
			array('config.add', array('board3_attachments_filetype_6', '')),
			array('config.add', array('board3_attachments_exclude_6', '')),
			array('config.add', array('board3_topposters_7', 5)),
			array('config.add', array('board3_max_last_member_8', 8)),
			array('config.add', array('board3_welcome_message_10', '')),
			array('config.add', array('board3_welcome_message_uid_10', '')),
			array('config.add', array('board3_welcome_message_bitfield_10', '')),
			array('config.add', array('board3_max_topics_11', 10)),
			array('config.add', array('board3_recent_title_limit_11', 100)),
			array('config.add', array('board3_recent_forum_11', '')),
			array('config.add', array('board3_recent_exclude_forums_11', 1)),
			array('config.add', array('board3_announcements_style_12', '')),
			array('config.add', array('board3_number_of_announcements_12', 1)),
			array('config.add', array('board3_announcements_day_12', '')),
			array('config.add', array('board3_announcements_length_12', 200)),
			array('config.add', array('board3_global_announcements_forum_12', '')),
			array('config.add', array('board3_announcements_forum_exclude_12', '')),
			array('config.add', array('board3_announcements_archive_12', 1)),
			array('config.add', array('board3_announcements_permissions_12', 1)),
			array('config.add', array('board3_show_announcements_replies_views_12', 1)),
			array('config.add', array('board3_news_length_13', 250)),
			array('config.add', array('board3_news_forum_13', '')),
			array('config.add', array('board3_news_permissions_13', 1)),
			array('config.add', array('board3_number_of_news_13', 6)),
			array('config.add', array('board3_show_all_news_13', 1)),
			array('config.add', array('board3_news_exclude_13', '')),
			array('config.add', array('board3_news_archive_13', 1)),
			array('config.add', array('board3_news_show_last_13', '')),
			array('config.add', array('board3_show_news_replies_views_13', 1)),
			array('config.add', array('board3_news_style_13', 1)),
			array('config.add', array('board3_poll_allow_vote_14', 1)),
			array('config.add', array('board3_poll_topic_id_14', '')),
			array('config.add', array('board3_poll_exclude_id_14', '')),
			array('config.add', array('board3_poll_hide_14', '')),
			array('config.add', array('board3_poll_limit_14', 1)),
			array('config.add', array('board3_user_menu_register_16', 1)),
			array('config.add', array('board3_sunday_first_18', 1)),
			array('config.add', array('board3_calendar_today_color_18', '#000000')),
			array('config.add', array('board3_calendar_sunday_color_18', '#FF0000')),
			array('config.add', array('board3_long_month_18', '')),
			array('config.add', array('board3_display_events_18', '')),
			array('config.add', array('board3_events_18', '')),
			array('config.add', array('board3_events_url_new_window_18', '')),
			array('config.add', array('board3_leaders_ext_19', '')),
			array('config.add', array('board3_leaders_groups_19', '')),
			array('config.add', array('board3_last_visited_bots_number_20', 1)),
			array('config.add', array('board3_links_21', '')),
			array('config.add', array('board3_links_url_new_window_21', '')),
			array('config.add', array('board3_pay_acc_22', 'your@paypal.com')),
			array('config.add', array('board3_pay_custom_22', true)),
			array('config.add', array('board3_pay_default_22', 'EUR')),
			array('config.add', array('board3_max_online_friends_23', 8)),
			array('config.add', array('board3_poll_allow_vote_24', 1)),
			array('config.add', array('board3_poll_topic_id_24', '')),
			array('config.add', array('board3_poll_exclude_id_24', '')),
			array('config.add', array('board3_poll_hide_24', '')),
			array('config.add', array('board3_poll_limit_24', 1)),
			array('config.add', array('board3_custom_25_code', '')),
			array('config.add', array('board3_custom_25_bbcode', 1)),
			array('config.add', array('board3_custom_25_title', '')),
			array('config.add', array('board3_custom_25_image_src', '')),
			array('config.add', array('board3_custom_25_uid', '')),
			array('config.add', array('board3_custom_25_bitfield', '')),
			array('config.add', array('board3_custom_25_permission', '')),
			array('config_text.add', array('board3_portal_fa_styles', '')),
			array('permission.add', array('u_view_portal', true)),
			array('permission.add', array('a_manage_portal', true)),
			array('permission.permission_set', array('GUESTS', 'u_view_portal', 'group')),
			array('permission.permission_set', array('REGISTERED_COPPA', 'u_view_portal', 'group')),
			array('permission.permission_set', array('GLOBAL_MODERATORS', 'u_view_portal', 'group')),
			array('permission.permission_set', array('ADMINISTRATORS', 'u_view_portal', 'group')),
			array('permission.permission_set', array('BOTS', 'u_view_portal', 'group')),
			array('permission.permission_set', array('NEWLY_REGISTERED', 'u_view_portal', 'group')),
			array('permission.permission_set', array('ADMINISTRATORS', 'a_manage_portal', 'group')),
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_PORTAL',
			)),
			array('module.add', array(
				'acp',
				'ACP_PORTAL',
				array(
					'module_basename'	=> '\board3\portal\acp\portal_module',
					'module_mode'		=> 'config',
					'module_auth'		=> 'ext_board3/portal && acl_a_manage_portal',
					'module_langname'	=> 'ACP_PORTAL_GENERAL_INFO',
				),
			)),
			array('module.add', array(
				'acp',
				'ACP_PORTAL',
				array(
					'module_basename'	=> '\board3\portal\acp\portal_module',
					'module_mode'		=> 'modules',
					'module_auth'		=> 'ext_board3/portal && acl_a_manage_portal',
					'module_langname'	=> 'ACP_PORTAL_MODULES',
				),
			)),

			array('custom', array(array($this, 'add_portal_data'))),
			array('custom', array(array($this, 'b3p_edit_htaccess'))),
		);
	}

	public function revert_data()
	{
		return array(
			array('custom', array(array($this, 'b3p_revert_htaccess'))),
		);
	}

	public function update_schema()
	{
		return array(
			'add_tables' => array(
				$this->table_prefix . 'portal_modules' => array(
					'COLUMNS' => array(
						'module_id'				=> array('UINT:3', null, 'auto_increment'),
						'module_classname'		=> array('VCHAR:64', ''),
						'module_column'			=> array('TINT:3', 0),
						'module_order'			=> array('TINT:3', 0),
						'module_name'			=> array('VCHAR', ''),
						'module_image_src'		=> array('VCHAR', ''),
						'module_image_width'	=> array('INT:3', 0),
						'module_image_height'	=> array('INT:3', 0),
						'module_group_ids'		=> array('VCHAR', ''),
						'module_status'			=> array('TINT:1', 1),
						'module_fa_icon'		=> array('VCHAR', ''),
						'module_fa_size'		=> array('INT:1', 16),
					),
					'PRIMARY_KEY'	=> 'module_id',
				),
				$this->table_prefix . 'portal_config' => array(
					'COLUMNS' => array(
						'config_name'	=> array('VCHAR:255', ''),
						'config_value'	=> array('MTEXT', ''),
					),
					'PRIMARY_KEY'		=> 'config_name',
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array(
				$this->table_prefix . 'portal_modules',
				$this->table_prefix . 'portal_config',
			),
		);
	}

	public function add_portal_data()
	{
		if ($this->db_tools->sql_table_exists($this->table_prefix . 'portal_config'))
		{
			$sql = 'SELECT *
				FROM ' . $this->table_prefix . 'portal_config';
			$result = $this->db->sql_query_limit($sql, 1);
			$row = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);
			if (!empty($row))
			{
				return;
			}
		}
		else
		{
			return;
		}

		// get the correct group IDs from the database
		$in_ary = array('GUESTS', 'REGISTERED', 'REGISTERED_COPPA');
		$groups_ary = array();

		$sql = 'SELECT group_id, group_name
			FROM ' . $this->table_prefix . 'groups
			WHERE ' . $this->db->sql_in_set('group_name', $in_ary);
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$groups_ary[$row['group_name']] = $row['group_id'];
		}
		$this->db->sql_freeresult($result);

		// set portal config
		$this->set_portal_config('board3_menu_array_1', json_encode(array(
			array(
				'title'			=> 'M_CONTENT',
				'url'			=> '',
				'type'			=> '',
				'permission'	=> '',
			),
			array(
				'title'			=> 'INDEX',
				'url'			=> 'index.php',
				'type'			=> 1,
				'permission'	=> '',
			),
			array(
				'title'			=> 'SEARCH',
				'url'			=> 'search.php',
				'type'			=> 1,
				'permission'	=> '',
			),
			array(
				'title'			=> 'REGISTER',
				'url'			=> 'ucp.php?mode=register',
				'type'			=> 1,
				'permission'	=> $groups_ary['GUESTS'],
			),
			array(
				'title'			=> 'MEMBERLIST',
				'url'			=> 'memberlist.php',
				'type'			=> 1,
				'permission'	=> $groups_ary['REGISTERED'] . ',' . $groups_ary['REGISTERED_COPPA'],
			),
			array(
				'title'			=> 'THE_TEAM',
				'url'			=> 'memberlist.php?mode=leaders',
				'type'			=> 1,
				'permission'	=> $groups_ary['REGISTERED'] . ',' . $groups_ary['REGISTERED_COPPA'],
			),
			array(
				'title'			=> 'M_HELP',
				'url'			=> '',
				'type'			=> '',
				'permission'	=> '',
			),
			array(
				'title'			=> 'FAQ',
				'url'			=> 'faq.php',
				'type'			=> 1,
				'permission'	=> '',
			),
			array(
				'title'			=> 'M_BBCODE',
				'url'			=> 'faq.php?mode=bbcode',
				'type'			=> 1,
				'permission'	=> '',
			),
			array(
				'title'			=> 'M_TERMS',
				'url'			=> 'ucp.php?mode=terms',
				'type'			=> 1,
				'permission'	=> '',
			),
			array(
				'title'			=> 'M_PRV',
				'url'			=> 'ucp.php?mode=privacy',
				'type'			=> 1,
				'permission'	=> '',
			),
		)));
		$this->set_portal_config('board3_custom_25_code', 'Custom Page!');
		$this->set_portal_config('board3_welcome_message_10', 'Welcome to my Community!');
		$this->set_portal_config('board3_calendar_events_18', '');
		$this->set_portal_config('board3_links_array_21', json_encode(array(
			array(
				'title'			=> 'Board3.de',
				'url'			=> 'http://www.board3.de/',
				'type'			=> 2,
				'permission'	=> '',
			),
			array(
				'title'			=> 'phpBB.com',
				'url'			=> 'http://www.phpbb.com/',
				'type'			=> 2,
				'permission'	=> '',
			),
			array(
				'title'			=> 'phpBB-España.com',
				'url'			=> 'https://www.phpbb-es.com/',
				'type'			=> 3,
				'permission'	=> '',
			),
		)));

		// Populate module table
		$board3_sql_query = array(
			array(
				'module_classname'		=> '\board3\portal\modules\main_menu',	// 1
				'module_column'			=> 1,
				'module_order'			=> 1,
				'module_name'			=> 'M_MENU',
				'module_image_src'		=> 'portal_menu.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-bars',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\stylechanger',  // 2
				'module_column'			=> 1,
				'module_order'			=> 2,
				'module_name'			=> 'BOARD_STYLE',
				'module_image_src'		=> 'portal_style.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-paint-brush',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\birthday_list',	// 3
				'module_column'			=> 1,
				'module_order'			=> 3,
				'module_name'			=> 'BIRTHDAYS',
				'module_image_src'		=> 'portal_birthday.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-birthday-cake',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\clock',	// 4
				'module_column'			=> 1,
				'module_order'			=> 4,
				'module_name'			=> 'CLOCK',
				'module_image_src'		=> 'portal_clock.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-clock-o',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\search',	 // 5
				'module_column'			=> 1,
				'module_order'			=> 5,
				'module_name'			=> 'PORTAL_SEARCH',
				'module_image_src'		=> 'portal_search.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-search',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\attachments',  // 6
				'module_column'			=> 1,
				'module_order'			=> 6,
				'module_name'			=> 'PORTAL_ATTACHMENTS',
				'module_image_src'		=> 'portal_attach.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-paperclip',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\topposters',	 // 7
				'module_column'			=> 1,
				'module_order'			=> 7,
				'module_name'			=> 'TOPPOSTERS',
				'module_image_src'		=> 'portal_top_poster.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-pencil-square-o',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\latest_members',	 // 8
				'module_column'			=> 1,
				'module_order'			=> 8,
				'module_name'			=> 'LATEST_MEMBERS',
				'module_image_src'		=> 'portal_members.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-users',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\link_us',  // 9
				'module_column'			=> 1,
				'module_order'			=> 9,
				'module_name'			=> 'LINK_US',
				'module_image_src'		=> 'portal_link_us.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-external-link',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\welcome',  // 10
				'module_column'			=> 2,
				'module_order'			=> 1,
				'module_name'			=> 'PORTAL_WELCOME',
				'module_image_src'		=> '',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> '',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\recent',	 // 11
				'module_column'			=> 2,
				'module_order'			=> 2,
				'module_name'			=> 'PORTAL_RECENT',
				'module_image_src'		=> '',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> '',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\announcements',	// 12
				'module_column'			=> 2,
				'module_order'			=> 3,
				'module_name'			=> 'GLOBAL_ANNOUNCEMENTS',
				'module_image_src'		=> '',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> '',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\news',  // 13
				'module_column'			=> 2,
				'module_order'			=> 4,
				'module_name'			=> 'LATEST_NEWS',
				'module_image_src'		=> '',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> '',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\poll',  // 14
				'module_column'			=> 2,
				'module_order'			=> 5,
				'module_name'			=> 'PORTAL_POLL',
				'module_image_src'		=> 'portal_poll.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-list-ul',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\whois_online',  // 15
				'module_column'			=> 2,
				'module_order'			=> 6,
				'module_name'			=> 'PORTAL_WHOIS_ONLINE',
				'module_image_src'		=> 'portal_friends.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-plug',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\user_menu',	// 16
				'module_column'			=> 3,
				'module_order'			=> 1,
				'module_name'			=> 'USER_MENU',
				'module_image_src'		=> 'portal_user.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-user',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\statistics',	 // 17
				'module_column'			=> 3,
				'module_order'			=> 2,
				'module_name'			=> 'STATISTICS',
				'module_image_src'		=> 'portal_statistics.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-bar-chart',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\calendar',  // 18
				'module_column'			=> 3,
				'module_order'			=> 3,
				'module_name'			=> 'PORTAL_CALENDAR',
				'module_image_src'		=> 'portal_calendar.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-calendar',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\leaders',  // 19
				'module_column'			=> 3,
				'module_order'			=> 4,
				'module_name'			=> 'THE_TEAM',
				'module_image_src'		=> 'portal_team.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-users',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\latest_bots',  // 20
				'module_column'			=> 3,
				'module_order'			=> 5,
				'module_name'			=> 'LATEST_BOTS',
				'module_image_src'		=> 'portal_bots.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-android',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\links',	// 21
				'module_column'			=> 3,
				'module_order'			=> 6,
				'module_name'			=> 'PORTAL_LINKS',
				'module_image_src'		=> 'portal_links.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-link',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\donation',  // 22
				'module_column'			=> 3,
				'module_order'			=> 7,
				'module_name'			=> 'DONATION',
				'module_image_src'		=> 'portal_donation.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-paypal',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\friends',  // 23
				'module_column'			=> 3,
				'module_order'			=> 8,
				'module_name'			=> 'FRIENDS',
				'module_image_src'		=> 'portal_friends.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-user',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\poll',  // 24
				'module_column'			=> 3,
				'module_order'			=> 9,
				'module_name'			=> 'PORTAL_POLL',
				'module_image_src'		=> 'portal_poll.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-list-ul',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\custom',	 // 25
				'module_column'			=> 3,
				'module_order'			=> 10,
				'module_name'			=> 'PORTAL_CUSTOM',
				'module_image_src'		=> 'portal_custom.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-align-center',
			),
			array(
				'module_classname'		=> '\board3\portal\modules\random_member',	// 26
				'module_column'			=> 3,
				'module_order'			=> 11,
				'module_name'			=> 'PORTAL_RANDOM_MEMBER',
				'module_image_src'		=> 'portal_random_member.png',
				'module_group_ids'		=> '',
				'module_image_width'	=> 16,
				'module_image_height'	=> 16,
				'module_status'			=> 1,
				'module_fa_icon'		=> 'fa-random',
			),
		);
		$this->db->sql_multi_insert($this->table_prefix . 'portal_modules', $board3_sql_query);
	}

	/**
	* Set config value. Creates missing config entry.
	* Only use this if your config value might exceed 255 characters, otherwise please use set_config
	*
	* @param string $config_name Name of config entry to add or update
	* @param mixed $config_value Value of config entry to add or update
	*/
	private function set_portal_config($config_name, $config_value)
	{
		$portal_config = $this->portal_config;

		$sql = 'UPDATE ' . $this->table_prefix . "portal_config
			SET config_value = '" . $this->db->sql_escape($config_value) . "'
			WHERE config_name = '" . $this->db->sql_escape($config_name) . "'";
		$this->db->sql_query($sql);

		if (!$this->db->sql_affectedrows() && !isset($portal_config[$config_name]))
		{
			$sql = 'INSERT INTO ' . $this->table_prefix . 'portal_config ' . $this->db->sql_build_array('INSERT', array(
				'config_name'	=> $config_name,
				'config_value'	=> $config_value));
			$this->db->sql_query($sql);
		}

		$this->portal_config[$config_name] = $config_value;
	}

	/**
	* Edit .htaccess
	* Add DirectoryIndex app.php index.php in last line
	*/
	public function b3p_edit_htaccess()
	{
		$acp_htaccess = new \board3\portal\includes\acp_htaccess($this->phpbb_root_path);
		$acp_htaccess->edit_htaccess();
	}

	/**
	* Restore .htaccess
	* Delete line DirectoryIndex app.php index.php
	*/
	public function b3p_revert_htaccess()
	{
		$acp_htaccess = new \board3\portal\includes\acp_htaccess($this->phpbb_root_path);
		$acp_htaccess->revert_htaccess();
	}
}
