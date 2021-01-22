<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_controller extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'felmerald_model',
			'my_model'
			));
		$this->load->library(array(
			"Includes",
			"pagination_lib",
			"time_ago_lib"
			));
		// load upload_controller
	 	// $this->load->controller('upload_controller');

	}


	public function login_authenticate()
	{
		$config = array(
			array(
				'field' => 'email', 'rules' => 'trim'
			),
			array(
				'field'	=>	'password', 'rules' => 'trim'
			),
			array(
				'field'	=>	'login_type', 'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->run();

		$data = $this->input->post(NULL, TRUE);
		$this->my_model->login_authenticate($data['email'], $data['password'],$data['login_type']);
	}

	public function logout()
	{

		$data = array(
 				'last_login' => date('Y-m-d H:i:s', time())
 		);
 		$this->db->where('user_id',$this->session->userdata('login_id'))
 				 ->update('pcdom_users',$data);

 				$config = array(
 						  'login_id'=>'',
				          'login_password'=>'',
				          'login_email' => '',
				          'login'=>''
 						);
 				$this->session->unset_userdata($config);
				$this->session->sess_destroy();
				redirect(base_url().'');
				exit();
	}


	public function index()
	{
		// $this->benchmark->mark('start');
		// // Search Query

		// // xss_clean
		// $search = $this->input->post('search');
		
		// $data = array(
		// 	'get_all' 		=> $this->my_model->get_all_data(), // SELECT column FROM table_name
		// 	'get_join'		=> $this->my_model->get_all_join_data(), // SELECT JOIN TABLE
		// 	'get_search'	=> $this->my_model->get_search_result($search),
		// 	'get_count_all' => $this->my_model->get_count_all_result(), // count all results
		// 	'get_paginate'  => $this->my_model->get_pagination(),
		// 	'pagination_links' => $this->pagination->create_links(),
		// 	);
		// $this->includes->header("Codelgniter");
		// $this->load->view('home',$data);
		// $this->includes->footer("includes/footer");

		// $this->output->enable_profiler(TRUE);
		// $this->benchmark->mark('end');


		$this->includes->header("Philippines Cagayan de Oro Mission");
		$this->load->view('admin/index');
		$this->includes->footer('includes/footer');
	}


	public function superadmin()
	{	

		$this->load->view('includes/cache_control');
			if($this->my_model->usersSession())
			{

				if($this->session->userdata('login_type') != "mrec" 
					&& $this->session->userdata('login_type') !="supply")
				{
					$data = array(
						'select_user'		=>		$this->my_model->select_user()
					);

					$this->includes->header("Administrator");
					$this->load->view('superadmin/home',$data);
					$this->includes->footer('includes/footer');
				}
				else
				{
					$this->load->view('includes/access-denied');
				}
					
			}
			else
			{
				redirect(base_url(''));
				exit();
			}
		

	}

// MISSION RECORDER CONTROLLERS
	public function mrec_home()
	{

		$this->load->view('includes/cache_control');
			if($this->my_model->usersSession())
			{
				if($this->session->userdata('login_type') != "admin" 
					&& $this->session->userdata('login_type') !="supply")
				{

					$data = array(
						'getmonthlyReports' =>		$this->my_model->select_monthly(),
						'getzonebaptism'	=>		$this->my_model->selectzonebaptism(),
						'countsister'		=>		$this->my_model->getsister(),
						'countelder'		=>		$this->my_model->countelder(),
						'baptismperdistrict'=>		$this->my_model->baptismperdistrict(),
						// 'getsummary_report' =>		$this->my_model->summary_report(),
					);
					
					// printA($data['baptismperdistrict']);
					// die();
					
					$this->includes->header("PCDOM | Mission Recorder");
					$this->load->view('mrec/home',$data);
					$this->includes->footer('includes/footer');
				}
				else
				{
					$this->load->view('includes/access-denied');
				}
			}
			else
			{
				redirect(base_url(''));
				exit();
				
			}
	}

	public function create_companionshipPage()
	{
		$this->load->view('includes/cache_control');
		if($this->my_model->usersSession())
		{
			if($this->session->userdata('login_type') != "admin" 
					&& $this->session->userdata('login_type') !="supply")
				{

					$data = array(
						'list_missionary'		=>		$this->my_model->get_list_missionary(),
						
					);
					

					$this->includes->header("PCDOM | MISSIONARIES LIST");
					$this->load->view('mrec/create_companionship',$data);
					$this->includes->footer('includes/footer');
				}
				else
				{
					$this->load->view('includes/access-denied');
				}
		}
		else
		{
			redirect(base_url(''));
			exit();
		}
	}

	public function companionshipPage()
	{
		$this->load->view('includes/cache_control');
		if($this->my_model->usersSession())
		{
			if($this->session->userdata('login_type') != "admin"
				&& $this->session->userdata('login_type') != "supply")
			{
					$data = array(
						'list_missionary'		=>		$this->my_model->get_list_missionary(),
						'list_zone'				=>		$this->my_model->get_list_zone(),
						'list_district'			=>		$this->my_model->get_list_district(),
						'list_area'				=>		$this->my_model->get_list_area(),
						'getcurrent_totalmissionaries'	=>	$this->my_model->current_totalmissionaries(),
						'getcurrent_totalcompanionship'	=>	$this->my_model->totalcompanionship(),
						'get_companionship_current'	=>		$this->my_model->get_companionship_current(),

					);

					

					$this->includes->header("PCDOM | COMPANIONSHIP LIST AS OF ".strtoupper(date('Y'))." ".strtoupper(date('F')));
					$this->load->view('mrec/companionship_page',$data);
					$this->includes->footer('includes/footer');
			}
			else
			{
				$this->load->view('includes/access-denied');
			}

		}
		else
		{
			redirect(base_url(''));
			exit();
		}
	}

	public function zone_pages()
	{
		$this->load->view('includes/cache_control');
		if($this->my_model->usersSession())
		{
			if($this->session->userdata('login_type') != "admin"
				&& $this->session->userdata('login_type') != "supply")
			{
				$data = array(
					'listareas'		=>		$this->my_model->getlistareas()
				);
				

				$this->includes->header("PCDOM | ZONES, DISTRICTS, AREAS ".strtoupper(date('Y'))." ".strtoupper(date('F')));
				$this->load->view('mrec/zone_pages',$data);
				$this->includes->footer('includes/footer');
			}
			else
			{
				$this->load->view('includes/access-denied');
			}	
		}
		else
		{
			redirect(base_url(''));
			exit();
		}
	}

	public function statistics_page()
	{
		$this->load->view('includes/cache_control');
		if($this->my_model->usersSession())
		{
			if($this->session->userdata('login_type') != "admin"
				&& $this->session->userdata('login_type') != "supply")
			{

				$data = array(
					'get_statistics'	=>		$this->my_model->select_statistics(),
					'get_statisticsmonthly'	=>	$this->my_model->select_statistics_monthly(),
					'get_weekdate1'		=>		$this->my_model->select_weekdate1(),
					'get_weekdate2'		=>		$this->my_model->select_weekdate2(),
					'get_weekdate3'		=>		$this->my_model->select_weekdate3(),
					'get_weekdate4'		=>		$this->my_model->select_weekdate4(),
					'get_weekdate5'		=>		$this->my_model->select_weekdate5(),
					'stats_w1'			=>		$this->my_model->select_week1(),
					'stats_w2'			=>		$this->my_model->select_week2(),
					'stats_w3'			=>		$this->my_model->select_week3(),
					'stats_w4'			=>		$this->my_model->select_week4(),
					'stats_w5'			=>		$this->my_model->select_week5(),
					'getmonthlyReports' =>		$this->my_model->select_monthly(),
				);
				

				// printA($data['get_statisticsmonthly']);
				// die();
				

				$this->includes->header("Statistics As Of ". weekdate());
				$this->load->view('mrec/statistics_page',$data);
				$this->includes->footer('includes/footer');
			}
			else
			{
				$this->load->view('includes/access-denied');
			}
		}
		else
		{
			redirect(base_url(''));
			exit();
		}
	}

	public function create_statistics_page()
	{

		$this->load->view('includes/cache_control');
		if($this->my_model->usersSession())
		{
			if($this->session->userdata('login_type') != "admin"
				&& $this->session->userdata('login_type') != "supply")
			{
				$data = array(
					'getcompanionship'		=>		$this->my_model->getcompanionship()

				);

				
				
				$this->includes->header("Create Statatistics As Of ". weekdate());
				$this->load->view('mrec/createStatistics_page',$data);
				$this->includes->footer('includes/footer');
			}
			else
			{
				$this->load->view('includes/access-denied');
			}
		}
		else
		{
			redirect(base_url(''));
			exit();
		}

	}



// ===================ADDING=====================
	public function addmissionary()
	{
		$missionaries_name = $this->input->post('missionaries_name[]'); 
		$gender = $this->input->post('gender');

		$value = array();
		for($i=0; $i<count($missionaries_name); $i++)
		{
			$value[$i] = array(

				'missionaries_name'	=>	$missionaries_name[$i],
				'gender'			=>	$gender[$i],
				'created'			=>	date('Y-m-d H:i:s', time())

			);
		}


		$this->db->insert_batch('pcdom_missionaries',$value);
		$this->session->set_flashdata("success",alert("alert-success","Missionaries Added Successfully!"));
		redirect(base_url('mrec/create_companionship'));
		exit();
	}

	public function addzone()
	{
		$zone_name = $this->input->post('zone_name[]');
		$value = array();

		for($i=0; $i<count($zone_name); $i++)
		{
			$value[$i] = array(
				'zone_name'			=>		$zone_name[$i],
				'created'			=>		date('Y-m-d H:i:s', time())
			);
		}
		$this->db->insert_batch('pcdom_zone',$value);
		$this->session->set_flashdata("success",alert("alert-success","Added Successfully!"));
		redirect(base_url('mrec/zones_pages'));
		exit();
	}

	public function adddistrict()
	{
		$district_name = $this->input->post('district_name[]');
		$zone_id = $this->input->post('zone_id');
		$value = array();

		for($i=0; $i<count($district_name); $i++)
		{
			$value[$i] = array(
				'district_name' 		=>	$district_name[$i],
				'zone_id'				=>	$zone_id,
				'created'				=>	date('Y-m-d H:i:s', time())
			);
		}
		
		$this->db->insert_batch('pcdom_district',$value);
		$this->session->set_flashdata("success",alert("alert-success","Added Successfully!"));
		redirect(base_url('mrec/zones_pages'));
		exit();
	}

	// ============ UPDATE BATCH ============
	public function editcompanionship()
	{
		$companionship_id = $this->input->post('companionship_id[]');
		$missionary_one_id = $this->input->post('missionary_one_id[]');
		$missionary_two_id = $this->input->post('missionary_two_id[]');
		$missionary_three_id = $this->input->post('missionary_three_id[]');

		$value_batch_update = array();

		for($i=0; $i<count($companionship_id); $i++):
			$value_batch_update[$i] = array(

				'missionary_one_id'		=>		$missionary_one_id[$i],
				'missionary_two_id'		=>		$missionary_two_id[$i],
				'missionary_three_id'	=>		$missionary_three_id[$i],
				'modified'				=>		date('Y-m-d H:i:s', time()),

			);
		endfor;
		// printA($value_batch_update);
		// die();
		// $this->db->where('companionship_id',$companionship_id[$i]);
		$this->db->update_batch('pcdom_companionship',$value_batch_update,'companionship_id');
		$this->session->set_flashdata("success",alert("alert-success","Updated Successfully!"));
		redirect(base_url('mrec/companionship'));
		exit();
	}

	public function addstatistics()
	{
		$zone_id = $this->input->post('zone_id[]');
		$district_id = $this->input->post('district_id[]');
		$area_id = $this->input->post('area_id[]');
		$companionship_id = $this->input->post('companionship_id[]');
		$baptism = $this->input->post('baptism[]');
		$confirm = $this->input->post('confirm[]');
		$ibd = $this->input->post('ibd[]');
		$iasm = $this->input->post('iasm[]');
		$ni = $this->input->post('ni[]');
		$ph = $this->input->post('ph[]');
		$wh = $this->input->post('wh[]');
		$tsa = $this->input->post('tsa[]');
		$week_number = $this->input->post('week_number');

		$value = array();
		for($i=0; $i<count($zone_id); $i++):
			$value[$i] = array(
				'zone_id'			=>	$zone_id[$i],
				'district_id'		=>	$district_id[$i],
				'area_id'			=>	$area_id[$i],
				'companionship_id'	=>	$companionship_id[$i],
				'baptism'			=>	$baptism[$i],
				'confirm'			=>	$confirm[$i],
				'ibd'				=>	$ibd[$i],
				'iasm'				=>	$iasm[$i],
				'ni'				=>	$ni[$i],
				'ph'				=>	$ph[$i],
				'wh'				=>	$wh[$i],
				'tsa'				=>	$tsa[$i],
				'week_number'		=>	$week_number, //used one before second week sa before replace 
				'month'				=>	date('F'), //get full word of month
				'year'				=>	date('Y'), //get full word of Year
				'week_date'			=>  previousweek(),//draw first befor replace weekdate()
				'created'			=>	date('Y-m-d H:i:s', time()),
			);
		endfor;
		$this->db->insert_batch('pcdom_statistics',$value);
		$this->session->set_flashdata("success",alert("alert-success","Added Successfully!"));
		redirect(base_url('mrec/statistics'));
		exit();
	}

	public function addarea()
	{
		$area_name = $this->input->post('area_name[]');
		$district_id = $this->input->post('district_id');

		$value = array();

		for($i=0; $i<count($area_name); $i++)
		{
			$value[$i] = array(

				'area_name'		=>		$area_name[$i],
				'district_id'	=>		$district_id,
				'created'		=>		date('Y-m-d H:i:s', time())

			);
		}
		$this->db->insert_batch('pcdom_area',$value);
		$this->session->set_flashdata("success",alert("alert-success","Added Successfully!"));
		redirect(base_url('mrec/zones_pages'));
		exit();
	}

	public function addcompanionship()
	{
		$missionary_one_id = $this->input->post('missionary_one_id[]');
		$missionary_two_id = $this->input->post('missionary_two_id[]');
		$missionary_three_id = $this->input->post('missionary_three_id[]');
		$zone_id = $this->input->post('zone_id[]');
		$district_id = $this->input->post('district_id[]');
		$area_id = $this->input->post('area_id[]');
		$assignment = $this->input->post('assignment[]');

		$value = array();

		for($i=0; $i<count($missionary_one_id); $i++)
		{
			$value[$i] = array(
				'missionary_one_id'		=>	$missionary_one_id[$i],
				'missionary_two_id'		=>	$missionary_two_id[$i],
				'missionary_three_id'	=>	$missionary_three_id[$i],
				'zone_id'				=>	$zone_id[$i],
				'district_id'			=>	$district_id[$i],
				'area_id'				=>	$area_id[$i],
				'assignment'			=>	$assignment[$i],
				'created'				=>	date('Y-m-d H:i:s', time()),
				'companionship_as_at_month'	=>	date('F'),
				'companionship_as_at_year'	=>	date('Y'),	
			);
		}
		$this->db->insert_batch('pcdom_companionship',$value);
		$this->session->set_flashdata("success",alert("alert-success","Added Successfully!"));
		redirect(base_url('mrec/companionship'));
		exit();
	}




	public function add()
	{
		$data = $this->input->post(NULL, TRUE);
		$this->my_model->add($data['first_name']);

		$this->session->set_flashdata("success",alert("alert-success","Successfully Inserted"));
		redirect(base_url());
		exit();
	}

	// add user
	public function add_user()
	{
		$data = $this->input->post(NULL, TRUE);

		$this->my_model->add_user(
			$data['email'],
			$data['password'],
			$data['firstname'],
			$data['middlename'],
			$data['lastname'],
			$data['login_type']
		);
		$this->session->set_flashdata("success",alert("alert-warning","Successfully Inserted"));
		redirect(base_url('superadmin/home'));
		exit();
	}

	// upload

	public function add_upload()
	{

		$image = do_upload();

		$first_name = $this->input->post('first_name');
		$this->my_model->add_upload($image, $first_name);

		$this->session->set_flashdata("info", alert("alert-warning","Successfully uploaded"));
		redirect(base_url());
		exit();
	}

	// DELETE RECORDS
	function delete_record()
	{
		$id = $this->input->get('id');
		$this->my_model->delete_record($id);
		redirect(base_url());
		exit();
	}

	public function delete_missionary()
	{
		$id = $this->input->get('id');
		$this->my_model->delete_missionary($id);
		$this->session->set_flashdata("success",alert("alert-success","Missionaries Deleted Successfully!"));
		redirect(base_url('mrec/create_companionship'));
		exit();

	}

	// EDIT

	public function editmissionary()
	{
		$condition_id = $this->input->post('missionary_id');
		$data = $this->input->post(NULL, TRUE);

		$this->my_model->editmissionary($condition_id, $data['missionaries_name'], $data['status'],$data['calling'],$data['district_id']);

		$this->session->set_flashdata("success",alert("alert-success","Missionaries Updated Successfully!"));
		redirect(base_url('mrec/create_companionship'));
		exit();

	}

	public function editstatistics()
	{
		$condition_id = $this->input->post('stats_id');

		$data = $this->input->post(NULL, TRUE);
		$this->my_model->editstatistics($condition_id,
			$data['baptism'],
			$data['confirm'],
			$data['ibd'],
			$data['iasm'],
			$data['ni'],
			$data['ph'],
			$data['wh'],
			$data['tsa']
		);
		$this->session->set_flashdata("success",alert("alert-success","Statistics Updated Successfully!"));
		redirect(base_url('mrec/statistics'));
		exit();
	}

	public function editzonestatus()
	{
		$zone_id_condition = $this->input->post('zone_id');
		$data = $this->input->post(NULL, TRUE);
		$this->my_model->editzonestatus($zone_id_condition,$data['in_used']);
		$this->session->set_flashdata("success",alert("alert-success","Zone Updated Successfully!"));
		redirect(base_url('mrec/zones_pages'));
		exit();
	}


	// MPDF
	// ============week 1 ===============/
	public function downloadstatisticsWeek1()
	{


		$data = [];
 		$html = $this->load->view('pdf/weeklyKeyIndicatorReportWeek1', $data, true);

 		$pdfFilePath = "Pcdom Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter-L","","",10,10,6,6,6,3);

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}
	// ============week 2 ===============/
	public function downloadstatisticsweek2()
	{


		$data = [];
 		$html = $this->load->view('pdf/weeklyKeyIndicatorReportWeek2', $data, true);

 		$pdfFilePath = "Pcdom Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter-L","","",10,10,6,6,6,3);

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}
	// ============week 3 ===============/
	public function downloadstatisticsweek3()
	{


		$data = [];
 		$html = $this->load->view('pdf/weeklyKeyIndicatorReportWeek3', $data, true);

 		$pdfFilePath = "Pcdom Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter-L","","",10,10,6,6,6,3);

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}
	// ============week 4 ===============/
	public function downloadstatisticsweek4()
	{


		$data = [];
 		$html = $this->load->view('pdf/weeklyKeyIndicatorReportWeek4', $data, true);

 		$pdfFilePath = "Pcdom Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter-L","","",10,10,6,6,6,3);

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}
	// ============week 5 ===============/
	public function downloadstatisticsweek5()
	{


		$data = [];
 		$html = $this->load->view('pdf/weeklyKeyIndicatorReportWeek5', $data, true);

 		$pdfFilePath = "Pcdom Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter-L","","",10,10,6,6,6,3);

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}

	public function downloadkeyindicators()
	{
		$data = [];
 		$html = $this->load->view('pdf/statistics_pdf', $data, true);

 		$pdfFilePath = "Pcdom Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter-L","","",5,15,6,6,6,3);

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}

	public function montlykeyindicators()
	{

		$data = [];
 		$html = $this->load->view('pdf/monthly_statistics_pdf', $data, true);

 		$pdfFilePath = "Monthly Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter-L","","",10,10,6,6,6,3);

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");

	}

	public function download_summaryreport()
	{
		$data = [];
 		$html = $this->load->view('pdf/weekly_summary_report_pdf', $data, true);

 		$pdfFilePath = "Monthly Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter","","",5,15,5,10,6,3);//portrait

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}

	public function download_summaryreport_week2()
	{
		$data = [];
 		$html = $this->load->view('pdf/weekly_summary_reportweek2_pdf', $data, true);

 		$pdfFilePath = "Monthly Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter","","",5,15,5,10,6,3);//portrait

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}

	public function download_summaryreport_week3()
	{
		$data = [];
 		$html = $this->load->view('pdf/weekly_summary_reportweek3_pdf', $data, true);

 		$pdfFilePath = "Monthly Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter","","",5,15,5,10,6,3);//portrait

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}
	
	public function download_summaryreport_week4()
	{
		$data = [];
 		$html = $this->load->view('pdf/weekly_summary_reportweek4_pdf', $data, true);

 		$pdfFilePath = "Monthly Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter","","",5,15,5,10,6,3);//portrait

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}

	public function download_summaryreport_week5()
	{
		$data = [];
 		$html = $this->load->view('pdf/weekly_summary_reportweek5_pdf', $data, true);

 		$pdfFilePath = "Monthly Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter","","",5,15,5,10,6,3);//portrait

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}

	// =========download summary report ================//

	public function download_districtbaptismreport_week1()
	{
		$data = [];
 		$html = $this->load->view('pdf/summary_report_week1', $data, true);

 		$pdfFilePath = "Monthly Statistics As of ". date('F d Y')." .pdf";
		$this->load->library('pcdom_pdf_converter');


		$pdfer = new mPDF("en-GB-x","Letter","","",5,20,5,10,6,3);//portrait

		$pdfer->WriteHTML($html);
		$pdfer->output($pdfFilePath, "D");
	}
	



}