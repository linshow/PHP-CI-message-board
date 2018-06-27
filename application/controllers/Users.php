<?php
class Users extends CI_Controller{

   public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_sql');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->helper('form');
        
    }
    public function index(){

        $this->load->view('login');
    }
    public function create_user_view()
    {
    	$this->load->view('create_user');
    }


    // public function login(){

    //     $where = $this->input->post();
    //     $query = $this->users_sql->where_array($where,'users');
    //     if($query->num_rows() > 0){
    //         //存進session資料
    //          $this->tran();
    //     }else{
    //         redirect(site_url().'/users');
    //     }
    // }
    // public function user(){
    //     $data['query']= $this->users_sql->all('users');
    //     $this->load->view('user',$data);
    // }

    public function create_user()
    {
    	$data = array(
        	'account'		=>	$this->input->post('account'), 
            'password'		=>	$this->input->post('password'), 
            'name'			=>	$this->input->post('name'), 
            'membership'	=>	$this->input->post('membership')
        );
        $data['password'] = do_hash($data['password'], 'sha256');
        if($this->users_sql->select($data['account']) == true)
        {
        	echo "使用者已存在。";
        }
        else
        {
        	$this->users_sql->add($data);
        	redirect('/users/index');
        }
    }


    public function check_login()
	{
		$user = $this->users_sql->select($_POST['uname']);
		if($user == TRUE)
		{
			if($user[0]->password == do_hash($_POST['upass'], 'sha256'))
			{
				$arr = array(
					'id'			=>	$user[0]->id,
					'account' 		=>	$user[0]->account, 
					'password'		=>	$user[0]->password, 
					'name' 		    =>	$user[0]->name, 
					'membership'	=>	$user[0]->membership
				);
				$this->session->set_userdata($arr);
				redirect('/article/index');
			}
		else
			{
                echo "密碼不正確";
            
                echo print($_POST['uname']);
                
                echo print($_POST['upass']);
                echo print($user[2]);
			}
		}
		else
		{
			echo"用戶不存在";
		}
	}

    public function logout(){
		$array_items = array('id', 'account', 'name', 'membership');
		$this->session->unset_userdata($array_items);
		redirect('/article/index');
	}
    
    public function manage_view_user()
    {
    	$membership = $this->session->userdata('membership');
    	if($membership == 'user')
    	{
    		$this->load->view('manage_user_user');
    	}
    	elseif($membership == 'admin')
    	{
    		if($query = $this->users_sql->get_user())
        	{
        		$data['record'] = $query;
        	}
    		$this->load->view('manage_admin_index', $data);
    	}
	}
	public function manage_view_admin()
    {
    	$username = $this->input->post('account');
    	$data['record'] = $this->users_sql->select($username);
    	$this->load->view('manage_admin_user', $data);
    }
    /******************新增**************************/
        // public function AddUser()
        // {
        //     $data = array(
        //         'account'		=>	$this->input->post('account'), 
        //         'password'		=>	$this->input->post('password'), 
        //     );
        //     $data['password'] = do_hash($data['password'], 'sha256');
        //     if($this->Users_sql->select($data['account']) == true)
        //     {
        //         echo "使用者已存在。";
        //     }
        //     else
        //     {
        //         $this->Users_sql->insert($data);
        //         redirect('/Users');
        //     }
        // }

    public function manage(){
		$arr = array(
			'account' 		=>	$this->input->post('account'), 
			'password'		=>	$this->input->post('password'), 
			'name' 			=>	$this->input->post('name'), 
			'membership'	=>	$this->input->post('membership') 
		);
		$old_password = $this->input->post('old_password');
		$arr['password'] = do_hash($arr['password'] , 'sha256');
		if($this->session->userdata('account') == 'admin')
		{
			$this->users_sql->where_update($arr['account'], $arr);
			redirect('/users/manage_view_user');	
		}
		elseif(do_hash($old_password, 'sha256') == $this->session->userdata('password'))
		{
			$this->users_sql->where_update($arr['account'], $arr);
			$this->session->set_userdata($arr);
			redirect('/article/index');	
		}
		else
		{
			echo "舊密碼不正確";
		}
	}
   
    public function delete(){
		$id = $this->input->post('id');
		$this->users_sql->user_delete($id);
		redirect('/users/manage_view_user');
	}
   
   



}
?>