<?php
class Homemanagement extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('adminpanel/Homemanagement/Homemanagement_model', 'Homemanagement_model');
    }

	//-----------------------------------------------------		
	function Home_Upcoming_management(){
		
		$data["course_batch"]=$this->Homemanagement_model->get_reminingbatches();

		$data["home_batch"]=$this->Homemanagement_model->get_homebatches();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Homemanagement/Home_course_upcoming',$data);
		$this->load->view('admin/includes/_footer');
	}
	function Home_Upcoming_add($id){
		
		$this->Homemanagement_model->add_hub($id);
		redirect("home-upcoming");
		
	}
	function Home_Upcoming_delete($id){
		
		$this->Homemanagement_model->delete_hub($id);
		redirect("home-upcoming");
	}


	

	
	
	 
	
}

?>