<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Function Name 	:	Pagination_lib
* @access public
* Description 		:   Bootstrap Pagination Library
* @author 			:	felmerald Besario
*/ 
class Pagination_lib
{
		/**
		* @access public
		* @return pagination
		* Description bootstrap pagination
		* @param $base_url 		: base_url of  controller method name
		* @param $perpage 		: Value per page
		* @param $numlinks 		: The number of links
		* @param $select_column : Select column name in database table
		* @param $table_name 	: Database Table name
		* @param $join 			: Use in Joining Tables
		* @param $where 		: Use in Condition Statement
		* @param $like 			: Use in matching Table column
		* @param $order_by 		: Use in arrangement
		******/ 
		function use_pagination($url, $perpage, $numlinks, $select_column = array(), $table_name = "", $join = array(), $where = array(), $like = array(), $order_by = array())
		{
			$config = array(
						'base_url' 			=> base_url($url),
				 		'total_rows'		=> ci()->db->get($table_name)->num_rows(),
				 		'per_page'			=> $perpage,//10
				 		'num_links'			=> $numlinks,//10
				 		'use_page_numbers'	=> TRUE,
				 		'suffix'			=> '?='.http_build_query($select_column, '', "&"),
				 		'full_tag_open'		=> '<ul class="pagination pagination-sm">',
				 		'full_tag_close'	=> '</ul>',
				 		'num_tag_open'   	=> '<li>',
				 		'num_tag_close' 	=> '</li>',
				 		'cur_tag_open'		=> '<li class="active"><span>',
				 		'cur_tag_close'		=> '<span class="sr-only">(current)</span></span></li>',
				 		'prev_tag_open'		=> '<li>',
				 		'prev_tag_close'	=> '</li>',
				 		'next_tag_open'		=> '<li>',
				 		'next_tag_close'	=> '</li>',
				 		'first_link'		=> '&laquo;',
				 		'prev_link'			=> '&lsaquo;',
				 		'last_link'			=> '&raquo;',
				 		'next_link'			=> '&rsaquo;',
				 		'first_tag_open'	=> '<li>',
				 		'first_tag_close'	=> '</li>',
				 		'last_tag_open'		=> '<li>',
				 		'last_tag_close'	=> '</li>'
				);
			
			ci()->pagination->initialize($config);
			// select column name
			ci()->db->select($select_column);
		    // if $join is not null and count
			if(!empty($join) && count($join) > 0)
			{
				foreach($join as $row => $data):
				 	ci()->db->join($row, $data, 'left');
				endforeach;
			}
			// If Not Empty Where Condition Statement
			if(!empty($where) && count($where) > 0)
			{
				ci()->db->where($where);
			}
			// If Like Is NOt Empty
			if(!empty($like) && count($like) > 0 )
			{
				//call ['column_name',$like,'both']
				ci()->db->like($like,'both');
			}
			 // If Not Empty Order_by
			 if(!empty($order_by) && count($order_by) > 0)
			{
				foreach($order_by as $row => $data):
				 		ci()->db->order_by($row, $data);
				endforeach;
			}

			$query = ci()->db->get($table_name, $config['per_page'], ci()->uri->segment(3));

			if($query && $query->num_rows() > 0 )
				return $query->result();
			else
				return null; 		}

		// Noted: to generate pagination links put this code wherever inside your pagination page
		//  echo $this->pagination->create_links();	
}