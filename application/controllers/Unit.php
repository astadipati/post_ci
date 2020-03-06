<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	function __construct(){
		parent::__construct();
		cek_gak_login();
		$this->load->model('unit_m');
	}


	public function index()
	{
		$data['row'] = $this->unit_m->get();
		$this->template->load('template','product/unit/unit_data', $data);
	}

	public function del($id){
		$this->unit_m->del($id);
		if($this->db->affected_rows() > 0 ){
			// echo "<script> alert('Data berhasil dihapus') </script>";
			$this->session->set_flashdata('del','Data berhasil dihapus');
		}
		// echo "<script>window.location='".site_url('unit')."'</script>";
		redirect('unit');
	}
	
	public function edit($id){
		$query = $this->unit_m->get($id);
		if($query->num_rows() > 0){
			$unit = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $unit
			);
			$this->template->load('template','product/unit/unit_form', $data);
		}else{
			echo "<script> alert('Data Tidak Ditemukan!!') ;";
			redirect('unit');
			// echo "window.location='".site_url('unit')."';</script>";
		}
	}
	
	public function add(){
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		$data = array(
			'page' => 'add',
			'row' =>$unit
		);
		$this->template->load('template','product/unit/unit_form', $data);
	}
	
	public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->unit_m->add($post);
		}else if (isset($_POST['edit'])){
			$this->unit_m->edit($post);
		}
		if($this->db->affected_rows() > 0 ){
			// echo "<script> alert('Data berhasil disimpan') </script>";
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		// echo "<script>window.location='".site_url('unit')."'</script>";
		redirect('unit');
	}
}
