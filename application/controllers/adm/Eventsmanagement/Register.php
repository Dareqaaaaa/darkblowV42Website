<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->allprotect->AdminDashboard_Protection();
        $this->load->model('admin/eventsregister_model', 'eventsregister');
        $this->load->library('lib');
    }

    function index()
    {
        $data['title'] = 'Register Events';
        $data['header'] = 'Register Events';

        $data['events'] = $this->eventsregister->GetEvents();
        $data['items'] = $this->eventsregister->GetAllItems();

        $data['content'] = 'admin/content/events/register/content_register';
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function do_update()
    {
        $response = array();

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules(
            'item_id',
            'Reward',
            'required|numeric',
            array(
                'required' => '%s Cannot Be Empty.',
                'numeric' => '%s Only Can Using Numeric Characters.'
            )
        );
        $this->form_validation->set_rules(
            'item_count',
            'Duration',
            'required|in_list[64800,259200,604800,2592000]',
            array(
                'required' => '%s Cannot Be Empty.',
                'in_list' => 'Invalid %s.'
            )
        );
        $this->form_validation->set_rules(
            'stock',
            'Stock',
            'required|numeric',
            array(
                'required' => '%s Cannot Be Empty.',
                'numeric' => '%s Only Can Using Numeric Characters.'
            )
        );
        if ($this->form_validation->run()) $this->eventsregister->UpdateEvents();
        else {
            $response['response'] = 'false';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = validation_errors();

            echo json_encode($response);
        }
    }

    function do_updatestate()
    {
        $this->eventsregister->UpdateEventsState();
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //
