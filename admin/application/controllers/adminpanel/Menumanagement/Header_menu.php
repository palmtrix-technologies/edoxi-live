<?php
class Header_menu extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('adminpanel/Menumanagement/Menu_model', 'Menu_model');
    }

	//-----------------------------------------------------		
	function Header_menu_view(){
		
		$datamenu=$this->Menu_model->display_header_menu();
		$Categorys = array();
	
		
		foreach($datamenu as $category)
		{
			$SubCategorys = array();
			$subcat=$this->Menu_model->Subcatgorybycategoryid($category->category_id);
			
			foreach($subcat as $subcategory)
			{
			
				$course=$this->Menu_model->coursesmenubyid($category->category_id,$subcategory->subcategory_id);
				$subategoryss = array(
					"id"                 =>   "subcategory_".$subcategory->subparent_Id,
					"text"                  =>  $subcategory->subcategory_name,
					"children" => $course
					
				);
				array_push($SubCategorys, $subategoryss);
			}


			$Category = array(
				"id"                 =>   "category_".$category->category_id,
				"text"                  =>  $category->category_name,
				"children" => $SubCategorys
				
			);



			 array_push($Categorys, $Category);
		}

		
		$data["listdata"]=$Categorys;
		$data["selected"]=$this->Menu_model->getall_menu();
		$data["categorys"]=$this->Menu_model->getallcategory();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/MenuManagement/Header_management',$data);
		$this->load->view('admin/includes/_footer');
	}

	function add_header_menu()
	{
		$postdata=$this->input->post('postData');
		$data=$postdata["datas"];
		$type="";
		$itemid="";
		$this->Menu_model->delete_menu();
		foreach($data as $item)
		{
			$dats=explode("_",$item);
			$type=$dats[0];
			$itemid=$dats[1];
				$dataaa = array(
					'type'=>$type,
					'Item_ID'=>$itemid
				);

			$this->Menu_model->Add_menu($dataaa );
		
		}
		
      echo "success";
	}

	function update_category_order()
	{
		$postdata=$this->input->post('postData');
		$data=$postdata["datas"];
		$object = json_decode(json_encode($data), FALSE);
		$id=0;
		$sortorder=0;
		foreach($object as $item)
		{
			
			$id=$item->id;
			$sortorder=$item->order;
			$this->Menu_model->updatecategory_sortorder($id, $sortorder);
		
		}
		echo "success";
		
	}
	


	function Footer_menu_view(){
		
		$datamenu=$this->Menu_model->display_header_menu();
		$Categorys = array();
	
		
		foreach($datamenu as $category)
		{
			$SubCategorys = array();
			$subcat=$this->Menu_model->Subcatgorybycategoryid($category->category_id);
			
			foreach($subcat as $subcategory)
			{
			
				$course=$this->Menu_model->coursesmenubyid($category->category_id,$subcategory->subcategory_id);
				$subategoryss = array(
					"id"                 =>   "subcategory_".$subcategory->subparent_Id,
					"text"                  =>  $subcategory->subcategory_name,
					"children" => $course
					
				);
				array_push($SubCategorys, $subategoryss);
			}


			$Category = array(
				"id"                 =>   "category_".$category->category_id,
				"text"                  =>  $category->category_name,
				"children" => $SubCategorys
				
			);



			 array_push($Categorys, $Category);
		}

		
		$data["listdata"]=$Categorys;
		$data["selected"]=$this->Menu_model->getall_footermenu();
		$this->load->view('admin/includes/_header');
		$this->load->view('adminpanel/MenuManagement/Footer_management',$data);
		$this->load->view('admin/includes/_footer');
	}

	function add_footer_menu()
	{
		$postdata=$this->input->post('postData');
		$data=$postdata["datas"];
		$type="";
		$itemid="";
		$this->Menu_model->delete_footermenu();
		foreach($data as $item)
		{
			$dats=explode("_",$item);
			$type=$dats[0];
			$itemid=$dats[1];
				$dataaa = array(
					'type'=>$type,
					'Item_ID'=>$itemid
				);

			$this->Menu_model->Add_footermenu($dataaa );
		
		}
		
      echo "success";
	}
	

	
	
	 
	
}

?>