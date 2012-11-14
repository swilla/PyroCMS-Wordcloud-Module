<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Show a Wordcloud in your widget areas
 * 
 * @author		Steve Williamson
 */
class Widget_Wordcloud extends Widgets
{

	/**
	 * The translations for the widget title
	 *
	 * @var array
	 */
	public $title = array(
		'en' => 'Wordcloud',
	);

	/**
	 * The translations for the widget description
	 *
	 * @var array
	 */
	public $description = array(
		'en' => 'Display a wordcloud anywhere',
	);

	/**
	 * The author of the widget
	 *
	 * @var string
	 */
	public $author = 'Steve Williamson';

	/**
	 * The author's website.
	 * 
	 * @var string 
	 */
	public $website = 'http://appsygna.com/';

	/**
	 * The version of the widget
	 *
	 * @var string
	 */
	public $version = '1.0';

	public $fields = array(
		array(
			'field' => 'stream',
			'label' => 'Stream',
			'rules' => 'required'
		),
	);

	public function form()
	{
		$this->load->driver('Streams');

		$this->_streams = $this->streams->streams->get_streams('streams');
		// Array for select
		$stream_tree = array();
		foreach ($this->_streams as $stream)
		{
			$stream_tree[$stream->stream_slug] = $stream->stream_name;
		}

		return array(
			'stream_tree' => $stream_tree
		);
	}

	/**
	 * Runs code and logic required to display the widget.
	 */
	public function run($options)
	{
		$this->load->driver('Streams');

		$params = array('stream'=>$options['stream'], 'namespace'=>'streams');

		$entries = $this->streams->entries->get_entries($params);

		if(!$entries){
			return false;
		}

		return array(
			'entries'			=> $entries,
		);
	}

}