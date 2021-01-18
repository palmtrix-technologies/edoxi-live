<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sendmail extends CI_Controller {
    function __construct(){

        parent::__construct();

		$this->load->model('main_model', 'mainmodel');
    }


    public function send_attachments()
    {

        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $type=$_POST['typename'];
        $id=$_POST['Id'];
        $data2 = array(
            'resource_type' => $type,
            'resource_id' => $id,
            'Name' =>$name,
            'Email' => $email,
            'Phone' => $phone
        );  
            $result= $this->mainmodel->add_resource_log($data2);

        if( $type=="broucher")
        {
            $data = $this->mainmodel->getbrocherdetails_byid($id);

          
            
            $subject="Edoxi ".$data->course_name." Training Broucher";
            $message="Hi ".$name.",</br>".$data->Email_content;

            

            $attched_file= $_SERVER["DOCUMENT_ROOT"]."/admin/assets/img/brouchers/".$data->Broucher_file;
    
            $this->sendEmail($email,$subject,$message,$attched_file);
            $messge="Broucher sent successfully please check your mail attachment";
            // $this->session->keep_flashdata('Message',$messge);
            // redirect($_POST['actual_link']);  
        }
        else if($type=="whitepaper"){

            $data = $this->mainmodel->get_whitepaperdetails_byid($id);
            
            $subject=$data->Whitepaper_name." Whitepaper";
            $message="Hi ".$name.",</br>".$data->Email_content;
            $attched_file= $_SERVER["DOCUMENT_ROOT"]."/admin/assets/img/whitpaper/".$data->Whitepaper_file;
         
    
            $this->sendEmail($email,$subject,$message,$attched_file);
             
        }
        

        
        
    }

    
public function sendEmail($email,$subject,$message,$attched_file)
    {

       


    $config = Array(
      'protocol' => 'mail',
      'smtp_host' => 'mail.palmtrix.app',
      'smtp_port' => 587,
      'smtp_user' => 'demo@palmtrix.app', 
      'smtp_pass' => '#38Palmtrix', 
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );


          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('info@edoxitraining.com');
          $this->email->to($email);
          $this->email->subject($subject);
          $this->email->message($message);
          $this->email->attach($attched_file);
          if($this->email->send())
         {
          $messge="white paper mail sent successfully please check your mail attachment";
            // $this->session->keep_flashdata('Message',$messge);
            redirect($_POST['actual_link']);
         }
         else
        {
         show_error($this->email->print_debugger());
        }

    }

    public function Sendenquirymail()
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $code=$_POST['countrycode'];
        $phone=$_POST['phone'];
        $type=$_POST['eng_type'];
        $Course_Name=$_POST['interest'];
        $message=$_POST['message'];
        $comapny=$_POST['companyname'];
        $data2 = array(
            'Enq_Type' => $type,
            'Name' => $name,
            'Mobile' =>$phone,
            'Email' =>$email,
            'Course_Name' => $Course_Name,
            'Description' =>$message,
            'Company_name' => $comapny
        );  
        $result= $this->mainmodel->add_enquiry_log($data2);
        $messages = '
            <table style="border: solid black 1px;" cellpadding="10">
                <tr>
                <th>Enquiry Type </th><th>'.$type.'</th>
                </tr>
                <tr>
                <th>Name </th><th>'.$name.'</th>
                </tr>
                <tr>
                <th>Mobile </th><th>'.$phone.'</th>
                </tr>
                <tr>
                <th>Email </th><th>'.$email.'</th>
                </tr>
                <tr>
                <th>Course Name </th><th>'.$Course_Name.'</th>
                </tr>
                <tr>
                <th>Message  </th><th>'.$message.'</th>
                </tr>
                <tr>
                <th>Company name </th><th>'.$comapny.'</th>
                </tr>
                <tr>
                <th>Enquiry Date time </th><th>'.date("Y-m-d h:i:sa").'</th>
                </tr>
            </table>';
        $this->sendEmail_withoutattachment("New Enquiry -".$type,$messages);
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $result["datas"]=$data2;
        $result["page"]="";
        // $this->load->view('includes/header',$result);
        $this->load->view('enquiry-success');
        if($type=="contact")
        {
            $this->load->view('form-messages/contact-us-success', $result);
        }
        else if($type=="call-back"){
           
            $this->load->view('form-messages/request-callback-success', $result);
           
        }

        else if($type=="corporate-booking"){
            $this->load->view('form-messages/request-consultation-success', $result);
        }

        else if($type=="upcoming-course"){
            $this->load->view('form-messages/request-course-success', $result);
            
        }
        else {
            $this->load->view('form-messages/corporate-enquiry-success', $result);
        }
        
        // $this->load->view('includes/footer');
        
            
    }

    public function sendEmail_withoutattachment($subject,$message)
    {

       


    $config = Array(
      'protocol' => 'mail',
      'smtp_host' => 'mail.edoxitraining.com',
      'smtp_port' => 587,
      'smtp_user' => 'info@edoxitraining.com', 
      'smtp_pass' => '#38Palmtrix', 
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );


          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('enquiry@edoxitraining.com');
          $this->email->to('info@edoxitraining.com');
          $this->email->subject($subject);
          $this->email->message($message);
          if($this->email->send())
          {
             $messge="white paper mail sent successfully please check your mail attachment";
            //     // $this->session->keep_flashdata('Message',$messge);
            //     redirect($_POST['actual_link']);
        }
         else
        {
         show_error($this->email->print_debugger());
        }

    }

	
}
