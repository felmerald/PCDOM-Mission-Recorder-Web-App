<?php defined('BASEPATH') OR exit('No direct script access allowed');
// created by felmerald
class My_model extends CI_Model
{

// check login credentials if email and password was equal if not access denied
	function login_authenticate($email, $password, $login_type)
	{
		$data = array(
			'email'		=>	$email,
			'password'	=>	sha1(sha1($password)),
			'login_type'=>	$login_type	
		);
		$query = $this->db->get_where('pcdom_users', $data);
		if($query->num_rows() !=0)
		{
			foreach($query->result() as $row)
			{
				$sessionData = array(

						'login_id'			=>	$row->user_id,
						'login_password'	=>	$row->password,
						'login_type'		=>	$row->login_type,
						'login'				=>	TRUE

				);
				$this->session->set_userdata($sessionData);

				if($row->login_type == 'mrec')
				{

						redirect(base_url('mrec/home'));
						exit();

				}
				else if($row->login_type == 'admin')
				{
						
						redirect(base_url('superadmin/home'));
						exit();
				}
				else if($row->login_type == 'supply')
				{
						echo "SUPPLY PAGE IS COMMING SOON";
				}
				
			}
		}
		else
		{
			$this->session->set_flashdata("success",alert("alert-danger","Email or Password Incorrect"));
			redirect(base_url(''));
			exit();

		}


	}



// check session or check security base of login_type
	Public function usersSession()
	{
		$user_id = $this->session->userdata('login_id');
		$login_type = $this->session->userdata('login_type');
		
		$this->db->select('login_type')->from('pcdom_users');
		$query = $this->db->get();
		
			$session_data = array(
					'user_id'	=>	$user_id,
					'login_type' => $login_type
				);

					if($this->session->userdata('login_type') == "mrec")
					{
					
						$checkMissionRecorderInfo = $this->db->get_where('pcdom_users', $session_data);
						if($checkMissionRecorderInfo->num_rows() > 0 )
						{
							return true;
						}
						else
						{
							return false;
						}
					}
					else if($this->session->userdata('login_type') == "supply")
					{
						$checkSupplyManager = $this->db->get_where('pcdom_users', $session_data);
						if($checkSupplyManager->num_rows() > 0 )
							return true;
						else
							return false;
					}
					else if($this->session->userdata('login_type') == "admin")
					{
						
						$checkadministrator = $this->db->get_where('pcdom_users', $session_data);
						if($checkadministrator->num_rows() > 0 )
						{
							return true;
						}
						else
						{
							return false;
						}
					}
					else
					{
						return false;
					}

	}










	public function get_list_missionary()
	{
		$this->db->select('missionary_id, missionaries_name, created, modified, status, calling')
				 ->from('pcdom_missionaries')
				 ->where('status !=','released');
		$sql = $this->db->get();
				if($sql && $sql->num_rows() > 0 )
					return $sql->result();
				else
					return;
	}

	public function get_list_zone()
	{
		$query = $this->felmerald_model->select_all(['zone_id','zone_name'],['pcdom_zone']);
		if($query)
		{
			return $query;
		}
		else
		{
			return;
		}
	}

	public function get_list_district()
	{
		$query = $this->felmerald_model->select_all(['district_id','district_name'],['pcdom_district']);
		if($query)
		{
			return $query;
		}
		else
		{
			return;
		}
	}

	public function get_list_area()
	{
		$query = $this->felmerald_model->select_all(['area_id','area_name'],['pcdom_area']);
		if($query)
		{
			return $query;
		}
		else
		{
			return;
		}
	}


	public function getlistareas()
	{
		$this->db->select('zone_name,in_used, district_name, area_name, pcdom_zone.zone_id AS z_id, pcdom_district.district_id AS d_id, pcdom_area.area_id AS a_id')
				 ->from('pcdom_zone')
				 ->join('pcdom_district','pcdom_district.zone_id = pcdom_zone.zone_id','left')
				 ->join('pcdom_area','pcdom_area.district_id = pcdom_district.district_id','left');
		$query = $this->db->get();

		

		if($query && $query->num_rows() >0 )
		{
			return $query->result();
		}
		else
		{
			return;
		}
	}

	// for selecting companionship
	public function getcompanionship()
	{
		$this->db->select('companionship_id, missionary_one_id, missionary_two_id, missionary_three_id, pcdom_companionship.zone_id AS pczone_id, zone_name, pcdom_companionship.district_id AS pcdistrict_id, district_name, pcdom_companionship.area_id AS pcarea_id, area_name, assignment, zone_name, pcdom_zone.zone_id AS pz_zone_id, district_name, pcdom_district.district_id AS pd_district_id,area_name,pcdom_area.area_id AS pa_area_id, pcdom_m1.missionaries_name AS m1_missionary, pcdom_m1.missionary_id AS m1_misssionary_id, pcdom_m2.missionaries_name AS m2_missionary, pcdom_m2.missionary_id AS m2_misssionary_id, pcdom_m3.missionaries_name AS m3_missionary, pcdom_m3.missionary_id AS m3_misssionary_id')
				->from('pcdom_companionship')
				->join('pcdom_missionaries as pcdom_m1','pcdom_m1.missionary_id = pcdom_companionship.missionary_one_id','left')
				->join('pcdom_missionaries as pcdom_m2','pcdom_m2.missionary_id = pcdom_companionship.missionary_two_id','left')
				->join('pcdom_missionaries as pcdom_m3','pcdom_m3.missionary_id = pcdom_companionship.missionary_three_id','left')
				->join('pcdom_zone','pcdom_zone.zone_id = pcdom_companionship.zone_id','left')
				->join('pcdom_district','pcdom_district.district_id = pcdom_companionship.district_id','left')
				->join('pcdom_area','pcdom_area.area_id = pcdom_companionship.area_id','left')
				->where(
					array(
						"companionship_as_at_month"		=>	date('F'),
						"companionship_as_at_year"		=>	date('Y'),

					)
				);
				$sql = $this->db->get();
				if($sql && $sql->num_rows() > 0 )
					return $sql->result();
				else
					return;
	}

	// for selecting statistics retrieve from database
	public function select_statistics()
	{
		$this->db->select('stats_id, pcdom_statistics.companionship_id AS ps_comp_id, pcdom_statistics.zone_id AS ps_zone_id, pcdom_statistics.district_id AS ps_district_id, pcdom_statistics.area_id AS ps_area_id, baptism, confirm, ibd, iasm, ni, ph, wh, tsa, week_number, month, year, week_date, pcdom_statistics.created AS ps_created, pcdom_companionship.companionship_id AS pc_companionship_id, missionary_one_id, missionary_two_id, missionary_three_id, assignment, pcdom_zone.zone_id AS pz_zone_id, zone_name, pcdom_district.district_id AS pd_district_id, district_name, pcdom_area.area_id AS pa_area_id, area_name, pcdom_m1.missionaries_name AS m1_missionary, pcdom_m1.missionary_id AS m1_misssionary_id, pcdom_m2.missionaries_name AS m2_missionary, pcdom_m2.missionary_id AS m2_misssionary_id, pcdom_m3.missionaries_name AS m3_missionary, pcdom_m3.missionary_id AS m3_misssionary_id')
				 ->from('pcdom_statistics')
				 ->join('pcdom_companionship','pcdom_companionship.companionship_id = pcdom_statistics.companionship_id','left')
				 ->join('pcdom_zone','pcdom_zone.zone_id = pcdom_statistics.zone_id','left')
				 ->join('pcdom_district','pcdom_district.district_id = pcdom_statistics.district_id','left')
				 ->join('pcdom_area','pcdom_area.area_id = pcdom_statistics.area_id','left')
				 ->join('pcdom_missionaries as pcdom_m1','pcdom_m1.missionary_id = pcdom_companionship.missionary_one_id','left')
				 ->join('pcdom_missionaries as pcdom_m2','pcdom_m2.missionary_id = pcdom_companionship.missionary_two_id','left')
				 ->join('pcdom_missionaries as pcdom_m3','pcdom_m3.missionary_id = pcdom_companionship.missionary_three_id','left');

				 $query = $this->db->get();
				 if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	public function get_companionship_current()
	{

		$this->db->select('pcdom_m1.missionaries_name AS m1_missionary, pcdom_m1.missionary_id AS m1_misssionary_id, pcdom_m2.missionaries_name AS m2_missionary, pcdom_m2.missionary_id AS m2_misssionary_id, pcdom_m3.missionaries_name AS m3_missionary, pcdom_m3.missionary_id AS m3_misssionary_id,missionary_one_id, missionary_two_id, missionary_three_id, area_name, zone_name, pcdom_m1.status as m1status, companionship_as_at_month, companionship_as_at_year, companionship_id')
				 ->from('pcdom_companionship')
				 ->join('pcdom_missionaries as pcdom_m1','pcdom_m1.missionary_id = pcdom_companionship.missionary_one_id','left')
				 ->join('pcdom_missionaries as pcdom_m2','pcdom_m2.missionary_id = pcdom_companionship.missionary_two_id','left')
				 ->join('pcdom_missionaries as pcdom_m3','pcdom_m3.missionary_id = pcdom_companionship.missionary_three_id','left')
				 ->join('pcdom_zone','pcdom_zone.zone_id = pcdom_companionship.zone_id','left')
				 ->join('pcdom_area','pcdom_area.area_id = pcdom_companionship.area_id','left')
				 ->where('pcdom_companionship.companionship_as_at_month',date('F'))
				 ->where('pcdom_companionship.companionship_as_at_year',date('Y'))
				 ->where('pcdom_m1.status !=','released');


				 $query = $this->db->get();
				 if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	public function select_statistics_monthly()
	{

		$this->db->select('stats_id, pcdom_statistics.companionship_id AS ps_comp_id, pcdom_statistics.zone_id AS ps_zone_id, pcdom_statistics.district_id AS ps_district_id, pcdom_statistics.area_id AS ps_area_id, week_number, month, year, week_date, pcdom_statistics.created AS ps_created, pcdom_companionship.companionship_id AS pc_companionship_id, missionary_one_id, missionary_two_id, missionary_three_id, assignment, pcdom_zone.zone_id AS pz_zone_id, zone_name, pcdom_district.district_id AS pd_district_id, district_name, pcdom_area.area_id AS pa_area_id, area_name, pcdom_m1.missionaries_name AS m1_missionary, pcdom_m1.missionary_id AS m1_misssionary_id, pcdom_m2.missionaries_name AS m2_missionary, pcdom_m2.missionary_id AS m2_misssionary_id, pcdom_m3.missionaries_name AS m3_missionary, pcdom_m3.missionary_id AS m3_misssionary_id')
				 ->select_sum('baptism')
				 ->select_sum('confirm')
				 ->select_sum('ibd')
				 ->select_sum('iasm')
				 ->select_sum('ni')
				 ->select_sum('ph')
				 ->select_sum('wh')
				 ->select_sum('tsa')
				 ->from('pcdom_statistics')
				 ->join('pcdom_companionship','pcdom_companionship.companionship_id = pcdom_statistics.companionship_id','left')
				 ->join('pcdom_zone','pcdom_zone.zone_id = pcdom_statistics.zone_id','left')
				 ->join('pcdom_district','pcdom_district.district_id = pcdom_statistics.district_id','left')
				 ->join('pcdom_area','pcdom_area.area_id = pcdom_statistics.area_id','left')
				 ->join('pcdom_missionaries as pcdom_m1','pcdom_m1.missionary_id = pcdom_companionship.missionary_one_id','left')
				 ->join('pcdom_missionaries as pcdom_m2','pcdom_m2.missionary_id = pcdom_companionship.missionary_two_id','left')
				 ->join('pcdom_missionaries as pcdom_m3','pcdom_m3.missionary_id = pcdom_companionship.missionary_three_id','left')
				 ->group_by('pcdom_statistics.companionship_id')
				 ->where(
				 		array(
				 			'month'		=>		date('F'),
				 			'year'		=>		date('Y'),
				 		)
				 );

				 $query = $this->db->get();
				 if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}
	// ===============SUMMARY REPORT====================//
	public function summary_report()
	{
		$this->db->select('week_number, month, year, area_name,week_date, area_name,pcdom_m1.missionaries_name AS m1_missionary, pcdom_m1.missionary_id AS m1_misssionary_id, pcdom_m2.missionaries_name AS m2_missionary, pcdom_m2.missionary_id AS m2_misssionary_id, pcdom_m3.missionaries_name AS m3_missionary, pcdom_m3.missionary_id AS m3_misssionary_id')
				 ->select_sum('baptism')
				 ->select_sum('confirm')
				 ->from('pcdom_statistics')
				 ->join('pcdom_area','pcdom_area.area_id = pcdom_statistics.area_id','left')
				 ->join('pcdom_companionship','pcdom_companionship.companionship_id = pcdom_statistics.companionship_id','left')	
				 ->join('pcdom_missionaries as pcdom_m1','pcdom_m1.missionary_id = pcdom_companionship.missionary_one_id','left')
		         ->join('pcdom_missionaries as pcdom_m2','pcdom_m2.missionary_id = pcdom_companionship.missionary_two_id','left')
		         ->join('pcdom_missionaries as pcdom_m3','pcdom_m3.missionary_id = pcdom_companionship.missionary_three_id','left')
		         ->group_by('pcdom_statistics.companionship_id')
		         ->where(array(
		         	'month'		=>		date('F'),
		         	'year'		=>		date('Y'),
		         	'week_number'	=>	1,
		         	'baptism !='	=>	0,
		         	'confirm !='	=>	0,
		         ));
		          $query = $this->db->get();
				 if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	public function baptismperdistrict()
	{
			$this->db->select('zone_name, district_name')
			 ->select_sum('baptism')
			 ->select_sum('confirm')
			 ->from('pcdom_zone')
			 ->join('pcdom_district','pcdom_district.zone_id = pcdom_zone.zone_id','left')
			 ->join('pcdom_statistics','pcdom_statistics.district_id = pcdom_district.district_id','left')
			 ->where(array(
			 	'pcdom_statistics.month'		=>	date('F'),
			 	'pcdom_statistics.year'		=>	date('Y'),
			 ))
			 ->group_by('pcdom_district.district_id')
			 ->order_by('confirm','DESC');
			 $query = $this->db->get();
			 if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	// SELECT ZONE BAPTISM
	public function selectzonebaptism()
	{
		$this->db->select('pcdom_statistics.zone_id ps_zone_id, zone_name')
				 ->select_sum('confirm')
				 ->from('pcdom_statistics')
				 ->join('pcdom_zone','pcdom_zone.zone_id = pcdom_statistics.zone_id','left')
				 ->group_by('pcdom_statistics.zone_id')
				 ->order_by('confirm','DESC')
				  ->where(
				 		array(
				 			'month'		=>		date('F'),
				 			'year'		=>		date('Y'),
				 		)
				 );

				 $query = $this->db->get();
				 if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	public function select_monthly()
	{
		$this->db->select_sum('baptism')
				 ->select_sum('confirm')
				 ->select_sum('ibd')
				 ->select_sum('iasm')
				 ->select_sum('ni')
				 ->select_sum('ph')
				 ->select_sum('wh')
				 ->from('pcdom_statistics')
				 ->where(
				 	array(
				 		'month'		=> date('F'),
				 		'year'		=> date('Y')
				 	)
				 );
				 $query = $this->db->get();
				 if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}
	// select select_weekdate
	public function select_weekdate1()
	{
		$this->db->select('week_date, week_number, month, year')->from('pcdom_statistics')->limit(1)->where('week_number',1);
		$query = $this->db->get();
		if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}
	public function select_weekdate2()
	{
		$this->db->select('week_date, week_number, month, year')->from('pcdom_statistics')->limit(1)->where('week_number',2);
		$query = $this->db->get();
		if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}
	public function select_weekdate3()
	{
		$this->db->select('week_date, week_number, month, year')->from('pcdom_statistics')->limit(1)->where('week_number',3);
		$query = $this->db->get();
		if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}
	public function select_weekdate4()
	{
		$this->db->select('week_date, week_number, month, year')->from('pcdom_statistics')->limit(1)->where('week_number',4);
		$query = $this->db->get();
		if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}
	public function select_weekdate5()
	{
		$this->db->select('week_date, week_number, month, year')->from('pcdom_statistics')->limit(1)->where('week_number',5);
		$query = $this->db->get();
		if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}


	// for weeks 1 - 5 of the month
	public function select_week1()
	{
		$this->db->select_sum('baptism')
				 ->select_sum('confirm')
				 ->select_sum('ibd')
				 ->select_sum('iasm')
				 ->select_sum('ni')
				 ->select_sum('ph')
				 ->select_sum('wh')

				 ->from('pcdom_statistics')
				 ->where(
				 	array(
				 		'week_number'	=>	1,
				 		'month'			=>	date('F'),
				 		'year'			=>	date('Y')
				 	)
				 );
				 
				$query = $this->db->get();
				if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	public function select_week2()
	{
		$this->db->select_sum('baptism')
				 ->select_sum('confirm')
				 ->select_sum('ibd')
				 ->select_sum('iasm')
				 ->select_sum('ni')
				 ->select_sum('ph')
				 ->select_sum('wh')

				 ->from('pcdom_statistics')
				 ->where(
				 	array(
				 		'week_number'	=>	2,
				 		'month'			=>	date('F'),
				 		'year'			=>	date('Y')
				 	)
				 );
				 
				$query = $this->db->get();
				if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	public function select_week3()
	{
		$this->db->select_sum('baptism')
				 ->select_sum('confirm')
				 ->select_sum('ibd')
				 ->select_sum('iasm')
				 ->select_sum('ni')
				 ->select_sum('ph')
				 ->select_sum('wh')

				 ->from('pcdom_statistics')
				 ->where(
				 	array(
				 		'week_number'	=>	3,
				 		'month'			=>	date('F'),
				 		'year'			=>	date('Y')
				 	)
				 );
				 
				$query = $this->db->get();
				if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	public function select_week4()
	{
		$this->db->select_sum('baptism')
				 ->select_sum('confirm')
				 ->select_sum('ibd')
				 ->select_sum('iasm')
				 ->select_sum('ni')
				 ->select_sum('ph')
				 ->select_sum('wh')

				 ->from('pcdom_statistics')
				 ->where(
				 	array(
				 		'week_number'	=>	4,
				 		'month'			=>	date('F'),
				 		'year'			=>	date('Y')
				 	)
				 );
				 
				$query = $this->db->get();
				if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	public function select_week5()
	{
		$this->db->select_sum('baptism')
				 ->select_sum('confirm')
				 ->select_sum('ibd')
				 ->select_sum('iasm')
				 ->select_sum('ni')
				 ->select_sum('ph')
				 ->select_sum('wh')

				 ->from('pcdom_statistics')
				 ->where(
				 	array(
				 		'week_number'	=>	5,
				 		'month'			=>	date('F'),
				 		'year'			=>	date('Y')
				 	)
				 );
				 
				$query = $this->db->get();
				if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}

	public function getsister()
	{
		$this->db->select_sum('confirm')
				->from('pcdom_statistics')
				->join('pcdom_companionship','pcdom_companionship.companionship_id = pcdom_statistics.companionship_id','left')
				->join('pcdom_missionaries','pcdom_missionaries.missionary_id = pcdom_companionship.missionary_one_id','left')
				->where('pcdom_missionaries.gender','female')
				->where('pcdom_statistics.month',date('F'))
				->where('pcdom_statistics.year',date('Y'));
				$query = $this->db->get();
				if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}
	public function countelder()
	{
		$this->db->select_sum('confirm')
				->from('pcdom_statistics')
				->join('pcdom_companionship','pcdom_companionship.companionship_id = pcdom_statistics.companionship_id','left')
				->join('pcdom_missionaries','pcdom_missionaries.missionary_id = pcdom_companionship.missionary_one_id','left')
				->where('pcdom_missionaries.gender','male')
				->where('pcdom_statistics.month',date('F'))
				->where('pcdom_statistics.year',date('Y'));
				$query = $this->db->get();
				if($query && $query->num_rows() > 0)
				 	return $query->result();
				 else
				 	return;
	}


	


	function get_pagination()
	{
		$query = $this->pagination_lib->use_pagination(
				"my_controller/index",
				10,10,
				array("first_name"),
				"user",
				NULL,NULL,NULL,NULL
				);
		if($query)
			return $query;
		else
			return;
	}
	function get_all_data()
	{
		// SELECT $column FROM $table_name
		$query = $this->felmerald_model->select_all(['sl_id','description'],['select_all']);
		// print "<pre>";
		// print_r($query);
		// die();
		if($query)
			return $query;
		else
			return;
	}

	function get_all_join_data()
	{
		$query = $this->felmerald_model->select_join(
			['first_name','attributes'], // column
			['user'], // table name
			['join_table'=>'join_table.user_id = user.user_id'], // join table
			['user.user_id'=>1], // where
			NULL, // Like
			['join_table.j_id'=>'DESC'], // order_by
			5 // LImit
			);
		// print "<pre>";
		// print_r($query);
		// die();
		if($query)
			return $query;
		else
			return;
	}

	function get_search_result($search="")
	{
		$query = $this->felmerald_model->select_join(
			['first_name'],
			['user'],
			NULL,
			NULL,
			['first_name'=>$search],//column_name=>LIKE
			NULL,
			NULL
			);
		if($query)
			return $query;
		else
			return;

		// $this->db->select('first_name')->from('user')->like('first_name',$search,'both');
		// $query = $this->db->get();
		// if($query && $query->num_rows() > 0 )
		// 	return $query->result();
		// else
		// 	return;
	} 

	function add($first_name)
	{
		$sql = $this->felmerald_model->insert_data(['first_name'=>$first_name],"user");
		if($sql)
			return TRUE;
		else
			return FALSE;

	}

	// add user
	function add_user($email, $password, $firstname, $middlename, $lastname, $login_type)
	{
		$sql = $this->felmerald_model->insert_data(
			array(
				'email'		=>	$email,
				'password'	=>	sha1(sha1($password)),
				'firstname'	=>	$firstname,
				'middlename'=>	$middlename,
				'lastname'	=>	$lastname,
				'login_type'=>	$login_type,
				'created'	=>	date('Y-m-d H:i:s', time())
			),"pcdom_users"
		);

		if($sql)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


	// select

	function select_user()
	{
		$query = $this->db->query("SELECT email, firstname, middlename, lastname, login_type FROM pcdom_users");
		if($query && $query->num_rows() > 0 )
		{
			return $query->result();
		}
		else
		{
			return;
		}
	}






	function add_upload($image, $first_name)
	{
		
		$sql = $this->felmerald_model->insert_data(
					array(
						'image'=>$image,
						'first_name'=>$first_name
						),"user"
				);
		if($sql)
			return TRUE;
		else
			return FALSE;
	}
	// count
	function get_count_all_result()
	{
		return $this->felmerald_model->count_all_results(['user_id'],NULL,['user']);
	}
	public function current_totalmissionaries()
	{
		return $this->felmerald_model->count_all_results(

			['missionary_id'],
			[
				'status !='	=>	'released',
			],
			['pcdom_missionaries']

		);
	}
	public function totalcompanionship()
	{	
		return $this->felmerald_model->count_all_results(

			['companionship_id'],
			[
				'companionship_as_at_month'		=>	date('F'),
				'companionship_as_at_year'		=>	date('Y'),
			],
			['pcdom_companionship']

		);

	}
	
	// Delete
	function delete_record($id)
	{
		return $this->felmerald_model->delete_data(['sl_id'=>$id],['select_all']);
	}

	public function delete_missionary($id)
	{
		return $this->felmerald_model->delete_data(['missionary_id'=>$id],['pcdom_missionaries']);
	}

	// edit

	Public function editmissionary($condition_id,$missionaries_name, $status,$calling,$district_id)
	{
		$data = array(
			'missionaries_name'	=>		$missionaries_name,
			'status'			=>		$status,
			'calling'			=>		$calling,
			'district_id'		=>		$district_id,
			'modified'			=>		date('Y-m-d H:i:s', time())
		);

		$this->db->where('missionary_id',$condition_id)
				 ->update('pcdom_missionaries',$data);

				 return TRUE;
	}

	public function editstatistics($condition_id,$baptism,$confirm,$ibd,$iasm,$ni,$ph,$wh,$tsa)
	{
		$update_data = array(
			'baptism'		=>		$baptism,
			'confirm'		=>		$confirm,
			'ibd'			=>		$ibd,
			'iasm'			=>		$iasm,
			'ni'			=>		$ni,
			'ph'			=>		$ph,
			'wh'			=>		$wh,
			'tsa'			=>		$tsa,
			'modified'		=>		date('Y-m-d H:i:s', time())
		);
		$this->db->where('stats_id',$condition_id)
				 ->update('pcdom_statistics',$update_data);
				 return TRUE;
	}

	public function editzonestatus($zone_id_condition,$in_used)
	{
		$update = array(
			'in_used'	=>	$in_used,
			'modified'		=>		date('Y-m-d H:i:s', time())
		);
			$this->db->where('zone_id',$zone_id_condition)
				 ->update('pcdom_zone',$update);
				 return TRUE;
	}
}