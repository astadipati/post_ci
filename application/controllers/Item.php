<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {

	function __construct(){
		parent::__construct();
		cek_gak_login();
		$this->load->model(['item_m','category_m','unit_m']);
	}


	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template','product/item/item_data', $data);
	}

	public function del($id){
		$this->item_m->del($id);
		if($this->db->affected_rows() > 0 ){
			// echo "<script> alert('Data berhasil dihapus') </script>";
			$this->session->set_flashdata('del','Data berhasil dihapus');
		}
		// echo "<script>window.location='".site_url('item')."'</script>";
		redirect('item');
	}
	
	public function edit($id){
		$query = $this->item_m->get($id);
		if($query->num_rows() > 0){
			$item = $query->row();

			// get kategori
			$query_category = $this->category_m->get();

			// get selected unit
			$query_unit = $this->unit_m->get();
			$unit[null] = '- Pilih - ';
			foreach($query_unit->result() as $unt){
				$unit[$unt->unit_id] = $unt->name;
			}

			$data = array(
				'page' => 'edit',
				'row' => $item,
				'category' => $query_category,
				'unit' => $unit,'selectunit' => $item->unit_id,
			);
			$this->template->load('template','product/item/item_form', $data);
		}else{
			echo "<script> alert('Data Tidak Ditemukan!!') ;";
			redirect('item');
			// echo "window.location='".site_url('item')."';</script>";
		}
	}
	
	public function add(){

		$item = new stdClass();
		$item->item_id = null;
		$item->barcode = null;
		$item->name = null;
		$item->price = null;
		$item->category_id = null;
		// load category
		$query_category = $this->category_m->get();
		// load unit
		$query_unit = $this->unit_m->get();
		$unit[null] = '__Pilih__';
		foreach ($query_unit->result() as $unt){
			$unit[$unt->unit_id] = $unt->name;
		}

		$data = array(
			'page' => 'add',
			'row' =>$item,
			'category' => $query_category,
			// cara ke 2 pakai form helper
			'unit' => $unit, 'selectunit' => null,
		);
		$this->template->load('template','product/item/item_form', $data);
	}
	
	public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah terpakai");
				redirect ('item/add');
			}else{
				$this->item_m->add($post);
			}
		}else if (isset($_POST['edit'])){
			if($this->item_m->check_barcode($post['barcode'],$post['id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah terpakai");
				redirect ('item/edit/'.$post['id']);
			}else{
				$this->item_m->edit($post);
			}
		}
		if($this->db->affected_rows() > 0 ){
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('item');
	}
}
