<?php
class Category extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('adminpanel/Category/Category_model', 'Category_model');
    }

	//-----------------------------------------------------		
	function categorylist(){
		
		$data["categorylist"]=$this->Category_model->getallcategory();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Category/CategoryList',$data);
		$this->load->view('admin/includes/_footer');
	}

	
	
	//-----------------------------------------------------------------
	function add(){
		
		//$this->rbac->check_operation_access(); // check opration permission


		$data['title'] = trans('add_new_role');

        $this->load->view('admin/includes/_header');
        $this->load->view('adminpanel/Category/CreateCategory', $data);
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

	//  accreditations

	public function accreditations(){

		$config['upload_path']="./assets/img/accreation";
        $config['allowed_types']='gif|jpg|png|jpeg|webp';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
			
        'accreditation_status' => 1,
        'accreditation_name' => $this->input->post('name'),
        'accreditation_description' => $this->input->post('desc'),
		'accreditation_logo_big' => $data['upload_data']['file_name']
        );  
        $result= $this->Category_model->add_accreditations($data1);
		echo $result;
		
		}
		else{
				echo "no file";
		
		}
		

	 }
	 //Casestudy file upload
	public function multido_upload(){
	
		$config['upload_path']="./assets/img/casestudy/Logo";
		$fnam="Logo";
        $config['allowed_types']='gif|jpg|png|jpeg|webp';
        $this->load->library('upload',$config);
        if($this->upload->do_upload($fnam)){
        $data = array('upload_data' => $this->upload->data());
    
		$result["logo"]= $data['upload_data']['file_name'];
		
		}else{
			$result["logo"]=$this->input->post('hdnlogo');
		}

		$config1['upload_path']="./assets/img/casestudy/Banner";
		$fnam="Banner";
        $config1['allowed_types']='gif|jpg|png|jpeg|webp';
        $this->load->library('upload',$config1);
        if($this->upload->do_upload($fnam)){
        $data1 = array('upload_data' => $this->upload->data());
    
		$result["Banner"]= $data1['upload_data']['file_name'];
		
		}
		else{
			$result["Banner"]=$this->input->post('hdnbanner');
		}

		$config3['upload_path']="./assets/img/casestudy/Profile";
		$fnam="Profileimage";
        $config3['allowed_types']='gif|jpg|png|jpeg|webp';
        $this->load->library('upload',$config3);
        if($this->upload->do_upload($fnam)){
        $data3 = array('upload_data' => $this->upload->data());
    
		$result["Profile"]= $data3['upload_data']['file_name'];
		
		}
		else{
			$result["Profile"]=$this->input->post('hdnprofile');
		}


		

			echo json_encode($result);
		
		
		

	 }

	
	 //whitepaper file upload
	public function whitepaperupload(){
		

		

		$config['upload_path']="./assets/img/whitpaper";
		$fnam="Bannerimage";
        $config['allowed_types']='gif|jpg|png|jpeg|pdf';
        $this->load->library('upload',$config);
        if($this->upload->do_upload($fnam)){
        $data = array('upload_data' => $this->upload->data());
    
		$result["Bannerimage"]= $data['upload_data']['file_name'];
		
		}else{
			$result["Bannerimage"]=$this->input->post('hdnbanner');
		}

		$fnam="whitepaperfile";
        $this->load->library('upload',$config);
        if($this->upload->do_upload($fnam)){
        $data= array('upload_data' => $this->upload->data());
    
		$result["whitepaperfile"]= $data['upload_data']['file_name'];
		
		}
		else{
			$result["whitepaperfile"]=$this->input->post('hdnwhitepaperfile');
		}



		

			echo json_encode($result);
		
		
		

	 }

	 //broucherupload

	 public function broucherupload()
	 {
		$config['upload_path']="./assets/img/brouchers";
        $config['allowed_types']='pdf';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("up_file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
        'CourseID' => $this->input->post('hdnCourseID'),
        'Broucher_file' =>  $data['upload_data']['file_name'],
		'Email_content' => $this->input->post('Mailcontent')
		
		);  
		$result= $this->Category_model->delete_broucher($this->input->post('hdnCourseID'));
        $result= $this->Category_model->add_broucher($data1);
		echo $result;
		
		}
		else{
			if( $this->input->post('fileid')!='')
			{
				    $data2 = array(
					'CourseID' => $this->input->post('hdnCourseID'),
					'Email_content' => $this->input->post('Mailcontent')
					
					); 
					$result= $this->Category_model->update_broucher($data2,$this->input->post('fileid'));
					echo $result;


			}
			else{
				echo "no file";
			}
		}
	 }
	 
	 //gallery upload

	 public function Gallery_upload()
	 {
		$config['upload_path']="./assets/img/gallery";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("up_file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
        'Image_type' => $this->input->post('txt_imagetype'),
        'imageurl' =>  $data['upload_data']['file_name'],
		'image_alt' => $this->input->post('txt_imagealt'),
		'image_meta' => $this->input->post('txt_imagedescription')
		
		);  
        $result= $this->Category_model->add_gallery($data1);
		echo $result;
		
		}
		else{
			if( $this->input->post('fileid')!='')
			{
				    $data2 = array(
					'Image_type' => $this->input->post('txt_imagetype'),
					'image_alt' => $this->input->post('txt_imagealt'),
					'image_meta' => $this->input->post('txt_imagedescription')
					
					); 
					$result= $this->Category_model->update_gallery($data2,$this->input->post('fileid'));
					echo $result;


			}
			else{
				echo "no file";
			}
		}
	 }

	 	 //Author upload

		  public function author_upload()
		  {
			 $config['upload_path']="./assets/img/studyhub";
			 $config['allowed_types']='gif|jpg|png|jpeg';
			 $this->load->library('upload',$config);
			 if($this->upload->do_upload("up_file")){
			 $data = array('upload_data' => $this->upload->data());
			 $data1 = array(
			 'Author_name' => $this->input->post('txt_authorname'),
			 'profile_image' =>  $data['upload_data']['file_name'],
			 'Slug' => $this->input->post('txt_authorslug'),
			 'Meta_tittle' => $this->input->post('txt_Metatitle'),
			 
			 'meta_description' => $this->input->post('txt_metadescription'),
			 'profile' => $this->input->post('profile')
			 );  

					if( $this->input->post('fileid')!='')
					{
						$result= $this->Category_model->update_author($data1,$this->input->post('fileid'));
					}
					else
					{
					$result= $this->Category_model->add_author($data1);
					}

			 echo $result;
			 
			 }
			 else{
				 if( $this->input->post('fileid')!='')
				 {
						 $data2 = array(
							
								'Author_name' => $this->input->post('txt_authorname'),
								'Slug' => $this->input->post('txt_authorslug'),
								'Meta_tittle' => $this->input->post('txt_Metatitle'),
								'meta_description' => $this->input->post('txt_metadescription'),
								'profile' => $this->input->post('profile')
						 
						 ); 
						 $result= $this->Category_model->update_author($data2,$this->input->post('fileid'));
						 echo $result;
	 
	 
				 }
				 else{
					 echo "no file";
				 }
			 }
	}
	 

	 //studyhub upload

	 public function studyhub_upload()
	 {
		$config['upload_path']="./assets/img/studyhub";
		$config['allowed_types']='gif|jpg|png|jpeg|webp';
		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
		$data = array('upload_data' => $this->upload->data());
		$file2="";
		$config1['upload_path']="./assets/img/studyhub";
        $config1['allowed_types']='gif|jpg|png|jpeg|webp';
        $this->load->library('upload',$config1);
        if($this->upload->do_upload('file2')){
        $data1 = array('upload_data' => $this->upload->data());
    
		$file2= $data1['upload_data']['file_name'];
		
		}
		else{
			$file2=$this->input->post('img_small');
		}


		$data1 = array(
		'Tittle' => $this->input->post('txt_titile'),
		'slug' => $this->input->post('txt_slug'),
		'image' =>  $data['upload_data']['file_name'],
		'image_small' =>  $file2,
		'Meta_tittle' => $this->input->post('txt_seotittle'),
		'meta_description' => $this->input->post('txtMetadesctiption'),
		
		'image_alt' => $this->input->post('img_alttext'),
		'AuthorId' => $this->input->post('authorid'),
		'ShortDescription' => $this->input->post('txt_shortdescription'),
		'Image_meta' => $this->input->post('img_metatag')
		);  
		
			   if( $this->input->post('fileid')!='')
			   {
				   $result= $this->Category_model->update_studyhub($data1,$this->input->post('fileid'));
			   }
			   else
			   {
			   $result= $this->Category_model->add_studyhub($data1);
			   }

		echo $result;
		
		}
		else{
			
			if( $this->input->post('fileid')!='')
			{
				$file2="";
		$config1['upload_path']="./assets/img/studyhub";
        $config1['allowed_types']='gif|jpg|png|jpeg|webp';
        $this->load->library('upload',$config1);
        if($this->upload->do_upload("file2")){
        $data1 = array('upload_data' => $this->upload->data());
    
		$file2= $data1['upload_data']['file_name'];
		
		}
		else{
			$file2=$this->input->post('img_small');
		}
					$data2 = array(
						'Tittle' => $this->input->post('txt_titile'),
						'slug' => $this->input->post('txt_slug'),
						'Meta_tittle' => $this->input->post('txt_seotittle'),
						'meta_description' => $this->input->post('txtMetadesctiption'),
						'image_small' =>  $file2,
						'image_alt' => $this->input->post('img_alttext'),
						'AuthorId' => $this->input->post('authorid'),
						'ShortDescription' => $this->input->post('txt_shortdescription'),
						'Image_meta' => $this->input->post('img_metatag')
					
					); 
					$result= $this->Category_model->update_studyhub($data2,$this->input->post('fileid'));
					echo $result;


			}
			else{
				echo "no file";
			}
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

	 public function edit_Category($id)
	 {
		 
		 
		 $data=$this->Category_model->get_category_byid($id);
		
		$result['Categorydata']=$data;
	
		$result['categoryimage']=$this->Category_model->get_categoryimage_byid($data->ImageID);
		$result['categorysections']=$this->Category_model->get_categorysections_byid($id);
	
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/Category/EditCategory', $result);
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

	public function enable_status($id)
	{
		$result = $this->Category_model->enable_status($id);

		redirect('Category');
	}
	public function disable_status($id)
	{
		$result = $this->Category_model->disable_status($id);
		redirect('Category');
		
	}
	public function slugexistancycheck()
	{
		$slug=$this->input->post("slug");
		$result = $this->Category_model->slugexistancycheck($slug);
		echo json_encode($result);
	
		
	}
	public function slugexistancycheckid()
	{
		$slug=$this->input->post("slug");
		$id=$this->input->post("id");
		$result = $this->Category_model->slugexistancycheckid($slug,$id);
		echo json_encode($result);		
	}

	public function delete_category($id)
	{
		$result= $this->Category_model->delete_categorysection($id);
		$result= $this->Category_model->delete_category($id);
		
		redirect('Category');
	}


	
	 
	
}

?>