<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('phonebook_model');
	}

	public function index()
	{
		$data['success_message'] = $this->session->flashdata('success_message') ?: '';
		$data['error_message'] = $this->session->flashdata('error_message') ?: '';

        //pagination settings
        $config['base_url'] = site_url('phonebook/index');
        $config['total_rows'] = $this->phonebook_model->countAll();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination pull-left" style="margin-top: 0">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config['uri_segment'])) ?: 0;

        //call the model function to get the department data
        $data['no'] = $page + 1;
        $data['records'] = $this->phonebook_model->getPhonebooks($config['per_page'], $page)->result();

        $data['pagination'] = $this->pagination->create_links();

		$this->load->view('phonebook/index', $data);
	}

	public function add()
	{
		$data['success_message'] = $this->session->flashdata('success_message') ?: '';
		$data['error_message'] = $this->session->flashdata('error_message') ?: '';

		if ($this->input->method() === 'post') {

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data['error_message'] = validation_errors();
				// $this->session->set_flashdata('error_message', $errors);
			} else {
				$data = [
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
				];

				$this->phonebook_model->create($data);
				$this->session->set_flashdata('success_message', 'Data created!');
				redirect(site_url());
			}
		}

		$this->load->view('phonebook/add', $data);
	}

    public function edit($id)
    {
        $data['success_message'] = $this->session->flashdata('success_message') ?: '';
        $data['error_message'] = $this->session->flashdata('error_message') ?: '';

        if ($this->input->method() === 'post') {

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['error_message'] = validation_errors();
                // $this->session->set_flashdata('error_message', $errors);
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                ];

                $this->phonebook_model->update($id, $data);
                $this->session->set_flashdata('success_message', 'Data updated!');
                redirect(site_url('phonebook/index'));
            }
        }

        if ($query = $this->phonebook_model->get($id)) {
            $data['record'] = $query->row();
        } else {
            $this->session->set_flashdata('error_message', 'Data not found!');
            redirect(site_url('phonebook/index'));
        }

        $this->load->view('phonebook/edit', $data);
    }
    
    public function delete($id)
    {
        if ($this->phonebook_model->delete($id)) {
            $this->session->set_flashdata('success_message', 'Data deleted!');
        } else {
            $this->session->set_flashdata('error_message', 'Error deleting data!');
        }

        redirect(site_url('phonebook/index'));
    }
}
