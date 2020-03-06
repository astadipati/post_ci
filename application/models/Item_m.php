<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Item_m extends CI_Model{
    public function get($id = null){
        $this->db->from('item');
        $this->db->order_by('item_id','DESC');
        if($id != null ){
            $this->db->where('item_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id){
        $this->db->where('item_id', $id);
        $this->db->delete('item');
    }

    public function add($post){
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['item_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
        ];
        $this->db->insert('item', $params);
    }

    public function edit($post){
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['item_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('item_id', $post['item_id']);
        $this->db->update('item', $params);
    }
}