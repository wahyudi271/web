<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public  function __construct()
	{

		parent::__construct();

		$this->load->model('M_datadiri','mself');
	}


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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data=[
			'data'=>$this->mself->getdatadiri(),
			'data2'=>$this->mself->getdataorganisasi()->result(),
			'data3'=>$this->mself->getdatakeahlian()->result(),
		];

		//echo json_encode($data);



		$this->load->view('index',$data);
	}
	public function home_dua()
	{

		$this->load->view('template/header');
		$this->load->view('template/footer');
		$this->load->view('template/contens');
	}
}
