<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //


defined('BASEPATH') or exit('No direct script access allowed');

class Webshop extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->lang->load(array('header', 'string', 'message'));
		$this->lib->GetVisitorData('Webshop');
		$this->main_protect->SessionProtector();

		$this->allprotect->Web_Protection();
		$this->allprotect->Maintenance_Protection();
		$this->allprotect->BlockedAccount_Protection();
		$this->allprotect->DarkblowCopierGuard();

		$this->load->library('pagination');
		$this->load->model('main/webshop_model', 'webshop');
		$this->load->model('main/login_model', 'login');

		$this->lib->FeatureControl('webshop', '');
	}

	function index()
	{
		// Pagination Section

		// Load Config
		$config['base_url'] = base_url('webshop/index');
		$config['total_rows'] = $this->webshop->GetWebshopCount();
		$config['per_page'] = 9;
		// End Load Config

		// Pagination Styling
		$config['full_tag_open'] = '<div class="nk-pagination nk-pagination-center"><nav>';
		$config['full_tag_close'] = '</nav></div>';

		$config['next_link'] = '<span class="ion-ios-arrow-forward"></span>';
		$config['next_tag_open'] = '';
		$config['next_tag_close'] = '</a>';

		$config['prev_link'] = '<span class="ion-ios-arrow-back"></span>';
		$config['prev_tag_open'] = '';
		$config['prev_tag_close'] = '</a>';

		$config['cur_tag_open'] = '<a class="nk-pagination-current" href="javascript:void(0)">';
		$config['cur_tag_close'] = '</a>';
		// End Pagination Styling

		// Initialize Pagination
		$this->pagination->initialize($config);
		// End Initialize Pagination

		// End Pagination Section

		$data['title'] = 'Webshop';
		$data['popular'] = $this->webshop->GetPopularWebshop();
		$data['start'] = $this->uri->segment(3);
		$data['webshop'] = $this->webshop->GetWebshopPerPage($config['per_page'], $data['start']);
		$data['isi'] = 'main/content/webshop/content_webshop';
		$this->load->view('main/layout/wrapper', $data, FALSE);
	}

	function details($id)
	{
		$data['title'] = 'Webshop Item Details';
		$data['detail'] = $this->webshop->GetWebshopDetails($id);
		$data['related'] = $this->webshop->GetWebshopRelated();
		$data['isi'] = 'main/content/webshop/content_webshopdetail';
		$this->load->view('main/layout/wrapper', $data, FALSE);
	}

	function do_login()
	{
		$response = array();
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required',
			array('required' => '%s Cannot Be Empty.')
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required' => '%s Cannot Be Empty.')
		);
		if ($this->form_validation->run()) $this->login->LoginValidationV2();
		else {
			$this->form_validation->set_error_delimiters('', '');
			$response['response'] = 'false';
			$response['token'] = $this->security->get_csrf_hash();
			$response['message'] = validation_errors();
			echo json_encode($response);
		}
	}

	function do_buy()
	{
		$response = array();

		$this->form_validation->set_rules(
			'player_id',
			'Player ID',
			'required',
			array('required' => '%s Cannot Be Empty.')
		);
		$this->form_validation->set_rules(
			'item_id',
			'Item ID',
			'numeric|required',
			array('numeric' => '%s Cannot Be Empty', 'required' => '%s Cannot Be Empty.')
		);
		$this->form_validation->set_rules(
			'item_price',
			'Item Price',
			'numeric|required',
			array('numeric' => '%s Cannot Be Empty', 'required' => '%s Cannot Be Empty.')
		);
		if ($this->form_validation->run()) $this->webshop->BuyItemV2();
		else {
			$this->form_validation->set_error_delimiters('', '');

			$response['response'] = 'false';
			$response['token'] = $this->security->get_csrf_hash();
			$response['message'] = validation_errors();
			echo json_encode($response);
		}
	}
}

// This Code Generated Automatically By EyeTracker Snippets. //