<?php
    class Users_sql extends CI_Model{
       
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function where_array($array,$table){
            $query = $this->db->where($array)->get($table);
            return $query;  
        }

        function get_user(){
            $query = $this->db->get('users');
            return $query->result();
        }


            //新增資料
        function add($arr){
            $this->db->insert('users',$arr);//users是資料表
        }
        // function add($all,$table){
        //     $this->db->insert($table,$all);
        // }

        //條件 修改
        function where_update($username,$arr){
            $this->db->where('account',$username);
            $this->db->update('users',$arr);
        }
        //條件 刪除
        // function del($array,$table){
        //     $this->db->where($array)->delete($table);
        // }
        function user_delete($id){
            $this->db->where('id',$id);
            $this->db->delete('users');
        }

        function select($username)
        {
            $this->db->where('account',$username);
            $this->db->select('*');
            $query = $this->db->get('users');
            return $query->result();
        }
        function get_username($id)
		{
			$this->db->where('id', $id);
			$this->db->select('*');	
			$query = $this->db->get('users');
			return $query->result();
		}



    }



?>