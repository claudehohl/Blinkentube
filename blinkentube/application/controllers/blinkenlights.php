<?php
/**
 * Class and Function List:
 * Function list:
 * - Blinkenlights()
 * - index()
 * Classes list:
 * - Blinkenlights extends Controller
 */

class Blinkenlights extends Controller
{
	
	function Blinkenlights() 
	{
		parent::Controller();
	}
	
	function index() 
	{

		//load
		$this->load->library('blinken');

		//post
		
		if ($this->input->post('submit') && isset($_FILES['movie']['tmp_name']) && $_FILES['movie']['tmp_name'] != '') 
		{
			$content = file_get_contents($_FILES['movie']['tmp_name']);
			$movie_name = $this->blinken->create_movie($content);
			redirect($movie_name);
		}

		//movie name
		$movie = $this->uri->segment(1);
		$embed = false;
		
		if ($movie == 'embed') 
		{
			$movie = $this->uri->segment(2);
			$embed = true;
		}

		//standard: heart
		
		if ($movie == '') 
		{
			$movie = 'heart';
		}
		
		if (!file_exists('movies/' . $movie . '.bml')) 
		{
			$movie = '404';
		}

		//view
		$this->load->view('html_header');
		$this->load->view('blinkenbuilding', array(
			'movie' => $movie,
		));
		
		if (!$embed) 
		{
			$this->load->view('buttonbar');
		}
		$this->load->view('html_footer');
	}
}
