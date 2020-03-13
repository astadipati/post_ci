<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Stock_m extends CI_Model{

    public function get($id = null){
        $this->db->from('t_stock');
        if($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id){
        $this->db->where('stock_id', $id);
        $this->db->delete('t_stock');
    }
 
    public function get_stok_in(){
        $this->db->select('a.stock_id, b.item_id, b.barcode, b.name as item_name, b.price as price,a.detail, c.name as supplier_name, a.qty, a.date, d.name as user_name');
        $this->db->from('t_stock as a');
        $this->db->join('item as b','b.item_id = a.item_id');
        $this->db->join('supplier as c','c.supplier_id = a.supplier_id');
        $this->db->join('user as d','d.user_id = a.user_id');
        $this->db->where('type','in');
        $this->db->order_by('stock_id','desc');
        $query = $this->db->get();
        return $query;

    }
    public function add_stock_in($post){
        $params = [
            'item_id' => $post['item_id'],
            'type'  => 'in',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty'   => $post['qty'],
            'date'  => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('t_stock',$params);
    }
}