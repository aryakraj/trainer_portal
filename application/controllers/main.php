<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    /*


 ****
  //    ****
 // *@author:REMYA R
 // * @link    http:'http://localhost/trainerport/'
 // * Alignment checks and unit testing for this project.
 // * @date:06/03/2021
     
****
    */

  
  //    ****
 // *
 // * @function:dashboard
 // * @function:loading admindashboard
 // * @author  Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021

    // admin dashboard
 		public function dashboard()
		{
			if($_SESSION['usertype']=='2' && $_SESSION['logged_in']==true)
        	{
				$this->load->view('dashboard');
			}
			else
			{
				 redirect(base_url().'main/index');
			}
		}

  //    ****
 // *
 // * @function:reg
 // * @function:loading mastertrainer registeration
 // * @author  Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****
   
    //trainer Registration
    public function reg()
		{
			if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
			{
				$this->load->view('reg');
			}
			else
			{
				 redirect(base_url().'main/index');
			}
		}

//    ****

 // *
 // * @function:masterdashboard
 // * @function:loading masterdashboard
 // * @author  Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021

//      ****
		public function masterdashboard()
		{
			if($_SESSION['usertype']=='0' && $_SESSION['logged_in']==true)
			{
				$this->load->view('masterdashboard');
			}
			else
			{
				 redirect(base_url().'main/index');
			}
		}
 //     ****
 
 // * @function:masterreg
 // * @function:loading registeration
 // * @author  Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****
   	public function masterreg()
		{
			if($_SESSION['usertype']=='0' && $_SESSION['logged_in']==true)
			{
				$this->load->view('masterreg');
			}
			else
			{
				 redirect(base_url().'main/index');
			}
		}
//    ****

 // *
 // * @function:trainerprofile
 // * @function:loading trainerdashboard
 // * @author  Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021 
 //      ****
	 public function trainerprofile()
		{
		  if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
       		 {
       			$this->load->view('trainerdashboard');
			  }
			else
			{
				 redirect(base_url().'main/index');
			}
		}
 

     //    ****
 //// *
 // * @ UI design $ connection : Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     //    ****
 // *
 // * @function:trainerprofile
 // * @function:loading trainer profile
 // * @author  Anjali krishnan
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****
   
//trainer profile update
    public function trainerprofile()
    {
        if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
        {
        
            $this->load->model('mainmodel');
            $id=$this->session->id;
            $data['user_data']=$this->mainmodel->updateform($id);
            $this->load->view('trainerprofile',$data);
        }
        else
        {
             redirect(base_url().'main/index');
        }

    }

 //    ****
 // *
 // * @function:updatedetails1
 // * @function:updating the trainer profile
 // * @author  Anjali krishnan
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
 //      ****

//trainer profile updates
    public function updatedetails1()
    {
        if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
        {
            $a=array("fname"=>$this->input->post("fname"),
            "lname"=>$this->input->post("lname"),
            "address"=>$this->input->post("address"),
            "district"=>$this->input->post("district"),
            "gender"=>$this->input->post("gender"),
            "qualification"=>$this->input->post("qualification"),
            "number"=>$this->input->post("number"),
            "email"=>$this->input->post("email"),
            "subjects"=>$this->input->post("subjects"),
            "experience"=>$this->input->post("experience"),
            "adhar"=>$this->input->post("adhar"));
            $this->load->model('mainmodel');

            if($this->input->post("update"))
            {
                $id=$this->session->id;
                $this->mainmodel->updates($a,$id);
                redirect('main/trainerprofile','refresh');
            }
        }
        else
        {
             redirect(base_url().'main/index');
        }
    }
 //    ****
 // *
 // * @function:index
 // * @function:loading loginpage
 // * @author  Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****
    public function index()
        {    
            $this->load->view('index');
        }

//****
  //    ****
 // *
 // * @function:logins
 // * @function:loading logins
 // * @author  Arya k Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****
     public function logins()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');
                $email=$this->input->post("email");
                $pass=$this->input->post("password");

                $rslt=$this->mainmodel->select($email,$pass);
             
                if($rslt)
                {
                    $id=$this->mainmodel->getuserid($email);
                    $user=$this->mainmodel->getuser($id);
                    $this->load->library(array('session'));
                    $this->session->set_userdata(array('id'=>(int)$user->id,'status'=>$user->status,'usertype'=>$user->usertype,'logged_in'=>(bool)true));
                    if($_SESSION['status']=='0' && $_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
                    {
                                redirect(base_url().'main/trainerdashboard');
                    }
                    else if($_SESSION['status']=='0' && $_SESSION['usertype']=='0' && $_SESSION['logged_in']==true)
                    {
                            redirect(base_url().'main/masterdashboard');
                    }
                    else if($_SESSION['status']=='0' && $_SESSION['usertype']=='2' && $_SESSION['logged_in']==true)
                    {
                            redirect(base_url().'main/dashboard');
                    }
                   else
                    {
                        echo "Waiting for Approval";
                    }
                }
                    else
                    {
                         redirect(base_url().'main/logins');
                        
                    }
                }
            else
            {
                redirect('main/strlogin','refresh');
            }
        }
  
     //    ****
  //    ****
 // *
 // * @function:Approve
 // * @function:loading leave approve
 // * @author  Arya k Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****    

     // Approve the user
    public function approve()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
            $this->load->model('mainmodel');
            $id=$this->uri->segment(3);
            $this->mainmodel->approve($id);
            redirect('main/nview','refresh');
        }
        else
            {
                redirect('main/index','refresh');
            }
    }  
//     ****
 // *
 // * @function:Reject
 // * @function:loading leave reject
 // * @author  Arya k Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
     //    ****
 
   

    //Reject the user
    public function reject()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
            $this->load->model('mainmodel');
            $id=$this->uri->segment(3);
            $this->mainmodel->reject($id);
            redirect('main/nview','refresh');
        }
        else
            {
                redirect('main/index','refresh');
            }

    }  
    //// *
 // * @ UI design $ connection : Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     //    ****
 // *
 // * @function:add_traview
 // * @function:loading trainer view
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****

    //view Trainers By Admin

    public function add_traview()
    {    
        $this->load->view('add_traview');
    }

     //    ****
 // *
 // * @function:trainer_registration
 // * @function:loading trainer registeration
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****

    //Add Trainers By Admin
    public function trainer_registration()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("fname","fname",'required');
            $this->form_validation->set_rules("lname","lname",'required');
            $this->form_validation->set_rules("address","address",'required');
            $this->form_validation->set_rules("district","district",'required');
            $this->form_validation->set_rules("gender","gender",'required');
            $this->form_validation->set_rules("qualification","qualification",'required');
            $this->form_validation->set_rules("number","number",'required');
            $this->form_validation->set_rules("email","email",'required');
            $this->form_validation->set_rules("subjects","subjects",'required');
            $this->form_validation->set_rules("experience","experience",'required');
            $this->form_validation->set_rules("adhar","adhar",'required');
            $this->form_validation->set_rules("password","password",'required');
            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');
                $pass=$this->input->post("password");
                $encpass=$this->mainmodel->encpswd($pass);
                $a=array("fname"=>$this->input->post("fname"),
                    "lname"=>$this->input->post("lname"),
                    "address"=>$this->input->post("address"),
                    "district"=>$this->input->post("district"),
                    "gender"=>$this->input->post("gender"),
                    "qualification"=>$this->input->post("qualification"),
                    "number"=>$this->input->post("number"),
                    "email"=>$this->input->post("email"),
                    "subjects"=>$this->input->post("subjects"),
                    "experience"=>$this->input->post("experience"),
                    "adhar"=>$this->input->post("adhar"),
                    "password"=>$this->input->post("password"));
                    $b=array("email"=>$this->input->post("email"),
                    "password"=>$encpass,"usertype"=>'1');
                    $this->mainmodel->inreg($a,$b);  
                    redirect(base_url().'main/masterreg');
            }
        else
        {
            irect(base_url().'main/index');
        }
    }
    }

     //// *
 // * @ UI design $ connection : Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     //    ****
 // *
 // * @function:user_view
 // * @function:loading trainer view
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****

    //view Trainer Details
     public function user_view()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->views();
            $this->load->view('views',$data);
        }
        else
        {
             redirect(base_url().'main/index');
        }
    }
     //    ****
 // *
 // * @function:deletedetails
 // * @function:delete trainer account
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****

    //Delete Trainers Details
     public function deletedetails()
    {  
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {  
            $this->load->model('mainmodel');
            $id=$this->uri->segment(3);
            $this->mainmodel->deletesdetails($id);
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }
    //// *
 // * @ UI design $ connection : Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     //    ****
 // *
 // * @function:add_course
 // * @function:adding cousre
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****

    //Add Course Details
    public function add_course()
    {
        $this->load->view('addcourse');
    }
     //    ****
 // *
 // * @function:add_courses
 // * @function:adding cousre
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****

    //Add Course Details
    public function add_courses()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("batch","batch",'required');
            $this->form_validation->set_rules("name","name",'required');
            $this->form_validation->set_rules("subjects","subjects",'required');
            $this->form_validation->set_rules("hour","hour",'required');
            $this->form_validation->set_rules("day","day",'required');
           
            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');

                $a=array("batch"=>$this->input->post("batch"),
                        "name"=>$this->input->post("name"),
                        "subjects"=>$this->input->post("subjects"),
                        "hour"=>$this->input->post("hour"),
                       "day"=>$this->input->post("day"));
                $this->mainmodel->addcourse($a);
            redirect(base_url().'main/add_course');
            }   
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }    
 // * @ UI design $ connection : Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     //    ****
 // *
 // * @function:leave_req
 // * @function:request leave
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
 //      ****

    //Trainers Leave Request
    public function leave_req()
    {
        if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->nviews();
            $this->load->view('leave',$data);
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }
      //    ****
 // *
 // * @function:leave_req
 // * @function:loading request leave
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****
    //Leave ADD
    public function add_leave()
    {
        if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("name","name",'required');
            $this->form_validation->set_rules("cdate","cdate",'required');
            $this->form_validation->set_rules("ldate","ldate",'required');
            $this->form_validation->set_rules("reason","reason",'required');
            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');
                $a=array("name"=>$this->input->post("name"),
                        "cdate"=>$this->input->post("cdate"),
                        "ldate"=>$this->input->post("ldate"),
                       "reason"=>$this->input->post("reason"));
                $this->mainmodel->leave($a);
                redirect(base_url().'main/leave_req');
            }
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }
 //    ****
 // * @function:notification view
 // * @function:view leave nofication
 // * @author  Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
 //      ****

    //Admin View Leave Request
    public function nview()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->nview();
            $this->load->view('viewleave',$data);
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }
//    ****
 // * @function:complaince
 // * @function:Request for complaince
 // * @author  Remya R
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****
    //***************Complaince
     public function complaint()
    {
        if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
        {
             $this->load->view('complaince');
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }
    //    ****
 // * @function:new
 // * @function:loading adding complaince
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
     
 //      ****

    //insert complaint
    public function new()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("tname","Teacher Name",'required');
            $this->form_validation->set_rules("sname","Student Name",'required');
            $this->form_validation->set_rules("batch","Batch Name",'required');
            $this->form_validation->set_rules("grievance","Grievance",'required');
           
            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');
                $a=array("tname"=>$this->input->post("tname"),
                        "sname"=>$this->input->post("sname"),
                        "batch"=>$this->input->post("batch"),
                       "grievance"=>$this->input->post("grievance"));
                $this->mainmodel->complaint($a);
                redirect(base_url().'main/leave_req');
            }
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }

     //// *
 // * @ UI design $ connection : Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
 //    ****
 // *
 // * @function:dailyreport
 // * @function:adding dailyreport
 // * @author  Anjali Krishnan
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
 //      ****
   
    public function dailyreport()
    {
        $this->load->view('dailyreport');
    }
//    ****
 // *
 // * @function:dailyreport
 // * @function:adding dailyreport
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:05/03/2021
 //      ****
   

public function report_action()
{
    if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("batch","batch",'required');
        $this->form_validation->set_rules("date","date",'required');
        $this->form_validation->set_rules("day","day",'required');
        $this->form_validation->set_rules("subject","subject",'required');
        $this->form_validation->set_rules("thr","thr",'required');
       
            $this->load->model('mainmodel');

            $a=array("batch"=>$this->input->post("batch"),
            "date"=>$this->input->post("date"),
            "day"=>$this->input->post("day"),
            "subject"=>$this->input->post("subject"),
            "thr"=>$this->input->post("thr"));
            $this->mainmodel->report($a);

            $hr=$this->input->post("thr");
            $sub=$this->input->post("subject");
            if($sub =='domain')
            {
                $q=$this->mainmodel->domain($hr);
               
            }
            else if($sub =='it')
            {
                $q=$this->mainmodel->it($hr);
               
            }
            else if($sub =='english')
            {
                $q=$this->mainmodel->english($hr);
               
            }
            else if($sub =='ss')
            {
                $q=$this->mainmodel->ss($hr);
               
            }
            else if($sub =='ojt')
            {
                $q=$this->mainmodel->ojt($hr);
               
            }
            $this->mainmodel->total($hr);
            redirect(base_url().'main/dailyreport');
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }


     //// *
 // * @ UI design $ connection : Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
     
 //    ****
 // *
 // * @function:reportview
 // * @function:view dailyreport
 // * @author  Anjali Krishnan
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
 //      ****

    public function reportview()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->reportview();
            $this->load->view('reportview',$data);
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }

   /****
 // *
 // * @function:course_details
 // * @function:load course details view page
 // * @author  Anjali Krishnan
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
      ****/

    public function course_details()
    {
        $this->load->view('course_details');
    }

  /****
 // *
 // * @function:course_action
 // * @function:add course details 
 // * @author  Anjali Krishnan
 // * @link    http:'http://localhost/trainerport/'
 // * @date:04/03/2021
      ****/
public function course_action()
{
     if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("name","name",'required');
            $this->form_validation->set_rules("batch","batch",'required');
            $this->form_validation->set_rules("course","course",'required');
            $this->form_validation->set_rules("hours","hours",'required');

            if($this->form_validation->run())
            {

                $this->load->model('mainmodel');

                $a=array("name"=>$this->input->post("name"),
                "batch"=>$this->input->post("batch"),
                "course"=>$this->input->post("course"),
                "hours"=>$this->input->post("hours"));
                $this->mainmodel->coure_action($a);
                redirect(base_url().'main/course_details');

            }
        }
        else
        {
            redirect(base_url().'main/index');
        }
}
//// *
 // * @ UI design $ connection : Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:05/03/2021
     
 //    ****
 // *
 // * @function:notification
 // * @function:add notification
 // * @author  Anjali Krishnan
 // * @link    http:'http://localhost/trainerport/'
 // * @date:05/03/2021
 //      ****

//notification
public function notification()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0
            ')
        {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->trainersname();
        $this->load->view('notification',$data);
        }
        else
        {
            redirect(base_url().'main/index');
        }
       
    }
    
 // *
 // * @function:notify_action
 // * @function:load notification
 // * @author  Anjali Krishnan
 // * @link    http:'http://localhost/trainerport/'
 // * @date:05/03/2021
 //      ****
    public function notify_action()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("fname","fname",'required');
            $this->form_validation->set_rules("batch","batch",'required');
            $this->form_validation->set_rules("message","message",'required');

            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');

                $n=array("fname"=>$this->input->post("fname"),
                    "notification"=>$this->input->post("message"),
                    "id"=>$this->input->post("tid"));
                $this->mainmodel->notifymodel($n);
                redirect('main/notification','refresh');
            }
        }
        else
        {
            redirect(base_url().'main/index');
        }  
    }
//// *
 // * @ UI design $ connection : Radhika L
 // * @link    http:'http://localhost/trainerport/'
 // * @date:05/03/2021
     
 //    ****
 // *
 // * @function:trainer_noti
 // * @function:view notification
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:05/03/2021
 //      ****
    public function trainer_noti()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->trainer_noti();
            $this->load->view('notify_table_view',$data);
        }
        else
        {
            redirect(base_url().'main/index');
        }  
    }

    //    ****
 // *
 // * @function:users_view
 // * @function:View User Details By Master Trainer
 // * @author  Arya K Raj
 // * @link    http:'http://localhost/trainerport/'
 // * @date:06/03/2021
 //      ****

    public function users_view()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->viewss();
            $this->load->view('viewss',$data);
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }

    //    ****
     // *
     // * @function:users_view
     // * @function:View User Details By Master Trainer
     // * @author  Arya K Raj
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    //View Complaints By Master Trainee
    public function comp_view()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->compview();
            $this->load->view('viewcomplaints',$data);
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }
        //    ****
     // *
     // * @function:approvecom
     // * @function:Approve or Rejects Trainers Complaints
     // * @author  Arya K Raj
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    public function approvecom()
    {
         if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
            $this->load->model('mainmodel');
            $id=$this->uri->segment(3);
            $this->mainmodel->approvecom($id);
            redirect('main/comp_view','refresh');
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }   
    //Reject the user 
    public function rejectcom()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
            $this->load->model('mainmodel');
            $id=$this->uri->segment(3);
            $this->mainmodel->rejectcom($id);
            redirect('main/comp_view','refresh');
        }
        else
        {
            redirect(base_url().'main/index');
        }
    }
    //    ****
     // *
     // * @function:complaint_status
     // * @function:Complaint Status 
     // * @author  Arya K Raj
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    public function complaint_status()
    {
         if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->compstatus();
            $this->load->view('complaince',$data); 
        }
        else
        {
            redirect(base_url().'main/index');
        }  
    }

        //    ****
     // *
     // * @function:totalhour
     // * @function:View Total Hours(Admin)  
     // * @author  Arya K Raj
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
     public function totalhour()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
            $this->load->model('mainmodel');
            $data['nt']=$this->mainmodel->totalhour();
            $data['nr']=$this->mainmodel->remhour();
            $data['dr']=$this->mainmodel->dduremhour();
            $this->load->view('totalhour',$data);
        }
        else
        {
            redirect(base_url().'main/index');
        }   
    }
    //    ****
     // *
     // * @function:totalhour
     // * @function:View Total Hours  
     // * @author  Arya K Raj
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    public function totalhours()
    {

        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
            $this->load->model('mainmodel');
            $data['nt']=$this->mainmodel->totalhour();
            $data['nr']=$this->mainmodel->remhour();
            $data['dr']=$this->mainmodel->dduremhour();
            $this->load->view('totalhours',$data); 
        }
         else
        {
            redirect(base_url().'main/index');
        }  
    }

    //    ****
     // *
     // * @function:traine_remains
     // * @function:View Remaining Hours(Admin)  
     // * @author  Arya K Raj
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
     public function traine_remains()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {   
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->traineremains();
            $this->load->view('traineremains',$data);
        }
        else
        {
             redirect(base_url().'main/index');
        }   
    }

    //    ****
     // *
     // * @function:warning_view
     // * @function:View Warning Message  
     // * @author  Arya K Raj
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    public function warning_view()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->warning();
            $this->load->view('warning',$data);   
        }
        else
        {
             redirect(base_url().'main/index');
        }
    }

    //    ****
     // *
     // * @function:chart
     // * @function:Create Chart
     // * @author  REMYA R
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    
    //View Chart
    public function chart()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->chart();
            $this->load->view('chart',$data);  
        }
        else
        {
             redirect(base_url().'main/index');
        } 
    }

     //    ****
     // *
     // * @function:charts
     // * @function:View Chart (for  Master Trainer)
     // * @author  REMYA R
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****

     public function charts()
    {
         if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
            $this->load->model('mainmodel');
            $data['n']=$this->mainmodel->charts();
            $this->load->view('charts',$data);  
        }
        else
        {
             redirect(base_url().'main/index');
        } 
    }

     //    ****
     // *
     // * @function:admin_det
     // * @function:View Admin Details 
     // * @author  ARYA K RAJ
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    //Admin View details in his databoard

    public function admin_det()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
            $this->load->model('mainmodel');
            $data['user_data']=$this->mainmodel->admindet();
            $this->load->view('admindet',$data);
        }
         else
        {
             redirect(base_url().'main/index');
        }    
    }
    //    ****
     // *
     // * @function:email_sending
     // * @function:Email sending 
     // * @author  ARYA K RAJ
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    //Admin View details in his databoard
      //Email sending view page
    public function email_sending()
    {
        $this->load->view('sendmail');
    }
    //    ****
     // *
     // * @function:send
     // * @function:Email Sending
     // * @author  ARYA K RAJ
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    public function send()
    {
            $to =  $this->input->post('from');  // User email pass here
            $subject = 'Welcome To Elevenstech';
            $from = 'abc123@gmail.com';              // Pass here your mail id

            $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
            $emailContent .='<tr><td style="height:20px"></td></tr>';
            $emailContent .= $this->input->post('message');  //   Post message available here
            $emailContent .='<tr><td style="height:20px"></td></tr>';
            $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";
                        
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '60';

            $config['smtp_user']    = 'abc@gmail.com';    //Important
            $config['smtp_pass']    = '';  //Important

            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not 

             

            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($emailContent);
            $this->email->send();

            $this->session->set_flashdata('msg',"Mail has been sent successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            return redirect('main/success');
    }
    //    ****
     // *
     // * @function:success
     // * @function:To print Email Success Meassage
     // * @author  ARYA K RAJ
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    public function success()
    {
        $this->load->view('success');
    }
        //    ****
     // *
     // * @function:logout
     // * @function:Logout
     // * @author  ARYA K RAJ
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****
    function logout()
    {
        $user_data = $this->session->all_userdata();
            foreach ($user_data as $key => $value) 
            {
                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') 
                {
                    $this->session->unset_userdata($key);
                }
            }
        $this->session->sess_destroy();
        redirect(base_url().'main/index');
    }

   
}
