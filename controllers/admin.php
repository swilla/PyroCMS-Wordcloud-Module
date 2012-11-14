<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * Wordcloud Module - Manage your words in a cloud
 *
 * @author 		Steve Williamson
 * @package 	CMS
 * @subpackage 	Wordcloud Module
 * @category 	Modules
 */

class Admin extends Admin_Controller
{

	// Set the section	
	protected $section = 'wordcloud';	

	public function __construct()
	{
		parent::__construct();

		// Load all the required classes
		$this->lang->load('wordcloud');
		$this->load->driver('streams');
	}

	public function index()
	{
		// Set the title
		$this->template->title(lang('wordcloud:list_title'));

		// Set some extras
		$extra = array(
			'title'		=> lang('wordcloud:list_title'),
			'buttons'	=> array(
				array(
					'label' 	=> lang('global:edit'),
					'url' 		=> 'admin/wordcloud/edit/-entry_id-',
					),
				array(
					'label'		=> lang('global:delete'),
					'url' 		=> 'admin/wordcloud/delete/-entry_id-',
					'confirm'	=> true,
					),
				),
			'filters'	=> array(),
			);

		$this->streams->cp->entries_table('wordcloud', 'wordcloud', $this->settings->get('records_per_page'), 'admin/wordcloud/index', true, $extra);
	}

	/**
	 * Add a new word
	 *
	 * @access public
	 * @return void
	 */
	public function create()
	{
		// Set the title
		$this->template->title(lang('wordcloud:add_title'));


		/* Start normal Streams_Core stuff
		-----------------------------------*/

		// Set some shit
		$extra = array(
			'return'			=> 'admin/wordcloud',
			'title'				=> lang('wordcloud:add_title'),
		);


		// Build it
		$this->streams->cp->entry_form('wordcloud', 'wordcloud', $mode = 'new', null, true, $extra);
	}

	// --------------------------------------------------------------------------

	/**
	 * Edit a location
	 *
	 * @access public
	 * @return void
	 */
	public function edit($id)
	{
		// Set the title
		$this->template->title(lang('wordcloud:edit_title'));



		/* Start normal Streams_Core stuff
		-----------------------------------*/

		// Set some shit
		$extra = array(
			'return'			=> 'admin/wordcloud',
			'title'				=> lang('wordcloud:edit_title'),
		);


		// Build it
		$this->streams->cp->entry_form('wordcloud', 'wordcloud', $mode = 'edit', $id, true, $extra);
	}

	/**
	 * Delete an existing word
	 *
	 * @access	public
	 * @return	void
	 */
	public function delete($id)
	{

		$this->streams->entries->delete_entry($id, 'wordcloud','wordcloud');

		redirect($_SERVER['HTTP_REFERER']);
	}
}