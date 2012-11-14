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

	/**
	 * Runs code and logic required to display the widget.
	 */
	public function run($options)
	{
		$this->load->driver('Streams');

		$params = array('stream' => 'wordcloud', 'namespace' => 'wordcloud');

		$entries = $this->streams->entries->get_entries($params);

		if(!$entries){
			return false;
		}

		return array(
			'entries'			=> $entries,
		);
	}

}