<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 9/5/2017
 * Time: 3:45 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class adminModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function handleAjax($id, $table, $enable){
        $table_id = $table.'_id';
        $data = [
            'is_enable' => $enable
        ];
        $this->db->set($data)->where($table_id,$id)->update($table);
        return $this->db->insert_id();
    }

    public function get_branch_list($lang){
        $query = $this->db->select('*')
            ->from('branch')
            ->where('branch.lang',$lang)
            ->get()
            ->result_array();

        return $query;
    }

    public function get_enable_node_list($lang){
        $query = $this->db->select('*')
            ->from('node')
            ->where('node.lang',$lang)
            ->where('node.is_enable',1)
            ->get()
            ->result_array();

        return $query;
    }



    public function get_lang_list(){
        $query = $this->db->select('*')
            ->from('language')
            ->get()
            ->result_array();

        return $query;
    }

    /*****************************************CLASS******************************************/

    public function get_class_list(){
        $query = $this->db->select('*')
            ->from('classes')
            ->get()
            ->result_array();

        return $query;
    }

    public function add_class($class_name, $class_link, $class_content, $class_description, $lang_acronym, $img){
        $data = [
            'class_name' => $class_name,
            'class_link' => $class_link,
            'class_content' => $class_content,
            'class_description' => $class_description,
            'lang' => $lang_acronym,
            'class_img' => $img
        ];
        if($this->db->insert('classes',$data)){

            return true;
        }else{

            return false;
        }
    }

    public function get_class_detail($id){
        $query = $this->db->select('*')
            ->from('classes')
            ->where('class_id',$id)
            ->get()
            ->row_array();

        return $query;
    }

    public function update_class($id,$class_name, $class_link, $class_content, $class_description, $lang_acronym, $img){
        $data = [
            'class_name' => $class_name,
            'class_link' => $class_link,
            'class_content' => $class_content,
            'class_description' => $class_description,
            'lang' => $lang_acronym,
            'class_img' => $img
        ];
        if($this->db->set($data)->where('class_id',$id)->update('classes')){

            return true;
        }else{

            return false;
        }
    }


    /************************************************ADDRESS***********************************************************/

    public function get_address_list(){
        $query = $this->db->select('*')
            ->from('address')
            ->get()
            ->result_array();

        return $query;
    }

    public function get_address_detail($id){
        $query = $this->db->select('*')
            ->from('address')
            ->where('address_id',$id)
            ->get()
            ->row_array();

        return $query;
    }

    public function add_address($address_name, $address, $lang){
        $data = [
            'address_name' => $address_name,
            'address' => $address,
            'lang' => $lang
        ];
        if($this->db->insert('address',$data)){

            return true;
        }else{

            return false;
        }
    }

    public function update_address($id, $address_name, $address, $lang){
        $data = [
            'address_name' => $address_name,
            'address' => $address,
            'lang' => $lang
        ];
        if($this->db->set($data)->where('address_id',$id)->update('address')){

            return true;
        }else{

            return false;
        }
    }

    /************************************************SCHEDULE***********************************************************/

    public function get_schedule_list(){
        $query = $this->db->select('*')
            ->from('schedule')
            ->join('address','address.address_id = schedule.address_id')
            ->get()
            ->result_array();

        return $query;
    }

    public function get_schedule_detail($id){
        $query = $this->db->select('*')
            ->from('schedule')
            ->where('schedule_id',$id)
            ->join('address','address.address_id = schedule.address_id')
            ->get()
            ->row_array();

        return $query;
    }

    public function add_schedule($schedule_name, $address_id, $created_by, $created_at){
        $data = [
            'schedule_name' => $schedule_name,
            'address_id' => $address_id,
            'created_by' => $created_by,
            'created_at' => $created_at
        ];
        if($this->db->insert('schedule',$data)){

            return true;
        }else{

            return false;
        }
    }

    public function update_schedule($id, $address_name, $address, $lang){
        $data = [
            'address_name' => $address_name,
            'address' => $address,
            'lang' => $lang
        ];
        if($this->db->set($data)->where('address_id',$id)->update('address')){

            return true;
        }else{

            return false;
        }
    }


    /***********************************************SCHEDULE FOR ADDRESS***********************************************/


    public function get_schedule_for_address_detail($id){
        $query = $this->db->select('*')
            ->from('schedule_for_address')
            ->where('schedule_id',$id)
            ->get()
            ->result_array();

        return $query;
    }

    public function add_schedule_for_address($start_time, $end_time, $day, $date, $created_by, $created_at, $id){
        $data = [
            'start_time' => $start_time,
            'end_time' => $end_time,
            'date' => $date,
            'day' => $day,
            'created_by' => $created_by,
            'created_at' => $created_at,
            'schedule_id' => $id
        ];
        if($this->db->insert('schedule_for_address',$data)){

            return true;
        }else{

            return false;
        }
    }


    /***********************************************NAVIGATION***********************************************/

    public function get_navigation_list(){
        $query = $this->db->select('*')
            ->from('navigation')
            ->get()
            ->result_array();

        return $query;
    }

    public function get_navigation_detail($id){
        $query = $this->db->select('*')
            ->from('navigation')
            ->where('navigation_id',$id)
            ->get()
            ->row_array();

        return $query;
    }

    public function add_navigation($navigation_name, $navigation_link, $lang){
        $data = [
            'navigation_name' => $navigation_name,
            'navigation_link' => $navigation_link,
            'lang' => $lang,
        ];
        if($this->db->insert('navigation',$data)){

            return true;
        }else{

            return false;
        }
    }

    public function update_navigation($id, $navigation_name, $navigation_link, $lang){
        $data = [
            'navigation_name' => $navigation_name,
            'navigation_link' => $navigation_link,
            'lang' => $lang
        ];
        if($this->db->set($data)->where('navigation_id',$id)->update('navigation')){

            return true;
        }else{

            return false;
        }
    }


    /***********************************************NAVIGATION***********************************************/

    public function get_carousel_list(){
        $query = $this->db->select('*')
            ->from('carousel')
            ->get()
            ->result_array();

        return $query;
    }

    public function get_carousel_detail($id){
        $query = $this->db->select('*')
            ->from('carousel')
            ->where('carousel_id',$id)
            ->get()
            ->row_array();

        return $query;
    }

    public function add_carousel($carousel_image, $created_date){
        $data = [
            'carousel_image' => $carousel_image,
            'created_date' => $created_date
        ];
        if($this->db->insert('carousel',$data)){

            return true;
        }else{

            return false;
        }
    }

    public function delete_carousel($id){
        if($this->db->where('carousel_id',$id)->delete('carousel')){

            return true;
        }else{

            return false;
        }
    }


    /***********************************************CONTACT***********************************************/

    public function get_contact_list(){
        $query = $this->db->select('*')
            ->from('contact')
            ->get()
            ->result_array();

        return $query;
    }

    public function get_contact_detail($id){
        $query = $this->db->select('*')
            ->from('contact')
            ->where('contact_id',$id)
            ->get()
            ->row_array();

        return $query;
    }

    public function add_contact($contact_name, $contact_detail, $type){
        $data = [
            'contact_name' => $contact_name,
            'contact_detail' => $contact_detail,
            'type' => $type,
        ];
        if($this->db->insert('contact',$data)){

            return true;
        }else{

            return false;
        }
    }

    public function delete_contact($id){
        if($this->db->where('contact_id',$id)->delete('contact')){

            return true;
        }else{

            return false;
        }
    }

    public function update_contact($id, $contact_name, $contact_detail, $type){
        $data = [
            'contact_name' => $contact_name,
            'contact_detail' => $contact_detail,
            'type' => $type
        ];
        if($this->db->set($data)->where('contact_id',$id)->update('contact')){

            return true;
        }else{

            return false;
        }
    }

}