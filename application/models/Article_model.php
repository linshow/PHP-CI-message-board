<?php

class Article_model extends CI_Model{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_article()
    {
        $this->db->select('*');
        $this->db->from('articles');
        $this->db->join('users', 'user_id = users.id');
        $query = $this->db->get();
        return $query->result();
    }
    function select_article($id){
        $this->db->where('form_id', $id);
        $this->db->select('*');	
        $this->db->from('articles');
        $this->db->join('users', 'user_id = users.id');
        $query = $this->db->get();
        return $query->result();	
    }

    public function insert_data($data)
    {
        
        $this->db->insert('articles', $data);
        //回傳insert進去的primarykey
    }

    public function update_data($id,$data)
    {
        // $this->db->replace('articles', $data);
        // return $this->db->affected_rows();
        $this->db->where('form_id', $id);
		$this->db->update('articles', $data);
    }

    
    public function delete_data($id)
    {
        
        // $this->db->delete('articles', array('id' => $id));
        // return $this->db->affected_rows();
        $this->db->where('form_id', $id);
        $this->db->delete('articles');
    }
}
