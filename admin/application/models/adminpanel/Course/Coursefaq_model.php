<?php
class Coursefaq_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	

	// public function getallsubcategory()
	// {
	// 	$query = $this->db->get('tbl_subcategory');
		
	// 	 $result = $query->result();
	// 	return $result;
	// }
	
	// public function getallsubcategoryforlisting()
	// {
	// 	$sql="SELECT tbl_subcategory.*,tbl_category.category_name as catname,ci_subparents.subparent_Id as categ FROM `tbl_subcategory` 
	// 	inner join ci_subparents on ci_subparents.SubCategoryId=tbl_subcategory.subcategory_id
	// 	inner join tbl_category on ci_subparents.CategoryId=tbl_category.category_id";
		
		
	// 	$query = $this->db->query($sql);
   	// 	$result = $query->result();
    //  	return $result;
	// }

	
	public function Getallfaqby_CourseID($id)
	{
		$sql="SELECT * FROM `tbl_course_faq` where `course_faq_id`=".$id;
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function Getallfaqby_Id($id)
	{
		$sql="SELECT * FROM `tbl_course_faq` where `faq_id`=".$id;

		
		$query = $this->db->query($sql);
		

		return $query->row();
	}
	
	public function Addcoursefaq($data)
	{
          
        $this->db->insert('tbl_course_faq',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	public function Updatecoursefaq($data,$id)
	{
          
		$this->db->where('faq_id', $id);
		$this->db->update('tbl_course_faq', $data);
      
		return  $id;
    
	}

	public function Deletecoursefaq($id)
	{
          
		$this->db->where('faq_id', $id);
		$this->db->delete('tbl_course_faq');
      
		return  $id;
    
	}

	public function Updatecoursebatch($data,$id)
	{
          
		$this->db->where('course_batchesID', $id);
		$this->db->update('ci_course_batches', $data);
      
		return  $id;
    
	}

	public function deletecoursebatch($id)
	{
          
		$this->db->where('course_batchesID', $id);
		$this->db->delete('ci_course_batches');
      
		return  $id;
    
	}

	public function Addcoursebatch($data)
	{
          
        $this->db->insert_batch('ci_course_batches',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	public function Getallbatchby_CourseID($id)
	{
		$sql="SELECT * FROM `ci_course_batches` where `CourseID`=".$id;
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}



	public function Getallbatchby_Id($id)
	{
		$sql="SELECT * FROM `ci_course_batches` where `course_batchesID`=".$id;

		
		$query = $this->db->query($sql);
		

		return $query->row();
	}

	public function get_broucher_bycourse($id)
	{
		$sql="SELECT * FROM `ci_course_brouchers` WHERE CourseID=".$id;

		
		$query = $this->db->query($sql);
		

		return $query->row();
	}
	


	
}
?>