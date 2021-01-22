<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Helper Name 	: upload_helper
* Description 	: upload files based on allowed types and resize, create new dimension
* @param 		: NULL
* @access 		  public
* @author 		: Felmerald Besario
**/ 
function do_upload()
	{
		$config = array(
				'upload_path' 	=>	'./upload/',
				'allowed_types' =>  'gif|jpg|jpeg|JPG|png|PNG'
			);
		ci()->load->library('upload', $config);

		if(!ci()->upload->do_upload())
		{
			$error = array('error' => ci()->upload->display_errors());
			return NULL;
		}
		else
		{
			$data = ci()->upload->data();
			$file_name = $data['file_name'];

			// resize upload
			$configer = array(
					'image_library'		=>	'gd2',
					'source_image'		=>	$data['full_path'],
					'create_thumb'		=>	FALSE,
					'maintain_ratio'	=>	TRUE,
					'quality'			=>	'80%', //deduct image quality up to 80%
					'width'				=>	640,
					'height'			=>	480
				);
			ci()->image_lib->clear();
			ci()->image_lib->initialize($configer);
			ci()->image_lib->resize();

			return $file_name;
		}
	}