<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_admin_log extends CI_Model {

	private $loggedin=FALSE;

	 function start_session()
  {
    if($this->session->userdata('admin_id'))
    { 
      $this->admin_id=$this->session->userdata('admin_id');     
      if($this->user_exists())
      {
      $this->user_exists();
      $this->loggedin=TRUE;
      }
    }
    else
    $this->loggedin=FALSE;
  }
  
  function user_exists()
  {
    $query=$this->db->get_where('tbl_admin',array('admin_id' => $this->admin_id));
    foreach($query->result() as $row)
    { 
      $this->admin_id=$row->admin_id;
      $this->admin_username=$row->admin_username;
      $this->admin_password=$row->admin_password;
      return $row;
    }
    return false;
  }

  function admin_check($username,$password)
  {

    $query=$this->db->get_where('tbl_admin',array('admin_email'=>$username));
    //print_r($query->result()); exit;
    foreach($query->result() as $row)
    {
         $row->admin_password;
      // echo $password;
    
      if(password_verify($password, $row->admin_password))
      {
      	
          $this->admin_id=$row->admin_id;
        $this->admin_username=$row->admin_username;
        $this->admin_password=$row->admin_password;
        return TRUE;
      }
    }
    return FALSE;
   
  }
  
  function is_loggedin()
  {
    return $this->loggedin;
  }
}