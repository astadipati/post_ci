<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Category_m extends CI_Model{
    public function get($id = null){
        $this->db->from('category');
        $this->db->order_by('category_id','DESC');
        if($id != null ){
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id){
        $this->db->where('category_id', $id);
        $this->db->delete('category');
    }

    public function add($post){
        $params = [
            'name' => $post['category_name']
        ];
        $this->db->insert('category', $params);
    }

    public function edit($post){
        $params = [
            'name' => $post['category_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('category_id', $post['category_id']);
        $this->db->update('category', $params);
    }
}