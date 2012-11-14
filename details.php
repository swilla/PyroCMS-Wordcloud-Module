<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @author 		Steve Williamson
 * @package 	PyroCMS
 * @subpackage 	Modules
 * @category 	Wordcloud
 */
class Module_Wordcloud extends Module {

	public $version = '1.0';

	public function info()
	{
		$info = array(
			'name' => array(
				'en' => 'Wordcloud',
			),
			'description' => array(
				'en' => 'Show a wordcloud on your website.',
			),
			'frontend' => TRUE,
			'backend'  => TRUE,
			'skip_xss' => TRUE,
			'menu'	  => 'content',
		);

		return $info;
	}

	public function install()
	{
		$this->load->driver('Streams');
		$this->lang->load('wordcloud/wordcloud');

		$this->streams->streams->add_stream('Wordcloud', 'wordcloud', 'wordcloud', 'wordcloud', NULL);
		$this->streams->streams->update_stream('wordcloud', 'wordcloud', array('stream_prefix' => 'wordcloud_', 'title_column' => 'text', 'sorting' => 'custom', 'view_options' => array('created','text', 'weight')));

		$fields = array(
					array(
						'name'			=> 'lang:wordcloud:text',
						'slug'			=> 'text',
						'namespace'		=> 'wordcloud',
						'type'			=> 'text',
						),
					array(
						'name'			=> 'lang:wordcloud:weight',
						'slug'			=> 'weight',
						'namespace'		=> 'wordcloud',
						'type'			=> 'integer',
						),
					array(
						'name'			=> 'lang:wordcloud:link',
						'slug'			=> 'link',
						'namespace'		=> 'wordcloud',
						'type'			=> 'text',
						),
					);

		// Add all the Fields
		$this->streams->fields->add_fields($fields);

		// Assign Child Fields
		$this->streams->fields->assign_field('wordcloud', 'wordcloud', 'text', 		array('required' => true, 'instructions' => lang('wordcloud:instructions:text')));
		$this->streams->fields->assign_field('wordcloud', 'wordcloud', 'weight', 	array('required' => true, 'instructions' => lang('wordcloud:instructions:weight')));
		$this->streams->fields->assign_field('wordcloud', 'wordcloud', 'text', 		array('required' => false, 'instructions' => lang('wordcloud:instructions:link')));
		
		return TRUE;
	}

	public function uninstall()
	{
		$this->load->driver('Streams');

		$this->streams->utilities->remove_namespace('wordcloud');

		return TRUE;
	}

	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}

	public function help()
	{
		// Return a string containing help info
		// You could include a file and return it here.
		return "No help information yet.";
	}
}