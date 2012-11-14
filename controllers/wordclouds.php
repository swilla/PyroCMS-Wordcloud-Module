<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Wordcloud public controller
 * 
 * @author      Steve Williamson
 * @link		http://www.appsygna.com
 * @package 	PyroCMS
 * @subpackage  Wordcloud Module
 * @category	controller
 */
class Wordcloud extends Public_Controller {
    
    /**
     * Constructor method
     *
     * @access public
     * @return void
     */
    function __construct()
    {
        parent::__construct();

        $this->load->driver('streams');
        $this->lang->load('wordcloud');
    }

    function index()
    {
        $params = array(
                'stream' => 'wordcloud',
                'namespace' => 'wordcloud',
            );

        $words = $this->streams->entries->get_entries($params, false);
        
        $this->template
                    ->title(lang('wordcloud:list_title'))
                    ->append_css('module::jqcloud.css')
                    ->append_js('module::jqcloud-1.0.2.min.js')
                    ->build('index', array('words'=>$words));
    }
}