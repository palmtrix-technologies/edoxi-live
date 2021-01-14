<?php
class SubCategory_model extends CI_Model{
   
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

	public function AddCategory($data)
	{
          
        $this->db->insert('tbl_subcategory',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	public function AddCategory_section($data)
	{
          
        $this->db->insert_batch('ci_subcategory_sections',$data);
		
		return  "success";
    
	}
	public function AddCategory_category($data)
	{
          
        $this->db->insert_batch('ci_subparents',$data);
		
		return  "success";
    
	}

	public function delete_categorysub($id)
	{
          
       
		$this->db->where('SubCategoryId', $id);
        $this->db->delete("ci_subparents");
		return  "success";
    
	}



	//edit category start

	public function get_category_byid($id)
	{
		$this->db->where('subcategory_id', $id);
		$query = $this->db->get('tbl_subcategory');
		
		// $result = $query->result();
		return $query->row();
	}

	public function getCategory_bysubcategory($subcatid)
	{
	
		$sql="select ci_subparents.CategoryId from  ci_subparents where  ci_subparents.SubCategoryId=".$subcatid;
		$query = $this->db->query($sql);
		$result = $query->result();
		return  $result;
    
	}

	public function getCategory_bysubcategorys($subcatid)
	{
		$sql="select tbl_category.*,case WHEN ci_subparents.CategoryId is not null then 'Selected' ELSE '' end as stat from tbl_category left join ci_subparents on ci_subparents.CategoryId=tbl_category.category_id and ci_subparents.SubCategoryId=".$subcatid;
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
    
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
		$query = $this->db->get('ci_subcategory_sections');
		
		 $result = $query->result();
		return$result;
	}

	public function update_Category($data,$id)
	{
		
		$this->db->where('subcategory_id', $id);
		$this->db->update('tbl_subcategory', $data);
      
		return  $id;
    
	}
	public function delete_categorysection($id)
	{
          
       
		$this->db->where('CategoryID', $id);
        $this->db->delete("ci_subcategory_sections");
		return  "success";
    
	}

	public function getallcategory()
	{
		$query = $this->db->get('tbl_subcategory');
		
		 $result = $query->result();
		return $result;
	}


	public function enable_status($id)
    {
         
      
      $this->db->where('subcategory_id', $id);
      $this->db->set('subcategory_status',0);
      if($this->db->update('tbl_subcategory'))
      {
        return 1;
      }else{
        return 0;
      }
    }
    public function disable_status($id)
    {
         
      
      $this->db->where('subcategory_id', $id);
    //   $this->db->set('subcategory_status',1);
      if($this->db->delete('tbl_subcategory'))
      {
        return 1;
      }else{
        return 0;
      }
	}
	
	public function getalllistcategory()
	{
		$query = $this->db->get('tbl_category');
		
		 $result = $query->result();
		return $result;
	}

	
}
?>