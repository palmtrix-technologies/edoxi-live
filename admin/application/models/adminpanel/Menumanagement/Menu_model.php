<?php
class Menu_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	function display_header_menu()
{       
   

	$qry ="SELECT  category_id,tbl_category.category_name,tbl_category.category_slug
	from  tbl_category";
		$query = $this->db->query( $qry);

	return $query->result();
}

function Subcatgorybycategoryid($catid)
{
	$qry ="SELECT ci_subparents.subparent_Id,tbl_subcategory.subcategory_id,tbl_subcategory.subcategory_name,tbl_subcategory.subcategory_slug  from ci_subparents 
	inner join tbl_subcategory on tbl_subcategory.subcategory_id=ci_subparents.SubCategoryId
	where CategoryId=".$catid;
	
	$query = $this->db->query( $qry);

	return $query->result();

}

function coursesmenubyid($category,$subCategory)
{
	$qry ="SELECT tbl_course.course_name as text,concat('course_',CoursecategoryId) as id FROM `coursecategory`
	inner join tbl_course on tbl_course.course_id=coursecategory.CourseId
	where coursecategory.CategoryID=".$category." and coursecategory.SubcategoryID=".$subCategory;
	
	$query = $this->db->query( $qry);

	return $query->result();

}

public function Add_menu($data)
	{
          
        $this->db->insert('ci_header_menu',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	public function delete_menu()
	{
		$this->db->where('Item_ID!=', "0");
        $this->db->delete('ci_header_menu');

    
	}

	public function getall_menu()
	{
		
		$qry ="SELECT concat(type,'_',Item_ID) as id from ci_header_menu" ;
		
		$query = $this->db->query( $qry);
	
		return $query->result();

    
	}

	public function getallcategory()
	{
		$qry ="SELECT * from tbl_category order by category_postedby asc " ;
		
		$query = $this->db->query( $qry);
	
		return $query->result();
	}
	
	public function updatecategory_sortorder($id,$orderno)
	{

		//category_postedby as order 
		$order = array('category_postedby' => $orderno);    
		$this->db->where('category_id', $id);
		$this->db->update('tbl_category', $order); 

	}
	

	public function Add_footermenu($data)
	{
          
        $this->db->insert('ci_footer_menu',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	public function delete_footermenu()
	{
		$this->db->where('Item_ID!=', "0");
        $this->db->delete('ci_footer_menu');

    
	}

	public function getall_footermenu()
	{
		
		$qry ="SELECT concat(type,'_',Item_ID) as id from ci_footer_menu" ;
		
		$query = $this->db->query( $qry);
	
		return $query->result();

    
	}
}

?>