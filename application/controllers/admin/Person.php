<?php

 /**
 * Author: Amirul Momenin
 * Desc:Person Controller
 *
 */
class Person extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Person_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of person table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['person'] = $this->Person_model->get_limit_person($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/person/index');
		$config['total_rows'] = $this->Person_model->get_count_person();
		$config['per_page'] = 10;
		//Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';		
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
        $data['_view'] = 'admin/person/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save person
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		$file_picture = "";
 
		$created_at = "";
$updated_at = "";

		if($id<=0){
															 $created_at = date("Y-m-d H:i:s");
														 }
else if($id>0){
															 $updated_at = date("Y-m-d H:i:s");
														 }

		$params = array(
					 'uniqid' => html_escape($this->input->post('uniqid')),
'first_name' => html_escape($this->input->post('first_name')),
'last_name' => html_escape($this->input->post('last_name')),
'gender' => html_escape($this->input->post('gender')),
'occupation' => html_escape($this->input->post('occupation')),
'designation' => html_escape($this->input->post('designation')),
'education' => html_escape($this->input->post('education')),
'address' => html_escape($this->input->post('address')),
'father_name' => html_escape($this->input->post('father_name')),
'mather_name' => html_escape($this->input->post('mather_name')),
'dob' => html_escape($this->input->post('dob')),
'file_picture' => $file_picture,
'created_at' =>$created_at,
'updated_at' =>$updated_at,

				);
		
						$config['upload_path']          = "./public/uploads/images/person";
						$config['allowed_types']        = "gif|jpg|png";
						$config['max_size']             = 100;
						$config['max_width']            = 1024;
						$config['max_height']           = 768;
						$this->load->library('upload', $config);
						
						if(isset($_POST) && count($_POST) > 0)     
							{  
							  if(strlen($_FILES['file_picture']['name'])>0 && $_FILES['file_picture']['size']>0)
								{
									if ( ! $this->upload->do_upload('file_picture'))
									{
										$error = array('error' => $this->upload->display_errors());
									}
									else
									{
										$file_picture = "uploads/images/person/".$_FILES['file_picture']['name'];
									    $params['file_picture'] = $file_picture;
									}
								}
								else
								{
									unset($params['file_picture']);
								}
							}
							
						    
		if($id>0){
							                        unset($params['created_at']);
						                          }if($id<=0){
							                        unset($params['updated_at']);
						                          } 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['person'] = $this->Person_model->get_person($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Person_model->update_person($id,$params);
				$this->session->set_flashdata('msg','Person has been updated successfully');
                redirect('admin/person/index');
            }else{
                $data['_view'] = 'admin/person/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $person_id = $this->Person_model->add_person($params);
				$this->session->set_flashdata('msg','Person has been saved successfully');
                redirect('admin/person/index');
            }else{  
			    $data['person'] = $this->Person_model->get_person(0);
                $data['_view'] = 'admin/person/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details person
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['person'] = $this->Person_model->get_person($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/person/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting person
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $person = $this->Person_model->get_person($id);

        // check if the person exists before trying to delete it
        if(isset($person['id'])){
            $this->Person_model->delete_person($id);
			$this->session->set_flashdata('msg','Person has been deleted successfully');
            redirect('admin/person/index');
        }
        else
            show_error('The person you are trying to delete does not exist.');
    }
	
	/**
     * Search person
	 * @param $start - Starting of person table's index to get query
     */
	function search($start=0){
		if(!empty($this->input->post('key'))){
			$key =$this->input->post('key');
			$_SESSION['key'] = $key;
		}else{
			$key = $_SESSION['key'];
		}
		
		$limit = 10;		
		$this->db->like('id', $key, 'both');
$this->db->or_like('uniqid', $key, 'both');
$this->db->or_like('first_name', $key, 'both');
$this->db->or_like('last_name', $key, 'both');
$this->db->or_like('gender', $key, 'both');
$this->db->or_like('occupation', $key, 'both');
$this->db->or_like('designation', $key, 'both');
$this->db->or_like('education', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('father_name', $key, 'both');
$this->db->or_like('mather_name', $key, 'both');
$this->db->or_like('dob', $key, 'both');
$this->db->or_like('file_picture', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['person'] = $this->db->get('person')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/person/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('uniqid', $key, 'both');
$this->db->or_like('first_name', $key, 'both');
$this->db->or_like('last_name', $key, 'both');
$this->db->or_like('gender', $key, 'both');
$this->db->or_like('occupation', $key, 'both');
$this->db->or_like('designation', $key, 'both');
$this->db->or_like('education', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('father_name', $key, 'both');
$this->db->or_like('mather_name', $key, 'both');
$this->db->or_like('dob', $key, 'both');
$this->db->or_like('file_picture', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');

		$config['total_rows'] = $this->db->from("person")->count_all_results();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$config['per_page'] = 10;
		// Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
		$data['key'] = $key;
		$data['_view'] = 'admin/person/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
	function print_id($id){
		    $person = $this->db->get_where('person',array('id'=>$id))->row_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/person/print_id_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	}
    /**
     * Export person
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'person_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $personData = $this->Person_model->get_all_person();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Uniqid","First Name","Last Name","Gender","Occupation","Designation","Education","Address","Father Name","Mather Name","Dob","File Picture","Created At","Updated At"); 
		   fputcsv($file, $header);
		   foreach ($personData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $person = $this->db->get('person')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/person/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Person controller