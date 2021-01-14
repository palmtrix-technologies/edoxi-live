<?php
class SubCategory extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('adminpanel/SubCategory/SubCategory_model', 'Category_model');
    }

	//-----------------------------------------------------		
	function Lists(){
		
		$data["categorylist"]=$this->Category_model->getallcategory();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/SubCategory/SubcategoryList',$data);
		$this->load->view('admin/includes/_footer');
	}

	
	
	//-----------------------------------------------------------------
	function add(){
		
		//$this->rbac->check_operation_access(); // check opration permission


		$data['title'] = trans('add_new_role');
		$data['category']=$this->Category_model->getalllistcategory();
        $this->load->view('admin/includes/_header');
        $this->load->view('adminpanel/SubCategory/CreateSubCategory', $data);
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
        $result= $this->Category_model->addimage($data1);
		echo $result;
        
		}
		else{
			echo 'no file';
		}
		

	 }
	 
	 //category functions 
	 public function AddCategory(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Categorys"];
		$result= $this->Category_model->AddCategory($data);
		echo $result;

	 }

	 public function AddCategory_section(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Categorys"];
		$result= $this->Category_model->AddCategory_section($data);
		echo $result;

	 }
	 public function  addcategorycat(){
		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$result= $this->Category_model->AddCategory_category($data);
		echo $result;
	 }

	 public function edit_Category($id)
	 {
		 $data=$this->Category_model->get_category_byid($id);
		$result['Categorydata']=$data;
		$result['categoryimage']=$this->Category_model->get_categoryimage_byid($data->ImageID);
		$result['categorysections']=$this->Category_model->get_categorysections_byid($id);
		$result['category']=$this->Category_model->getCategory_bysubcategorys($id);
		$result['selectedcategory']=$this->Category_model->getCategory_bysubcategory($id);
		
		
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/SubCategory/EditSubCategory', $result);
		$this->load->view('admin/includes/_footer');
	 }
  
	 public function update_Category(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Categorys"];
		$id=$postdata["id"];
		$result= $this->Category_model->update_Category($data,$id);
		echo $result;

	 }

	 public function update_Category_section(){

		$postdata=$this->input->post('postData');

		
		$data=$postdata["Categorys"];
		$id=$postdata["id"];
		$result= $this->Category_model->delete_categorysection($id);
		$result= $this->Category_model->AddCategory_section($data);
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

		redirect('subCategory');
	}
	public function disable_status($id)
	{
		$result = $this->Category_model->disable_status($id);
		redirect('subCategory');
		
	}

	public function update_Category_sub(){

		$postdata=$this->input->post('postData');
		$data=$postdata["related"];
		$id=$postdata["id"];
		$result= $this->Category_model->delete_categorysub($id);
		$result= $this->Category_model->AddCategory_category($data);
		echo $result;

		
	 }

	
	 
	
}

?>