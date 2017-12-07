<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_Model {
	
	public function __construct() 
 {
	 parent::__construct();
 }
    public function get_contact_list(){
        $query = $this->db->select('*')
            ->from('contact')
            ->where('is_enable',1)
            ->get()
            ->result_array();

        return $query;
    }

    public function get_class_list(){
        $query = $this->db->select('*')
            ->from('classes')
            ->get()
            ->result_array();

        return $query;
    }

    public function get_address_list(){
        $query = $this->db->select('*')
            ->from('address')
            ->get()
            ->result_array();

        return $query;
    }

    public function get_schedule_list(){
        $query = $this->db->select('*')
            ->from('schedule')
            ->join('address','address.address_id = schedule.address_id')
            ->get()
            ->result_array();

        return $query;
    }

    public function get_schedule_for_address_detail($id){
        $query = $this->db->select('*')
            ->from('schedule_for_address')
            ->where('schedule_id',$id)
            ->get()
            ->result_array();

        return $query;
    }

    public function get_navigation_list(){
        $query = $this->db->select('*')
            ->from('navigation')
            ->where('is_enable',1)
            ->get()
            ->result_array();

        return $query;
    }

    public function get_carousel_list(){
        $query = $this->db->select('*')
            ->from('carousel')
            ->where('is_enable',1)
            ->get()
            ->result_array();

        return $query;
    }

    public function get_icon(){
        $query = $this->db->select('*')
            ->from('icon')
            ->where('is_enable',1)
            ->get()
            ->row_array();

        return $query;
    }
}