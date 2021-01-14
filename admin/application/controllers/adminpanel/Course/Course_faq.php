<?php
class Course_faq extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		 $this->load->model('adminpanel/Course/Coursefaq_model', 'Coursefaqmodel');
    }

	//-----------------------------------------------------		
	function CoursefaqManagement($id){

		 $data["course_faq"]=$this->Coursefaqmodel->Getallfaqby_CourseID($id);
		 $data["courseid"]=$id;
		
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/CourseFaq/Course_faq',$data);
		$this->load->view('admin/includes/_footer');
	}

	public function addcoursefaqs()
	{
		$postdata=$this->input->post('postData');
		$data=$postdata["faq"];
		$result= $this->Coursefaqmodel->Addcoursefaq($data);
		echo $result;
	}

	public function getcoursefaqsbyid()
	{
	
		$postdata=$this->input->post('postData');
		$id=$postdata["idval"];
		$result= $this->Coursefaqmodel->Getallfaqby_Id($id);
		echo json_encode($result);
	}

	

	public function updatecoursefaqs()
	{
		$postdata=$this->input->post('postData');
		$data=$postdata["faq"];
		$id=$postdata["id"];
		$result= $this->Coursefaqmodel->Updatecoursefaq($data,$id);
		echo $result;
	}

	public function Deletecoursefaq()
	{
		$postdata=$this->input->post('postData');
		$id=$postdata["id"];
		$result= $this->Coursefaqmodel->Deletecoursefaq($id);
		echo $result;
	}

	
	
	

	 
	//course upcoming start
	function CoursebatchManagement($id){

		$data["course_batch"]=$this->Coursefaqmodel->Getallbatchby_CourseID($id);
		$data["courseid"]=$id;
	   
	   $this->load->view('admin/includes/_header');
	   $this->load->view('adminpanel/CourseFaq/Course_upcoming',$data);
	   $this->load->view('admin/includes/_footer');
   }

   public function addcoursebatch()
	{
		$postdata=$this->input->post('postData');
		$data=$postdata["batch"];
		$result= $this->Coursefaqmodel->Addcoursebatch($data);
		echo $result;
	}
	public function getcoursebatchbyid()
	{
	
		$postdata=$this->input->post('postData');
		$id=$postdata["idval"];
		$result= $this->Coursefaqmodel->Getallbatchby_Id($id);
		echo json_encode($result);
	}

	public function updatecoursebatch()
	{
		$postdata=$this->input->post('postData');
		$data=$postdata["batch"];
		$id=$postdata["id"];
		$result= $this->Coursefaqmodel->Updatecoursebatch($data,$id);
		echo $result;
	}

	public function deletecoursebatch()
	{
		$postdata=$this->input->post('postData');
		$id=$postdata["idval"];
		$result= $this->Coursefaqmodel->deletecoursebatch($id);
		echo $result;
	}

	


	//manage broucher

	function Manage_broucher($id){

		$data["course_brochers"]=$this->Coursefaqmodel->get_broucher_bycourse($id);
		$data["courseid"]=$id;
	   
	   $this->load->view('admin/includes/_header');
	   $this->load->view('adminpanel/CourseFaq/Course_brouchers',$data);
	   $this->load->view('admin/includes/_footer');
   }
	

	
}

?>