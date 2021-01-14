<?php
class Category_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	public function addimage($data)
	{
          
        $this->db->insert('ci_image_master',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}
	public function updateimage($data,$id)
	{
          
		$this->db->where('ImageID', $id);
		$this->db->update('ci_image_master',$data);
		return  $id;
    
	}
	
	public function add_accreditations($data)
	{
          
        $this->db->insert('tbl_accreditations',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	public function AddCategory($data)
	{
          
        $this->db->insert('tbl_category',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	public function AddCategory_section($data)
	{
          
        $this->db->insert_batch('ci_category_sections',$data);
		
		return  "success";
    
	}


	//edit category start

	public function get_category_byid($id)
	{
		$this->db->where('category_id', $id);
		$query = $this->db->get('tbl_category');
		
		// $result = $query->result();
		return $query->row();
	}

	public function get_categoryimage_byid($id)
	{
		$this->db->where('ImageID', $id);
		$query = $this->db->get('ci_image_master');
		
		// $result = $query->result();
		return $query->row();
	}

	public function get_categorysections_byid($id)
	{
		$this->db->where('CategoryID', $id);
		$this->db->order_by("SortOrder", "asc");
		$query= $this->db->get('ci_category_sections');
	 $result = $query->result();
		return$result;
	}

	public function update_Category($data,$id)
	{
		
		$this->db->where('category_id', $id);
		$this->db->update('tbl_category', $data);
      
		return  $id;
    
	}
	public function delete_categorysection($id)
	{
          
       
		$this->db->where('CategoryID', $id);
        $this->db->delete("ci_category_sections");
		return  "success";
    
	}

	public function getallcategory()
	{
		$query = $this->db->get('tbl_category');
		
		 $result = $query->result();
		return $result;
	}


	public function enable_status($id)
    {
         
      
      $this->db->where('category_id', $id);
      $this->db->set('category_status',0);
      if($this->db->update('tbl_category'))
      {
        return 1;
      }else{
        return 0;
      }
    }
    public function disable_status($id)
    {
		$this->db->where('category_id', $id);
       
	// 	return  "success";   
      
    //   $this->db->where('category_id', $id);
    //   $this->db->set('category_status',1);
      if( $this->db->delete("tbl_category"))
      {
        return 1;
      }else{
        return 0;
      }
	}
	

	public function add_broucher($data)
	{
		$this->db->insert('ci_course_brouchers',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;


	}

	public function update_broucher($data,$id)
	{
		$this->db->where('ci_course_broucherID', $id);
		$this->db->update('ci_course_brouchers',$data);
		return  $id;


	}
	public function delete_broucher($id)
	{
		$this->db->where('CourseID', $id);
		$this->db->delete('ci_course_brouchers');
		return  $id;


	}

	public function slugexistancycheck($slug)
	{
		$sql="select * from ci_slug where ci_slug.Slug='".$slug."'";

		
		$query = $this->db->query($sql);
		

		return $query->row();

		
	}
	public function slugexistancycheckid($slug,$id)
	{
		$sql="select * from ci_slug where dataid!=".$id." and ci_slug.Slug='".$slug."'";

		
		$query = $this->db->query($sql);
		

		return $query->row();

		


	}



	public function add_gallery($data)
	{
		$this->db->insert('ci_gallery',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;


	}

	public function update_gallery($data,$id)
	{
		$this->db->where('ci_gallery_id', $id);
		$this->db->update('ci_gallery',$data);
		return  $id;


	}
	public function delete_gallery($id)
	{
		$this->db->where('ci_gallery_id', $id);
		$this->db->delete('ci_gallery');
		return  $id;


	}
	public function add_author($data)
	{
		
		$this->db->insert('ci_studyhub_author',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;


	}
    public function update_author($data,$id)
	{
		$this->db->where('ci_studyhub_authorid', $id);
		$this->db->update('ci_studyhub_author',$data);
		return  $id;


	}

	public function add_studyhub($data)
	{
		
		$this->db->insert('ci_studyhub',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;


	}
    public function update_studyhub($data,$id)
	{
		$this->db->where('ci_studyhubid', $id);
		$this->db->update('ci_studyhub',$data);
		return  $id;


	}
	

	
	public function delete_category($id)
	{        
       
		$this->db->where('category_id', $id);
        $this->db->delete("tbl_category");
		return  "success";
    
	}

	

	


	
}
?>