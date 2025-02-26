<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->lib->GetVisitorData('Logout');
		$this->main_protect->SessionProtector();
		$this->allprotect->Web_Protection();
		$this->allprotect->Maintenance_Protection();
		$this->allprotect->BlockedAccount_Protection();
		$this->allprotect->DarkblowCopierGuard();

		if (empty($this->session->userdata('uid'))) redirect(base_url('home'), 'refresh');
	}

	function index()
	{
		redirect(base_url('home'), 'refresh');
	}

	function do_logout()
	{
		$response = array();

		$this->session->sess_destroy();

		$response['response'] = 'true';
		$response['message'] = 'Successfully Logged Out.';
		echo json_encode($response);
	}
}

// This Code Generated Automatically By EyeTracker Snippets. //
