<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
  
  public function __construct()
  {
  	parent::__construct();
  	$this->load->library('form_validation');
  	$this->load->model('mess_model');
  }

  public function index()
  {
  	$this->load->view("view_home");
  }

  public function login()
  {
  	$this->load->view("view_login");
  }

  public function login_data()
  {
  	if($this->input->get_post("submit"))
  	{
  		$this->form_validation->set_rules("username","Username","trim|required|min_length[5]|max_length[15]");
  		$this->form_validation->set_rules("password","Password","trim|required|min_length[5]|max_length[15]");
  		if($this->form_validation->run()==FALSE)
  		{
  			$this->load->view("view_login");
  		}
  		else
  		{
  			$data["username"]=$this->input->get_post("username");
  			$data["password"]=$this->input->get_post("password");

  			$result=$this->mess_model->check_login($data);

  			if($result != FALSE)
  			{
  				$session_user =  array('username' =>$this->input->get_post('username'),
				                       'password'=>$this->input->get_post('password'),
				                       );
  				$this->session->set_userdata("logged_in",$session_user);

  				if($result['type']=="admin")
  				{
  					redirect('http://localhost/mess/home/admin','refresh');


  				}
  				else if($result['type']=='member')
  				{
  					redirect('http://localhost/mess/home/member','refresh');
  				}
  				else
  				{
  					$error['msg'] = "Invalid Type";
  					$this->load->view("view_login",$error);
  				}
  			}else
  			{
  				$error['msg']="Wrong Username or Password";
				$this->load->view('view_login',$error);
  			}

  		}
  	}
  }

  public function admin()
  {
  	if($this->session->userdata('logged_in'))
     {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $data['password'] = $session_data['password'];
       
     // $this->load->view('view_admin_nav',$data); 
      $this->load->view('view_admin',$data);
     

     }
     else
     {
     	$this->login();
     }
  }

  public function member()
  {
  	if($this->session->userdata('logged_in'))
     {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $data['password'] = $session_data['password'];
       
      $this->load->view('view_member',$data);

     }
     else
     {
     	$this->login();
     }
  }

  public function add_member()
  {
  	if($this->session->userdata('logged_in'))
    {
  	   $this->load->view('view_add_member');
  	}
  	else
  	{
  		$this->login();
  	}
  }

  public function add_member_data()
  {
  	if($this->input->get_post("submit"))
  	{
  	 $this->form_validation->set_rules("username","Username","trim|required|min_length[5]|max_length[15]");
  	  $this->form_validation->set_rules("fullname","Fullname","trim|required|max_length[30]");
  	 $this->form_validation->set_rules("email","Email","trim|required|valid_email");
  	 $this->form_validation->set_rules("password","Password","trim|required|min_length[5]|max_length[15]");
  	 $this->form_validation->set_rules("repassword","Re-Password","trim|required|matches[password]");
  	 $this->form_validation->set_rules("mobile","Mobile","trim|required|numeric|min_length[11]|max_length[11]");
  	}
  	if($this->form_validation->run()==FALSE)
  	{
        $this->load->view('view_add_member');
  	}
  	else
  	{
  		$data["username"]=$this->input->get_post("username");
  		$data["fullname"]=$this->input->get_post("fullname");
  		$data["email"]=$this->input->get_post("email");
  		$data["password"]=$this->input->get_post("password");
  		$data["mobile"]=$this->input->get_post("mobile");
  		$this->mess_model->insert_member($data);
  		
  	}
  }

  public function check_username($str)
  {
		$username=$this->mess_model->check_username($str);
		if($username==TRUE)
		{
          echo "username already exists";
		}
		else{
			//echo "Its ok";

		}
  }

/*...............................member list construction..................................*/

public function member_list()
{
  if($this->session->userdata('logged_in'))
    {
       $member_list['info']=$this->mess_model->member_list();
       $this->parser->parse('view_member_list',$member_list);
    }
    else
    {
      $this->login();
    }
}


public function member_details($check)
{
  if($this->session->userdata('logged_in'))
    {
      //$check=$this->input->get_post("id");
      // echo $check;
      $result = $this->mess_model->member_details($check);
      $this->parser->parse('view_member_details',$result);
    }
    else
    {
      $this->login();
    }

}



/*...............................member list construction end..................................*/
  public function member_profile()
  {
    if($this->session->userdata('logged_in'))
    {
       $session_data = $this->session->userdata('logged_in');
       $data['username'] = $session_data['username'];
       $profile = $this->mess_model->member_profile($data);
       $this->parser->parse('view_member_profile',$profile);
    }
    else
    {
      $this->login();
    }
  }

  public function edit_member_profile()
  {

    if($this->session->userdata('logged_in'))
    {
       $session_data = $this->session->userdata('logged_in');
       $data['username'] = $session_data['username'];
       $profile = $this->mess_model->member_profile($data);
       $this->parser->parse('view_edit_member_profile',$profile);
    }
    else
    {
      $this->login();
    }
  }

  public function edit_member_info()
  {

    if($this->input->get_post('submit'))
    {
      $this->form_validation->set_rules('fullname',"Fullname","trim|required|max_length[30]");
      $this->form_validation->set_rules('email',"Email","trim|required|valid_email");
      $this->form_validation->set_rules('mobile',"Mobile Number","trim|required|max_length[11]|min_length[11]|numeric");
    }
    if($this->form_validation->run()==FAlSE)
    {
      $this-> edit_member_profile();
    }
    else
    {
      $data['username'] = $this->input->get_post('username');
      $data['fullname'] = $this->input->get_post('fullname');
      $data['email'] = $this->input->get_post('email');
      $data['mobile'] = $this->input->get_post('mobile');
      //$session_data = $this->session->userdata('logged_in');
      //$data['username'] = $session_data['username'];
     $this->mess_model->edit_member_info($data);

    }
  }

  public function meal_booking()
  {
    if($this->session->userdata('logged_in'))
    {
      date_default_timezone_set('Asia/Dhaka');
      $meal['date'] = date('Y-m-d');
      $session_data = $this->session->userdata('logged_in');
      $meal['username'] = $session_data['username'];
      $meal_status = $this->mess_model->check_meal($meal);
      if($meal_status != FALSE)
      {
        $this->parser->parse('view_meal_status',$meal_status);
      }
      else
      {
        $this->load->view('view_meal_booking');
      }
     
    }
    else
    {
      $this->login();
    }
  }

  public function meal_booking_info()
  {
    if($this->input->get_post('submit'))
    {
      date_default_timezone_set('Asia/Dhaka');
      $meal['date'] = date('Y-m-d');
      $hour = date("G");
      //echo $hour;
      if($hour<=9)
      {

      $meal['breakfast'] = $this->input->get_post('breakfast');
      $meal['lunch'] = $this->input->get_post('lunch');
      $meal['dinner'] = $this->input->get_post('dinner');
      date_default_timezone_set('Asia/Dhaka');
      $meal['date'] = date('Y-m-d');
      $session_data = $this->session->userdata('logged_in');
      $meal['username'] = $session_data['username'];

      $this->mess_model->meal_insert($meal);
      //echo "complete";
      }

      else if($hour<=13 && $hour>=9)
      {
      $meal['breakfast'] = 0;
      $meal['lunch'] = $this->input->get_post('lunch');
      $meal['dinner'] = $this->input->get_post('dinner');
      date_default_timezone_set('Asia/Dhaka');
      $meal['date'] = date('Y-m-d');
      $session_data = $this->session->userdata('logged_in');
      $meal['username'] = $session_data['username'];
      $this->mess_model->meal_insert($meal);
      //echo "complete";
      }
      else if($hour<=21 && $hour>=13)
      {
      $meal['breakfast'] = 0;
      $meal['lunch'] = 0;
      $meal['dinner'] = $this->input->get_post('dinner');
      date_default_timezone_set('Asia/Dhaka');
      $meal['date'] = date('Y-m-d');
      $session_data = $this->session->userdata('logged_in');
      $meal['username'] = $session_data['username'];
      $this->mess_model->meal_insert($meal);
      //echo "complete";

      }
      else
      {
        echo "not possible";
      }

      //echo $hour;

    }
  }

  public function meal_update()
  {
    if($this->input->get_post('submit'))
    {
      date_default_timezone_set('Asia/Dhaka');
      $meal['date'] = date('Y-m-d');
      $hour = date("G");

      if($hour<=9)
      {

      $meal['breakfast'] = $this->input->get_post('breakfast');
      $meal['lunch'] = $this->input->get_post('lunch');
      $meal['dinner'] = $this->input->get_post('dinner');
      date_default_timezone_set('Asia/Dhaka');
      $meal['date'] = date('Y-m-d');
      $session_data = $this->session->userdata('logged_in');
      $meal['username'] = $session_data['username'];

      $this->mess_model->meal_update_slot1($meal);
     // echo "complete";
      }

      else if($hour<=13 && $hour>=9)
      {
      //$meal['breakfast'] = 0;
      date_default_timezone_set('Asia/Dhaka');
      $meal['date'] = date('Y-m-d');
      $session_data = $this->session->userdata('logged_in');
      $meal['username'] = $session_data['username'];
      $meal_status = $this->mess_model->check_meal($meal);
      if($meal_status != FALSE)
      {
        $meal['breakfast']  = $meal_status['breakfast'];
        //echo $meal['breakfast'] ;
        $meal['lunch'] = $this->input->get_post('lunch');
        $meal['dinner'] = $this->input->get_post('dinner');

        date_default_timezone_set('Asia/Dhaka');
        $meal['date'] = date('Y-m-d');
        $session_data = $this->session->userdata('logged_in');
        $meal['username'] = $session_data['username'];
        $this->mess_model->meal_update_slot2($meal);
      }
      else
      {
        $this->load->view('view_meal_booking');
      }
     
      }
      else if($hour<=20 && $hour>=13)
      {
        date_default_timezone_set('Asia/Dhaka');
      $meal['date'] = date('Y-m-d');
      $session_data = $this->session->userdata('logged_in');
      $meal['username'] = $session_data['username'];
      $meal_status = $this->mess_model->check_meal($meal);
      if($meal_status != FALSE)
      {
        $meal['breakfast']  = $meal_status['breakfast'];
        //echo $meal['breakfast'] ;
        $meal['lunch'] = $meal_status['lunch'];
        $meal['dinner'] = $this->input->get_post('dinner');
        date_default_timezone_set('Asia/Dhaka');
        $meal['date'] = date('Y-m-d');
        $session_data = $this->session->userdata('logged_in');
        $meal['username'] = $session_data['username'];
        $this->mess_model->meal_update_slot3($meal);
      }
      else
      {
        $this->load->view('view_meal_booking');
      }
     
      }
      else
      {
        echo "not possible";
      }

    }
  }

  public function member_list_meal()
  {
    $this->load->view('view_member_list_meal');
  }

  public function member_list_info_meal($str)
  {
    //echo $str;
    date_default_timezone_set('Asia/Dhaka');
    $date = date('Y-m-d');
    $member['list'] = $this->mess_model->member_list_for_meal($str,$date);
    if( $member['list']==FALSE)
    {
       echo "No information";
    }
    else
    {
      $this->parser->parse('view_member_list_info_meal',$member);

    }
    //$this->parser->parse('view_member_list_info_meal',$member);

  }

 
  //sisir

  public function shopping(){
    //$this->load->view('view_shopping');
    if($this->session->userdata('logged_in'))
    {
      date_default_timezone_set('Asia/Dhaka');
      $shop['date'] = date('Y-m-d');
      $session_data = $this->session->userdata('logged_in');
      $shop['username'] = $session_data['username'];
      $shop_status = $this->mess_model->check_shopping($shop);
      if($shop_status != FALSE)
      {
        $this->parser->parse('view_shopping_status',$shop_status);
      }
      else
      {
        $this->load->view('view_shopping');
      }
     
    }
    else
    {
      $this->login();
    }

  }


  public function add_shopping()
  {

    if($this->input->get_post('shopvalue')){
      $this->form_validation->set_rules("value","Value","trim|required|min_length[1]|max_length[4]|numeric|greater_than[0.99]");
      if($this->form_validation->run()==FALSE){
        $this->load->view("view_shopping");

      }
      else{
        $shop['value']=$this->input->get_post("value");
        date_default_timezone_set('Asia/Dhaka');
        $shop['date'] = date('Y-m-d');
        $session_data = $this->session->userdata('logged_in');
        $shop['username'] = $session_data['username'];
        $this->mess_model->add_shopping($shop);

      }
      
    }
  
  }

  public function shopping_update()
  {
    if($this->input->get_post('submit'))
    {
      date_default_timezone_set('Asia/Dhaka');
      $shop['date'] = date('Y-m-d');
      $shop['value'] = $this->input->get_post('value');
      $session_data = $this->session->userdata('logged_in');
      $shop['username'] = $session_data['username'];
      $this->mess_model-> shopping_update($shop);
    }

  }


  public function personal_shoplist()
  {
     if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $list['username'] = $session_data['username'];

      $shop_list['list']=$this->mess_model->personal_shoplist($list);
      $this->parser->parse('view_shop_list_personal',$shop_list);
        
     
    }
    else
    {
      $this->login();
    }

   }

   public function members_shoplist()
   {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $list['username'] = $session_data['username'];
      $shop_list['list']=$this->mess_model->members_shoplist($list);
      $this->parser->parse('view_shop_list_members',$shop_list);
        
     
    }
    else
    {
      $this->login();
    }

   }

    //sisir
  public function history()
  {
    /*$session_data = $this->session->userdata('logged_in');
    $list['username'] = $session_data['username'];
    if($list['username']=='admin')
    {
      $his['history']=$this->mess_model->meal_history();
      $this->parser->parse('view_history_homepage_admin',$his); 
    }
    else{
      $his['history']=$this->mess_model->meal_history();
      $this->parser->parse('view_history_homepage',$his);

    }*/
     $his['history']=$this->mess_model->meal_history();
      $this->parser->parse('view_history_homepage',$his);
  }

  public function history_admin()
  {

    if($this->session->userdata('logged_in'))
    {
     $his['history']=$this->mess_model->meal_history();
      $this->parser->parse('view_history_homepage_admin',$his);

    }
    else
    {
       $this->login();

    }
  }

  //sisir

  public function shopping_history()
  {

    $session_data = $this->session->userdata('logged_in');
    $list['username'] = $session_data['username'];
    if($list['username']=='admin')
    {
    $s_history['info'] = $this->mess_model->shopping_history();
    $this->parser->parse('view_shopping_history_info_admin',$s_history);
    }
    else
    {

    $s_history['info'] = $this->mess_model->shopping_history();
    $this->parser->parse('view_shopping_history_info',$s_history);
    }

  }
//........................paid history new.....................
  public function paid_history()
  {
    $session_data = $this->session->userdata('logged_in');
    $list['username'] = $session_data['username'];
    if($list['username']=='admin')
    {
      $paid['info'] = $this->mess_model->paid_history();
      $this->parser->parse('view_paid_history_info_admin',$paid);
    }
    else
    {
      $paid['info'] = $this->mess_model->paid_history();
      $this->parser->parse('view_paid_history_info_member',$paid);
    }
  }
    public function current_month_status_member(){
      
              if($this->session->userdata('logged_in'))
    {
          $session_data = $this->session->userdata('logged_in');
          $list['username'] = $session_data['username'];
          $res=$this->mess_model->current_month_status();
          $res['rate']=$res['total_valuee']/$res['total_meall'];
         // $res['shop']=$this->mess_model->paid_history();
         // $res['meal']=$this->mess_model->meal_history();
          $res['current']=$this->mess_model->peak_current();
          $this->mess_model->update_current_status();
          //current month
            $res['month']=date('F Y');
          //current month
          $this->parser->parse('view_current_status',$res);

       }

    }
     public function current_month_status_admin(){
        
              if($this->session->userdata('logged_in'))
    {
          $session_data = $this->session->userdata('logged_in');
          $list['username'] = $session_data['username'];
          $res=$this->mess_model->current_month_status();
          $res['rate']=$res['total_valuee']/$res['total_meall'];
         // $res['shop']=$this->mess_model->paid_history();
         // $res['meal']=$this->mess_model->meal_history();
          $res['current']=$this->mess_model->peak_current();
          $this->mess_model->update_current_status();
          // current month
           $res['month']=date('F Y');

          //current month

          $this->parser->parse('view_current_status_admin',$res);

       }
       

    }


    


//.........................paid history new end..................
   public function logout()
  {
     $this->session->unset_userdata('logged_in');
      redirect('http://localhost/mess/home/index', 'refresh');
  }
  
 

}

