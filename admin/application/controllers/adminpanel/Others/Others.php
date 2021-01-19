<?php
class Others extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		 $this->load->model('adminpanel/Others/Others_model', 'Others_model');
    }

	//-----------------------------------------------------		
	function Testimonials(){
		
		$data["testimonial"]=$this->Others_model->Get_all_Testimonials();
		$data["courses"]=$this->Others_model->getallcourses();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Others/Testimonials',$data);
		$this->load->view('admin/includes/_footer');
	}

	function add_testimonial(){
		
		$postdata=$this->input->post('postData');
		$data=$postdata["testi"];
		
		$result= $this->Others_model->Add_testimonial($data);
		echo $result;
	}

	public function delete_testimonial($id)
	{
		$result = $this->Others_model->delete_testimonial($id);
		redirect('Testimonials');
		
	}

	function update_testimonial(){
	
		$postdata=$this->input->post('postData');
		$data=$postdata["testi"];
		$id=$postdata["id"];
		$result= $this->Others_model->update_testimonial($data,$id);
		echo $result;
	}
	function home_testimonials(){
		
		$data["testimonial"]=$this->Others_model->get_remining_home_testimonials();
		$data["hometestimonial"]=$this->Others_model->get_home_testimonials();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Others/Home_testimonials',$data);
		$this->load->view('admin/includes/_footer');
	}
	function Home_testi_add($id){
		
		$this->Others_model->add_home_testimonial($id);
		redirect("home-testimonials");
		
	}
	function delete_home_testimonial($id){
		
		$this->Others_model->delete_home_testimonial($id);
		redirect("home-testimonials");
	}
	

	//gallery


	function gallery(){
		
		$data["gallery"]=$this->Others_model->get_allgallery();
		$data["gallerytype"]=$this->Others_model->get_gallerytype();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Others/gallery',$data);
		$this->load->view('admin/includes/_footer');
	}

	function corporate_testimonials(){
		
		
		$data["testimonial"]=$this->Others_model->get_remining_corporate_testimonials();
		$data["hometestimonial"]=$this->Others_model->get_corporate_testimonials();
	
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Others/Corporate_testimonials',$data);
		$this->load->view('admin/includes/_footer');

	
	}
	function corporate_testi_add($id){
		
		$this->Others_model->add_corporate_testimonial($id);
		redirect("corporate-testimonials");
		
	}
	function delete_corporate_testimonial($id){
		
		$this->Others_model->delete_corporate_testimonial($id);
		redirect("corporate-testimonials");
	}


	function course_testimonials(){
		
		
		$data["testimonial"]=$this->Others_model->get_remining_course_testimonials();
		$data["hometestimonial"]=$this->Others_model->get_course_testimonials();
	
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Others/Course_testimonials',$data);
		$this->load->view('admin/includes/_footer');

	
	}
	function course_testi_add($id){
		
		$this->Others_model->add_course_testimonial($id);
		redirect("course-testimonials");
		
	}
	function delete_course_testimonial($id){
		
		$this->Others_model->delete_course_testimonial($id);
		redirect("course-testimonials");
	}


	function Accreditations(){
		
		$data["accreditations"]=$this->Others_model->get_all_accredations();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Others/Accreditations',$data);
		$this->load->view('admin/includes/_footer');
	}

	

	function all_enquries(){
		
		$data["enq_types"]=$this->Others_model->get_all_enq_type();
		$data["enq_data"]=$this->Others_model->get_enq_bydateandtype(strtotime('-7 day', date("Y/m/d")),date("Y/m/d"),'All');
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Others/Enquiry_list',$data);
		$this->load->view('admin/includes/_footer');
	}
	function sort_enquries(){
		$from=$_POST['txtstart'];
        $to=$_POST['txtto'];
        $type=$_POST['types'];
		$data["enq_types"]=$this->Others_model->get_all_enq_type();
		$data["enq_data"]=$this->Others_model->get_enq_bydateandtype($from,$to,$type);
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Others/Enquiry_list',$data);
		$this->load->view('admin/includes/_footer');
	}

	

	
	
	
}

?>