<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        //$this->load->model('tbl_category');
        $this->load->model('user_model');
        $this->load->model('tbl_admin_log');
        //$this->load->model('admin_model');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
        $this->load->helper('form');
        $this->load->database();
        
    }
    
    function index()
    {

      $this->tbl_admin_log->start_session();
      if(!$this->tbl_admin_log->is_loggedin())
      {
         
        //$this->load->view('admin/login');
         redirect('admin/home/login');
      }
      else
      {
          redirect('admin/home/admin_dashboard');
        //$this->load->view('admin/login');
      }
    }
     function login()
    {
        $this->tbl_admin_log->start_session();
        if(!$this->tbl_admin_log->is_loggedin())
        {
            $this->load->view('admin/admin-login');
        }
        else
        {
            redirect('admin/home/admin_dashboard');
        }
    }
    function user_login()
    {
      $this->load->view('admin/user-login');
      
    }
    
    function home_page()
    {
      $username=$this->input->post('email'); 
      $password=$this->input->post('password'); 
      //print_r($_POST); 
     $this->tbl_admin_log->start_session(); 
     // echo $this->tbl_admin_log->admin_check($username,$password); exit;
      if($this->tbl_admin_log->admin_check($username,$password))
      {
        
         $admin_id=$this->tbl_admin_log->admin_id;
        if($admin_id>0)
        {
          $this->session->set_userdata('admin_id',$admin_id);
          $this->tbl_admin_log->start_session();
          //echo "hai";
         redirect('admin/home/admin_dashboard');
        }
      }
       else
      { 
        $data['login_status']=1;
        $this->load->view('admin/admin-login',$data);
      }
    }

        function user_home_page()
    {
        
      $username=$this->input->post('email'); 
      $password=$this->input->post('password'); 
      //print_r($_POST); 
     $this->user_model->start_session(); 
     // echo $this->tbl_admin_log->admin_check($username,$password); exit;
      if($this->user_model->user_check($username,$password))
      {
        
         $register_id=$this->user_model->register_id;
         $register_institute=$this->user_model->register_institute;
         $register_username=$this->user_model->register_username;
         $register_email=$this->user_model->register_email;
         
        if($register_id>0)
        {
          $this->session->set_userdata('register_id',$register_id);
          $this->session->set_userdata('register_institute',$register_institute);
          $this->session->set_userdata('register_username',$register_username);
           $this->session->set_userdata('register_email',$register_email);
          $this->user_model->start_session();
          redirect('admin/home/user_dashboard');
        }
      }
      else
      {
        $data['login_status']=1;
        $this->load->view('admin/admin-login',$data);
      }
    }
    function user_view()
    {
      $data["all_users"] = $this->user_model->display_users();
      $this->load->view('admin/view-user',$data);
    }
      function lead_view()
    {
      //$institute=$_SESSION['register_institute'];
      if(!empty($_SESSION['register_institute']))
      {
         $data["all_course"]=$this->user_model->display_institute_course($_SESSION['register_institute']);
        $data["all_faculty"]=$this->user_model->display_institute_faculty($_SESSION['register_institute']);
        $data["all_manager"]=$this->user_model->display_institute_manager($_SESSION['register_institute']);
         $config = array();
        $config['base_url'] = base_url('admin/home/lead_view');
        $config['total_rows'] = $this->user_model->count_leads($_SESSION['register_institute']);
        $config['first_link'] = 'First';
        $config['per_page'] = 50;
        $config['uri_segment'] = 4;
          $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item ">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item ">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        
        


      $this->pagination->initialize($config);

     $page =($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data['links'] = $this->pagination->create_links();
   
         $data["all_leads"] = $this->user_model->display_leads($_SESSION['register_institute'],$config['per_page'],$page);
      }
      else
      {

        $data["all_course"] = $this->user_model->display_course();
        //print_r($data["all_course"]);exit;
        $data["all_faculty"] = $this->user_model->display_faculty();
        $data["all_manager"] = $this->user_model->display_manager();

        $config = array();
        $config['base_url'] = base_url('admin/home/lead_view');
        $config['total_rows'] = $this->user_model->count_leads();
       
        $config['per_page'] = 50;
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item ">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item ">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        


      $this->pagination->initialize($config);

     $page =($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data['links'] = $this->pagination->create_links();
   
     $data["all_leads"] = $this->user_model->display_leads('',$config['per_page'],$page);

    //print_r($data["all_leads"]);exit;

       
      }
      $this->load->view('admin/view-lead',$data);
    }


        function export_view()
    {
      if(empty($_SESSION['register_institute']))
      {
          $data["all_course"] = $this->user_model->display_course();
         $data["all_faculty"] = $this->user_model->display_faculty();
         $data["all_manager"] = $this->user_model->display_manager();
         
        $config = array();
        $config['base_url'] = base_url('admin/home/export_view');
        $config['total_rows'] = $this->user_model->count_leads();
       
        $config['per_page'] = 100;
        $config['uri_segment'] = 4;
         $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item ">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item ">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        


      $this->pagination->initialize($config);

     $page =($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data['links'] = $this->pagination->create_links();
   
     $data["all_leads"] = $this->user_model->display_leads('',$config['per_page'],$page);

      }
      else{


         $data["all_course"] = $this->user_model->display_course();
         $data["all_faculty"] = $this->user_model->display_faculty();
         $data["all_manager"] = $this->user_model->display_manager();
         
        $config = array();
        $config['base_url'] = base_url('admin/home/export_view');
        $config['total_rows'] = $this->user_model->count_leads($_SESSION['register_institute']);
       
        $config['per_page'] = 100;
        $config['uri_segment'] = 4;
         $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item ">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item ">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        


      $this->pagination->initialize($config);

     $page =($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data['links'] = $this->pagination->create_links();
   
     $data["all_leads"] = $this->user_model->display_leads($_SESSION['register_institute'],$config['per_page'],$page);


      }
      $this->load->view('admin/export-lead',$data);
    }
    
    
function search_lead_by_source()
   {

             if(empty($_SESSION['register_institute'])&&empty($_SESSION['admin_id']))
      {
         redirect('admin/home/login');
      }

    else{
     
     $temp=$this->input->get('search');
     
       $temp2=explode("/",$temp);
       
       $search=$temp2[0];
       //print_r($this->uri->segment(3));exit;
      
      if(empty($_SESSION['register_institute']))
      {
          /*$data["all_course"] = $this->user_model->display_course();
         $data["all_faculty"] = $this->user_model->display_faculty();
         $data["all_manager"] = $this->user_model->display_manager();*/
        
         
        $config = array();
        $config['base_url'] = base_url('admin/home/search_lead_by_source?search=').$search;
        $config['total_rows'] = $this->user_model->count_leads_search($search);
        $config['page_query_string']=TRUE;
       
        $config['per_page'] = 50;
        $config['uri_segment'] = 4;
         $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item ">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item ">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        


      $this->pagination->initialize($config);

     $page =($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data['links'] = $this->pagination->create_links();
   
     $data["all_leads"] = $this->user_model->display_leads_by_search($search,'',$config['per_page'],$page);

      }
      else{


        /* $data["all_course"] = $this->user_model->display_course();
         $data["all_faculty"] = $this->user_model->display_faculty();
         $data["all_manager"] = $this->user_model->display_manager();*/
         
        $config = array();
        $config['base_url'] =base_url('admin/home/search_lead_by_source?search=').$search;
        $config['total_rows'] = $this->user_model->count_leads_search($search,$_SESSION['register_institute']);
        $config['page_query_string']=TRUE;
        $config['per_page'] = 50;
        $config['uri_segment'] = 4;
         $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item ">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item ">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        


      $this->pagination->initialize($config);

     $page =($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data['links'] = $this->pagination->create_links();
   
     $data["all_leads"] = $this->user_model->display_leads_by_search($search,$_SESSION['register_institute'],$config['per_page'],$page);


      }
      //redirect('admin/home/search_lead_by_source?search=$search');
      $this->load->view('admin/export-lead',$data);
    }

   } 
    
    
    
    
    
    
    
    
    
      function faculty_view()
    {
      $data["all_faculty"] = $this->user_model->display_faculty();
      //print_r($data["all_faculty"]);exit;
      $this->load->view('admin/view-faculty',$data);
    }
       function manager_view()
    {
      $data["all_manager"] = $this->user_model->display_manager();
      //print_r($data["all_faculty"]);exit;
      $this->load->view('admin/view-manager',$data);
    }
       function course_view()
    {
       if(!empty($_SESSION['register_institute']))
      {
      $data["all_course"] = $this->user_model->display_course($_SESSION['register_institute']);
      }
      else
      {
         $data["all_course"] = $this->user_model->display_course();
      }
      $this->load->view('admin/view-course',$data);
    }
      function add_lead()
    {
      //$this->tbl_admin_log->start_session(); 
      if(!empty((@$_SESSION['register_institute'])))
      {
        $data["all_course"]=$this->user_model->display_institute_course($_SESSION['register_institute']);
        $data["all_faculty"]=$this->user_model->display_institute_faculty($_SESSION['register_institute']);
        $data["all_manager"]=$this->user_model->display_institute_manager($_SESSION['register_institute']);
      }
      else
      {
      $data["all_course"] = $this->user_model->display_course();
      $data["all_faculty"] = $this->user_model->display_faculty();
      $data["all_manager"] = $this->user_model->display_manager();
      }
      $this->load->view('admin/add-lead',$data);
    }
        function add_faculty()
    {
      $this->load->view('admin/add-faculty');
    }
      function add_lead_manager()
    {
      $this->load->view('admin/add-lead-manager');
    }
         function add_lead_course()
    {
      $this->load->view('admin/add-lead-course');
    }
    function user_register()
     {
      $this->tbl_admin_log->start_session();
      if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }
       $this->load->view('admin/user_register');
     }
      function admin_dashboard()
     {
          $this->tbl_admin_log->start_session();
      if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      } 
       $data['total_lead']=$this->user_model->total_lead();
       $data['edoxi_total_lead']=$this->user_model->edoxi_total_lead();
       $data['timetraining_total_lead']=$this->user_model->timetraining_total_lead();
       $data['timemaster_total_lead']=$this->user_model->timemaster_total_lead();
       $data['timeseducation_total_lead']=$this->user_model->timeseducation_total_lead();
       $data['count']=count($data['total_lead']);
       $data['edoxi_count']=count($data['edoxi_total_lead']);
       $data['timetraining_count']=count($data['timetraining_total_lead']);
       $data['timemaster_count']=count($data['timemaster_total_lead']);
       $data['timeseducation_count']=count($data['timeseducation_total_lead']);
       $data["all_manager"] = $this->user_model->display_manager();
        $data["upcoming_meetingdate"]=$this->user_model->display_upcoming_meetingdate();
       $this->load->view('admin/dashboard',$data);
      
     }
      function user_dashboard()
     {
       
     if(!empty($_SESSION['register_institute']))
     {
                            
       //$data['total_lead']=$this->user_model->total_lead();
       //$data['count']=count($data['total_lead']);
       $data['edoxi_total_lead']=$this->user_model->edoxi_total_lead();
       $data['timetraining_total_lead']=$this->user_model->timetraining_total_lead();
       $data['timemaster_total_lead']=$this->user_model->timemaster_total_lead();
       $data['timeseducation_total_lead']=$this->user_model->timeseducation_total_lead();
       $data['contacted_lead']=$this->user_model->contacted_lead($_SESSION['register_institute']);
       $data['converted_lead']=$this->user_model->converted_lead($_SESSION['register_institute']);
       $data['closed_lead']=$this->user_model->closed_lead($_SESSION['register_institute']);
       $data['timetraining_count']=count($data['timetraining_total_lead']);
       $data['timemaster_count']=count($data['timemaster_total_lead']);
       $data['timeseducation_count']=count($data['timeseducation_total_lead']);
       // /print_r($data['timetraining_count']);exit;
       $data['edoxi_count']=count($data['edoxi_total_lead']);
       $data['contacted_lead']=count($data['contacted_lead']);
       $data['converted_lead']=count($data['converted_lead']);
       $data['closed_lead']=count($data['closed_lead']);
       //echo $data['edoxi_count'];exit;
       $data["institute_upcoming_meetingdate"]=$this->user_model->institute_upcoming_meetingdate($_SESSION['register_institute']);
       $this->load->view('admin/user_dashboard',$data);
     }
     else{
          redirect('admin/home/login');
     }
     }
     function register_add()
     {
      $this->tbl_admin_log->start_session();
      if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }
      //$register_date=date('Y-m-d');
       $this->user_model->register_institute = $this->input->post('institute');
       $this->user_model->register_username = $this->input->post('name');
       $this->user_model->register_email = $this->input->post('email');
       $register_password=$this->user_model->register_password = $this->input->post('password');
       $hash = password_hash($register_password, PASSWORD_DEFAULT);
        $this->user_model->register_password = $hash;
        //$this->user_model->register_date = $register_date;
        $register_id=$this->user_model->insert_register();
        $this->session->set_userdata('register_id',$register_id);
        //$this->session->set_userdata('register_name',$register_username);
        $this->user_model->start_session(); 
        //$this->load->view('admin/user_register');
        redirect('admin/home/user_view');
     }
     function faculty_add()
     {
       /*if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }*/
      $this->user_model->faculty_institute=$this->input->post('faculty_institute');
      $this->user_model->faculty_name=$this->input->post('faculty_name');
      $this->user_model->insert();
      $this->session->set_flashdata('message', 'Faculty Added Successfully');
      redirect('admin/home/add_faculty');

     }
        function manager_add()
     {
       /*if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }*/
      $this->user_model->manager_institute=$this->input->post('manager_institute');
      $this->user_model->manager_name=$this->input->post('manager_name');
      $this->user_model->insert_manager();
      $this->session->set_flashdata('message', 'Manager Added Successfully');
      redirect('admin/home/add_lead_manager');
     }
          function course_add()
     {
       /*if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }*/
      $this->user_model->course_institute=$this->input->post('course_institute');
      $this->user_model->course_name=$this->input->post('course_name');
      $this->user_model->insert_course();
      $this->session->set_flashdata('message', 'Course Added Successfully');
      redirect('admin/home/add_lead_course');
     }
          function faculty_update()
     {
       /*if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }*/
      $faculty_id=$this->input->post('faculty_id');
      $this->user_model->faculty_institute=$this->input->post('faculty_institute');
      $this->user_model->faculty_name=$this->input->post('faculty_name');
      $this->user_model->update_faculty($faculty_id);
      $this->session->set_flashdata('message', 'Faculty Updated Successfully');
      redirect('admin/home/faculty_view');
     }
           function manager_update()
     {
       /*if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }*/
      $manager_id=$this->input->post('manager_id');
      $this->user_model->manager_institute=$this->input->post('manager_institute');
      $this->user_model->manager_name=$this->input->post('manager_name');
      $this->user_model->update_manager($manager_id);
      $this->session->set_flashdata('message', 'Manager Updated Successfully');
      redirect('admin/home/manager_view');
     }
            function course_update()
     {
       /*if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }*/
      $course_id=$this->input->post('course_id');
      $this->user_model->course_institute=$this->input->post('course_institute');
      $this->user_model->course_name=$this->input->post('course_name');
      $this->user_model->update_course($course_id);
      $this->session->set_flashdata('message', 'Course Updated Successfully');
      redirect('admin/home/course_view');
     }
            function lead_update()
     {
       /*if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }*/
      $date=date('Y-m-d');
      $lead_id=$this->input->post('lead_id');
      $this->user_model->lead_institute=$this->input->post('institute');
      $this->user_model->lead_date = date("Y-m-d",strtotime($this->input->post('date')));
      $this->user_model->lead_name = $this->input->post('name');
      $this->user_model->lead_email = $this->input->post('email');
      $this->user_model->lead_mobile = $this->input->post('mobile');
      $this->user_model->lead_whatsapp = $this->input->post('whatsapp');
      $this->user_model->lead_source = $this->input->post('source');
      $this->user_model->lead_course = $this->input->post('course');
      $this->user_model->lead_faculty = $this->input->post('faculty');
      $this->user_model->lead_place = $this->input->post('place');
      $this->user_model->lead_manager = $this->input->post('lead_manager');
      $this->user_model->lead_markedas = $this->input->post('lead_marked');
      $this->user_model->lead_closed_reason = $this->input->post('closed_reason');
      $this->user_model->lead_contact_comment = $this->input->post('comment');
      $this->user_model->lead_meeting_date = $this->input->post('meeting_date');
      $this->user_model->lead_converted_fee = $this->input->post('fees');
      $this->user_model->lead_followup_date = $this->input->post('followup_date');
      //$this->user_model->lead_contact_note1 = $this->input->post('note1');
      //$this->user_model->lead_contact_note2 = $this->input->post('note2');
      //$this->user_model->lead_contact_note3 = $this->input->post('note3');
      $this->user_model->lead_updated_date = $date;
      $this->user_model->update_lead($lead_id);
      $this->session->set_flashdata('message', 'Lead Updated Successfully');
      redirect('admin/home/lead_view');
     }

      /////faculty delete/////
    function faculty_delete()
    {
        // $this->admin->start_session();
        // if(!$this->admin->is_loggedin())
        // {
        //   redirect('admin/home/login');
        // }
        $this->user_model->faculty_delete_status = 1;
        $faculty_id=$this->input->post('faculty_id');
        $this->user_model->delete_faculty($faculty_id);
        $this->session->set_flashdata('message', 'Faculty deleted successfully');
        redirect('admin/home/faculty_view');
    }
    /////close faculty delete/////
          /////manager delete/////
    function manager_delete()
    {
        // $this->admin->start_session();
        // if(!$this->admin->is_loggedin())
        // {
        //   redirect('admin/home/login');
        // }
        $this->user_model->manager_delete_status = 1;
        $manager_id=$this->input->post('manager_id');
        $this->user_model->delete_manager($manager_id);
        $this->session->set_flashdata('message', 'Manager deleted successfully');
        redirect('admin/home/manager_view');
    }
    /////close manager delete/////
               /////manager delete/////
    function course_delete()
    {
        // $this->admin->start_session();
        // if(!$this->admin->is_loggedin())
        // {
        //   redirect('admin/home/login');
        // }
        $this->user_model->course_delete_status = 1;
        $course_id=$this->input->post('course_id');
        $this->user_model->delete_course($course_id);
        $this->session->set_flashdata('message', 'Course deleted successfully');
        redirect('admin/home/course_view');
    }
    /////close manager delete/////   
    function lead_delete()
    {
        // $this->admin->start_session();
        // if(!$this->admin->is_loggedin())
        // {
        //   redirect('admin/home/login');
        // }
        $this->user_model->lead_delete_status = 1;
        $lead_id=$this->input->post('lead_id');
        $this->user_model->delete_lead($lead_id);
        $this->session->set_flashdata('message', 'Lead deleted successfully');
        redirect('admin/home/lead_view');
    }
    /////close faculty delete/////
             /////user delete/////

    function user_edit($id)
    {
       
       $this->tbl_admin_log->start_session();
      if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }

      $data['details']= $this->user_model->get_user($id);

       $this->load->view('admin/edit_user',$data);

    }
    function user_edit_submit($id)
    {
       
       $this->tbl_admin_log->start_session();
      if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }
      
      $data=array('register_institute' =>$this->input->post('institute'),
      'register_username'=>$this->input->post('name'),
      'register_email'=>$this->input->post('email') );
    
       
       $this->user_model->edit_user_data($data,$id);

      $this->session->set_flashdata('message', 'Edited successfully');

       redirect('admin/home/user_view');
    }
    

    function reset_user_password($id)
    {
       
       $this->tbl_admin_log->start_session();
      if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }

      $data['id']= $id;

       $this->load->view('admin/reset_password',$data);

    }
    function reset_password_submit()
    {
       
       $this->tbl_admin_log->start_session();
      if(!$this->tbl_admin_log->is_loggedin())
      {
        redirect('admin/home/login');
      }
        $id=$this->input->post('id');
       $register_password= $this->input->post('password');
    
       $hash = password_hash($register_password, PASSWORD_DEFAULT);
        $this->user_model->reset_password($hash,$id);
         $this->session->set_flashdata('message', 'Password Reset successfully');

       redirect('admin/home/user_view');
    }
    function user_delete()
    {
        // $this->admin->start_session();
        // if(!$this->admin->is_loggedin())
        // {
        //   redirect('admin/home/login');
        // }
        $this->user_model->register_delete_status = 1;
        $user_id=$this->input->post('register_id');
        $this->user_model->delete_user($user_id);
        $this->session->set_flashdata('message', 'User deleted successfully');
        redirect('admin/home/user_view');
    }
    /////close user delete/////
     function lead_add()
     {
      if(!empty($_SESSION['register_institute']))
      {
        $this->user_model->lead_added_by = $_SESSION['register_institute'];
         $this->user_model->lead_added_person = $this->input->post('lead_added_person');
      }
      
      $this->user_model->lead_institute = $this->input->post('institute');
      $this->user_model->lead_date = date("Y-m-d",strtotime($this->input->post('date')));
      $this->user_model->lead_name = $this->input->post('name');
      $this->user_model->lead_email = $this->input->post('email');
      $this->user_model->lead_mobile = $this->input->post('mobile');
      $this->user_model->lead_whatsapp = $this->input->post('whatsapp');
      $this->user_model->lead_source = $this->input->post('source');
      $this->user_model->lead_course = $this->input->post('course');
      $this->user_model->lead_faculty = $this->input->post('faculty');
      $this->user_model->lead_place = $this->input->post('place');
      $this->user_model->lead_manager = $this->input->post('lead_manager');
      $this->user_model->insert_lead();
       $this->session->set_flashdata('message', 'Lead added successfully');
      redirect('admin/home/add_lead');
     }
       function faculty_edit($faculty_id)
    {
        //   $this->tbl_admin_log->start_session();
        // if(!$this->tbl_admin_log->is_loggedin())
        // {
        //   redirect('admin/home/login');
        // }
         $data["single_faculty"]= $this->user_model->single_faculty($faculty_id);
         $this->load->view('admin/update-faculty',$data);
       }
          function manager_edit($manager_id)
    {
        //   $this->tbl_admin_log->start_session();
        // if(!$this->tbl_admin_log->is_loggedin())
        // {
        //   redirect('admin/home/login');
        // }
         $data["single_manager"]= $this->user_model->single_manager($manager_id);
         //print_r($data["single_manager"]);
         $this->load->view('admin/update-manager',$data);
       }
              function course_edit($course_id)
    {
        //   $this->tbl_admin_log->start_session();
        // if(!$this->tbl_admin_log->is_loggedin())
        // {
        //   redirect('admin/home/login');
        // }
         $data["single_course"]= $this->user_model->single_course($course_id);
         //print_r($data["single_manager"]);
         $this->load->view('admin/update-course',$data);
       }
      function lead_edit($lead_id)
     {
        //   $this->tbl_admin_log->start_session();
        // if(!$this->tbl_admin_log->is_loggedin())
        // {
        //   redirect('admin/home/login');
        // }
         $data["single_lead"]= $this->user_model->single_lead($lead_id);
         $data["single_courses"]= $this->user_model->single_courses($lead_id);
         $data["single_managers"]= $this->user_model->single_managers($lead_id);
         //print_r($data["single_managers"]);exit;
         $data["all_faculty"] = $this->user_model->display_faculty();
         $data["all_manager"] = $this->user_model->display_manager();
         $data["all_course"] = $this->user_model->display_course();
         //print_r($data["single_lead"]);exit;
         $this->load->view('admin/update-lead',$data);
       }
       function admin_logout()
       {
        $this->tbl_admin_log->start_session();
       $this->session->sess_destroy();
       redirect('admin/home/login');
       }
     function user_logout()
    {

       $this->tbl_admin_log->start_session();
       $this->session->sess_destroy();
    //    if(!$this->tbl_admin_log->is_loggedin())
    //   {
    //   redirect('admin/product/index');
    // }
     // $this->session->unset_userdata('register_id');
     // $this->session->unset_userdata('register_username');
     // $this->session->unset_userdata('register_email');
    redirect('admin/home/login');
    }

    public function lead_marked()
    {
      $marked_type=$this->input->post('data');
      $response='';
       $fieldHTML='';

         if($marked_type=='Contacted')
{
        $fieldHTML .= '  <div class="form-group has-success">
                                                <label class="control-label">followup_date</label>
                                                <input type="date" id="date_picker1" name="followup_date" class="form-control" placeholder="dd/mm/yyyy" value="'.date('m/d/Y').'"> 
                                                </div>';
        $fieldHTML .= '  <div class="form-group has-success">
                                                <label class="control-label">Meeting Date</label>
                                                <input type="date" id="date_picker1" name="meeting_date" class="form-control" placeholder="dd/mm/yyyy" value="'.date('m/d/Y').'"> 
                                                </div>';
       
        }
   
        $response['fieldHTML'] = $fieldHTML;
        echo json_encode($response);
    }

 function search_lead()
 {
  //echo "hai";exit;
  $institute=$this->input->post('institute');
  $course=$this->input->post('lead_course');
  $faculty=$this->input->post('lead_faculty');
  $manager=$this->input->post('lead_manager');
  $date=date("Y-m-d",strtotime($this->input->post('lead_date')));
  $meeting_date=date("Y-m-d",strtotime($this->input->post('lead_meeting_date')));
  $lead_mark=$this->input->post('lead_mark');
  //$daily_date=date("Y-m-d",strtotime($this->input->post('daily')));
  //$month = $this->input->post('month');
  //$year = $this->input->post('year');
  //$from_date=date("Y-m-d",strtotime($this->input->post('from_date')));
  //$to_date=date("Y-m-d",strtotime($this->input->post('to_date')));
  $convert_date=date("Y-m-d",strtotime($this->input->post('lead_converted_date')));
   $followup_date=date("Y-m-d",strtotime($this->input->post('lead_followup_date')));
  $data['all_leads'] = $this->user_model->lead_search($institute,$course,$faculty,$manager,$date,$meeting_date,$lead_mark,$convert_date,$followup_date);
  //print_r($data['all_leads']);exit;
  $data['search_count']=count($data['all_leads']);
  $data["all_course"] = $this->user_model->display_course();
  $data["all_faculty"] = $this->user_model->display_faculty();
  $data["all_manager"] = $this->user_model->display_manager();
  $this->load->view('admin/view-lead',$data);
 }



  function search_lead_quick()
 {
   //print_r($_POST);exit;
  $institute=$this->input->post('institute');
  $course=$this->input->post('lead_course');
  $faculty=$this->input->post('lead_faculty');
  $manager=$this->input->post('lead_manager');
  $source=$this->input->post('source');
  $temp=$this->input->post('lead_date');
  $sessName=$this->input->post('sessName');
  $string=$this->input->post('search');
  $record  =$this->input->post('page');


  $starting_date='';
  $ending_date='';

   if(!empty($temp))
   {
  list($starting_date, $ending_date) = explode(",", $temp, 2);
    }
  //$date=date("Y-m-d",strtotime($this->input->post('lead_date')));
  $meeting_date=date("Y-m-d",strtotime($this->input->post('lead_meeting_date')));
  //$lead_mark=$this->input->post('lead_mark');
  //$convert_date=date("Y-m-d",strtotime($this->input->post('lead_converted_date')));
  $followup_date=date("Y-m-d",strtotime($this->input->post('lead_followup_date')));
   //$lead_mark = implode("','",$this->input->post('lead_mark'));
   $type =$this->input->post('lead_mark');
   $lead_mark ='';
    if(!empty($type))
  {
   $lead_mark = implode("','",$type);
  }

    $recordPerPage=50;

       if($record != 0)
       {
      $record = ($record-1) * $recordPerPage;
        }  

      $data['all_leads'] = $this->user_model->lead_search_filter($institute,$course,$faculty,@$lead_mark,$manager,$meeting_date,$followup_date,$source,$starting_date,$ending_date,$sessName,$string,$record,$recordPerPage);
   if(empty($data['all_leads']))
    {echo json_encode('end');}
       else{
        echo json_encode($data['all_leads']);
       }
   
 }

     function course_ajax()
  {
    $institute=$this->input->post('institute');
    $data['course_ajax']=$this->user_model->get_course_ajax($institute);
    $data['faculty_ajax']=$this->user_model->get_faculty_ajax($institute);
    $data['manager_ajax']=$this->user_model->get_manager_ajax($institute);
    echo json_encode($data);
    //echo json_encode($data1);
  }
     function lead_quick()
  {
     $tdvalue=$this->input->post('tdvalue');
     $leadid=$this->input->post('leadid');
     $editfield=$this->input->post('editfield');
    $data=$this->user_model->quick_lead($tdvalue,$leadid,$editfield);

  }
 function change_lead_marked()
  {
     $lead_marked=$this->input->post('lead_marked');
    $leadid=$this->input->post('leadid');
    //$newdate=$this->input->post('newdate');
    $newdate=date("Y-m-d");
    $data=$this->user_model->update_lead_marked($lead_marked,$leadid,$newdate);
     echo json_encode($data);
  }

    function quick_search()
  {

     $a=$this->input->post('reportrange');
    list($starting_date, $ending_date) = explode(",", $a, 2);
    //echo $starting_date;
    //echo $ending_date;
      //$livalue=$this->input->post('lvalue');
      $sessName=$this->input->post('sessName');
    $data['all_leads'] = $this->user_model->quick_lead_search($starting_date,$ending_date,$sessName);
    echo json_encode($data['all_leads'] );
    //print_r($data['all_leads']);exit;
  //   $data['search_count']=count($data['all_leads']);
  //  $data["all_course"] = $this->user_model->display_course();
  // $data["all_faculty"] = $this->user_model->display_faculty();
  // $data["all_manager"] = $this->user_model->display_manager();
  //$this->load->view('admin/quick_view',$data);
  }
          function quick_search1()
  {

     $a=$this->input->post('reportrange');
    list($starting_date, $ending_date) = explode(",", $a, 2);
   
      $sessName=$this->input->post('sessName');
    $data['all_leads'] = $this->user_model->quick_lead_search1($starting_date,$ending_date,$sessName);
    echo json_encode($data['all_leads'] );
   
  }
            function quick_search2()
  {

     $a=$this->input->post('reportrange');
    list($starting_date, $ending_date) = explode(",", $a, 2);
   
      $sessName=$this->input->post('sessName');
    $data['all_leads'] = $this->user_model->quick_lead_search2($starting_date,$ending_date,$sessName);
    echo json_encode($data['all_leads'] );
   
  }
     function overview_manager()
  {
     $manager=$this->input->post('lead_manager');
     $institute=$this->input->post('institute');
    //exit;
    $data['manager_total_lead']=$this->user_model->overview_manager_total($manager,$institute);
     $data['manager_conv_lead']=$this->user_model->overview_manager_converted($manager,$institute);
      $data['manager_contact_lead']=$this->user_model->overview_manager_contacted($manager,$institute);
      $data['manager_close_lead']=$this->user_model->overview_manager_closed($manager,$institute);
    echo json_encode($data);
   //print_r($data['manager_overview']);exit;

  }
    function dashboard_date_search()
  {

     $a=$this->input->post('reportrange');
    list($starting_date, $ending_date) = explode(",", $a, 2);
       $livalue=$this->input->post('lvalue');
     
    $count['all_leads_count'] = $this->user_model->dashboard_total_lead($starting_date,$ending_date,$livalue);
    $count['all_leads_edoxi_count']= $this->user_model->dashboard_edoxi_total_lead($starting_date,$ending_date,$livalue);
    $count['all_leads_timetraining_count']= $this->user_model->dashboard_timetraining_total_lead($starting_date,$ending_date,$livalue);
    $count['all_leads_timemaster_count']= $this->user_model->dashboard_timemaster_total_lead($starting_date,$ending_date,$livalue);
    $count['all_leads_timeseducation_count']= $this->user_model->dashboard_timeseducation_total_lead($starting_date,$ending_date,$livalue);
    echo json_encode($count);

  }
    public function database_backup(){
    $this->load->dbutil();
    $db_format=array('format'=>'zip','filename'=>'edoxidubai_edoxisoftware');
    $backup=$this->dbutil->backup($db_format);
    $dbname='backup-on-'.date('Y-m-d').'.zip';
    $save='assets/db_backup/'.$dbname;
    write_file($save,$backup);
    //exit;
    force_download($dbname,$backup);
  }
}
