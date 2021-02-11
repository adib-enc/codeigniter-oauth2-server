<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrator extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// @session_start();
		$this->load->library('migration');
		// echo uri_string();
		if(uri_string() != "migrator/setSess"){
			$this->checkSess();
		}
	}

	public function checkSess(){
		$user = $this->session->userdata("user");
		
		// if(!$user){
		if(false){
			redirect(base_url("f0f"));
			return;
		}
	}

	public function setSess(){
		$user = 1;
		$this->session->set_userdata("user", $user);
		preout($user);
		// $user = $this->session->userdata("user");
		preout("user");
		$user = $this->session->userdata();
		preout($user);
		preout($_SESSION);
		echo "set ok";
	}

	public function index()
	{
		preout($this->migration);
		preout($this->migration->find_migrations());

		$data['migrator'] = [
			"migrator/fresh/",
			"migrator/version/",
			"migrator/latest/",
			"migrator/create/",
			"migrator/alter/",
		];
		$this->load->view('app/migrator', $data);
	}
	
	public function fresh($v = "n"){
		if($v == "y"){
			return $this->migration->version(0);
		}else{
			echo "yakin?";
		}
	}

	public function version($v = null){
		return $this->migration->version($v);
	}

	public function latest(){
		$latest = $this->migration->latest();
		if (!$latest) {
			echo "why";
			show_error($this->migration->error_string());
		}else{
			echo "migrated latest ".json_encode($latest);
		}
	}

	public function create($name = "create_table"){
		$now = date("YmdHis");
		$fr = fopen(APPPATH . "migrations/stub/MigrateStub.php", "r");
		$template = fread($fr, 4096);
		$fname = APPPATH . "migrations/$now"."_"."$name.php";
		$fr = fopen($fname, "w");
		fwrite($fr, $template);
		fclose($fr);
		echo "to ".$fname;
	}

	public function alter(){
		echo date("YmdHis");
	}
}
