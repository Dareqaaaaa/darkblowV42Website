<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->main_protect->mainProtectA();
		$this->allprotect->Web_Protection();
		$this->allprotect->Maintenance_Protection();
		$this->load->model('main/playerpanel_model', 'player');
	}

	function index()
	{
		$data['title'] = 'Player Panels';
		$data['account'] = $this->player->getdata_accountdetails();
		$data['isi'] = 'main/content/player_panel/content_playerpanel';
		$this->load->view('main/layout/wrapper', $data, FALSE);
	}

	function do_requesthint()
	{
		$this->player->RequestHint();
	}

}

// This Code Generated Automatically By EyeTracker Snippets. //