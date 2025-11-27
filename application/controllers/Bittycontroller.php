<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bittycontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('User_model');
    }

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
        $data['home'] = 'landing/home';
        $data['features'] = 'landing/features';
        $data['about'] = 'landing/about_content';
            
        $this->load->view('welcome_message', $data);
	}

	public function login() {
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    	$this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->index();
    } else {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->User_model->login($email, $password);

        if ($user) {
            $session_data = array(
                'user_id' => $user->id,
                'email' => $user->email,
                'mbti' => $user->mbti,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            
            redirect('bittycontroller/mainpage');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect('bittycontroller/index');
        }
    }
}

    public function register() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mbti', 'MBTI', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'mbti' => $this->input->post('mbti'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            if ($this->User_model->register($data)) {
                $user_id = $this->db->insert_id();
                $session_data = array(
                    'user_id' => $user_id,
                    'email' => $data['email'],
                    'mbti' => $data['mbti'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                
                $this->session->set_flashdata('success', 'Registration successful! Welcome.');
                redirect('bittycontroller/mainpage');
            } else {
                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                redirect('bittycontroller/index');
            }
        }
    }

    public function mainpage() {
        if (!$this->session->userdata('logged_in')) {
            redirect('bittycontroller/index');
        }
        $this->load->view('mainpage');
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('bittycontroller/index');
    }

    public function install() {
        $this->load->dbforge();
        
        if (!$this->db->query("CREATE DATABASE IF NOT EXISTS bitty_db")) {
             echo "Failed to create database or it already exists.<br>";
        }
        
        $this->db->query("USE bitty");

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'mbti' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => TRUE,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users', TRUE);

        echo "Database and Table 'users' created successfully. <a href='".site_url('bittycontroller/index')."'>Go to Home</a>";
    }
}