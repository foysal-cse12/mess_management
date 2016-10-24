<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mess_model extends CI_Model {
  
 public function __construct()
    {
      parent::__construct();
      //$this->load->helper('url');
      //$this->load->database();
    }

 public function check_login($data)
 {
    $condition = array("username"=>$data["username"],"password"=>$data["password"]);
    $this->db->select("*");
    $this->db->where($condition);
    $qry = $this->db->get("users");
    if($qry->num_rows==1)
    {
       return $qry->row_array();
    }
    else
    {
      return false;
    }
   
 }

 public function insert_member($data)
 {
  $username = $data['username'];
  $current = array('username'=>$data['username']);
  $users = array('username'=>$data['username'],'password'=>$data['password'],'type'=>'member');
  $members = array('username'=>$data['username'],'fullname'=>$data['fullname'],'email'=>$data['email'],'mobile'=>$data['mobile']); 

      $this->db->select('*');
      $this->db->where('username',$username);
      $qry = $this->db->get('users');
      if($qry->num_rows>0)
      {
        //echo "username exists";
        redirect('http://localhost/mess/home/add_member','refresh');
      }
      else
      {
        $this->db->insert('users',$users);
        $this->db->insert('members',$members);
        $this->db->insert('current_status',$current);
        //echo "successfully inserted";
        redirect('http://localhost/mess/home/admin','refresh');

      }

 }

 public function check_username($username)
 {
   $this->db->where('username',$username);
   $result = $this->db->get('users');
   if($result->num_rows==1)
   {
    return true;
   }
   else
   {
    return false;
   }
 }

 public function member_profile($data)
 {
  $condition = array('username'=>$data['username']);
  $this->db->select('username,fullname,email,mobile');
  $this->db->where($condition);
  $info = $this->db->get('members');
  return $info->row_array();
 }

 public function edit_member_info($data)
 {
  $update = array('fullname'=>$data['fullname'],'email'=>$data['email'],'mobile'=>$data['mobile']);
  //$condition = array('username'=>$data['username']);
  $this->db->where('username',$data['username']);
  $this->db->update('members',$update);
  redirect('http://localhost/mess/home/member','refresh');
  //echo "from model hello";

 }

 public function member_list()
 {
  $this->db->select("id,fullname");
  $qry = $this->db->get('members');
  return $qry->result_array();
 }

 public function member_details($id)
 {
  $this->db->select('fullname,email,mobile');
  $this->db->where('id',$id);
  $qry = $this->db->get('members');
  return $qry->row_array();

 }

 public function check_meal($meal)
 {
  $meal_info = array('date'=>$meal['date'],'username'=>$meal['username']);
  $this->db->select('*');
  $this->db->where($meal_info);
  $qry=$this->db->get('meal');
  if($qry->num_rows==1)
  {
    //echo "detected";
    return $qry->row_array();
    
  }
  else
  {
    //echo "not found";
    return false;
    
  }
 }

 public function meal_insert($meal)
 {
  /*$meal_data = array('date'=>$meal['date'],'username'=>$meal['username'],'breakfast'=>$meal['breakfast'],'lunch'=>$meal['lunch'],'dinner'=>$meal['dinner']); 
   $this->db->insert('meal',$meal_data);*/
   
     $breakfast = $meal['breakfast'];
     $lunch = $meal['lunch'];
     $dinner = $meal['dinner'];
     $total = $breakfast+$lunch+$dinner;

     $meal_data = array('date'=>$meal['date'],'username'=>$meal['username'],'breakfast'=>$meal['breakfast'],'lunch'=>$meal['lunch'],'dinner'=>$meal['dinner'],'meal_sum'=>$total); 
     $this->db->insert('meal',$meal_data);

   redirect('http://localhost/mess/home/member','refresh');

 }

 public function meal_update_slot1($meal)
 {
     $breakfast = $meal['breakfast'];
     $lunch = $meal['lunch'];
     $dinner = $meal['dinner'];
     $total = $breakfast+$lunch+$dinner;
  $meal_update = array('breakfast'=>$meal['breakfast'],'lunch'=>$meal['lunch'],'dinner'=>$meal['dinner'],'meal_sum'=>$total);
  $condition = array('date'=>$meal['date'],'username'=>$meal['username']);
  $this->db->where($condition);
  $this->db->update('meal',$meal_update);
  redirect('http://localhost/mess/home/member','refresh');
 }

 public function meal_update_slot2($meal)
 {
     $breakfast = $meal['breakfast'];
     $lunch = $meal['lunch'];
     $dinner = $meal['dinner'];
     $total = $breakfast+$lunch+$dinner;
     
  $meal_update = array('lunch'=>$meal['lunch'],'dinner'=>$meal['dinner'],'meal_sum'=>$total);
  $condition = array('date'=>$meal['date'],'username'=>$meal['username']);
  $this->db->where($condition);
  $this->db->update('meal',$meal_update);
  redirect('http://localhost/mess/home/member','refresh');
 }

 public function meal_update_slot3($meal)
 {
    $breakfast = $meal['breakfast'];
     $lunch = $meal['lunch'];
     $dinner = $meal['dinner'];
     $total = $breakfast+$lunch+$dinner;
     /*echo 'B:'.$breakfast;
     echo '<br>';
     echo 'L:'.$lunch;
     echo '<br>';
     echo 'D:'.$dinner;
     echo '<br>';
     echo 'T:'.$total;*/
    $meal_update = array('dinner'=>$meal['dinner'],'meal_sum'=>$total);
    $condition = array('date'=>$meal['date'],'username'=>$meal['username']);
    $this->db->where($condition);
    $this->db->update('meal',$meal_update);
    redirect('http://localhost/mess/home/member','refresh');
 }



 public function member_list_for_meal($str,$date)
       {
        if($str=='breakfast')
        {
          $condition = array('date'=>$date,'breakfast'=>1);
          $this->db->select('username,breakfast');
          $this->db->where($condition);
          $qry = $this->db->get('meal');
          if($qry->num_rows==0)
          {
            return false;
          }
          else
          {
            return $qry->result_array();
          }
          

        }

        else if($str=='lunch')
        {
          $condition = array('date'=>$date,'lunch'=>1);
          $this->db->select('username,lunch');
          $this->db->where($condition);
          $qry = $this->db->get('meal');
          if($qry->num_rows==0)
          {
            return false;
          }
          else
          {
            return $qry->result_array();
          }

        }

        else if($str=='dinner')
        {
          $condition = array('date'=>$date,'dinner'=>1);
          $this->db->select('username,dinner');
          $this->db->where($condition);
          $qry = $this->db->get('meal');
          if($qry->num_rows==0)
          {
            return false;
          }
          else
          {
            return $qry->result_array();
          }

        }
        else
        {

        }
 }

 public function check_shopping($shop)
 {
  $shop_info = array('date'=>$shop['date'],'username'=>$shop['username']);
  $this->db->select('*');
  $this->db->where($shop_info);
  $qry=$this->db->get('shopping');
  if($qry->num_rows==1)
  {
    //echo "detected";
    return $qry->row_array();
    
  }
  else
  {
    //echo "not found";
    return false;
    
  }
 }

 public function add_shopping($shop){

      $shop_value= array(

            "date"=>$shop['date'],
            "username"=>$shop['username'],
            "shop_value"=>$shop['value']
        );
      //print_r($shop_value);
      $this->db->insert('shopping',$shop_value);
      redirect('http://localhost/mess/home/member','refresh');


    } 

    public function shopping_update($shop)
    {
      $condition = array('date'=>$shop['date'],'username'=>$shop['username']);
      $shop_update = array('shop_value'=>$shop['value']);
      $this->db->where($condition);
      $this->db->update('shopping',$shop_update);
      redirect('http://localhost/mess/home/member','refresh');
    }



   public function personal_shoplist($list)
   {
  

    $cond=array( 'username'=>$list['username']);
    $this->db->select('username,date,shop_value');
    $this->db->where($cond);
    $res=$this->db->get('shopping');
    return $res->result_array();

   }

   public function members_shoplist($list)
   {
    $username = $list['username'];
    $this->db->select('username,date,shop_value');
    $this->db->where('username !=',$username);
    $this->db->order_by("date", "asc");
    $res=$this->db->get('shopping');
    return $res->result_array();
   }

   public function shopping_history()
   {
    $this->db->select('date,username,shop_value');
    $result =  $this->db->get('shopping');
     $this->db->order_by("date", "asc");
    return $result->result_array();
   }

   //.......................paid history...........................
   public function paid_history()
   {
    /*$qry  = "SELECT username,  sum(shop_value)   FROM shopping   GROUP BY username";
    $result = $this->db->query($qry);
    return $result->result_array();*/
     $sql="SELECT username,shop_value, SUM(shop_value) as total from shopping group by username"; 
     //$this->db->order_by('total', 'desc'); 
     $result=$this->db->query($sql);
     return $result->result_array();


   }



   //.....................paid history................................

   public function meal_history(){
        $sql="SELECT username, SUM(meal_sum) as total_meal from meal group by username";
        $result=$this->db->query($sql);
        return $result->result_array();


   }
   public function current_month_status(){
    $sql="SELECT  SUM(m.meal_sum) as total_meall,SUM(s.shop_value) as total_valuee from meal m,shopping s where m.username=s.username";
    $res=$this->db->query($sql);
    return $res->row_array();
   }
   public function peak_current(){
   

        //  $meal=$this->meal_history();
        //  $paid=$this->paid_history();
         

        // // echo $meal ['0']['total_meal'];
        // // echo $paid['0']['total'];
        //  $data=array(
        //   'username'=>$paid['0']['username'],
        //   'total_value'=>$paid['0']['total'],
        //   'total_meal'=>$meal['0']['total_meal']
          
        //   );
        //  $this->db->insert('current_status',$data);
    $this->db->select('*');
    $res=$this->db->get('current_status');
    return $res->result_array();



}
  public function update_current_status(){
      $sql="SELECT username, SUM(meal_sum) as total_meal from meal group by username";
       $sql1="SELECT username,shop_value, SUM(shop_value) as total from shopping group by username";

       
       $sql2="SELECT m.username as username,SUM(m.meal_sum) as total_meal,SUM(s.shop_value) as total from meal m,shopping s   where m.username=s.username group by m.username"; 
       //$sql2="SELECT SUM(m.meal_sum) as total_meal,SUM(s.shop_value) as total from meal m join shopping s  on m.username=s.username"; 

       $res=$this->db->query($sql2);
       
       foreach ($res->result_array() as $row) {

        $u=$row['username'];
        $tm=$row['total_meal'];
        $t=$row['total'];
        $up="update current_status set total_value='$t',total_meal='$tm' where username='$u'";
        $this->db->query($up);

        
       }


      

    


  }
}