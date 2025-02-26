<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->lang->load(array('header', 'string', 'message'));
		$this->lib->GetVisitorData('Download');

		$this->allprotect->Web_Protection();
		$this->allprotect->Maintenance_Protection();
		$this->allprotect->BlockedAccount_Protection();
		$this->allprotect->DarkblowCopierGuard();
		$this->main_protect->SessionProtector();

		$this->load->model('main/download_model', 'download');
	}

	function index()
	{
		$data['title'] = 'Download';

		$data['client'] = $this->download->GetClient();
		$data['partial'] = $this->download->GetPartialClient();
		$data['launcher'] = $this->download->GetLauncher();
		$data['support'] = $this->download->GetSupportApp();

		$data['isi'] = 'main/content/download/content_download';
		$this->load->view('main/layout/wrapper', $data, FALSE);
	}

	function do_download($package_id = null)
	{
		$response = array();

		if ($package_id == null) {
			$response['response'] = 'false';
			$response['url'] = '';
			$response['message'] = 'Invalid Download Data';

			echo json_encode($response);
		} else $this->download->GetDownloadData($package_id);
	}
}

// This Code Generated Automatically By EyeTracker Snippets. //