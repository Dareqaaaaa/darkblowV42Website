<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Clan_rank extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->lang->load(array('header', 'string', 'message'));
		$this->lib->GetVisitorData('Clan Rank');

		$this->allprotect->Web_Protection();
		$this->allprotect->Maintenance_Protection();
		$this->allprotect->BlockedAccount_Protection();
		$this->allprotect->DarkblowCopierGuard();
		$this->main_protect->SessionProtector();

		$this->load->library('pagination');
		$this->load->model('main/clanrank_model', 'clanrank');
	}

	function index()
	{
		// Pagination Section

		// Load Config
		$config['base_url'] = base_url('clan_rank/index');
		$config['total_rows'] = $this->clanrank->GetClanCount();
		$config['per_page'] = 10;
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

		$config['cur_tag_open'] = '<a class="nk-pagination-current" href="#">';
		$config['cur_tag_close'] = '</a>';
		// End Pagination Styling

		// Initialize Pagination
		$this->pagination->initialize($config);
		// End Initialize Pagination

		// End Pagination Section

		// Data Section
		$data['start'] = $this->uri->segment(3);
		$data['title'] = 'Player Ranks';
		$data['clan'] = $this->clanrank->GetClanPerPage($config['per_page'], $data['start']);
		$data['isi'] = 'main/content/clan_rank/content_clanrank';
		// End Data Section

		// View Section
		$this->load->view('main/layout/wrapper', $data, FALSE);
		// End View Section
	}
}

// This Code Generated Automatically By EyeTracker Snippets. //