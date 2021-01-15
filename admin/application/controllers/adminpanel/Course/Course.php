<?php
class Course extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('adminpanel/Course/Course_model', 'Course_model');
    }

	//-----------------------------------------------------		
	function Lists(){
		
		$data["courselist"]=$this->Course_model->getallcourses();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Course/CourseList',$data);
		$this->load->view('admin/includes/_footer');
	}

	
	
	//-----------------------------------------------------------------
	function add(){
		
		//$this->rbac->check_operation_access(); // check opration permission


		$data['title'] = trans('add_new_role');
		$data['category']=$this->Course_model->getallcategory();
		$data['subcategory']=$this->Course_model->getallsubcategoryforlisting();
		$data['Accrediations']=$this->Course_model->getallaccreditations();
		$data['courses']=$this->Course_model->getallcourses();
        $this->load->view('admin/includes/_header');
        $this->load->view('adminpanel/Course/CreateCourse', $data);
		$this->load->view('admin/includes/_footer');
	}

	//--------------------------------------------------


	//common file upload
	public function do_upload(){

		$config['upload_path']="./assets/img";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
        'Status' => 1,
		'Image_metatag' => $this->input->post('img_metatag'),
        'Image_alt_text' => $this->input->post('img_alttext'),
        'ImagePath' => $data['upload_data']['file_name']
        );  
        $result= $this->Course_model->addimage($data1);
		echo $result;        
		}
		else{
			echo 'no file';
		}
		

	 }
	 
	 //category functions 
	 public function AddCourse(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Coursedetails"];
		$result= $this->Course_model->Addcourse($data);
		echo $result;

	 }

	 public function addCoursesection(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Categorys"];
		$result= $this->Course_model->Addcourse_section($data);
		echo $result;

	 }
	 public function addrealatedcourses(){

		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$result= $this->Course_model->Addrelatedcourse($data);
		echo $result;

	 }
	 public function addcoursecategory(){

		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$cc=$postdata["cc"];
		foreach	($cc as $cat)
		{

			
			$result= $this->Course_model->updatecoursecat($id,$cat);
		}
		
		echo $result;

	 }
	 public function addCourseaccreditations(){

		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$result= $this->Course_model->addCourseaccreditations($data);
		echo $result;

	 }

	 
	 
	 

	 public function edit_Course($id)
	 {
		 $datas=$this->Course_model->getcoursebyid($id);
		 
		 
		$data['Coursecategory']=$this->Course_model->get_coursecategory_byid($id);
		$data['subcategory']=$this->Course_model->getallsubcategoryforlisting();
		$data['Accrediations']=$this->Course_model->getallaccreditations();
		$data['courseaccrediations']=$this->Course_model->getaccreditationsbycourse($id);
		$data['courses']=$this->Course_model->getallcourses();
		$data['relatedcourses']=$this->Course_model->getrelatedcoursesbid($id);
		$data["coursedata"]= $datas;
		$data['categoryimage']=$this->Course_model->get_categoryimage_byid($datas->ImageID);
		$data['categorysections']=$this->Course_model->get_coursesections_byid($id);

        $this->load->view('admin/includes/_header');
        $this->load->view('adminpanel/Course/Editcourse', $data);
		$this->load->view('admin/includes/_footer');
	 }
  
	 public function updateCourse(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Coursedetails"];
		$id=$postdata["id"];
		$result= $this->Course_model->update_course($data,$id);
		echo $result;

	 }

	 public function updateCoursesection(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Categorys"];
		$id=$postdata["id"];
		$result= $this->Course_model->delete_course_section($id);
		$result= $this->Course_model->Addcourse_section($data);
		echo $result;

	 }
	 public function updaterealatedcourses(){

		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$id=$postdata["id"];
		$result= $this->Course_model->delete_relatedcourse($id);
		$result= $this->Course_model->Addrelatedcourse($data);
		echo $result;

	 }
	 public function updatecoursecategory(){

		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$id=$postdata["id"];
		$cc=$postdata["cc"];
		$result= $this->Course_model->delete_coursecategory($id);
		
		foreach	($data as $cat)
		{
			
			$result= $this->Course_model->updatecoursecat($id,$cat->Subcatparentid);
		}
		
		echo $result;

	 }
	 public function updateCourseaccreditations(){

		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$id=$postdata["id"];
		$result= $this->Course_model->delete_Courseaccreditations($id);
		$result= $this->Course_model->addCourseaccreditations($data);
		echo $result;

	 }

	 public function getallcategory()
	{
		$query = $this->db->get('tbl_category');
		
		 $result = $query->result();
		return $result;
	}

	 public function enable_status($id)
	{
		$result = $this->Category_model->enable_status($id);

		redirect('courses');
	}
	public function disable_status($id)
	{
		$result = $this->Course_model->disable_status($id);
		redirect('courses');
		
	}
	 
	
}

?>