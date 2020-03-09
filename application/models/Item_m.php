<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Item_m extends CI_Model{
    public function get($id = null){
        $this->db->select('a.*, b.name as category_name, c.name as unit_name');
        $this->db->from('item as a');
        $this->db->join('category as b','b.category_id = a.category_id');
        $this->db->join('unit as c', 'c.unit_id = a.unit_id');
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
            'image' => $post['image'],
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
            'updated' => date('Y-m-d H:i:s'),
        ];
        if($post['image' != null]){
            $params['image'] = $post['image'];
        }
        $this->db->where('item_id', $post['id']);
        $this->db->update('item', $params);
    }

    function check_barcode($code, $id = null){
        $this->db->from('item');
        $this->db->where('barcode', $code);
        if($id != null){
            $this->db->where('item_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}