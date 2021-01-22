<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Includes
{
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	public function header($title="")
	{
		$data = array('title'=>$title);
		return $this->CI->load->view('includes/header',$data);
	}

	public function footer()
	{
		return $this->CI->load->view('includes/footer');
	}

	
}