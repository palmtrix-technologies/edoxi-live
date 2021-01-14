<?php

class User_model extends CI_Model
{
    
 //    function create()
  // {
  //  $this->db->insert('tbl_user_registration',$this);
  //  return $this->db->insert_id();
  // }
    function start_session()
    {
        if($this->session->userdata('register_id'))
        {   
            $this->register_id=$this->session->userdata('register_id');         
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
            $this->db->select('tbl_user_registration.*')->from('tbl_user_registration');
            $this->db->where('register_id',$this->register_id); 
            $query=$this->db->get();
            //echo $this->db->last_query();exit;
           foreach($query->result() as $row)
        { 
            $this->register_id=$row->register_id;
            $this->register_username=$row->register_username;
            $this->register_email=$row->register_email;
            $this->register_password=$row->register_password;
            return $row;
        }
        return false;
    }
    function get_user($id)
    {

      $this->db->select('tbl_user_registration.*')->from('tbl_user_registration');
                $this->db->where('register_id',$id); 
               
                $query=$this->db->get();
                return $query->result();


    }

     function user_check($register_username, $register_password) 
    { 
        

                $this->db->select('tbl_user_registration.*')->from('tbl_user_registration');
                
                $this->db->group_start();
                $this->db->where('register_username',$register_username); 
                $this->db->or_where('register_email',$register_username);
                $this->db->group_end();
                 $this->db->where('register_delete_status','0'); 
                $query=$this->db->get();
             
                foreach($query->result() as $row)
            {
            
            if (password_verify($register_password, $row->register_password)) 
            {
                $this->register_id=$row->register_id;
                $this->register_username=$row->register_username;
                $this->register_institute=$row->register_institute;
                $this->register_email=$row->register_email;
                $this->register_password=$row->register_password;
                //exit;
                return TRUE;
            }
        }
    
        return FALSE;
    }
  function insert_register()
    {
        $this->db->insert('tbl_user_registration',$this);
    //echo $this->db->last_query();exit;
        return $this->db->insert_id();
    }
     function insert()
   {
    $this->db->insert('tbl_faculty',$this);
   }
      function insert_manager()
   {
    $this->db->insert('tbl_lead_manager',$this);
   }
       function insert_course()
   {
    $this->db->insert('tbl_lead_course',$this);
   }
      function update_faculty($faculty_id)
   {
   //$this->db->where('faculty_id', $faculty_id);
        //$this->db->update('tbl_faculty',$data);
         $this->db->update('tbl_faculty',$this, array('faculty_id'=>$faculty_id));
         //echo $this->db->last_query();exit;
   }
        function update_manager($manager_id)
   {
         $this->db->update('tbl_lead_manager',$this, array('manager_id'=>$manager_id));
         //echo $this->db->last_query();exit;
   }
           function update_course($course_id)
   {
         $this->db->update('tbl_lead_course',$this, array('course_id'=>$course_id));
         //echo $this->db->last_query();exit;
   }
         function update_lead($lead_id)
   {
         $this->db->update('tbl_leads',$this, array('lead_id'=>$lead_id));
         //echo $this->db->last_query();exit;
   }
    function insert_lead()
    {
        $this->db->insert('tbl_leads',$this);
    //echo $this->db->last_query();exit;
        return $this->db->insert_id();
    }
          function delete_faculty($faculty_id)
    {
        $this->db->update('tbl_faculty',$this, array('faculty_id'=>$faculty_id));
    }
            function delete_manager($manager_id)
    {
        $this->db->update('tbl_lead_manager',$this, array('manager_id'=>$manager_id));
    }
             function delete_course($course_id)
    {
        $this->db->update('tbl_lead_course',$this, array('course_id'=>$course_id));
    }
     function delete_lead($lead_id)
    {
        $this->db->update('tbl_leads',$this, array('lead_id'=>$lead_id));
    }
       function delete_user($user_id)
    {
        $this->db->update('tbl_user_registration',$this, array('register_id'=>$user_id));
        //echo $this->db->last_query();exit;
    }
  /*function get_profile($register_id)
{
    $this->db->select('tbl_user_registration.*')->from('tbl_user_registration');
    $this->db->where('tbl_user_registration.register_id', $register_id);
      $this->db->order_by('register_id', 'asc');

    $query = $this->db->get();
        //echo $this->db->last_query();exit;

    foreach ($query->result() as $row) 
    {
      return $row;
    }
}*/
/////update user///////
    
    function update_user($register_id, $data1)
    {
         $edited_details = array(
                'register_firstname' => $data1['register_firstname'],
                'register_lastname' => $data1['register_lastname'],
                'register_nationality' => $data1['register_nationality'],
                'register_location' => $data1['register_location'],
               //'register_image' => $data1['register_image'],
                'register_dob'=> $data1['register_dob'],
                'register_gender'=> $data1['register_gender'],
                'register_mobile'=>$data1['register_mobile'],
                'register_email'=>$data1['register_email']
               );
        $this->db->where('register_id', $register_id);
        $this->db->update('tbl_user_registration',$edited_details);
        //echo $this->db->last_query(); exit;
    }
    function edit_user_data($data,$register_id)
    {
         
        $this->db->where('register_id', $register_id);
        $this->db->update('tbl_user_registration',$data);
        //echo $this->db->last_query(); exit;
    }
/////close update user////
    //////show booked events//////
      function my_booked_events()
    {
      $register_id='11';
      $this->db->select('tbl_event_booking.booking_id,booking_event_name,booking_userid,booking_user_firstname,booking_user_lastname,booking_user_address,booking_user_email,booking_user_mobile')->from('tbl_event_booking');
      $this->db->where('tbl_event_booking.booking_userid', $register_id);
      $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->result();
    }
    /////close booked events/////
    function is_loggedin()
  {

    return $this->loggedin;
  }


  

  
  function find_email_by_name($register_email)
  {
    $query = $this->db->get_where('tbl_user_registration',array('register_email' => $register_email));
    if($query->num_rows() >0) 
    {
      foreach ($query->result() as $row) 
      {
        return $row->register_username;
      }
       
                }
  }

  function update_user_email($data) 
  {
    $sql = "UPDATE tbl_user_registration SET rs='$data[rs]' WHERE register_email='$data[email]'"; 
    
    $this->db->query($sql);

  }

  public function get_mail($rs)
  {
    $this->db->select('register_email, register_username');
    $this->db->from('tbl_user_registration');
    $this->db->where('rs', $rs); 
    $query = $this->db->get();
    return $query->result();
  }

  function update_password($password, $rs)
{
  $this->db->update('tbl_user_registration',array('register_password'=>$password, 'rs'=>''),array('rs'=>$rs));

} 
function reset_password($password, $id)
{

  $this->db->where('register_id', $id);
      
  $this->db->update('tbl_user_registration',array('register_password'=>$password));

} 

function mail_exists($register_email)
    {
       $query = $this->db->get_where('tbl_user_registration', array('register_email' => $register_email));
       //echo $this->db->last_query();exit;
       return $query->row();      
    }
    
    function username_exists($register_username)
    {
       $query = $this->db->get_where('tbl_user_registration', array('register_username' => $register_username));
       //echo $this->db->last_query();
       return $query->row();      
    }

    function display_users()
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_user_registration');
        $this->db->where('register_status','0');
         $this->db->where('register_delete_status','0');
        $this->db->order_by('register_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }


    function display_faculty()
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_faculty');
        $this->db->where('faculty_status','0');
         $this->db->where('faculty_delete_status','0');
        $this->db->order_by('faculty_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
      function display_manager()
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_lead_manager');
        $this->db->where('manager_status','0');
         $this->db->where('manager_delete_status','0');
        $this->db->order_by('manager_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
        function display_course($institute='')
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_lead_course');
        $this->db->where('course_status','0');
         $this->db->where('course_delete_status','0');
          if(!empty($institute))
        {
        $this->db->where('course_institute',$institute);
        }
        $this->db->order_by('course_id', 'desc');
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        return $query->result();
    }
           function display_institute_course($institute = null)
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_lead_course');
        $this->db->where('course_status','0');
        $this->db->where('course_delete_status','0');
        $this->db->where('course_institute',$institute);
        $this->db->order_by('course_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
      function display_institute_faculty($institute = null)
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_faculty');
        $this->db->where('faculty_status','0');
         $this->db->where('faculty_delete_status','0');
         $this->db->where('faculty_institute',$institute);
        $this->db->order_by('faculty_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
          function display_institute_manager($institute = null)
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_lead_manager');
        $this->db->where('manager_status','0');
         $this->db->where('manager_delete_status','0');
         $this->db->where('manager_institute',$institute);
        $this->db->order_by('manager_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
      function display_leads($institute ='',$perpage,$page)
    {
        //$this -> db -> select('*');
        //$this -> db -> from('tbl_leads');
        $this->db->select('tbl_leads.*,tbl_lead_course.course_id,tbl_lead_course.course_name,tbl_lead_manager.manager_name,tbl_faculty.faculty_name')->from('tbl_leads');
        $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
        $this->db->join('tbl_lead_manager','tbl_lead_manager.manager_id=tbl_leads.lead_manager', 'left');
        $this->db->join('tbl_faculty','tbl_faculty.faculty_id=tbl_leads.lead_faculty', 'left');
        $this->db->where('lead_status','0');
        $this->db->where('lead_delete_status','0');
        if(!empty($institute))
        {
        $this->db->where('lead_institute',$institute);
        }
        
        $this->db->limit($perpage,$page);

        $this->db->order_by('lead_id', 'desc');
        $query = $this->db->get();
        //print_r($query->last_query());exit;
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    function count_leads($institute='')
    {

       $this->db->select('tbl_leads.*,tbl_lead_course.course_id,tbl_lead_course.course_name')->from('tbl_leads');
         $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
        $this->db->where('lead_status','0');
        $this->db->where('lead_delete_status','0');
        if(!empty($institute))
        {
        $this->db->where('lead_institute',$institute);
        }
      return $this->db->count_all_results();
    


    }
     function contacted_lead($type = null)
     {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      $this->db->where('lead_institute',$type);
      $this->db->where('lead_markedas','Contacted');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      //echo $this->db->last_query();exit;
      return $query->result();
     }
        function converted_lead($type = null)
     {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      $this->db->where('lead_institute',$type);
      $this->db->where('lead_markedas','Converted');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      //echo $this->db->last_query();exit;
      return $query->result();
     }
       function closed_lead($type = null)
     {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      $this->db->where('lead_institute',$type);
      $this->db->where('lead_markedas','Closed');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      //echo $this->db->last_query();exit;
      return $query->result();
     }
         function single_faculty($faculty_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_faculty');
        $this->db->where('faculty_id', $faculty_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result() ;
    }
         function single_manager($manager_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_lead_manager');
        $this->db->where('manager_id', $manager_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result() ;
    }
      function single_course($course_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_lead_course');
        $this->db->where('course_id', $course_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result() ;
    }

          function single_lead($lead_id)
    {
        $this->db->select('tbl_leads.*,tbl_faculty.faculty_id,tbl_faculty.faculty_name')->from('tbl_leads');
        $this->db->join('tbl_faculty','tbl_faculty.faculty_id=tbl_leads.lead_faculty', 'left');
        $this->db->where('lead_id', $lead_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
            function single_managers($lead_id)
    {
        $this->db->select('tbl_leads.*,tbl_lead_manager.manager_id,tbl_lead_manager.manager_name')->from('tbl_leads');
        $this->db->join('tbl_lead_manager','tbl_lead_manager.manager_id=tbl_leads.lead_manager', 'left');
        $this->db->where('lead_id', $lead_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result() ;
    }
             function single_courses($lead_id)
    {
        $this->db->select('tbl_leads.*,tbl_lead_course.course_id,tbl_lead_course.course_name')->from('tbl_leads');
        $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
        $this->db->where('lead_id', $lead_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result() ;
    }
    function total_lead()
    {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      return $query->result();
    }
      function edoxi_total_lead()
    {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      $this->db->where('lead_institute','Edoxi Training');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      //echo $this->db->last_query();exit;
      return $query->result();
    }
          function timetraining_total_lead()
    {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      $this->db->where('lead_institute','Time Training');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      return $query->result();
    }
            function timemaster_total_lead()
    {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      $this->db->where('lead_institute','Time Master');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      return $query->result();
    }
          function timeseducation_total_lead()
    {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      $this->db->where('lead_institute','Times Education');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      return $query->result();
    }
      function lead_search($institute,$course,$faculty,$manager,$date,$meeting_date,$lead_mark,$convert_date,$followup_date,$source)
    {
      //echo $month;
      $today=date("Y-m-d");
    $this->db->select('tbl_leads.*,tbl_lead_course.course_id,course_name')->from('tbl_leads');
     $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
     $this->db->where('lead_status',0);
     //$this->db->where('event_end_date>=',$today);
     $this->db->where('lead_delete_status',0);
          if($institute != "")
    {
      $this->db->where('lead_institute',$institute);
    }
       if($course != "")
    {
      $this->db->where('lead_course',$course);
    }
           if($faculty != "")
    {
      $this->db->where('lead_faculty',$faculty);
    }
           if($manager != "")
    {
      $this->db->where('lead_manager',$manager);
    }
     if($source != "")
    {
      $this->db->where('lead_source',$source);
    }
             if($date != "" && $date !='1970-01-01')
    {
      $this->db->where('lead_date',$date);
    }
      if($meeting_date != "" && $meeting_date !='1970-01-01')
    {
      $this->db->where('lead_meeting_date',$meeting_date);
    }
        if($lead_mark != "")
    {
      //$this->db->where('lead_markedas',$lead_mark);
        $this->db->where("lead_markedas IN('$lead_mark')");
    }
                   if($convert_date != "" && $convert_date !='1970-01-01')
    {
      $this->db->where('lead_updated_date',$convert_date);
    }
                 if($followup_date != "" && $followup_date !='1970-01-01')
    {
      $this->db->where('lead_followup_date',$followup_date);
    }
    //  if($month != "")
    // {
    //   $search_type ="MONTH(`tbl_leads`.`lead_date`) = ($month)";
    //   $this->db->where($search_type);
    //   //$this->db->where month('lead_date=',$month);
    // }
    //   if($year != "")
    // {
    //  $search_type ="YEAR(`tbl_leads`.`lead_date`) = ($year)";
    //         $this->db->where($search_type);
    //       }
    // if($daily_date != "" && $daily_date !='1970-01-01')
    // {
    //   $this->db->where('lead_date',$daily_date); 
    // }
    //   if($from_date != "" && $from_date !='1970-01-01')
    // {
    //   $this->db->where('lead_date>=',$from_date); 
    // }
    // if($to_date != "" && $to_date !='1970-01-01')
    // {
    //   $this->db->where('lead_date<=',$to_date); 
    // }
    // $this->db->where('sell_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
    $this->db->order_by('lead_id', 'desc');
     $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->result();
    }
     function lead_search_filter($institute,$course,$faculty,$lead_mark,$manager,$meeting_date,$followup_date,$source,$starting_date='',$ending_date='',$sessName='',$string='',$rowno,$rowperpage)
    {
      //echo $month;
      $today=date("Y-m-d");
    $this->db->select('tbl_leads.*,tbl_lead_course.course_id,course_name')->from('tbl_leads');
     $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
     $this->db->where('lead_status',0);
     //$this->db->where('event_end_date>=',$today);
     $this->db->where('lead_delete_status',0);

       if(!empty($string))
     {
       $this->db->like('lead_name',$string); 
 
      }

     if(!empty($starting_date)&& !empty($ending_date))
     {
       $this->db->where('lead_date>=',$starting_date); 
       $this->db->where('lead_date<=',$ending_date); 
      }
        if(!empty($sessName))
    {
      $this->db->where('lead_institute',$sessName); 
      
    }

          if($institute != "")
    {
      $this->db->where('lead_institute',$institute);
    }
       if($course != "")
    {
      $this->db->where('lead_course',$course);
    }
           if($faculty != "")
    {
      $this->db->where('lead_faculty',$faculty);
    }
           if($manager != "")
    {
      $this->db->where('lead_manager',$manager);
    }
     if($source != "")
    {
      $this->db->where('lead_source',$source);
    }
     /*        if($date != "" && $date !='1970-01-01')
    {
      $this->db->where('lead_date',$date);
    }*/
      if($meeting_date != "" && $meeting_date !='1970-01-01')
    {
      $this->db->where('lead_meeting_date',$meeting_date);
    }
        if($lead_mark != "")
    {
      //$this->db->where('lead_markedas',$lead_mark);
      	$this->db->where("lead_markedas IN('$lead_mark')");
    }
                   /*if($convert_date != "" && $convert_date !='1970-01-01')
    {
      $this->db->where('lead_updated_date',$convert_date);
    }*/
                 if($followup_date != "" && $followup_date !='1970-01-01')
    {
      $this->db->where('lead_followup_date',$followup_date);
    }
      $this->db->limit($rowperpage,$rowno);
    
    $this->db->order_by('lead_id', 'desc');
     $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->result();
    }

     function get_course_ajax($institute)
    {
        $this->db->where('course_institute',$institute);
        $this->db->where('course_status','0');
        $this->db->where('course_delete_status','0');
        $this->db->select('*')->from(' tbl_lead_course');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
          function get_faculty_ajax($institute)
    {
        $this->db->where('faculty_institute',$institute);
        $this->db->where('faculty_status','0');
        $this->db->where('faculty_delete_status','0');
        $this->db->select('*')->from(' tbl_faculty');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
              function get_manager_ajax($institute)
    {
        $this->db->where('manager_institute',$institute);
        $this->db->where('manager_status','0');
        $this->db->where('manager_delete_status','0');
        $this->db->select('*')->from(' tbl_lead_manager');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

function quick_lead($tdvalue,$leadid,$editfield)
{

          if($editfield=='lead_comment'){
    $this->db->update('tbl_leads',array('lead_contact_comment'=>$tdvalue),array('lead_id'=>$leadid));
    //echo $this->db->last_query();exit;
    }
   
    if($editfield=='meeting_date'){
   $this->db->update('tbl_leads',array('lead_meeting_date'=>$tdvalue),array('lead_id'=>$leadid));
  
 }
     if($editfield=='followup_date'){
   $this->db->update('tbl_leads',array('lead_followup_date'=>$tdvalue),array('lead_id'=>$leadid));
  
 }

} 
  
  function update_lead_marked($lead_marked,$leadid,$newdate)
  {
    //$this->db->update('tbl_leads',array('lead_markedas'=>$lead_marked,'lead_updated_date'=>$newdate),array('lead_id'=>$leadid));
     $this->db->update('tbl_leads',array('lead_markedas'=>$lead_marked,'lead_updated_date'=>$newdate,'lead_converted_fee'=>'','lead_meeting_date'=>'','lead_closed_reason'=>'','lead_followup_date'=>''),array('lead_id'=>$leadid));
    //echo $this->db->last_query();
    $afftectedRows = $this->db->affected_rows();
    if($afftectedRows)
    {
    return $lead_marked;
    }
    
  }
     /////quick search laimoon///////
    function quick_lead_search($starting_date,$ending_date,$sessName= null)
    {
      $this->db->select('tbl_leads.*,tbl_lead_course.course_id,course_name')->from('tbl_leads');
      $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
      $this->db->where('lead_status',0);
      $this->db->where('lead_delete_status',0);
               //if(!empty($livalue))
    //{
      $this->db->where('lead_date>=',$starting_date); 
      $this->db->where('lead_date<=',$ending_date); 
    //}
                   if(!empty($sessName))
    {
      $this->db->where('lead_institute',$sessName); 
      
    }
    //       if($livalue== "This Month")
    // {

    //   $this->db->where('lead_date>=',$starting_date); 
    //   $this->db->where('lead_date<=',$ending_date); 
    // }
    //         if($livalue== "Today")
    // {

    //   $this->db->where('lead_date>=',$starting_date); 
    //   $this->db->where('lead_date<=',$ending_date); 
    // }
    //           if($livalue== "Yesterday")
    // {
 
    //   $this->db->where('lead_date>=',$starting_date); 
    //   $this->db->where('lead_date<=',$ending_date); 
    // }
    $this->db->order_by('lead_id', 'desc');
    $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->result();

    }
    /////close quick search laimoon////
            function quick_lead_search1($starting_date,$ending_date,$sessName= null)
    {
      //echo  $svalue;
      $this->db->select('tbl_leads.*,tbl_lead_course.course_id,course_name')->from('tbl_leads');
      $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
      $this->db->where('lead_status',0);
      $this->db->where('lead_delete_status',0);
          
      $this->db->where('lead_updated_date>=',$starting_date); 
      $this->db->where('lead_updated_date<=',$ending_date); 
                         if(!empty($sessName))
    {
      $this->db->where('lead_institute',$sessName); 
      
    }
        $query=$this->db->get();
         $this->db->order_by('lead_id', 'desc');
     //echo $this->db->last_query();exit;
     return $query->result();
    }
                function quick_lead_search2($starting_date,$ending_date,$sessName= null)
    {
      //echo  $svalue;
      $this->db->select('tbl_leads.*,tbl_lead_course.course_id,course_name')->from('tbl_leads');
      $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
      $this->db->where('lead_status',0);
      $this->db->where('lead_delete_status',0);
          
      $this->db->where('lead_followup_date>=',$starting_date); 
      $this->db->where('lead_followup_date<=',$ending_date); 
                         if(!empty($sessName))
    {
      $this->db->where('lead_institute',$sessName); 
      
    }
    $this->db->order_by('lead_id', 'desc');
        $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->result();
    }
      function overview_manager_total($manager,$institute)
     {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      if(!empty($manager))
      {
      $this->db->where('lead_manager',$manager);
      }
       if(!empty($institute))
      {
      $this->db->where('lead_institute',$institute);
      }
      //$this->db->where('lead_markedas','Contacted');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      //echo $this->db->num_rows($query);
      //echo $this->db->mysqli_affected_rows($query);
      //echo $this->db->last_query();exit;
      return $query->num_rows();
     }
        function overview_manager_converted($manager,$institute)
     {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
       if(!empty($manager))
      {
      $this->db->where('lead_manager',$manager);
      }
       if(!empty($institute))
      {
      $this->db->where('lead_institute',$institute);
      }
      $this->db->where('lead_markedas','Converted');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      //echo $this->db->num_rows($query);
      //echo $this->db->mysqli_affected_rows($query);
      //echo $this->db->last_query();exit;
      return $query->num_rows();
     }
             function overview_manager_contacted($manager,$institute)
     {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
       if(!empty($manager))
      {
      $this->db->where('lead_manager',$manager);
      }
       if(!empty($institute))
      {
      $this->db->where('lead_institute',$institute);
      }
      $this->db->where('lead_markedas','Contacted');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      //echo $this->db->num_rows($query);
      //echo $this->db->mysqli_affected_rows($query);
      //echo $this->db->last_query();exit;
      return $query->num_rows();
     }
             function overview_manager_closed($manager,$institute)
     {
      $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status')->from('tbl_leads');
      $this->db->where('lead_status','0');
      $this->db->where('lead_delete_status','0');
      if(!empty($manager))
      {
      $this->db->where('lead_manager',$manager);
      }
       if(!empty($institute))
      {
      $this->db->where('lead_institute',$institute);
      }
      $this->db->where('lead_markedas','Closed');
      $this->db->order_by('lead_id', 'desc');
      $query = $this->db->get();
      //echo $this->db->num_rows($query);
      //echo $this->db->mysqli_affected_rows($query);
      //echo $this->db->last_query();exit;
      return $query->num_rows();
     }
     
       function dashboard_total_lead($starting_date,$ending_date,$livalue)
    {
      $this->db->select('tbl_leads.*,tbl_lead_course.course_id,course_name')->from('tbl_leads');
      $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
      $this->db->where('lead_status',0);
      $this->db->where('lead_delete_status',0);
           if(!empty($livalue))
    {

      $this->db->where('lead_date>=',$starting_date); 
      $this->db->where('lead_date<=',$ending_date); 
    }

    $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->num_rows();

    }
    function dashboard_edoxi_total_lead($starting_date,$ending_date,$livalue)
    {
      $this->db->select('tbl_leads.lead_id,lead_name')->from('tbl_leads');
      $this->db->where('lead_institute','Edoxi Training');
      $this->db->where('lead_status',0);
      $this->db->where('lead_delete_status',0);
           if(!empty($livalue))
    {

      $this->db->where('lead_date>=',$starting_date); 
      $this->db->where('lead_date<=',$ending_date); 
    }

    $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->num_rows();
    }
      function dashboard_timetraining_total_lead($starting_date,$ending_date,$livalue)
    {
      $this->db->select('tbl_leads.lead_id,lead_name')->from('tbl_leads');
      $this->db->where('lead_institute','Time Training');
      $this->db->where('lead_status',0);
      $this->db->where('lead_delete_status',0);
           if(!empty($livalue))
    {

      $this->db->where('lead_date>=',$starting_date); 
      $this->db->where('lead_date<=',$ending_date); 
    }

    $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->num_rows();
    }
        function dashboard_timemaster_total_lead($starting_date,$ending_date,$livalue)
    {
      $this->db->select('tbl_leads.lead_id,lead_name')->from('tbl_leads');
      $this->db->where('lead_institute','Time Master');
      $this->db->where('lead_status',0);
      $this->db->where('lead_delete_status',0);
           if(!empty($livalue))
    {

      $this->db->where('lead_date>=',$starting_date); 
      $this->db->where('lead_date<=',$ending_date); 
    }

    $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->num_rows();
    }
           function dashboard_timeseducation_total_lead($starting_date,$ending_date,$livalue)
    {
      $this->db->select('tbl_leads.lead_id,lead_name')->from('tbl_leads');
      $this->db->where('lead_institute','Times Education');
      $this->db->where('lead_status',0);
      $this->db->where('lead_delete_status',0);
           if(!empty($livalue))
    {

      $this->db->where('lead_date>=',$starting_date); 
      $this->db->where('lead_date<=',$ending_date); 
    }

    $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->num_rows();
    }
    
function display_upcoming_meetingdate()
   {
     $today=date("Y_m-d");
     $fromDate = date("Y-m-d",strtotime("+1 days"));
    $toDate = date("Y-m-d",strtotime("+2 days"));
   $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status,lead_meeting_date,lead_email,lead_mobile,lead_whatsapp,lead_date,lead_institute,lead_added_by,lead_added_person,tbl_lead_manager.manager_id,manager_name,tbl_lead_course.course_id,course_name')->from('tbl_leads');
    //$this->db->join('tbl_user_registration','tbl_user_registration.register_email=tbl_leads.lead_added_person', 'left');
    $this->db->join('tbl_lead_manager','tbl_lead_manager.manager_id=tbl_leads.lead_manager', 'left');
    $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
    $this->db->where('lead_status','0');
    $this->db->where('lead_delete_status','0');
    $this->db->where('lead_meeting_date>=',$today);
    $this->db->where('lead_meeting_date<=',$toDate);
    $this->db->order_by('lead_meeting_date', 'asc');
    $query = $this->db->get();
    //echo $this->db->last_query();exit;
    return $query->result();

   }
       function institute_upcoming_meetingdate($institute)
   {
     $today=date("Y_m-d");
     $fromDate = date("Y-m-d",strtotime("+1 days"));
    $toDate = date("Y-m-d",strtotime("+2 days"));
    $this->db->select('tbl_leads.lead_id,lead_name,lead_status,lead_delete_status,lead_meeting_date,lead_email,lead_mobile,lead_whatsapp,lead_date,lead_institute,lead_added_by,lead_added_person,tbl_lead_manager.manager_id,manager_name,tbl_lead_course.course_id,course_name')->from('tbl_leads');
    //$this->db->join('tbl_user_registration','tbl_user_registration.register_email=tbl_leads.lead_added_person', 'left');
    $this->db->join('tbl_lead_manager','tbl_lead_manager.manager_id=tbl_leads.lead_manager', 'left');
    $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
    $this->db->where('lead_status','0');
    $this->db->where('lead_delete_status','0');
   $this->db->where('lead_meeting_date>=',$today);
    $this->db->where('lead_meeting_date<=',$toDate);
    //$this->db->where('lead_meeting_date',$fromDate);
    $this->db->where('lead_institute',$institute);
    $this->db->order_by('lead_meeting_date', 'asc');
    $query = $this->db->get();
    //echo $this->db->last_query();exit;
    return $query->result();

   }
             function display_leads_by_search($search,$institute ='',$perpage,$page)
    {
        //$this -> db -> select('*');
        //$this -> db -> from('tbl_leads');
        $this->db->select('tbl_leads.*,tbl_lead_course.course_id,tbl_lead_course.course_name')->from('tbl_leads');
        $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
        $this->db->like('lead_source',$search);
        $this->db->where('lead_status','0');
        $this->db->where('lead_delete_status','0');
        if(!empty($institute))
        {
        $this->db->where('lead_institute',$institute);
        }
        
        $this->db->limit($perpage,$page);

        $this->db->order_by('lead_id', 'desc');
        $query = $this->db->get();
        //print_r($query->last_query());exit;
        //echo $this->db->last_query();exit;
        return $query->result();
    }
            function count_leads_search($search,$institute='')
    {

       $this->db->select('tbl_leads.*,tbl_lead_course.course_id,tbl_lead_course.course_name')->from('tbl_leads');
        $this->db->join('tbl_lead_course','tbl_lead_course.course_id=tbl_leads.lead_course', 'left');
        $this->db->like('lead_source',$search);
        $this->db->where('lead_status','0');
        $this->db->where('lead_delete_status','0');
        if(!empty($institute))
        {
        $this->db->where('lead_institute',$institute);
        }
      return $this->db->count_all_results();
    

    }
  
 }?>