<?php
class Casestudy extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('adminpanel/Casestudy/Casestudy_model', 'Category_model');
    }

	//-----------------------------------------------------		
	function Lists(){
		
		$result['listdata']=$this->Category_model->get_allcasestudy();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Casestudy/CasestudyList',$result);
		$this->load->view('admin/includes/_footer');
	}

	
	
	//-----------------------------------------------------------------
	function add(){
		
		//$this->rbac->check_operation_access(); // check opration permission
		

		$data['title'] = trans('add_new_role');

        $this->load->view('admin/includes/_header');
        $this->load->view('adminpanel/Casestudy/CreateCasestudy', $data);
		$this->load->view('admin/includes/_footer');
	}

	//--------------------------------------------------
	

	//common file upload
	public function do_upload(){

		$config['upload_path']="./assets/img";
        $config['allowed_types']='gif|jpg|png|jpeg|webp';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
        'Status' => 1,
        'Image_metatag' => $this->input->post('img_metatag'),
        'Image_alt_text' => $this->input->post('img_alttext'),
		'ImagePath' => $data['upload_data']['file_name'],
		'Banner_caption' => $this->input->post('banner_caption'),
        'Banner_description' => $this->input->post('banner_shortdesc'),
        'BannerData' => $this->input->post('bulletval')
        );  
        $result= $this->Category_model->addimage($data1);
		echo $result;
		
		}
		else{
			if( $this->input->post('imgid')!='')
			{
				$data2 = array(
					'Status' => 1,
					'Image_metatag' => $this->input->post('img_metatag'),
					'Image_alt_text' => $this->input->post('img_alttext'),
					'Banner_caption' => $this->input->post('banner_caption'),
					'Banner_description' => $this->input->post('banner_shortdesc'),
					'BannerData' => $this->input->post('bulletval')
					);  
					$result= $this->Category_model->updateimage($data2,$this->input->post('imgid'));
					echo $result;


			}
			else{
				echo "no file";
			}
		}
		

	 }
	 
	 //category functions 
	 public function AddCasestudy(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Casestudys"];
		$result= $this->Category_model->AddCasestudy($data);
		echo $result;

	 }

	 public function updatecasestudy(){

		$postdata=$this->input->post('postData');
		$data=$postdata["Casestudys"];
		$id=$postdata["id"];

	
		$result= $this->Category_model->updateCasestudy($data,$id);
		echo $result;

	 }

	 

	 
	 public function editcase($id)
	 {
		
		 $data['case']=$this->Category_model->get_casestudybyid($id);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Casestudy/EditCasestudy',$data);
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

	 public function deletecase($id)
	{
		$result = $this->Category_model->deletecase($id);

		redirect('Casestudy');
	}
	
	 
	
}

?>