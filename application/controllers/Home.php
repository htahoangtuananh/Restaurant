<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property model $model
 */
class Home extends CI_Controller {

	public function __construct() 
    {
       parent::__construct();
       $this->load->helper('form');
       $this->load->library('form_validation');
       $this->load->library('session');
       $this->load->model('model');
    }

	public function index()
    {
       $data['navigation'] = $this->model->get_navigation_list();
       $data['address'] = $this->model->get_address_list();
       $data['contact'] = $this->model->get_contact_list();
       $data['icon'] = $this->model->get_icon();
       $this->load->view('header');
       $this->load->view('home',$data);
       $this->load->view('footer',$data);
    }


}