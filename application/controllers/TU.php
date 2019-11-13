<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TU extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model("TU_Model");
		$this->load->model("Mahasiswa_Model");
		$this->load->library('session');
	}
	
	public function index()
	{
		header('Location: '.base_url().'TU/home');
	}
	
	public function home()
	{
		if(!isset($_SESSION['TU'])){
			header('Location: '.base_url().'TU/login');
		}
		else{
			$result = $this->Mahasiswa_Model->getAll();
			$data = array('datamahasiswa' => $result);
			$this->load->view('TU/home',$data);
		}
	}
	
	public function login()
	{
		if(isset($_SESSION['TU'])){
			header('Location: '.base_url().'TU/home');
		}
		else if(!isset($_POST['username'])){
			$this->load->view('TU/login');
		}
		else{
			$result = $this->TU_Model->getByUsername($_POST['username']);
			if(!($result == 0)){
				$isvalid = password_verify($_POST['username'],$result['password']);
				if($isvalid){
					$_SESSION['TU'] = $_POST['username'];
					header('Location: '.base_url().'TU/home');
				}
				else{
					$this->load->view('TU/login');
				}
			}
			else{
				$this->load->view('TU/login');
			}
		}
	}
	
	public function create()
	{
		if(!isset($_POST['username'])){
			$this->load->view('TU/login');
		}
		else if(!isset($_POST['password'])){
			$this->load->view('TU/login');
		}
		else{
			$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
			$create = array(
				'username' => $_POST['username'],
				'password' => $password
			);
			$result = $this->TU_Model->createTU($create);
			if($result){
				$this->load->view('TU/login');
			}
			else{
				header('Location: '.base_url().'TU/home');
			}
		}
	}
	
	public function logout(){
		unset($_SESSION['TU']);
		header('Location: '.base_url());
	}
	
	public function createmahasiswa()
	{
		if(!isset($_POST['NIM'])){
			header('Location: '.base_url().'TU/home');
		}
		else if(!isset($_POST['nama'])){
			header('Location: '.base_url().'TU/home');
		}
		else{
			$password = password_hash($_POST['NIM'],PASSWORD_DEFAULT);
			$create = array(
				'NIM' => $_POST['NIM'],
				'nama' => $_POST['nama'],
				'password' => $password
			);
			$result = $this->Mahasiswa_Model->createMahasiswa($create);
			if($result){
				header('Location: '.base_url().'TU/home');
			}
			else{
				header('Location: '.base_url().'TU/home');
			}
		}
	}
}
