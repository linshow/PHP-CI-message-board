<?php

class Article extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('article_model');
        $this->load->model('users_sql');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        $this->load->helper('form');
    }
    

    public  function index()
   
    {
    	$data = array();
        if($query = $this->article_model->get_article())
        {
        	$data['record'] = $query;
        }
        $this->load->view('article_index', $data);
    }



    public function check()
    {
        $arr = array();
        $query = $this->article_model->get_article();
        foreach ($query as $row) {
            $data['id'] = $this->users_sql->get_username($row->user_id);
        }
        print_r($data);

        die();
    }
    


    
    public function create_view()
    {
        $this->load->view('article_create');
       
        // $this->form_validation->set_rules('content','content',array('required','min_length[10]'));
       
       
    } 
    

    public function create()
    {

        $this->form_validation->set_rules('content','content','trim|required|min_length[10]|max_length[100]'); 
        if  ($this->form_validation->run()==FALSE ) 
        { 
            
            $this->load->view('article_create');
        } 
        else 
        { 
            
            $data = array(
                'user_id'   =>  $this->session->userdata('id'),  
                'content' => $this->input->post('content')
            );
            $this->article_model->insert_data($data);
            redirect('/article/index');
        } 
    }

    public function update_view()
    {
    	$id = $this->input->post('form_id');
    	$data['record'] = $this->article_model->select_article($id);
    	$this->load->view('update_message', $data);
    }
    public function update(){

        $id = $this->input->post('form_id');
        $this->form_validation->set_rules('content','content','trim|required|min_length[10]|max_length[100]'); 
        if  ($this->form_validation->run()==FALSE ) 
        { 
            $this->update_view();
        } 
        else 
        { 
		
		$data = array(
			'content' => $this->input->post('content')
        );
		$this->article_model->update_data($id, $data);
        redirect('/article/index');
        }
	}
    public function delete(){
		$form_id = $this->input->post('form_id');
		$this->article_model->delete_data($form_id);
		redirect('/article/index');
	}



    

    // public function edit($id = null)
    // {   
    //     if( ! $query = $this->article_model->select_data($id)){
    //         echo "查無資料";
    //         return true;
    //     }
    //     if( ! $this->input->post()){
    //         $this->load->view('article_edit',[
    //             'query' => $query
    //         ]);
    //         return true;
    //     }
    //     $data = [
    //         'id' => $id,
    //         'title' => $this->input->post('title',true),
    //         'content' => $this->input->post('content', true)
            
    //     ];
    //     if(! $this->article_model->update_data($data)){
    //         echo "no";
    //         return true;
    //     }
    //         echo "yes";
    //         return true;
    // }

    //  public function delete( $id = null)
    // {
    //     if( ! $query = $this->article_model->select_data($id)){
    //         echo "查無資料";
    //         return true;
    //     }
    //     if(! $this->article_model->delete_data($id)){
    //         echo "刪除失敗";
    //         return true;
    //     }
    //         echo "刪除成功";
    //         return true;
    // }

    

        
    }




   
