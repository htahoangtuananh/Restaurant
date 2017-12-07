<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 8/30/2017
 * Time: 4:24 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property adminModel $adminModel
 */

class Admin extends CI_Controller {

    public $section = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('string');
        $this->load->model('adminModel');
        if ($this->session->admin_logged_in) {

            if($this->session->is_sysAdmin == 0){
                $this->section = 'Admin';
                redirect('Admin');
            }else if($this->session->is_sysAdmin == 1){
                $this->section = 'SysAdmin';
            }
        }
        else{

            redirect('Authentication');
        }
    }

    public function index()
    {
        $lang = $this->session->site_lang;
        $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
        $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP',$dataLayout);
        $this->load->view('Admin/CP_index');
    }


    /*********************************************ADDRESS**************************************************************/


    public function listAddress()
    {
        $lang = $this->session->site_lang;
        $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
        $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
        $data['lang'] = $this->adminModel->get_lang_list();
        $data['address'] = $this->adminModel->get_address_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP',$dataLayout);
        $this->load->view('Admin/CP_listAddress', $data);
    }

    public function viewAddress($id)
    {
        if(!($this->input->post())) {
            $lang = $this->session->site_lang;
            $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
            $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
            $data['lang'] = $this->adminModel->get_lang_list();
            $data['address'] = $this->adminModel->get_address_detail($id);
            $this->load->view('header_CP');
            $this->load->view($this->section.'/CP', $dataLayout);
            $this->load->view('Admin/CP_detailAddress', $data);
        }
        else{
            $post = $this->input->post();

            if(empty($post) || !is_array($post)){
                redirect('Admin/listAddress');
            }
            else{
                $config = array(
                    array(
                        'field' => 'address_name',
                        'label' => 'address_name',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'address',
                        'label' => 'address',
                        'rules' => 'trim|required'
                    ),
                );
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE)
                {
                    $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                    redirect('Admin/viewAddress/'.$id);
                }

                if($this->adminModel->update_address($id, $post['address_name'], $post['address'], $post['lang'])){

                    $this->session->set_flashdata('message',$this->lang->line('Successfully update class'));
                    redirect('Admin/listAddress');
                }
            }
        }
    }

    public function addAddress()
    {
        $post = $this->input->post();

        if(empty($post) || !is_array($post)){
            redirect('Admin/listAddress');
        }

        else{
            $config = array(
                array(
                    'field' => 'address_name',
                    'label' => 'address_name',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'address',
                    'label' => 'address',
                    'rules' => 'trim|required'
                ),
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                redirect('Admin/listAddress');
            }

            if($this->adminModel->add_address($post['address_name'], $post['address'], $post['lang'])){

                $this->session->set_flashdata('message',$this->lang->line('Successfully add new language'));
                redirect('Admin/listAddress');
            }
        }
    }


    /**********************************************SCHEDULE************************************************************/

    public function listSchedule()
    {
        $lang = $this->session->site_lang;
        $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
        $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
        $data['address'] = $this->adminModel->get_address_list();
        $data['schedule'] = $this->adminModel->get_schedule_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP',$dataLayout);
        $this->load->view('Admin/CP_listSchedule', $data);
    }

    public function viewSchedule($id)
    {

        if(!($this->input->post())) {
            $lang = $this->session->site_lang;
            $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
            $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
            $data['schedule'] = $this->adminModel->get_schedule_detail($id);
            $data['schedule_detail'] = $this->adminModel->get_schedule_for_address_detail($id);
            $this->load->view('header_CP');
            $this->load->view($this->section.'/CP', $dataLayout);
            $this->load->view('Admin/CP_detailSchedule', $data);
        }
        else{
            $post = $this->input->post();

            if(empty($post) || !is_array($post)){
                redirect('Admin/listAddress');
            }
            else{
                $config = array(
                    array(
                        'field' => 'address_name',
                        'label' => 'address_name',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'address',
                        'label' => 'address',
                        'rules' => 'trim|required'
                    ),
                );
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE)
                {
                    $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                    redirect('Admin/viewAddress/'.$id);
                }

                if($this->adminModel->update_address($id, $post['address_name'], $post['address'], $post['lang'])){

                    $this->session->set_flashdata('message',$this->lang->line('Successfully update class'));
                    redirect('Admin/listAddress');
                }
            }
        }
    }

    public function addSchedule()
    {
        $post = $this->input->post();

        if(empty($post) || !is_array($post)){
            redirect('Admin/listSchedule');
        }

        else{
            $config = array(
                array(
                    'field' => 'schedule_name',
                    'label' => 'schedule_name',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'address_id',
                    'label' => 'address_id',
                    'rules' => 'trim|required'
                ),
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                redirect('Admin/listSchedule');
            }

            if($this->adminModel->add_schedule($post['schedule_name'], $post['address_id'], $this->session->id, time())){

                $this->session->set_flashdata('message',$this->lang->line('Successfully add new schedule'));
                redirect('Admin/listSchedule');
            }
        }
    }

    public function addDetailSchedule($id){
        $post = $this->input->post();

        if(empty($post) || !is_array($post)){
            redirect('Admin/viewSchedule/'.$id);
        }

        else{
            $config = array(
                array(
                    'field' => 'start_hour',
                    'label' => 'start_hour',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'end_hour',
                    'label' => 'end_hour',
                    'rules' => 'trim|required'
                ),
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                redirect('Admin/viewSchedule/'.$id);
            }

            $start_time = $post['start_hour'].':'.$post['start_minute'];
            $end_time = $post['end_hour'].':'.$post['end_minute'];
            if($this->adminModel->add_schedule_for_address($start_time, $end_time, $post['day'], $post['date'], $this->session->id, time(), $id)){

                $this->session->set_flashdata('message',$this->lang->line('Successfully add new schedule'));
                redirect('Admin/viewSchedule/'.$id);
            }
        }
    }

    /**********************************************NAVIGATION************************************************************/

    public function listNavigation()
    {
        $lang = $this->session->site_lang;
        $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
        $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
        $data['navigation'] = $this->adminModel->get_navigation_list();
        $data['lang'] = $this->adminModel->get_lang_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP',$dataLayout);
        $this->load->view('Admin/CP_listNavigation', $data);
    }

    public function addNavigation()
    {
        $post = $this->input->post();

        if(empty($post) || !is_array($post)){
            redirect('Admin/listNavigation');
        }

        else{
            $config = array(
                array(
                    'field' => 'navigation_name',
                    'label' => 'navigation_name',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'navigation_link',
                    'label' => 'navigation_link',
                    'rules' => 'trim|required'
                ),
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                redirect('Admin/listNavigation');
            }

            if($this->adminModel->add_navigation($post['navigation_name'], $post['navigation_link'], $post['lang'])){

                $this->session->set_flashdata('message',$this->lang->line('Successfully add navigation'));
                redirect('Admin/listNavigation');
            }
        }
    }

    public function viewNavigation($id)
    {
        if(!($this->input->post())) {
            $lang = $this->session->site_lang;
            $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
            $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
            $data['lang'] = $this->adminModel->get_lang_list();
            $data['navigation'] = $this->adminModel->get_navigation_detail($id);
            $this->load->view('header_CP');
            $this->load->view($this->section.'/CP', $dataLayout);
            $this->load->view('Admin/CP_detailNavigation', $data);
        }
        else{
            $post = $this->input->post();

            if(empty($post) || !is_array($post)){
                redirect('Admin/viewNavigation/'.$id);
            }
            else{
                $config = array(
                    array(
                        'field' => 'navigation_name',
                        'label' => 'navigation_name',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'navigation_link',
                        'label' => 'navigation_link',
                        'rules' => 'trim|required'
                    ),
                );
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE)
                {
                    $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                    redirect('Admin/viewNavigation/'.$id);
                }

                if($this->adminModel->update_navigation($id, $post['navigation_name'], $post['navigation_link'], $post['lang'])){

                    $this->session->set_flashdata('message',$this->lang->line('Successfully update navigation'));
                    redirect('Admin/listNavigation/');
                }
            }
        }
    }


    /**********************************************CAROUSEL************************************************************/

    public function listCarousel()
    {
        $lang = $this->session->site_lang;
        $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
        $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
        $data['carousel'] = $this->adminModel->get_carousel_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP',$dataLayout);
        $this->load->view('Admin/CP_listCarousel', $data);
    }

    public function addCarousel()
    {
        if (isset($_FILES)) {
            $filename = random_string('md5') . '_' . time();
            $config1['upload_path'] = 'assets/uploads/';
            $config1['allowed_types'] = 'jpg|png';
            $config1['max_size'] = 5120;
            $config1['file_name'] = $filename;
            $this->load->library('upload', $config1);

            if (!$this->upload->do_upload('file_name')) {
                $this->form_validation->set_message($this->upload->display_errors());
            }

            $class_img = $this->upload->data('file_name');

            if ($this->adminModel->add_carousel($class_img, time())) {

                $this->session->set_flashdata('message', $this->lang->line('Successfully add carousel'));
                redirect('Admin/listCarousel');
            }
        }
    }

    public function deleteCarousel($id)
    {
        $this->adminModel->delete_carousel($id);
        $this->session->set_flashdata('message',$this->lang->line('Successfully delete carousel'));
        redirect('Admin/listCarousel');
    }


    /**************************************************CONTACT********************************************************/

    public function listContact()
    {
        $lang = $this->session->site_lang;
        $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
        $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
        $data['contact'] = $this->adminModel->get_contact_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP',$dataLayout);
        $this->load->view('Admin/CP_listContact', $data);
    }

    public function addContact()
    {
        $post = $this->input->post();

        if(empty($post) || !is_array($post)){
            redirect('Admin/listContact');
        }

        else{
            $config = array(
                array(
                    'field' => 'contact_name',
                    'label' => 'contact_name',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'contact_detail',
                    'label' => 'contact_detail',
                    'rules' => 'trim|required'
                ),
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                redirect('Admin/listContact');
            }

            if($this->adminModel->add_contact($post['contact_name'], $post['contact_detail'], $post['type'])){

                $this->session->set_flashdata('message',$this->lang->line('Successfully add navigation'));
                redirect('Admin/listContact');
            }
        }
    }

    public function deleteContact($id)
    {
        $this->adminModel->delete_contact($id);
        $this->session->set_flashdata('message',$this->lang->line('Successfully delete contact'));
        redirect('Admin/listContact');
    }

    public function viewContact($id)
    {
        if(!($this->input->post())) {
            $lang = $this->session->site_lang;
            $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
            $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
            $data['lang'] = $this->adminModel->get_lang_list();
            $data['contact'] = $this->adminModel->get_contact_detail($id);
            $this->load->view('header_CP');
            $this->load->view($this->section.'/CP', $dataLayout);
            $this->load->view('Admin/CP_detailContact', $data);
        }
        else{
            $post = $this->input->post();

            if(empty($post) || !is_array($post)){
                redirect('Admin/viewContact/'.$id);
            }
            else{
                $config = array(
                    array(
                        'field' => 'contact_name',
                        'label' => 'contact_name',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'contact_detail',
                        'label' => 'contact_detail',
                        'rules' => 'trim|required'
                    ),
                );
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE)
                {
                    $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                    redirect('Admin/viewContact/'.$id);
                }

                if($this->adminModel->update_contact($id, $post['contact_name'], $post['contact_detail'], $post['type'])){

                    $this->session->set_flashdata('message',$this->lang->line('Successfully update contact'));
                    redirect('Admin/listContact');
                }
            }
        }
    }


    //COMMON SECTION
    public function handleAjax(){
        $post = $this->input->post();

        $this->adminModel->handleAjax($post['id'],$post['table'],$post['enable']);
    }
}