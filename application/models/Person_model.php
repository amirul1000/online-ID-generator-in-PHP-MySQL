<?php

/**
 * Author: Amirul Momenin
 * Desc:Person Model
 */
class Person_model extends CI_Model
{
	protected $person = 'person';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get person by id
	 *@param $id - primary key to get record
	 *
     */
    function get_person($id){
        $result = $this->db->get_where('person',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('person');
			foreach ($fields as $field)
			{
			   $result[$field] = ''; 	  
			}
		}
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all person
	 *
     */
    function get_all_person(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('person')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit person
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_person($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('person')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count person rows
	 *
     */
	function get_count_person(){
       $result = $this->db->from("person")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-person
	 *
     */
    function get_all_users_person(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('person')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-person
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_person($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('person')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-person rows
	 *
     */
	function get_count_users_person(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("person")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new person
	 *@param $params - data set to add record
	 *
     */
    function add_person($params){
        $this->db->insert('person',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update person
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_person($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('person',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete person
	 *@param $id - primary key to delete record
	 *
     */
    function delete_person($id){
        $status = $this->db->delete('person',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
