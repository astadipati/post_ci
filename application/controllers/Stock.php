<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	function __construct(){
		parent::__construct();
		cek_gak_login();
		$this->load->model(['item_m','supplier_m','category_m','unit_m','stock_m']);
    }

    public function stock_in_data(){
        $data['row'] = $this->stock_m->get_stok_in();
        $this->template->load('template','transaction/stock_in/stock_in_data',$data);
    }
    
    public function stock_in_add(){
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = [
            'item' => $item,
            'supplier' => $supplier
            ];
        $this->template->load('template','transaction/stock_in/stock_in_form', $data);
    }

    public function stock_in_data_log(){
        $data['row'] = $this->stock_m->get_stok_in();
        $this->template->load('template','transaction/stock_log',$data);
    }
     
    public function add_log(){
        $data_ne = $this->input->post('data_log');
        for($i=0; $i < sizeof($data_ne); $i++){
            $data = array('stock_id' => $data_ne[$i]);
            $this->db->insert('stock_log', $data);
        }
        $this->session->set_flashdata('success','Data stok berhasil disimpan');
        // if($this->db->affected_rows() > 0 ){
        // }
        redirect('stock/log');
    }

    public function stock_in_add_log(){
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = [
            'item' => $item,
            'supplier' => $supplier
            ];
        $this->template->load('template','transaction/stock_in/stock_in_form', $data);
    }

    public function stock_in_del(){
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_out($data);
        $this->stock_m->del($stock_id);
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success','Data stok berhasil disimpan');
        }
        redirect('stock/in');
    }

    public function process(){
        if(isset($_POST['in_add'])){
            // echo "Proses ";
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);

            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success','Data stok berhasil disimpan');
            }
            redirect('stock/in');
        }
    }
}