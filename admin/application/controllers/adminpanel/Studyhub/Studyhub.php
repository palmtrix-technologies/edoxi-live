<?php
class Studyhub extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		 $this->load->model('adminpanel/Studyhub/Studyhub_model', 'Studyhub_model');
    }

	//-----------------------------------------------------		
	function Authormanagement(){
		
		$data["authors"]=$this->Studyhub_model->get_all_authors();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Studyhub/Authormanagement',$data);
		$this->load->view('admin/includes/_footer');
	}

	public function delete_stydyhub($id)
	{
		$result = $this->Studyhub_model->delete_stydyhub($id);
		redirect('studyhub');
		
	}
	

	function studyhub_list(){
		
		$data["studyhubs"]=$this->Studyhub_model->get_all_studyhubs();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Studyhub/Studyhublist',$data);
		$this->load->view('admin/includes/_footer');
	}

	function Add_studyhub(){
		$data["authors"]=$this->Studyhub_model->get_all_authors();
		$data["studyhubs"]=$this->Studyhub_model->get_all_studyhubs();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Studyhub/Createstudyhub',$data);
		$this->load->view('admin/includes/_footer');
	}

	
	public function Addstudyhub_section(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Categorys"];
		$result= $this->Studyhub_model->Addstudyhub_section($data);
		echo $result;

	 }
	 public function  Addstudy_related(){
		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$result= $this->Studyhub_model->Addstudy_related($data);
		echo $result;
	 }

	 function update_studyhub($id){
		$data["authors"]=$this->Studyhub_model->get_all_authors();
		$data["studyhubs"]=$this->Studyhub_model->get_all_studyhubs();
		$data["studyhub"]=$this->Studyhub_model->get_studyhub_byid($id);
		$data["related"]=$this->Studyhub_model->get_studyhub_related($id);
		$data["sections"]=$this->Studyhub_model->get_studyhub_sections($id);
		
		
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Studyhub/editstudyhub',$data);
		$this->load->view('admin/includes/_footer');
	}

	
	public function updatestudyhub_section(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Categorys"];
		$id=$postdata["id"];
		$result= $this->Studyhub_model->delete_sections($id);
		$result= $this->Studyhub_model->Addstudyhub_section($data);
		echo $result;

	 }
	 public function  updatestudy_related(){
		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$id=$postdata["id"];
		
		$result= $this->Studyhub_model->delete_related($id);
		$result= $this->Studyhub_model->Addstudy_related($data);
		echo $result;
	 }
	

	 function studyhub_home(){
		
		$data["studyhubs"]=$this->Studyhub_model->get_all_studyhubs();
		$data["recent"]=$this->Studyhub_model->get_ci_studyhub_recent();
		$data["recommented"]=$this->Studyhub_model->get_ci_studyhub_recommented();
		$data["popular"]=$this->Studyhub_model->get_ci_studyhub_popular();

	
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Studyhub/Studyhub_home',$data);
		$this->load->view('admin/includes/_footer');
	}


	function recent_studyhub_add($id){
		
		$this->Studyhub_model->deleteall_main();
		$this->Studyhub_model->add_recent_article($id);
		redirect("studyhub-home");
		
	}

	function recomment_studyhub_add($id){
		
		$this->Studyhub_model->add_recommented_article($id);
		redirect("studyhub-home");
		
	}

	function popular_studyhub_add($id){
		
		$this->Studyhub_model->add_popular_article($id);
		redirect("studyhub-home");
		
	}

	function recent_studyhub_delete($id){
		
		$this->Studyhub_model->delete_recent_article($id);
		redirect("studyhub-home");
		
	}

	function recomment_studyhub_delete($id){
		
		$this->Studyhub_model->delete_recommented_article($id);
		redirect("studyhub-home");
		
	}

	function popular_studyhub_delete($id){
		
		$this->Studyhub_model->delete_popular_article($id);
		redirect("studyhub-home");
		
	}
	 
	
}

?>