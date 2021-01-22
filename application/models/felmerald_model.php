<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Class Name : felmerald_model
* @param 	 : NULL
* @access public
* Description: Manage All Queries method to be called
* @author felmerald besario
*/ 
class Felmerald_model extends CI_Model
{
	// -----------------------SELECT QUERIES------------------------//

	/**
	* @param $select 	: Use In Selecting column
	* @param $table_name: Use In Calling Database Table name
	* @access public
	* Function name     : Select ALL
	* Description 		: Select Column Name From table name
	*/ 
	function select_all($select=array(), $table_name = "")
	{
		$this->db->select($select)
				 ->from($table_name);
		$query = $this->db->get();
		if($query && $query->num_rows() > 0 )
			return $query->result();
		else
			return null;
	}
	/**
	* @param $select 	: Use In Selecting column
	* @param $table_name: Use In calling Database Table name
	* @param $join 		: Use In Joining Table with foreign Key
	* @param $where 	: Use In Condition Station
	* @param $like 		: Use for Like query
	* @param $order_by 	: Use In Order By Arrangement
	* @param $limit 	: Use In Limit
	* Function Name 	: select_join
	*/ 
	function select_join($select = array(), $table_name = "", $join = array(), $where = array(), $like = array(), $order_by = array(), $limit = 0 )
	{
		$this->db->select($select)
				 ->from($table_name);

				 // If Not Empty left join tables
				 if(!empty($join) && count($join) > 0)
				 {
				 	foreach($join as $row => $data):
				 		$this->db->join($row, $data, 'left');
				 	endforeach;
				 }

				 // If Not Empty Where Condition Statement
				 if(!empty($where) && count($where) > 0)
				 {
				 	$this->db->where($where);
				 }

				 // If Like Is NOt Empty
				 if(!empty($like) && count($like) > 0 )
				 {
				 	//call ['column_name',$like,'both']
				 	$this->db->like($like,'both');
				 }

				 // If Not Empty Order_by
				 if(!empty($order_by) && count($order_by) > 0)
				 {
				 	foreach($order_by as $row => $data):
				 		$this->db->order_by($row, $data);
				 	endforeach;
				 }

				 // if limit is not null or 0
				if((int)$limit > 0 && (int)$limit > 0)
				{
					$this->db->limit((int)$limit);	
				}

		$query = $this->db->get();
		if($query && $query->num_rows() > 0 )
			return $query->result();
		else
			return null;
	}

	/**
	* @param $select 	: 	Use to Select column name
	* @param $select_max:	Field to compute the maximum of
	* @param $select_min:	Field to compute the minimum of
	* @param $select_avg:	Field to compute the average of 	
	* @param $select_sum:	Field to compute the sum of
	* @param $join_table:	Use in Joining Table
	* @param $where 	: 	Use in condition Statement
	* @param $or_where 	: 	Name of field to compare, or associative array
	* @param $where_in 	: 	Name of field to examine
	* @param $or_where_in: 	Generates a WHERE field IN(‘item’, ‘item’) SQL query, joined with ‘OR’ if appropriate.	
	* @param $where_not_in: Generates a WHERE field NOT IN(‘item’, ‘item’) SQL query, joined with ‘OR’ if appropriate.
	* @param $or_where_not_in : Generates a WHERE field NOT IN(‘item’, ‘item’) SQL query, joined with ‘OR’ if appropriate.
	* @param $like 		:	Use In Like Condition
	* @param $or_like 	:   Use In Or Like Condition
	* @param $not_like 	:	Use In Not Like Condition
	* @param $or_not_like: 	Use In Or Not Like Condition
	* @param $group_by	:	Use In Grouping
	* @param $distinct 	: 	Adds the “DISTINCT” keyword to a query
	* @param $having 	:	Permits you to write the HAVING portion of your query. There are 2 possible syntaxes, 1 argument or 2:
	* @param $or_having :   Identical to having(), only separates multiple clauses with “OR”
	* @param $order_by 	: 	Use In Ordering Arrangement
	* @param $limit 	: 	Use In Limitation of a query
	* Function Name 	: 	Select_all_types
	* Description 		: 	Select all types of query builder in CI
	*/ 
	function select_all_types(
		$select=array(),
		$select_max = array(), 
		$select_min = array(), 
		$select_avg = array(), 
		$select_sum = array(), 
		$table_name = "", 
		$join_table = array(),
		$where = array(), 
		$or_where = array(), 
		$where_in = array(), 
		$or_where_in = array(), 
		$where_not_in = array(), 
		$or_where_not_in = array(), 
		$like = array(), 
		$or_like = array(), 
		$not_like = array(), 
		$or_not_like = array(), 
		$group_by = array(),
		$distinct = array(), 
		$having = array(), 
		$or_having = array(), 
		$order_by = array(), 
		$limit = 0 )
	{
		// If select in not  null
		if(!empty($select) && count($select) > 0 )
		{
			$this->db->select($column_name);
		}
		// If Select_max is not Null
		if(!empty($select_max) && count($select_max) > 0 )
		{
			$this->db->select_max($select_max);
		}
		// If Select_min is not NULL
		if(!empty($select_min) && count($select_min) > 0 )
		{
			$this->db->select_min($select_min);
		}
		// If select_avg is not NULL
		if(!empty($select_avg) && count($select_avg) > 0 )
		{
			$this->db->select_avg($select_avg);
		}
		// If select_sum is not NULL
		if(!empty($select_sum) && count($select_sum) > 0 )
		{
			$this->db->select_sum($select_sum);
		}
		// Call A Table name
		$this->db->from($table_name);

		// If join_table is not null and Count
		if(!empty($join_table) && count($join_table) > 0)
	    {
			foreach($join_table as $row => $data):
				$this->db->join($row, $data, 'left');
			endforeach;
		}
		// If where is not NULL
		if(!empty($where) && count($where) > 0 )
		{
			$this->db->where($where);
		}
		// If or_where is not NULL
		if(!empty($or_where) && count($or_where) > 0 )
		{
			$this->db->or_where($or_where);
		}
		// If where_in is not NULL
		if(!empty($where_in) && count($where_in) > 0 )
		{
			$this->db->where_in($where_in);
		}
		// If or_where_in is not NULL
		if(!empty($or_where_in) && count($or_where_in) > 0 )
		{
			$this->db->or_where_in($or_where_in);
		}
		// If where_not_in is not NULL
		if(!empty($where_not_in) && count($where_not_in) > 0 )
		{
			$this->db->where_not_in($where_not_in);
		}
		// If or_where_not_in is not NULL
		if(!empty($or_where_not_in) && count($or_where_not_in) > 0 )
		{
			$this->db->or_where_not_in($or_where_not_in);
		}
		// If Like Is NOt NULL
		if(!empty($like) && count($like) > 0 )
		{
			//call ['column_name',$like,'both']
			$this->db->like($like,'both');
		}
		// If or_like is Not NULL
		if(!empty($or_like) && count($or_like) > 0 )
		{
			$this->db->or_like($or_like);
		}
		// If not_like is Not NULL
		if(!empty($not_like) && count($not_like) > 0 )
		{
			$this->db->not_like($not_like);
		}
		// If or_not_like is Not NULL
		if(!empty($or_not_like) && count($or_not_like) > 0 )
		{
			$this->db->or_not_like($or_not_like);
		}
		// If group_by is Not NULL
		if(!empty($group_by) && count($group_by) > 0 )
		{
			$this->db->group_by($group_by);
		}
		// If distinct is Not NULL
		if(!empty($distinct) && count($distinct) > 0 )
		{
			$this->db->distinct();
		}
		// If Nhaving is Not NULL
		if(!empty($having) && count($having) > 0 )
		{
			$this->db->having($having); // Use first argument in having in codelgniter
		}
		// If or_having is NOT NULL
		if(!empty($or_having) && count($or_having) > 0 )
		{
			$this->db->or_having($or_having); // Use first argument in having in codelgniter
		}
		// If Not Empty Order_by
	    if(!empty($order_by) && count($order_by) > 0)
		{
			foreach($order_by as $row => $data):
				$this->db->order_by($row, $data);
			endforeach;
		}
		 // if limit is not null or 0
		if((int)$limit > 0 && (int)$limit > 0)
		{
			$this->db->limit((int)$limit);	
		}

		$query = $this->db->get();
		if($query && $query->num_rows() > 0 )
			return $query->result();
		else
			return null;			
	}

	/**
	* @param $column_name 	: 	Use In Choosing Column name
	* @param $where 		: 	Use In Condition Statement
	* @param $table_name 	: 	Name of Database Table
	* Description 			:   Count all results   
	*/ 
	function count_all_results($column_name = array(),$where=array(), $table_name = array())
	{
		$this->db->select($column_name);
		// If Where is not NULL
		if(!empty($where) && count($where) > 0 )
		{
			$this->db->where($where);
		}
		// Return Count Column
		return $this->db->count_all_results($table_name[0]);//table_name array sub 0
	}
     
	// -----------------------INSERT QUERIES------------------------//

	/**
	* @param $insert_table 	: Table name to be insert
	* @param $table_name 	: Name of Database Table
	* Function Name 		: insert _data
	* Description 			: INSERT INTO $table_name VALUE $insert_table
	*/ 
	function insert_data($insert_table = array(), $table_name="")
	{
		if(!empty($insert_table))
		{
			$array_value = array($insert_table);
			foreach($array_value as $value): 
				$data = $value;
			endforeach;
		
		}
			return $this->db->insert($table_name,$data); //table_name array sub 0	

	}

	// -----------------------DELETE QUERIES------------------------//

	/**
	* @param $where_id 	: Use In condition ID
	* @param $table_name: Use to call table name
	* Description : Delete Data from database
	**/ 
	function delete_data($where_id = array(), $table_name = "")
	{
		$sql = $this->db->where($where_id)->delete($table_name);
		if($sql)
			return TRUE;
		else
			return FALSE;
	}

	// -----------------------UPDATE QUERIES------------------------//

	/**
	* @param $update_value 		: Column name to be update
	* @param $where 			: Use in condition statement
	* @param $table_name 		: Use to call table name
	* Description 				: update queries
	*/ 
	function update_data($update_value = array(), $where = array(), $table_name = "")
	{
		if(!empty($update_value))
		{
			$array_value = array($update_value);
			foreach($array_value as $value):
				$data = $value;
			endforeach;
		}
		$sql = $this->db->where($where)->update($table_name, $data);
		if($sql)
			return TRUE;
		else
			return FALSE;
	}

}