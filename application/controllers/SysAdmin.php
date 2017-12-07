<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 10/31/2017
 * Time: 10:06 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property SysadminModel $SysAdminModel
 */

class SysAdmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('SysAdminModel');
        if ($this->session->admin_logged_in) {
            if($this->session->is_sysAdmin == 0){

                redirect('Admin');
            }
        }
        else{
            redirect('Authentication');
        }
    }

    public function index()
    {
        $data['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
        $data['node'] = $this->SysAdminModel->get_enable_node_list($this->session->site_lang);
        $this->load->view('header_CP');
        $this->load->view('SysAdmin/CP',$data);
        $this->load->view('SysAdmin/CP_index');
    }




//NODE SECTION

    public function manageNode(){
        $dataLayout['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
        $dataLayout['node'] = $this->SysAdminModel->get_enable_node_list($this->session->site_lang);
        $data['node'] = $this->SysAdminModel->get_node_list($this->session->site_lang);
        $this->load->view('header_CP');
        $this->load->view('SysAdmin/CP',$dataLayout);
        $this->load->view('SysAdmin/CP_manageField',$data);
    }

    public function addNode(){

        if(!$this->input->post()){
            $dataLayout['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
            $dataLayout['node'] = $this->SysAdminModel->get_enable_node_list($this->session->site_lang);
            $data['lang'] = $this->SysAdminModel->get_lang_list();
            $data['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
            $this->load->view('header_CP');
            $this->load->view('SysAdmin/CP',$dataLayout);
            $this->load->view('SysAdmin/CP_addField',$data);
        }
        else{
            $post = $this->input->post();

            if(empty($post) || !is_array($post)){
                redirect('SysAdmin/addNode');
            }

            else{
                $config = array(
                    array(
                        'field' => 'node_name',
                        'label' => 'node_name',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'node_link',
                        'label' => 'node_link',
                        'rules' => 'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE)
                {
                    $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                    redirect('SysAdmin/addNode');
                }

                if($this->SysAdminModel->add_node($post['node_name'], $post['node_link'], $post['branch_id'], $post['lang_id'])){

                    $this->session->set_flashdata('message',$this->lang->line('Successfully add new node'));
                    redirect('SysAdmin/manageNode');
                }
            }
        }
    }




//LANG SECTION
    public function detailLang($lang_id)
    {

        $data['language'] = $this->SysAdminModel->get_lang($lang_id);
        $path = './application/language/'.$data['language']['lang_acronym'];
        if(!file_exists($path)){
            $this->lang->load('message_lang', $this->session->site_lang);
            $data['lang'] = $this->lang->language;
        }
        else{
            $this->lang->load('message_lang', $data['language']['lang_acronym']);
            $data['lang'] = $this->lang->language;
        }

        if (!$this->input->post())
        {
            $dataLayout['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
            $dataLayout['node'] = $this->SysAdminModel->get_enable_node_list($this->session->site_lang);
            $this->load->view('header_CP');
            $this->load->view('SysAdmin/CP',$dataLayout);
            $this->load->view('SysAdmin/CP_detailLang', $data);
        }
        else
        {

            $post = $this->input->post();
            if(empty($post) || !is_array($post)){

                redirect('detailLang/'.$lang_id);
            }

            $translate_array = explode("&", $post['translate']);
            $translate_to_file = array();
            $langstr="<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
                /**
                *
                * Created:  2014-05-31 by Vickel
                *
                * Description:  ".$data['language']['lang_acronym']." language file for general views
                *
                */"."\n\n\n";
            $translate_array_value = array();
            foreach ($translate_array as $translate_array){
                $translate_array_value[] = explode("=", $translate_array);
            }

            foreach ($translate_array_value as $translate_array_value){
                $translate_to_file[$translate_array_value[0]] = str_replace('+',' ',$translate_array_value[1]);
            }

            foreach (array_keys($data['lang']) as $key=>$row) {
                    //$lang['error_csrf'] = 'This form post did not pass our security checks.';

                    $langstr .= "\$lang['" . $row . "'] = \"$translate_to_file[$key]\";" . "\n";
            }

            if(!file_exists($path)){
                mkdir($path);
            }
            write_file($path.'/message_lang.php', $langstr);
            redirect('SysAdmin/manageLang');
        }
    }

    public function manageLang(){
        $dataLayout['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
        $dataLayout['node'] = $this->SysAdminModel->get_enable_node_list($this->session->site_lang);
        $data['lang'] = $this->SysAdminModel->get_lang_list();
        $this->load->view('header_CP');
        $this->load->view('SysAdmin/CP',$dataLayout);
        $this->load->view('SysAdmin/CP_manageLang',$data);
    }

    public function addLang(){
        $post = $this->input->post();

        if(empty($post) || !is_array($post)){
            redirect('SysAdmin/manageLang');
        }

        else{
            $config = array(
                array(
                    'field' => 'lang_name',
                    'label' => 'lang_name',
                    'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                redirect('SysAdmin/manageLang');
            }

            if($this->SysAdminModel->add_lang($post['lang_name'], $post['lang_acronym'])){

                $this->session->set_flashdata('message',$this->lang->line('Successfully add new language'));
                redirect('SysAdmin/manageLang');
            }
        }
    }




//BRANCH SECTION
    public function manageBranch(){
        $dataLayout['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
        $dataLayout['node'] = $this->SysAdminModel->get_enable_node_list($this->session->site_lang);
        $data['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
        $data['lang'] = $this->SysAdminModel->get_lang_list();
        $this->load->view('header_CP');
        $this->load->view('SysAdmin/CP',$dataLayout);
        $this->load->view('SysAdmin/CP_manageBranch',$data);
    }

    public function addBranch(){

        $post = $this->input->post();

        if (empty($post) || !is_array($post)) {
            redirect('SysAdmin/manageNode');
        } else {
            $config = array(
                array(
                    'field' => 'branch_name',
                    'label' => 'branch_name',
                    'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_message($this->session->userdata('site_lang'), 'Error input please check your input before submitting');
                redirect('SysAdmin/manageBranch');
            }

            if ($this->SysAdminModel->add_branch($post['branch_name'], $post['lang_id'], $post['icon'])) {

                $this->session->set_flashdata('message', $this->lang->line('Successfully add new branch'));
                redirect('SysAdmin/manageNode');
            }

        }
    }

    public function updateBranch($id){

        if (!$this->input->post())
        {
            $dataLayout['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
            $dataLayout['node'] = $this->SysAdminModel->get_enable_node_list($this->session->site_lang);
            $data['lang'] = $this->SysAdminModel->get_lang_list();
            $data['branch'] = $this->SysAdminModel->get_branch($id);
            $this->load->view('header_CP');
            $this->load->view('SysAdmin/CP',$dataLayout);
            $this->load->view('SysAdmin/CP_updateBranch', $data);
        }
        else
        {
            $post = $this->input->post();

            if (empty($post) || !is_array($post)) {
                redirect('SysAdmin/addNode');
            } else {
                $config = array(
                    array(
                        'field' => 'branch_name',
                        'label' => 'branch_name',
                        'rules' => 'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE) {
                    $this->form_validation->set_message($this->session->userdata('site_lang'), 'Error input please check your input before submitting');
                    redirect('SysAdmin/addNode');
                }

                if ($this->SysAdminModel->update_branch($id, $post['branch_name'], $post['lang_id'], $post['icon'])) {

                    $this->session->set_flashdata('message', $this->lang->line('Successfully add new branch'));
                    redirect('SysAdmin/addNode');
                }
            }
        }
    }




//ADMIN SECTION
    public function manageAdmin(){
        $dataLayout['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
        $dataLayout['node'] = $this->SysAdminModel->get_enable_node_list($this->session->site_lang);
        $data['admins'] = $this->SysAdminModel->get_admin_list();
        $this->load->view('header_CP');
        $this->load->view('SysAdmin/CP',$dataLayout);
        $this->load->view('SysAdmin/CP_manageAdmin',$data);
    }

    public function addAdmin(){
        $post = $this->input->post();

        if(empty($post) || !is_array($post)){
            redirect('SysAdmin/manageAdmin');
        }

        else{
            $config = array(
                array(
                    'field' => 'username',
                    'label' => 'username',
                    'rules' => 'trim|required|alpha_numeric'
                ),
                array(
                    'field' => 'password',
                    'label' => 'password',
                    'rules' => 'trim|required|min_length[7]'
                ),
                array(
                    'field' => 'email',
                    'label' => 'email',
                    'rules' => 'trim|required|valid_email|is_unique[admin.email]'
                ),
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                redirect('SysAdmin/addAdmin');
            }
            else
            {

                $password = password_hash($post['password'], PASSWORD_BCRYPT);
                $is_sysAdmin = (isset($post['is_sysadmin']))? '1' : '0';
                $created_at = time();

                if ($this->SysAdminModel->add_admin($post['username'], $post['email'], $password, $is_sysAdmin, $created_at)) {

                    $this->session->set_flashdata('message', $this->lang->line('Successfully add new admin'));
                    redirect('SysAdmin/manageAdmin');
                }
            }
        }
    }


    /**********************************************ICON****************************************************************/

    public function manageIcon(){
        $dataLayout['branch'] = $this->SysAdminModel->get_branch_list($this->session->site_lang);
        $dataLayout['node'] = $this->SysAdminModel->get_enable_node_list($this->session->site_lang);
        $data['icon'] = $this->SysAdminModel->get_icon_list();
        $this->load->view('header_CP');
        $this->load->view('SysAdmin/CP',$dataLayout);
        $this->load->view('SysAdmin/CP_listIcon',$data);
    }

    public function addIcon()
    {
        if (isset($_FILES)) {
            $filename = random_string('md5') . '_' . time();
            $config1['upload_path'] = 'assets/uploads/logo';
            $config1['allowed_types'] = 'jpg|png';
            $config1['max_size'] = 5120;
            $config1['file_name'] = $filename;
            $this->load->library('upload', $config1);

            if (!$this->upload->do_upload('icon_file')) {
                $this->form_validation->set_message($this->upload->display_errors());
            }

            $icon_file = $this->upload->data('file_name');

            if ($this->SysAdminModel->add_icon($icon_file, time())) {

                $this->session->set_flashdata('message', $this->lang->line('Successfully add icon'));
                redirect('SysAdmin/manageIcon');
            }
        }
    }

    public function deleteIcon($id)
    {
        $icon = $this->SysAdminModel->get_icon_detail($id);
        if(unlink('assets/uploads/logo/'.$icon['icon_file'])){
            $this->SysAdminModel->delete_icon($id);
            $this->session->set_flashdata('message',$this->lang->line('Successfully delete icon'));
            redirect('SysAdmin/manageIcon');
        }
    }

    public function viewClass($id)
    {
        if(!($this->input->post())) {
            $lang = $this->session->site_lang;
            $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
            $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
            $data['lang'] = $this->adminModel->get_lang_list();
            $data['class'] = $this->adminModel->get_class_detail($id);
            $this->load->view('header_CP');
            $this->load->view($this->section.'/CP', $dataLayout);
            $this->load->view('Admin/CP_detailClass', $data);
        }
        else{
            $post = $this->input->post();

            if(empty($post) || !is_array($post)){
                redirect('Admin/listClass');
            }

            else{
                $config = array(
                    array(
                        'field' => 'class_name',
                        'label' => 'class_name',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'class_link',
                        'label' => 'class_link',
                        'rules' => 'trim|required'
                    ),
                );
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE)
                {
                    $this->form_validation->set_message($this->session->userdata('site_lang'),'Error input please check your input before submitting');
                    redirect('Admin/viewClass');
                }
                $filename = random_string('md5').'_'.time();
                $config['upload_path']          =  'assets/uploads/class/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 5120;
                $config['file_name']            = $filename;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('class_img')) {
                    $this->form_validation->set_message($this->upload->display_errors());
                    $class_img = $post['class_img_old'];
                }else
                {
                    $class_img = $this->upload->data('file_name');
                }


                if($this->adminModel->update_class($id, $post['class_name'], url_title($post['class_link']), $post['class_content'], $post['class_description'], $post['lang'], $class_img)){

                    $this->session->set_flashdata('message',$this->lang->line('Successfully update class'));
                    redirect('Admin/listClass');
                }
            }
        }
    }


//COMMON SECTION
    public function handleAjax(){
        $post = $this->input->post();

        $this->SysAdminModel->handleAjax($post['id'],$post['table'],$post['enable']);
    }
}